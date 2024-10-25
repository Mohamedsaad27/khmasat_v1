<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('front.my-profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->update([
            'name' => $validated['name'] ?? $request->user()->name,
            'email' => $validated['email'] ?? $request->user()->email,
        ]);
        $request->user()->save();
        return Redirect::route('front.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile picture.
     */
    public function updatePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $user = $request->user();

        if ($request->hasFile('profile_picture')) {
            // Remove old profile picture if it exists
            if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }

            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'assets/imgs/profile-pictures/' . $user->id;
            $image->move(public_path($imagePath), $imageName);
            $user->profile_picture = $imagePath . '/' . $imageName;
        }

        $user->save();
        return Redirect::route('front.profile.edit')->with('status', 'profile-picture-updated');
    }

    public function changePassword(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'confirmed', 'min:8'],
            ], [
                'current_password.required' => 'يرجى إدخال كلمة المرور الحالية',
                'current_password.current_password' => 'كلمة المرور الحالية غير صحيحة',
                'password.required' => 'يرجى إدخال كلمة المرور الجديدة',
                'password.confirmed' => 'كلمة المرور الجديدة غير متطابقة',
                'password.min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل',
            ]);

            $user = $request->user();
            $user->password = Hash::make($request->password);
            $user->save();

            return Redirect::route('front.profile.edit')->with('success', 'تم تحديث كلمة السر بنجاح');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return Redirect::back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'حدث خطأ أثناء تحديث كلمة السر');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
