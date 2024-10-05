<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- include style front side --}}
    <link rel="stylesheet" href="{{ asset('assets/css/front/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">

    {{-- include cdn tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- link component tailwind  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/front/components-tailwind.css') }}">

    {{-- include cdn fontawsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    {{-- include cdn iziToast --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />

    {{-- include link font Tajwal --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    @stack('styles')
</head>

<body>

    {{-- start preloader --}}
    <div id="preloader"
        class="fixed w-full h-full z-[50000] flex items-center justify-center bg-white transition duration-200">
        <div class="loader"></div>
    </div>
    {{-- end preloader --}}

    <div x-data="{ open: false }" class="sticky top-0 z-[10000]">
        {{-- start header --}}
        <header class="header bg-white w-full border-b border-gray-200">
            <div class="container mx-auto flex justify-between items-center p-6 md:px-0 xl:px-6">
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
                    <a href="{{ route('front.welcome') }}"
                        class="{{ $currentRoute == 'front.welcome' ? 'active' : '' }}">الرئيسية</a>
                    <a href="{{ route('front.properties') }}"
                        class="mr-3 {{ $currentRoute == 'front.properties' ? 'active' : '' }}">العقارات</a>
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

                    @guest
                        <a href="{{ route('login') }}" class="flex items-center group">
                            <div class="user-icon flex justify-center items-center w-[30px] h-[30px] mr-4">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <p class="login mr-2 font-bold group-hover:text-sky-500">تسجيل الدخول</p>
                        </a>
                    @endguest

                    @auth
                        @if (Auth::user()->role === 'user')
                            <button class="flex items-center" id="user-menu-button-2" aria-expanded="false"
                                data-dropdown-toggle="dropdown-2">
                                <div class="user-icon flex justify-center items-center w-[30px] h-[30px] mr-4">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <p class="login mr-2 font-bold">{{ Auth::user()->name }}</p>
                            </button>
                            <!-- Dropdown menu -->
                            <div class="z-50 w-[175px] hidden my-4 text-base list-none bg-gray-100 divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                                id="dropdown-2">
                                <ul class="p-2 pt-3 text-center font-[500]" role="none">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-md transition duration-200 hover:bg-gray-300 hover:text-sky-500"
                                            role="menuitem">الصفحة الشخصية</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-full block px-4 py-2 mt-1 text-sm text-gray-700 bg-gray-200 rounded-md transition duration-200 hover:bg-gray-300 hover:text-red-500"
                                                role="menuitem">تسجيل الخروج</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @endauth

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
                                        <a href="{{ route('front.welcome') }}"
                                            class="block py-2.5 px-4 flex items-center space-x-2 text-black font-bold rounded mb-1 text-[16px] {{ $currentRoute == 'front.welcome' ? 'active' : '' }}">
                                            <i class="fa-solid fa-house ml-3"></i> الرئيسية
                                        </a>
                                        <a href="{{ route('front.properties') }}"
                                            class="block py-2.5 px-4 flex items-center space-x-2 text-black font-bold rounded mb-1 text-[16px] {{ $currentRoute == 'front.properties' ? 'active' : '' }}">
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

    <div {{ $attributes }}>
        {{ $slot }}
    </div>

    <footer class="bg-gray-900 py-10">
        <div class="container mx-auto px-4">
            <div
                class="flex items-center justify-between w-full sm:w-[70%] mx-auto bg-sky-500 rounded-md shadow p-5 px-7">
                <p class="text-[23px] font-[500] text-white">تواصل معنا عبر الفيسبوك</p>
                <a href=""
                    class="py-1 px-3 text-sky-500 bg-white font-[500] rounded transition-all duration-200 hover:text-white hover:bg-gray-900">تواصل</a>
            </div>
            <div class="flex flex-wrap mt-5">
                <div class="w-full lg:w-1/4 md:w-1/2 mb-8">
                    <div class="text-white">
                        <div>
                            <a href="#"><img src="" alt="Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/5 md:w-1/2 lg:ml-4 mb-8 lg:mb-0">
                    <div class="text-white">
                        <h6 class="text-lg font-bold uppercase mb-3">خدمات</h6>
                        <ul>
                            <li class="mb-1"><a href="#"
                                    class="text-gray-400 text-sm transition-all duration-300 hover:text-sky-500 transform hover:translate-x-[-10px] block w-fit">الصفحة
                                    الرئيسية</a>
                            </li>
                            <li class="mb-1"><a href="#"
                                    class="text-gray-400 text-sm transition-all duration-300 hover:text-sky-500 transform hover:translate-x-[-10px] block w-fit">العقارات</a>
                            </li>
                            <li class="mb-1"><a href="#"
                                    class="text-gray-400 text-sm transition-all duration-300 hover:text-sky-500 transform hover:translate-x-[-10px] block w-fit">من
                                    نحن</a></li>
                            <li class="mb-1"><a href="#"
                                    class="text-gray-400 text-sm transition-all duration-300 hover:text-sky-500 transform hover:translate-x-[-10px] block w-fit">اتصل
                                    بنا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full lg:w-1/5 md:w-1/2 lg:ml-4 mb-8 lg:mb-0">
                    <div class="text-white">
                        <h6 class="text-lg font-bold uppercase mb-3">تواصل معنا</h6>
                        <ul>
                            <li class="mb-1">
                                <p class="text-gray-400 text-sm"><i
                                        class="fa-solid fa-phone transform rotate-[270deg]"></i> <span
                                        class="mr-2">+20111 4979 112</span></p>
                            </li>
                            <li class="mb-1">
                                <p class="text-gray-400 text-sm"><i
                                        class="fa-solid fa-phone transform rotate-[270deg]"></i> <span
                                        class="mr-2">+20111 4979 112</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full lg:w-1/4 md:w-1/2 lg:ml-4 mb-8 mb-8 lg:mb-0">
                    <div class="text-white">
                        <h6 class="text-lg font-bold uppercase mb-5">تابعنا علي</h6>
                        <div class="flex items-center">
                            <a href=""
                                class="w-10 h-10 flex items-center justify-center relative overflow-hidden rounded-full bg-white group transition-all duration-300 ml-2">
                                <svg class="relative z-10 fill-gray-900 transition-all duration-300 group-hover:fill-white"
                                    xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 72 72" fill="none">
                                    <path
                                        d="M46.4927 38.6403L47.7973 30.3588H39.7611V24.9759C39.7611 22.7114 40.883 20.4987 44.4706 20.4987H48.1756V13.4465C46.018 13.1028 43.8378 12.9168 41.6527 12.8901C35.0385 12.8901 30.7204 16.8626 30.7204 24.0442V30.3588H23.3887V38.6403H30.7204V58.671H39.7611V38.6403H46.4927Z"
                                        fill="" />
                                </svg>
                                <div
                                    class="absolute top-full left-0 w-full h-full rounded-full bg-blue-500 z-0 transition-all duration-500 group-hover:top-0">
                                </div>
                            </a>

                            <a href=""
                                class="w-10 h-10 flex items-center justify-center relative overflow-hidden rounded-full bg-white  group transition-all duration-300 ml-2">
                                <svg class="fill-gray-900 relative z-10 transition-all duration-300 group-hover:fill-white"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="24"
                                    viewBox="0 0 42 47" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M30.6721 17.4285C33.7387 19.6085 37.4112 20.7733 41.1737 20.7592V13.3024C40.434 13.3045 39.6963 13.2253 38.9739 13.0663V19.0068C35.203 19.0135 31.5252 17.8354 28.4599 15.6389V30.9749C28.4507 33.4914 27.7606 35.9585 26.4628 38.1146C25.165 40.2706 23.3079 42.0353 21.0885 43.2215C18.8691 44.4076 16.37 44.9711 13.8563 44.852C11.3426 44.733 8.90795 43.9359 6.81055 42.5453C8.75059 44.5082 11.2295 45.8513 13.9333 46.4044C16.6372 46.9576 19.4444 46.6959 21.9994 45.6526C24.5545 44.6093 26.7425 42.8312 28.2864 40.5436C29.8302 38.256 30.6605 35.5616 30.6721 32.8018V17.4285ZM33.3938 9.82262C31.8343 8.13232 30.8775 5.97386 30.6721 3.68324V2.71387H28.5842C28.8423 4.16989 29.4039 5.5553 30.2326 6.78004C31.0612 8.00479 32.1383 9.04144 33.3938 9.82262ZM11.645 36.642C10.9213 35.6957 10.4779 34.5653 10.365 33.3793C10.2522 32.1934 10.4746 30.9996 11.0068 29.9338C11.5391 28.8681 12.3598 27.9731 13.3757 27.3508C14.3915 26.7285 15.5616 26.4039 16.7529 26.4139C17.4106 26.4137 18.0644 26.5143 18.6916 26.7121V19.0068C17.9584 18.9097 17.2189 18.8682 16.4794 18.8826V24.8728C14.9522 24.39 13.2992 24.4998 11.8492 25.1803C10.3992 25.8608 9.25851 27.0621 8.65394 28.5454C8.04937 30.0286 8.02524 31.6851 8.58636 33.1853C9.14748 34.6855 10.2527 35.9196 11.6823 36.642H11.645Z"
                                        fill="#FFF" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M28.4589 15.5892C31.5241 17.7857 35.2019 18.9638 38.9729 18.9571V13.0166C36.8243 12.5623 34.8726 11.4452 33.3927 9.82262C32.1372 9.04144 31.0601 8.00479 30.2315 6.78004C29.4029 5.5553 28.8412 4.16989 28.5831 2.71387H23.09V32.8018C23.0849 34.1336 22.6629 35.4304 21.8831 36.51C21.1034 37.5897 20.0051 38.3981 18.7425 38.8217C17.4798 39.2453 16.1162 39.2629 14.8431 38.872C13.57 38.4811 12.4512 37.7012 11.6439 36.642C10.3645 35.9965 9.3399 34.9387 8.7354 33.6394C8.1309 32.3401 7.98177 30.875 8.31208 29.4805C8.64239 28.0861 9.43286 26.8435 10.556 25.9535C11.6791 25.0634 13.0693 24.5776 14.5023 24.5745C15.1599 24.5766 15.8134 24.6772 16.4411 24.8728V18.8826C13.7288 18.9477 11.0946 19.8033 8.86172 21.3444C6.62887 22.8855 4.89458 25.0451 3.87175 27.5579C2.84892 30.0708 2.58205 32.8276 3.10392 35.49C3.62579 38.1524 4.91367 40.6045 6.80948 42.5453C8.90731 43.9459 11.3458 44.7512 13.8651 44.8755C16.3845 44.9997 18.8904 44.4383 21.1158 43.2509C23.3413 42.0636 25.2031 40.2948 26.5027 38.133C27.8024 35.9712 28.4913 33.4973 28.4962 30.9749L28.4589 15.5892Z"
                                        fill="" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M38.9736 13.0161V11.4129C37.0005 11.4213 35.0655 10.8696 33.3934 9.82211C34.8695 11.4493 36.8229 12.5674 38.9736 13.0161ZM28.5838 2.71335C28.5838 2.42751 28.4968 2.12924 28.4596 1.8434V0.874023H20.8785V30.9744C20.872 32.6598 20.197 34.2738 19.0017 35.4621C17.8064 36.6504 16.1885 37.3159 14.503 37.3126C13.5106 37.3176 12.5311 37.0876 11.6446 36.6415C12.4519 37.7007 13.5707 38.4805 14.8438 38.8715C16.1169 39.2624 17.4805 39.2448 18.7432 38.8212C20.0058 38.3976 21.1041 37.5892 21.8838 36.5095C22.6636 35.4298 23.0856 34.1331 23.0907 32.8013V2.71335H28.5838ZM16.4418 18.8696V17.167C13.3222 16.7432 10.1511 17.3885 7.44529 18.9977C4.73944 20.6069 2.65839 23.0851 1.54131 26.0284C0.424223 28.9718 0.336969 32.2067 1.29377 35.206C2.25057 38.2053 4.195 40.792 6.81017 42.5448C4.92871 40.5995 3.65455 38.1484 3.14333 35.4908C2.63212 32.8333 2.906 30.0844 3.9315 27.5799C4.957 25.0755 6.68974 22.924 8.91801 21.3882C11.1463 19.8524 13.7736 18.9988 16.4791 18.9318L16.4418 18.8696Z"
                                        fill="" />
                                </svg>
                                <div
                                    class="absolute top-full left-0 w-full h-full rounded-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-black via-black to-red-600 z-0 transition-all duration-500 group-hover:top-0">
                                </div>
                            </a>

                            <a href=""
                                class="w-10 h-10 flex items-center relative overflow-hidden justify-center rounded-full bg-white group transition-all duration-300 ml-2">
                                <svg class="fill-gray-900 relative z-10 transition-all duration-300 group-hover:fill-white"
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 71 72" fill="none">
                                    <path
                                        d="M12.5762 56.8405L15.8608 44.6381C13.2118 39.8847 12.3702 34.3378 13.4904 29.0154C14.6106 23.693 17.6176 18.952 21.9594 15.6624C26.3012 12.3729 31.6867 10.7554 37.1276 11.1068C42.5685 11.4582 47.6999 13.755 51.5802 17.5756C55.4604 21.3962 57.8292 26.4844 58.2519 31.9065C58.6746 37.3286 57.1228 42.7208 53.8813 47.0938C50.6399 51.4668 45.9261 54.5271 40.605 55.7133C35.284 56.8994 29.7125 56.1318 24.9131 53.5513L12.5762 56.8405ZM25.508 48.985L26.2709 49.4365C29.7473 51.4918 33.8076 52.3423 37.8191 51.8555C41.8306 51.3687 45.5681 49.5719 48.4489 46.7452C51.3298 43.9185 53.1923 40.2206 53.7463 36.2279C54.3002 32.2351 53.5143 28.1717 51.5113 24.6709C49.5082 21.1701 46.4003 18.4285 42.6721 16.8734C38.9438 15.3184 34.8045 15.0372 30.8993 16.0736C26.994 17.11 23.5422 19.4059 21.0817 22.6035C18.6212 25.801 17.2903 29.7206 17.2963 33.7514C17.293 37.0937 18.2197 40.3712 19.9732 43.2192L20.4516 44.0061L18.6153 50.8167L25.508 48.985Z"
                                        fill="" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M44.0259 36.8847C43.5787 36.5249 43.0549 36.2716 42.4947 36.1442C41.9344 36.0168 41.3524 36.0186 40.793 36.1495C39.9524 36.4977 39.4093 37.8134 38.8661 38.4713C38.7516 38.629 38.5833 38.7396 38.3928 38.7823C38.2024 38.8251 38.0028 38.797 37.8316 38.7034C34.7543 37.5012 32.1748 35.2965 30.5122 32.4475C30.3704 32.2697 30.3033 32.044 30.325 31.8178C30.3467 31.5916 30.4555 31.3827 30.6286 31.235C31.2344 30.6368 31.6791 29.8959 31.9218 29.0809C31.9756 28.1818 31.7691 27.2863 31.3269 26.5011C30.985 25.4002 30.3344 24.42 29.4518 23.6762C28.9966 23.472 28.4919 23.4036 27.9985 23.4791C27.5052 23.5546 27.0443 23.7709 26.6715 24.1019C26.0242 24.6589 25.5104 25.3537 25.168 26.135C24.8256 26.9163 24.6632 27.7643 24.6929 28.6165C24.6949 29.0951 24.7557 29.5716 24.8739 30.0354C25.1742 31.1497 25.636 32.2144 26.2447 33.1956C26.6839 33.9473 27.163 34.6749 27.6801 35.3755C29.3607 37.6767 31.4732 39.6305 33.9003 41.1284C35.1183 41.8897 36.42 42.5086 37.7799 42.973C39.1924 43.6117 40.752 43.8568 42.2931 43.6824C43.1711 43.5499 44.003 43.2041 44.7156 42.6755C45.4281 42.1469 45.9995 41.4518 46.3795 40.6512C46.6028 40.1675 46.6705 39.6269 46.5735 39.1033C46.3407 38.0327 44.9053 37.4007 44.0259 36.8847Z"
                                        fill="" />
                                </svg>
                                <div
                                    class="absolute top-full left-0 w-full h-full rounded-full bg-green-400 z-0 transition-all duration-500 group-hover:top-0">
                                </div>
                            </a>

                            <a href=""
                                class="w-10 h-10 flex relative overflow-hidden items-center justify-center rounded-full bg-white  group transition-all duration-300 ml-2 z-0">
                                <svg class="fill-gray-900 relative z-10 transition-all duration-300 group-hover:fill-white"
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 72 72" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M61.03 36.015C61.03 49.8304 49.8304 61.03 36.015 61.03C22.1996 61.03 11 49.8304 11 36.015C11 22.1996 22.1996 11 36.015 11C49.8304 11 61.03 22.1996 61.03 36.015ZM38.4121 28.3392C34.1147 30.1955 21.7235 35.4671 21.7235 35.4671C18.7869 36.6551 20.5058 37.7688 20.5058 37.7688C20.5058 37.7688 23.0127 38.6599 25.1615 39.328C27.3103 39.9963 28.4563 39.2538 28.4563 39.2538C28.4563 39.2538 33.47 35.8384 38.5554 32.2002C42.1366 29.6757 41.2772 31.7547 40.4176 32.6457C38.5554 34.5762 35.4755 37.6204 32.897 40.0706C31.751 41.1101 32.324 42.001 32.8254 42.4465C34.2836 43.7256 37.718 46.0518 39.2773 47.1079C39.7093 47.4005 39.9974 47.5956 40.0596 47.6439C40.4176 47.941 42.4232 49.2774 43.6408 48.9804C44.8584 48.6834 45.0017 46.9757 45.0017 46.9757C45.0017 46.9757 45.9328 40.8873 46.7923 35.3186C46.9515 34.2252 47.1107 33.1548 47.2592 32.1567C47.645 29.5623 47.9582 27.4565 48.0099 26.7058C48.2248 24.1814 45.6463 25.2208 45.6463 25.2208C45.6463 25.2208 40.0596 27.5968 38.4121 28.3392Z"
                                        fill="" />
                                </svg>
                                <div
                                    class="absolute top-full left-0 w-full h-full rounded-full bg-blue-400 z-0 transition-all duration-500 group-hover:top-0">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10 pt-6 border-t border-gray-700 rtl">
                <p class="text-gray-400 mb-0">
                    حقوق النشر ©
                    2024 جميع الحقوق محفوظة | هذا القالب تم تصميمه <i class="fa fa-heart-o text-red-500"
                        aria-hidden="true"></i> بواسطة <a href="https://wa.me/201114979112" target="_blank"
                        class="text-sky-500 font-[500]">CodeCreators</a>
                </p>
            </div>

        </div>
    </footer>


    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="{{ asset('assets/js/front/main.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
    @stack('alerts')
</body>

</html>
