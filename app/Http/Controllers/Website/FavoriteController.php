<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Repository\FavoriteRepository;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    protected  $favoriteRepository;
    public function __construct(FavoriteRepository $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }
    public function getFavorites(Request $request)
    {
        $favorites = $this->favoriteRepository->getFavorites($request);
        return response()->json($favorites);
    }
    public function addPropertyToFavorite(Request $request)
    {
        $request->validate([
            'property_id' => 'required|integer|exists:properties,id'
        ]);
    
        // $user_id = auth()->id(); // Get the authenticated user's ID
    
        $existingFavorite = Favorite::where('user_id', 1)
            ->where('property_id', $request->property_id)
            ->first();
    
        if ($existingFavorite) {
            return response()->json(['message' => 'هذا العقار موجود في المفضلة'], 409);
        }
    
        Favorite::create([
            'user_id' => 1,
            'property_id' => $request->property_id,
        ]);
    
        return response()->json(['message' => 'تم اضافة العقار المفضلة'], 200);
    }
    public function removePropertyFromFavorite(Request $request)
    {
        $request->validate([
            'property_id' => 'required|integer|exists:properties,id'
        ]);
        $result = $this->favoriteRepository->removePropertyFromFavorite($request);
        return redirect()->back()->with('success', 'تم حذف المنتج من المفضلة !');
    }
}
