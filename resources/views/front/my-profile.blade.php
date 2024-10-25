<x-front-layout class="p-6 bg-gray-50">

    @push('alerts')
        @if (Session::has('success'))
            <script>
                iziToast.success({
                    title: "{{ session('success') }}",
                    position: 'topRight',
                });
            </script>
        @endif
    @endpush

    {{-- Start Breadcrumb --}}
    <x-front.breadcrumb currentPage="الصفحة الشخصية" />
    {{-- End Breadcrumb --}}

    <div class="container mx-auto my-10">
        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Cover Photo Area -->
            <div class="relative h-48 md:h-64 bg-gradient-to-br from-blue-600 via-blue-700 to-purple-600">
                <div class="absolute inset-0 bg-black/20"></div>
                <div
                    class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgdmlld0JveD0iMCAwIDYwIDYwIj48cGF0aCBkPSJNMzAgNDVMMCAzMGwzMC0xNSAzMCAxNS0zMCAxNXoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-30">
                </div>

                <!-- Profile Picture Overlay -->
                <div class="absolute -bottom-12 md:-bottom-16 left-4 md:left-8">
                    <div class="relative group">
                        @if ($user->profile_picture)
                            <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture"
                                class="w-24 h-24 md:w-32 md:h-32 rounded-xl object-cover border-4 border-white shadow-2xl transition-transform group-hover:scale-105 cursor-pointer"
                                onclick="window.profilePictureModal.showModal()">
                        @else
                            <div
                                class="w-24 h-24 md:w-32 md:h-32 rounded-xl bg-gradient-to-br from-gray-100 to-gray-200 border-4 border-white shadow-2xl flex items-center justify-center">
                                <span
                                    class="text-3xl md:text-4xl font-bold text-gray-400">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        @endif

                        <form action="{{ route('front.profile.updatePicture') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" name="profile_picture" id="profile_picture" class="hidden"
                                accept="image/*" onchange="this.form.submit()">
                            <label for="profile_picture"
                                class="absolute bottom-2 right-2 bg-white/90 backdrop-blur-sm rounded-full p-1.5 md:p-2 shadow-lg cursor-pointer transition-all hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 md:h-4 md:w-4 text-gray-600"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <div class="absolute bottom-[8rem] md:bottom-[10rem] left-5 text-white">
                    <h1 class="text-end text-xl md:text-3xl font-bold tracking-tight">{{ $user->name }}</h1>
                    <div class="flex flex-row md:items-center gap-1 md:gap-3 mt-1 md:mt-2">
                        <p class="text-sm md:text-base text-white/90">{{ $user->email }}</p>
                        {{-- @if ($user->email_verified_at) --}}
                        <span
                            class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-100 backdrop-blur-sm">
                            <svg class="w-2.5 h-2.5 md:w-3 md:h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Verified
                        </span>
                        {{-- @endif --}}
                    </div>
                </div>

                <!-- Security Button -->
                <div class="absolute bottom-2 md:bottom-4 right-2 md:right-4">
                    <button type="button" onclick="window.changePasswordModal.showModal()"
                        class="inline-flex items-center text-xs md:text-[15px] px-3 py-1.5 md:px-4 md:py-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 border border-white/20 rounded-lg text-white transition-all">
                        <svg class="w-4 h-4 md:w-5 md:h-5 ml-1.5 md:ml-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        تغير كلمة المرور
                    </button>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-8 pt-20">
                <!-- Profile Form -->
                <form action="{{ route('front.profile.update') }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information Section -->
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">الأسم</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div
                                    class="absolute inset-y-0 top-[4px] left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $user->name) }}"
                                    class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow">
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div
                                    class="absolute inset-y-0 top-[4px] left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow">
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
                            حفظ التعديلات
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Password Change Modal -->
    <dialog id="changePasswordModal" class="relative rounded-lg shadow-xl max-w-md w-[91%] bg-white">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"
            onclick="window.changePasswordModal.close()"></div>
        <div class="bg-white relative z-10" onclick="event.stopPropagation()">
            <form action="{{ route('front.profile.changePassword') }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <h3 class="text-lg font-medium text-gray-900 mb-6">تعديل كلمة المرور</h3>

                <div class="space-y-4">
                    <div>
                        <label for="modal_current_password" class="block text-sm font-medium text-gray-700">كلمة السر
                            الحالية</label>
                        <div class="relative">
                            <input type="password" name="current_password" id="modal_current_password"
                                class="auth__password w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow"
                                placeholder="ادخل كلمة السر القديمة هنا ...">
                            <span class="password__icon">
                                <i
                                    class="fa-solid fa-eye-slash absolute left-[14px] top-[15.5px] text-[16px] eye cursor-pointer hover:text-sky-500 transition duration-200"></i>
                            </span>
                        </div>
                        @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="modal_password" class="block text-sm font-medium text-gray-700">كلمة سر
                            جديدة</label>
                        <div class="relative">
                            <input name="password" type="password" id="modal_password"
                                class="auth__password w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow"
                                placeholder="ادخل كلمة السر الجديدة هنا ...">
                            <span class="password__icon">
                                <i
                                    class="fa-solid fa-eye-slash absolute left-[14px] top-[15.5px] text-[16px] eye cursor-pointer hover:text-sky-500 transition duration-200"></i>
                            </span>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="modal_password_confirmation" class="block text-sm font-medium text-gray-700">تأكيد
                            كلمة المرور الجديدة</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="modal_password_confirmation"
                                class="auth__password w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow"
                                placeholder="تاكيد كلمة السر الجديدة هنا ...">
                            <span class="password__icon">
                                <i
                                    class="fa-solid fa-eye-slash absolute left-[14px] top-[15.5px] text-[16px] eye cursor-pointer hover:text-sky-500 transition duration-200"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button type="button" onclick="window.changePasswordModal.close()"
                        class="px-4 py-2 bg-gray-200 rounded-md text-sm font-medium text-gray-700 hover:text-gray-500">
                        إلغاء
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        تحديث كلمة المرور
                    </button>
                </div>
            </form>
        </div>
    </dialog>


    <!-- Profile Picture Modal -->
    <dialog id="profilePictureModal" class="relative rounded-lg shadow-xl max-w-md w-[91%] bg-white">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"
            onclick="window.profilePictureModal.close()"></div>
        <div class="bg-white relative z-10" onclick="event.stopPropagation()">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-6">صورة الملف الشخصي</h3>
                <img src="{{ asset($user->profile_picture) }}" alt="Profile Picture"
                    class="w-full h-[400px] rounded-lg object-cover shadow-lg">
                <div class="mt-6 flex justify-end">
                    <button type="button" onclick="window.profilePictureModal.close()"
                        class="px-4 py-2 bg-gray-200 rounded-md text-sm font-medium text-gray-700 hover:text-gray-500">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('changePasswordModal');
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.close();
                }
            });
        });

        @if ($errors->has('password') || $errors->has('current_password'))
            window.changePasswordModal.showModal();
        @endif
    </script>

</x-front-layout>
