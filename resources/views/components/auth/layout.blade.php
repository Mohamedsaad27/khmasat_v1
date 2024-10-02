@props([
    'title'
])

<div
    class="md:container md:mx-auto flex md:flex-wrap flex-col-reverse md:flex-row justify-between md:h-[calc(100vh-78px)]">

    {{-- START CONTENT --}}
    {{ $slot }}
    {{-- END CONTENT --}}

    <div class="w-full md:w-[43%] xl:w-[38%] md:h-[calc(100vh-150px)]">
        <img class="w-full sm:h-[300px] md:h-full object-cover md:rounded-tl-[5px] md:rounded-tr-[5px] md:rounded-bl-[5px] md:rounded-br-[100px]"
            src="{{ asset('assets/imgs/front/login.jpg') }}" alt="">
    </div>
</div>
