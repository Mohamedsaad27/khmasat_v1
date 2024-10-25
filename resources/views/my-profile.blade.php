<x-front-layout class="p-6 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Cover Photo Area -->
            <div class="relative h-64 bg-gradient-to-br from-blue-600 via-blue-700 to-purple-600">
                <div class="absolute inset-0 bg-black/20"></div>
                <div
                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48cGF0aCBkPSJNMzAgNDVMMCAzMGwzMC0xNSAzMCAxNS0zMCAxNXoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30">
                </div>

                <!-- Profile Picture Overlay -->
                <div class="absolute -bottom-16 left-8">
                    <div class="relative group">
                        @if ($user->profile_picture)
                            <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture"
                                class="w-32 h-32 rounded-xl object-cover border-4 border-white shadow-2xl transition-transform group-hover:scale-105">
                        @else
                            <div
                                class="w-32 h-32 rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 border-4 border-white shadow-2xl flex items-center justify-center">
                                <span
                                    class="text-4xl font-bold text-gray-400">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        @endif

                        <form action="{{ route('profile.updatePicture') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" name="profile_picture" id="profile_picture" class="hidden"
                                accept="image/*" onchange="this.form.submit()">
                            <label for="profile_picture"
                                class="absolute bottom-2 right-2 bg-white/90 backdrop-blur-sm rounded-full p-2 shadow-lg cursor-pointer transition-all hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </label>
                        </form>
                    </div>
                </div>

                <!-- User Info Overlay -->
                <div class="absolute bottom-6 left-48 text-white">
                    <h1 class="text-3xl font-bold tracking-tight">{{ $user->name }}</h1>
                    <div class="flex items-center gap-3 mt-2">
                        <p class="text-white/90">{{ $user->email }}</p>
                        @if ($user->email_verified_at)
                            <span
                                class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-100 backdrop-blur-sm">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Verified
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Security Button -->
                <div class="absolute bottom-6 right-8">
                    <button type="button" onclick="window.changePasswordModal.showModal()"
                        class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 border border-white/20 rounded-lg text-white transition-all">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Change Password
                    </button>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-8 pt-20">
                <!-- Profile Form -->
                <form action="{{ route('profile.update') }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $user->name) }}"
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Additional Information -->
                    @if ($user->employee)
                        <div class="border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-medium text-gray-900">Employee Information</h3>
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Add employee-specific fields here -->
                            </div>
                        </div>
                    @endif

                    @if ($user->company)
                        <div class="border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-medium text-gray-900">Company Information</h3>
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Add company-specific fields here -->
                            </div>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="flex justify-end pt-6">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Password Change Modal -->
    <dialog id="changePasswordModal" class="relative rounded-lg shadow-xl max-w-md w-full bg-white">
        <form action="{{ route('profile.update') }}" method="POST" class="p-6">
            @csrf
            @method('PUT')

            <h3 class="text-lg font-medium text-gray-900 mb-6">Change Password</h3>

            <div class="space-y-4">
                <div>
                    <label for="modal_current_password" class="block text-sm font-medium text-gray-700">Current
                        Password</label>
                    <input type="password" name="current_password" id="modal_current_password"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('current_password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="modal_password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" name="password" id="modal_password"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="modal_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        New Password</label>
                    <input type="password" name="password_confirmation" id="modal_password_confirmation"
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="window.changePasswordModal.close()"
                    class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-500">
                    Cancel
                </button>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Password
                </button>
            </div>
        </form>
    </dialog>
</x-front-layout>
