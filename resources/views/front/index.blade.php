<x-front-layout class="sm:px-6">

    {{-- start search section --}}
    <section class="search md:px-0">
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

    @if ($featuredProperties)
        {{-- start features section --}}
        <section class="feature py-[60px] px-6">
            <div class="container mx-auto">

                <p class="title font-bold text-[30px]">العقارات المميزة</p>

                <div class="flex w-full flex-wrap items-center mt-[40px]">

                    <!-- First item -->
                    @if ($featuredProperties[0])
                        <div class="w-full lg:w-1/3 md:w-1/2 h-[412px] pb-[10px] lg:pb-0 md:pl-[10px]">
                            <x-front.home.feature-item :srcItem="route('front.property-detiles', $featuredProperties[0]->slug)" :srcImg="$featuredProperties[0]->propertyImages->first()->image_path ?? null" :detiles="true"
                                :price="$featuredProperties[0]->price ?? null" :country="$featuredProperties[0]->address->country ?? null" :governate="$featuredProperties[0]->address->governate ?? null" :city="$featuredProperties[0]->address->city ?? null"
                                :street="$featuredProperties[0]->address->street ?? null" :zipCode="$featuredProperties[0]->address->zip_code ?? null" :area="$featuredProperties[0]->area ?? null" :bedroom="$featuredProperties[0]->bedroom ?? null"
                                :bathroom="$featuredProperties[0]->bathroom ?? null" />
                        </div>
                    @endif

                    <!-- Second item -->
                    <div
                        class="w-full h-[412px] lg:w-1/3 md:w-1/2 pt-[10px] md:pt-0 pt pb-[10px] lg:pb-0 md:pr-[10px] md:pr-0 lg:px-[10px]">

                        {{-- item --}}
                        @if ($featuredProperties[1])
                            <div class="w-full h-1/2 pb-[10px]">
                                <x-front.home.feature-item :srcItem="route('front.property-detiles', $featuredProperties[1]->slug)" :srcImg="$featuredProperties[1]->propertyImages->first()->image_path ?? null" />
                            </div>
                        @endif

                        {{-- item --}}
                        @if ($featuredProperties[2])
                            <div class="flex items-center h-1/2 pt-[10px]">
                                <div class="flex-grow w-1/2 h-full ml-[10px]">
                                    <x-front.home.feature-item :srcItem="route('front.property-detiles', $featuredProperties[2]->slug)" :srcImg="$featuredProperties[2]->propertyImages->first()->image_path ?? null" />
                                </div>

                                @if ($featuredProperties[3])
                                    {{-- item --}}
                                    <div class="w-1/2 h-full mr-[10px]">
                                        <x-front.home.feature-item :srcItem="route('front.property-detiles', $featuredProperties[3]->slug)" :srcImg="$featuredProperties[3]->propertyImages->first()->image_path ?? null" />
                                    </div>
                                @endif
                            </div>
                        @endif

                    </div>

                    <!-- Thrid item -->
                    @if ($featuredProperties[4])
                        <div class="w-full lg:w-1/3 md:w-1/2 h-[412px] pb-[10px] lg:pb-0 md:pl-[10px]">
                            <x-front.home.feature-item :srcItem="route('front.property-detiles', $featuredProperties[4]->slug)" :srcImg="$featuredProperties[4]->propertyImages->first()->image_path ?? null" :detiles="true"
                                :price="$featuredProperties[4]->price ?? null" :country="$featuredProperties[4]->address->country ?? null" :governate="$featuredProperties[4]->address->governate ?? null" :city="$featuredProperties[4]->address->city ?? null"
                                :street="$featuredProperties[4]->address->street ?? null" :zipCode="$featuredProperties[4]->address->zip_code ?? null" :area="$featuredProperties[4]->area ?? null" :bedroom="$featuredProperties[4]->bedroom ?? null"
                                :bathroom="$featuredProperties[4]->bathroom ?? null" />
                        </div>
                    @endif
                </div>

            </div>
        </section>
    @endif
    {{-- end features section --}}

    {{-- start latest properties section --}}
    <section class="latest pb-[60px] px-6">
        <div class="container mx-auto md:px-0">

            {{-- All --}}
            <input id="all" class="peer/all hidden" type="radio" name="status" checked />
            <label for="all"
                class="peer-checked/all:border-b-[1px] peer-checked/all:border-sky-500 pb-[8.5px] peer-checked/all:text-sky-500 cursor-pointer font-bold ml-3 transition duration-200 hover:text-sky-500">الكل</label>

            {{-- For Sale --}}
            <input id="forsale" class="peer/forsale hidden" type="radio" name="status" />
            <label for="forsale"
                class="peer-checked/forsale:border-b-[1px] peer-checked/forsale:border-sky-500 pb-[8.5px] peer-checked/forsale:text-sky-500 cursor-pointer font-bold transition duration-200 hover:text-sky-500">للبيع</label>
            {{-- border bottom --}}
            <div class="w-full h-[1px] bg-gray-300 mt-2"></div>

            {{-- title --}}
            <div class="mt-5">
                <p class="text-[30px] font-bold mb-0">تغطية اخر العقارات</p>
                <p class="text-gray-500 font-[500] text-[16px]">اجدد العقارات</p>
            </div>

            {{-- all properties --}}
            <div
                class="mt-5 transition-transform transition-opacity h-0 origin-top scale-x-0 peer-checked/all:scale-x-100 peer-checked/all:h-auto opacity-0 peer-checked/all:opacity-100 peer-checked/all:block transition-all duration-500 ease-in-out">
                <div class="w-full">

                    <div id="animation-carousel" class="relative" data-carousel="static">

                        <div class="overflow-hidden relative h-[978px] md:h-[652px] lg:h-[326px] rounded-lg 2xl:h-96">

                            @forelse ($latestProperties->chunk(3) as $chunk)
                                <div class="h-[96%] md:h-[95%] lg:h-[90%] hidden duration-700 ease-in-out"
                                    data-carousel-item>
                                    <div class="flex flex-wrap w-full h-full">
                                        @foreach ($chunk as $latestProperty)
                                            {{-- items --}}
                                            <div
                                                class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pb-[10px] lg:pb-0 md:pl-[20px]">
                                                <x-front.home.latest-item :srcItem="route('front.property-detiles', $latestProperty->slug)" :srcImg="$latestProperty->propertyImages->first()->image_path ?? null"
                                                    :name="$latestProperty->title" :country="optional($latestProperty->address)->country ??
                                                        'Country N/A'" :governate="optional($latestProperty->address)->governate ??
                                                        'Governate N/A'"
                                                    :city="optional($latestProperty->address)->city ?? 'City N/A'" :price="$latestProperty->price" :type="$latestProperty->type"
                                                    :area="$latestProperty->area" :bedroom="$latestProperty->bedroom" :bathroom="$latestProperty->bathroom" />
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>

                        <div class="flex absolute bottom-0 left-1/2 z-30 -translate-x-1/2">
                            @forelse ($latestProperties->chunk(3) as $index => $chunk)
                                <button type="button"
                                    class="btn-slider w-20 h-1 rounded-full ml-3 transition duration-200 
                                            bg-gray-300 hover:bg-gray-400 active:bg-gray-500 
                                            {{ $index === 0 ? 'bg-blue-500' : 'bg-gray-300' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}">
                                </button>
                            @empty
                            @endforelse
                        </div>

                    </div>

                </div>
            </div>

            {{-- for sales properties --}}
            <div
                class="transition-transform transition-opacity h-0 origin-top scale-x-0 peer-checked/forsale:scale-x-100 peer-checked/forsale:h-auto opacity-0 peer-checked/forsale:opacity-100 transition-all duration-500 ease-in-out">
                <div class="w-full">

                    <div id="default-carousel" class="relative" data-carousel="static">

                        <div class="overflow-hidden relative h-[978px] md:h-[652px] lg:h-[326px] rounded-lg 2xl:h-96">

                            <div class="h-[96%] md:h-[95%] lg:h-[90%] hidden duration-700 ease-in-out"
                                data-carousel-item>
                                <div class="flex flex-wrap w-full h-full">
                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pb-[10px] lg:pb-0 md:pl-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />
                                    </div>

                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pt-[10px] md:pt-0 pt pb-[10px] lg:pb-0 md:pr-[10px] md:pr-0 lg:px-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />

                                    </div>
                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pt-[10px] lg:pt-0 lg:pr-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />
                                    </div>
                                </div>
                            </div>

                            <div class="h-[96%] md:h-[95%] lg:h-[90%] hidden duration-700 ease-in-out"
                                data-carousel-item>
                                <div class="flex flex-wrap w-full h-full">
                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pb-[10px] lg:pb-0 md:pl-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />
                                    </div>

                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pt-[10px] md:pt-0 pt pb-[10px] lg:pb-0 md:pr-[10px] md:pr-0 lg:px-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />

                                    </div>
                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pt-[10px] lg:pt-0 lg:pr-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />
                                    </div>
                                </div>
                            </div>

                            <div class="h-[96%] md:h-[95%] lg:h-[90%] hidden duration-700 ease-in-out"
                                data-carousel-item>
                                <div class="flex flex-wrap w-full h-full">
                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pb-[10px] lg:pb-0 md:pl-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />
                                    </div>

                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pt-[10px] md:pt-0 pt pb-[10px] lg:pb-0 md:pr-[10px] md:pr-0 lg:px-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />

                                    </div>
                                    {{-- item --}}
                                    <div
                                        class="w-full lg:w-1/3 md:w-1/2 lg:h-full md:h-1/2 h-1/3 pt-[10px] lg:pt-0 lg:pr-[10px]">
                                        <x-front.home.latest-item :srcImg="asset('assets/imgs/latest-1.jpg')" name="فيلا المهندس محمد"
                                            country="مصر" governate="قنا" city="نجع حمادي" price="EGY 2,200,000"
                                            type="فيلا" area="2.120" bedroom="5" bathroom="2" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex absolute bottom-0 left-1/2 z-30 -translate-x-1/2">
                            <button type="button"
                                class="btn-slider w-20 h-1 rounded-full ml-3 transition duration-200"
                                aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                            <button type="button"
                                class="btn-slider w-20 h-1 rounded-full ml-3 transition duration-200"
                                aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                            <button type="button" class="btn-slider w-20 h-1 rounded-full transition duration-200"
                                aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    {{-- end latest properties section --}}

    @push('scripts')
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        <script>
            // handle style buttons carousel
            document.addEventListener('DOMContentLoaded', function() {
                // Select all button elements with the 'btn-slider' class
                var carouselButtons = document.querySelectorAll(".btn-slider");

                // Iterate over each button and add a click event listener
                carouselButtons.forEach(function(button) {
                    if (button.classList.contains("bg-white")) {
                        button.classList.add("active");
                    }
                    button.classList.remove(
                        "bg-white",
                        "dark:bg-gray-800",
                        "bg-white/50",
                        "dark:bg-gray-800/50",
                        "hover:bg-white",
                        "dark:hover:bg-gray-800"
                    );
                    button.addEventListener('click', function() {
                        // Iterate over each button and apply conditional logic
                        carouselButtons.forEach(function(btn) {
                            if (btn.classList.contains("bg-white")) {
                                btn.classList.add("active");
                            } else {
                                btn.classList.remove("active");
                            }
                            btn.classList.remove(
                                "bg-white",
                                "dark:bg-gray-800",
                                "bg-white/50",
                                "dark:bg-gray-800/50",
                                "hover:bg-white",
                                "dark:hover:bg-gray-800"
                            );
                        });
                    });
                });
            });
        </script>
    @endpush
</x-front-layout>
