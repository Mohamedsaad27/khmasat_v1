<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- include style front side --}}
    <link rel="stylesheet" href="{{ asset('assets/css/front/style.css') }}">

    {{-- include cdn tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- link component tailwind  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/front/components-tailwind.css') }}">

    {{-- include cdn fontawsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    {{-- include link font Tajwal --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    @stack('styles')
</head>

<body>

    {{-- start preloader --}}
    {{-- end preloader --}}

    <div x-data="{ open: false }" class="sticky top-0 z-[10000]">
        {{-- start header --}}
        <header class="header bg-white w-full">
            <div class="container mx-auto flex justify-between items-center p-6">
                {{-- logo and menu button --}}
                <div class="flex items-center">
                    <p class="font-bold text-lg">Logo</p>

                    {{-- menu button --}}
                    <button x-on:click="open = true"
                        class="block md:hidden mr-4 text-gray-800 focus:outline-none transition duration-200 hover:text-[#36b6ff]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                {{-- links --}}
                <div class="links font-bold hidden md:block">
                    <a href="" class="{{ $currentRoute == 'welcome' ? 'active' : '' }}">الرئيسية</a>
                    <a href="" class="mr-3 {{ $currentRoute == 'aqar' ? 'active' : '' }}">العقارات</a>
                    <a href="" class="mr-3 {{ $currentRoute == 'about' ? 'active' : '' }}">من نحن</a>
                    <a href="" class="mr-3 {{ $currentRoute == 'contact-us' ? 'active' : '' }}">اتصل بنا</a>
                </div>

                {{-- user --}}
                <div class="flex items-center">
                    {{-- love --}}
                    <a href=""
                        class="relative flex items-center justify-center font-bold transition duration-200 hover:text-red-500">
                        <span
                            class="absolute top-[-9px] right-[-10px] text-xs bg-red-500 text-white rounded-full px-1">10</span>
                        <i class="fa-regular fa-heart"></i>
                    </a>

                    {{-- user --}}
                    <div class="user-icon flex justify-center items-center w-[30px] h-[30px] mr-4">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <a href="" class="login mr-2 font-bold">تسجيل الدخول</a>
                </div>
            </div>
        </header>
        {{-- end header --}}

        {{-- start sidebar --}}
        <div class="sidebar fixed min-h-screen z-[10000]">
            <div>
                <!-- Sidebar Overlay -->
                <div x-show="open" class="fixed inset-0 z-50 overflow-hidden">
                    <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity ease-in duration-300"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                    <!-- Sidebar Content -->
                    <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
                        <div x-show="open" x-transition:enter="transition-transform ease-out duration-300"
                            x-transition:enter-start="transform translate-x-full"
                            x-transition:enter-end="transform translate-x-0"
                            x-transition:leave="transition-transform ease-in duration-300"
                            x-transition:leave-start="transform translate-x-0"
                            x-transition:leave-end="transform translate-x-full" class="w-[300px]">
                            <div class="h-full flex flex-col py-6 bg-white shadow-xl">
                                <!-- Sidebar Header -->
                                <div class="flex items-center justify-between px-4">
                                    <p>Logo</p>
                                    <button x-on:click="open = false" class="text-gray-500 hover:text-gray-700">
                                        <span class="sr-only">Close</span>
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Sidebar Content -->
                                <div class="mt-[40px] px-4">
                                    <!-- Add your sidebar content here -->

                                    <div class="links pb-5 border-b border-gray-500">
                                        <a href=""
                                            class="block py-2.5 px-4 flex items-center space-x-2 text-black font-bold rounded mb-1 text-[16px] {{ $currentRoute == 'welcome' ? 'active' : '' }}">
                                            <i class="fa-solid fa-house ml-3"></i> الرئيسية
                                        </a>
                                        <a href=""
                                            class="block py-2.5 px-4 flex items-center space-x-2 text-black font-bold rounded mb-1 text-[16px] {{ $currentRoute == 'name' ? 'active' : '' }}">
                                            <i class="fa-solid fa-list ml-3"></i> العقارات
                                        </a>
                                        <a href=""
                                            class="block py-2.5 px-4 flex items-center space-x-2 text-black font-bold rounded mb-1 text-[16px] {{ $currentRoute == 'name' ? 'active' : '' }}">
                                            <i class="fa-solid fa-id-card ml-3"></i> من نحن
                                        </a>
                                        <a href=""
                                            class="block py-2.5 px-4 flex items-center space-x-2 text-black font-bold rounded mb-1 text-[16px] {{ $currentRoute == 'name' ? 'active' : '' }}">
                                            <i class="fa-solid fa-phone-flip ml-3"></i> اتصل بنا
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        {{-- end sidebar --}}
    </div>

    {{ $slot }}

    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    @stack('scripts')
</body>

</html>
