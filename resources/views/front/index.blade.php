<x-front-layout>

    {{-- start search section --}}
    <section class="search px-6 md:px-0">
        <div class="container mx-auto background-front rounded-2xl filter brightness-90 flex flex-col items-center">
            <p class="title mt-[130px] lg:mt-[180px] lg:text-white text-[30px] md:text-[50px] font-bold">إبحث عن
                اي بيت هنا</p>

            <div class="home-search w-[350px] md:w-auto mt-[20px] lg:mt-[30px] p-5">
                <form action="">
                    {{-- category --}}
                    <div class="category flex items-center">
                        <input id="for-sale" type="radio" name="category" checked>
                        <label for="for-sale">للبيع</label>

                        <input id="for-rent" type="radio" name="category">
                        <label for="for-rent">للإيجار</label>
                    </div>

                    {{-- property-type , num-bedroom , country,city,name-property --}}
                    <div
                        class="main-search flex flex-col lg:flex-row lg:items-center bg-white relative lg:h-[70px] px-[20px] lg:py-[8px] py-[15px]">
                        {{-- property-type --}}
                        <div class="pl-10 lg:border-l border-b lg:border-b-0 border-gray-300 py-3 lg:py-0">
                            <label for="property-type" class="block font-bold">نوع العقار</label>
                            <select class="text-gray-500 focus-visible:outline-none" name="property-type"
                                id="property-type">
                                <option value="">شقة</option>
                                <option value="">فيلا</option>
                                <option value="">شالية</option>
                            </select>
                        </div>

                        {{-- search country,city,name-property --}}
                        <div
                            class="flex items-center lg:mr-5 h-full pl-10 lg:border-l border-b lg:border-b-0 border-gray-300 py-3 lg:py-0">
                            <label for="filter-place"><i class="fa-solid fa-magnifying-glass text-gray-500"></i></label>
                            <input id="filter-place" type="text" class="mr-3 focus-visible:outline-none w-[275px]"
                                placeholder="أدخل المدينة أو المنطقة أو اسم البناء">
                        </div>

                        {{-- search num-bedroom --}}
                        <div class="mr-5 h-full pl-3 border-b lg:border-b-0 border-gray-300 py-3 lg:py-0">
                            <label for="bedroom" class="font-bold block"> الغرف</label>
                            <input id="bedroom" type="number" placeholder="عدد الغرف"
                                class="w-[100px] focus-visible:outline-none">
                        </div>

                        <button type="submit"
                            class="submit-search py-1 px-8 text-white font-bold rounded transition duration-200">بحث</button>

                    </div>
                </form>
            </div>
        </div>
    </section>
    {{-- end search section --}}

    {{-- start features section --}}
    <section class="feature py-[60px] px-6 md:px-0">
        <div class="container mx-auto">

            <p class="title font-bold text-[30px]">العقارات المميزة</p>

            <div class="flex w-full flex-wrap items-center mt-[40px]">

                <!-- First item -->
                <div class="w-full lg:w-1/3 md:w-1/2 h-[412px] pb-[10px] lg:pb-0 md:pl-[10px]">
                    <x-front.home.feature-item :srcImg="asset('assets/imgs/feature-1.jpg')" :detiles="true" price="1,500,000 EGP" country="مصر"
                        governate="قنا" city="نجع حمادي" street="21 نجيب" zipCode="2021" area="2,120" bedroom="4"
                        bathroom="2" />
                </div>

                <!-- Second item -->
                <div
                    class="w-full h-[412px] lg:w-1/3 md:w-1/2 pt-[10px] md:pt-0 pt pb-[10px] lg:pb-0 md:pr-[10px] md:pr-0 lg:px-[10px]">

                    {{-- item --}}
                    <div class="w-full h-1/2 pb-[10px]">
                        <x-front.home.feature-item :srcImg="asset('assets/imgs/feature-1.jpg')" />
                    </div>

                    <div class="flex items-center h-1/2 pt-[10px]">

                        {{-- item --}}
                        <div class="w-1/2 h-full ml-[10px]">
                            <x-front.home.feature-item :srcImg="asset('assets/imgs/feature-1.jpg')" />
                        </div>

                        {{-- item --}}
                        <div class="w-1/2 h-full mr-[10px]">
                            <x-front.home.feature-item :srcImg="asset('assets/imgs/feature-1.jpg')" />
                        </div>

                    </div>

                </div>

                <!-- item -->
                <div class="w-full lg:w-1/3 md:w-1/2 h-[412px] pt-[10px] lg:pt-0 lg:pr-[10px]">
                    <x-front.home.feature-item :srcImg="asset('assets/imgs/feature-1.jpg')" :detiles="true" price="1,500,000 EGP" country="مصر"
                        governate="قنا" city="نجع حمادي" street="21 نجيب" zipCode="2021" area="2,120" bedroom="4"
                        bathroom="2" />
                </div>
            </div>

        </div>
    </section>
    {{-- end features section --}}

</x-front-layout>
