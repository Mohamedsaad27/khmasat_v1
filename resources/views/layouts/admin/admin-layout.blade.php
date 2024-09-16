<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- LINK CDN TAILWIND --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- LINK STYLE CHART STYLE --}}
    <link href="{{ asset('assets/css/admin/style.css') }}" rel="stylesheet" />

    {{-- LINK CDN STYLE FLOWBIT --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

    @stack('styles')
</head>

<body>

    {{-- START NAVBAR --}}
    @include('layouts.admin.partials.navbar')
    {{-- END NAVBAR --}}

    <div class="flex pt-[70.4px] overflow-hidden bg-gray-50 dark:bg-gray-900">

        {{-- START SIDEBAR  --}}
        @include('layouts.admin.partials.sidebar')
        <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
        {{-- END SIDEBAR  --}}

        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:mr-64 dark:bg-gray-900">
            <main>
                {{ $slot }}
            </main>

            {{-- START FOOTER --}}
            @include('layouts.admin.partials.footer')
            {{-- END FOOTER --}}
        </div>

    </div>

    {{-- START FOOTER-SCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://flowbite.com/application-ui/demo/app.bundle.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('assets/js/admin/dark-mode.js') }}"></script>
    <script src="{{ asset('assets/js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/admin/charts.js') }}"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @stack('scripts')
    {{-- END FOOTER-SCRIPT --}}

</body>

</html>
