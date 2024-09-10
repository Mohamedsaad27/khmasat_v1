<x-front-layout class="p-6">

    {{-- Start Breadcrumb --}}
    <div class="flex text-gray-700 my-4" aria-label="Breadcrumb">
        <div class="container mx-auto">
            <ol
                class="px-5 py-3 inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">العقارات</span>
                    </div>
                </li>
            </ol>
        </div>
    </div>
    {{-- End Breadcrumb --}}

    {{-- Start Filter Search --}}
    <div class="filter pb-5 mb-5 border-b border-gray-300">
        <div class="container mx-auto relative">
            <div class="flex flex-wrap items-center">

                {{-- category properties --}}
                <div class="relative inline-block text-left ml-2.5" id="dropdownWrapperCategory">
                    <!-- Hidden checkbox to control the dropdown toggle -->
                    <input type="checkbox" id="toggleDropdownCategory" class="peer hidden">

                    <!-- Button with SVG arrow -->
                    <label id="dropdownButtonCategory" for="toggleDropdownCategory"
                        class="ring-1 ring-blue-300 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex items-center cursor-pointer">
                        <span id="buttonTextCategory"></span> <!-- Default text will be set by JavaScript -->
                        <svg id="dropdownArrow" class="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </label>

                    <!-- Dropdown Menu -->
                    <div class="before:absolute before:bottom-full before:left-[10.6rem] before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))]  hidden peer-checked:block absolute mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200 z-[50]"
                        id="dropdownMenuCategory">
                        <div class="p-3">
                            <p class="text-[#4c4a4a] text-[15px] font-[600] w-fit mb-3">نوع العرض</p>
                            <ul class="flex w-full border-[.1rem] rounded p-2 mb-3">
                                <li class="w-1/2">
                                    <button role="button"
                                        class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded ml-1 transition duration-200"
                                        data-option="للبيع">للبيع
                                    </button>
                                </li>
                                <li class="w-1/2">
                                    <button
                                        class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded mr-1 transition duration-200"
                                        data-option="للإيجار">للإيجار
                                    </button>
                                </li>
                            </ul>
                            <div class="flex w-full text-[14px] font-bold">
                                <input type="button" id="resetSearchCategory" class="hidden" />
                                <label for="resetSearchCategory"
                                    class="w-1/2 ml-1 rounded border border-sky-500 py-2 text-center cursor-pointer">إعادة
                                    ضبط</label>
                                <input type="button" id="okCategory" class="hidden" />
                                <label for="okCategory"
                                    class="w-1/2 mr-1 rounded bg-sky-500 py-2 text-center cursor-pointer text-white">تم</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- property search --}}
                <div class="flex-grow w-[55%] md:w-1/2 lg:w-0 relative" onclick="event.stopImmediatePropagation();">
                    <div>
                        <input id="autocompleteInput" placeholder="ادخل الموقع"
                            class="relative pr-8 py-3 text-sm w-full border border-gray-300 rounded-md focus:outline-none focus:border-sky-500 transition duration-200"
                            onkeyup="onkeyUp(event)" />
                        <i class="absolute right-0 top-[15px] mr-2 fa-solid fa-location-dot"></i>
                    </div>
                    <div id="dropdown"
                        class="w-full h-60 border border-gray-300 rounded-md bg-white absolute overflow-y-auto hidden">
                    </div>
                </div>

                {{-- status property --}}
                <div
                    class="flex items-center mt-2 md:mt-0 md:mr-2.5 ml-2.5 md:ml-0 border border-gray-300 rounded-md px-1 py-1 text-sm">
                    <!-- status-property-all -->
                    <input type="radio" class="hidden peer" id="status-property-all" name="status-property"
                        value="all">
                    <label for="status-property-all"
                        class="py-2 px-3 rounded-md cursor-pointer transition duration-200 hover:bg-sky-100 ml-1">الجميع</label>

                    <!-- status-property-ready -->
                    <input type="radio" class="hidden" id="status-property-ready" name="status-property"
                        value="ready">
                    <label for="status-property-ready"
                        class="py-2 px-3 rounded-md cursor-pointer transition duration-200 hover:bg-sky-100 ml-1">جاهز</label>

                    <!-- status-property-under-construction -->
                    <input type="radio" class="hidden" id="status-property-under-construction" name="status-property"
                        value="under-construction">
                    <label for="status-property-under-construction"
                        class="py-2 px-3 rounded-md cursor-pointer transition duration-200 hover:bg-sky-100">قيد
                        الانشاء</label>
                </div>

                {{-- type properties --}}
                <div class="relative mt-2 lg:mt-0 inline-block text-left lg:mr-2.5 md:mr-0 ml-2.5 md:ml-0"
                    id="dropdownWrapperType">
                    <!-- Hidden checkbox to control the dropdown toggle -->
                    <input type="checkbox" id="toggleDropdownType" class="peer hidden">

                    <!-- Button with SVG arrow -->
                    <label id="dropdownButtonType" for="toggleDropdownType"
                        class="border border-gray-300 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex items-center cursor-pointer">
                        <span id="buttonTextType"></span> <!-- Default text will be set by JavaScript -->
                        <svg id="dropdownArrowType" class="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </label>

                    <!-- Dropdown Menu -->
                    <div class="z-[50] before:absolute before:bottom-full before:left-[1.6rem] before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white
                    before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] 
                    before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))] hidden peer-checked:block
                    absolute left-0 mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
                        id="dropdownMenuType">
                        <div class="p-3">
                            <p class="text-[#4c4a4a] text-[15px] font-[600] w-fit mb-3">نوع العرض</p>
                            <ul class="flex flex-wrap w-full border-[.1rem] rounded p-2 mb-3">
                                <li class="w-1/2">
                                    <button role="button"
                                        class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded ml-1 transition duration-200"
                                        data-option="شقة">شقة
                                    </button>
                                </li>
                                <li class="w-1/2">
                                    <button
                                        class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded mr-1 transition duration-200"
                                        data-option="فيلا">فيلا
                                    </button>
                                </li>
                            </ul>
                            <div class="flex w-full text-[14px] font-bold">
                                <input type="button" id="resetSearchType" class="hidden" />
                                <label for="resetSearchType"
                                    class="w-1/2 ml-1 rounded border border-sky-500 py-2 text-center cursor-pointer">إعادة
                                    ضبط</label>
                                <input type="button" id="okType" class="hidden" />
                                <label for="okType"
                                    class="w-1/2 mr-1 rounded bg-sky-500 py-2 text-center cursor-pointer text-white">تم</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Number of [ Bedroom , Pathroom --}}
                <div class="relative mt-2 lg:mt-0 inline-block text-left lg:mr-2.5 ml-2.5 md:ml-0"
                    id="dropdownWrapperRooms">
                    <!-- Hidden checkbox to control the dropdown toggle -->
                    <input type="checkbox" id="toggleDropdownRooms" class="peer hidden">

                    <!-- Button with SVG arrow -->
                    <label id="dropdownButtonRooms" for="toggleDropdownRooms"
                        class="ring-1 ring-blue-300 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex items-center cursor-pointer">
                        <span id="buttonTextRooms">عدد الغرف / عدد الحمامات</span>
                        <!-- Default text will be set by JavaScript -->
                        <svg id="dropdownArrowRooms" class="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </label>

                    <!-- Dropdown Menu -->
                    <div class="z-[50] before:absolute before:bottom-full before:left-[1.6rem] before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white
                                before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] 
                                before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))] hidden peer-checked:block
                                absolute left-0 mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
                        id="dropdownMenuRooms">
                        <div class="p-3">
                            <p class="text-[#4c4a4a] text-[15px] font-[600] w-fit mb-3">عدد الغرف / عدد الحمامات</p>
                            <div class="flex flex-wrap w-full border-[.1rem] rounded p-2 mb-3">
                                <div class="w-1/2 p-2 border-l">
                                    <p class="text-[#4c4a4a] text-center text-[14px] font-[600] mb-2">عدد الغرف</p>
                                    <ul id="bedroomOptions" class="flex flex-wrap">
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="1">1
                                            </button>
                                        </li>
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="2">2
                                            </button>
                                        </li>
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="3">3
                                            </button>
                                        </li>
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="4">4
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="w-1/2 p-2">
                                    <p class="text-[#4c4a4a] text-center text-[14px] font-[600] mb-2">عدد الحمامات</p>
                                    <ul id="bathroomOptions" class="flex flex-wrap">
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="1">1
                                            </button>
                                        </li>
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="2">2
                                            </button>
                                        </li>
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="3">3
                                            </button>
                                        </li>
                                        <li class="w-1/2">
                                            <button role="button"
                                                class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                                data-option="4">4
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex w-full text-[14px] font-bold">
                                <input type="button" id="resetSearchRooms" class="hidden" />
                                <label for="resetSearchRooms"
                                    class="w-1/2 ml-1 rounded border border-sky-500 py-2 text-center cursor-pointer">إعادة
                                    ضبط</label>
                                <input type="button" id="okRooms" class="hidden" />
                                <label for="okRooms"
                                    class="w-1/2 mr-1 rounded bg-sky-500 py-2 text-center cursor-pointer text-white">تم</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Reset All Search  --}}
                <button id="resetAllSearch"
                    class="mt-2 lg:mt-0 md:mr-2 rounded-md border border-sky-500 bg-sky-500 py-2 font-bold text-center cursor-pointer text-white text-sm py-3 px-5 transition duration-200 hover:text-black hover:bg-white hover:border hover:border-sky-500">
                    إعادة ضبط
                </button>

            </div>
        </div>
    </div>
    {{-- End Filter Search --}}

    {{-- Start Show Properties --}}
    <div class="properties">
        <div class="container mx-auto relative">
            <div class="flex flex-wrap justify-between">

                <div
                    class="item overflow-hidden relative h-[400px] w-full lg:w-[32%] md:w-[49%] mb-4 border border-gray-300 rounded-lg">
                    {{-- link item --}}
                    <a href="" class="link absolute w-full h-full z-[35]">
                    </a>

                    {{-- love --}}
                    <a href=""
                        class="love z-[200] absolute left-0 flex items-center justify-center bg-white ml-5 mt-3 p-3 w-[30px] h-[30px] rounded-full transform transition-transform duration-200 hover:scale-110 group">
                        <i
                            class="fa-regular fa-heart text-[15px] transition duration-200 group-hover:text-red-500"></i>
                    </a>

                    {{-- imgs , love --}}
                    <div class="group carousel h-[60%]">
                        <div id="controls-carousel" class="controls-carousel relative w-full h-full group"
                            data-carousel="static" di>
                            <!-- Carousel wrapper -->
                            <div class="carousel-wrapper relative h-full overflow-hidden rounded-tl-lg rounded-tr-lg">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 5 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 right-0 z-[40] items-center justify-center h-full px-4 cursor-pointer group-hover:flex transition-opacity duration-300 ease-in-out sm:opacity-0 group-hover:opacity-100 focus:outline-none"
                                data-carousel-prev id="prev-button">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition duration-200">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-[40] flex items-center justify-center h-full px-4 cursor-pointer group-hover:flex transition-opacity duration-300 ease-in-out sm:opacity-0 group-hover:opacity-100 focus:outline-none"
                                data-carousel-next id="next-button">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition duration-200">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                    </div>

                    {{-- detils --}}
                    <div class="relative p-3 h-[40%]">
                        {{-- tag --}}
                        <div
                            class="absolute top-[10px] left-[10px] flex item-center justify-center border border-green-500 rounded-md">
                            <p class="text-[12px] px-3 py-1 text-green-500 font-bold">جديد</p>
                        </div>
                        {{-- price --}}
                        <p class="font-bold text-[20px]">1.200.125 ج.م</p>

                        <div class="flex items-center mt-2">
                            {{-- type --}}
                            <p class="pl-2 text-[16px] font-[500] border-l border-gray-300">شالية</p>

                            {{-- bedroom --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.2929 18H7.70711L6.85355 18.8536C6.65829 19.0488 6.34171 19.0488 6.14645 18.8536C5.95118 18.6583 5.95118 18.3417 6.14645 18.1464L6.29289 18H6C4.89543 18 4 17.1046 4 16V15C4 13.8954 4.89543 13 6 13H7.26756C7.09739 12.7058 7 12.3643 7 12C7 10.8954 7.89543 10 9 10H11C11.5973 10 12.1335 10.2619 12.5 10.6771C12.8665 10.2619 13.4027 10 14 10H16C17.1046 10 18 10.8954 18 12C18 12.3643 17.9026 12.7058 17.7324 13H19C20.1046 13 21 13.8954 21 15V16C21 17.1046 20.1046 18 19 18H18.7071L18.8536 18.1464C19.0488 18.3417 19.0488 18.6583 18.8536 18.8536C18.6583 19.0488 18.3417 19.0488 18.1464 18.8536L17.2929 18ZM19 14H6C5.44772 14 5 14.4477 5 15V16C5 16.5523 5.44772 17 6 17H19C19.5523 17 20 16.5523 20 16V15C20 14.4477 19.5523 14 19 14ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H14C13.4477 11 13 11.4477 13 12C13 12.5523 13.4477 13 14 13H16ZM9 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H9C8.44772 11 8 11.4477 8 12C8 12.5523 8.44772 13 9 13ZM6 11.5C6 11.7761 5.77614 12 5.5 12C5.22386 12 5 11.7761 5 11.5V8.5C5 7.1384 5.9375 6 7.14706 6H17.8529C19.0625 6 20 7.1384 20 8.5V11.5C20 11.7761 19.7761 12 19.5 12C19.2239 12 19 11.7761 19 11.5V8.5C19 7.65246 18.4627 7 17.8529 7H7.14706C6.53732 7 6 7.65246 6 8.5V11.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] pl-2 text-[16px] border-l border-gray-300">5</p>

                            {{-- pathroom --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 9.90832V7.4753C5.5 6.66051 6.16057 6 6.99513 6C7.82969 6 8.5 6.66051 8.5 7.4753V8.13266C8.5 8.40139 8.27687 8.61923 8.00162 8.61923C7.72638 8.61923 7.50324 8.40139 7.50324 8.13266V7.4753C7.50324 7.19796 7.2792 6.97314 6.99513 6.97314C6.71106 6.97314 6.49676 7.19796 6.49676 7.4753V9.90832H12.5C12.5 9.36869 12.9477 8.93124 13.5 8.93124H16.5C17.0523 8.93124 17.5 9.36869 17.5 9.90832H19.5C20.0523 9.90832 20.5 10.3458 20.5 10.8854V13.3281C20.5 15.1507 19.0407 16.6403 17.2014 16.7423L17.6351 17.166C17.8303 17.3568 17.8303 17.6661 17.6351 17.8569C17.4398 18.0477 17.1232 18.0477 16.9279 17.8569L15.7929 16.7479H8.48861L7.35355 17.8569C7.15829 18.0477 6.84171 18.0477 6.64645 17.8569C6.45118 17.6661 6.45118 17.3568 6.64645 17.166L7.0744 16.7479H7C5.067 16.7479 3.5 15.2168 3.5 13.3281V10.8854C3.5 10.3458 3.94772 9.90832 4.5 9.90832H5.5ZM13.5 9.90832V10.8854H16.5V9.90832H13.5ZM12.5 10.8854H4.5V13.3281C4.5 14.6772 5.61929 15.7708 7 15.7708H17C18.3807 15.7708 19.5 14.6772 19.5 13.3281V10.8854H17.5V13.8166C17.5 14.3563 17.0523 14.7937 16.5 14.7937H13.5C12.9477 14.7937 12.5 14.3563 12.5 13.8166V10.8854ZM13.5 10.8854V13.8166H16.5V12.8396H14.7092C14.4331 12.8396 14.2092 12.6208 14.2092 12.351C14.2092 12.0812 14.4331 11.8625 14.7092 11.8625H16.5V10.8854H13.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] pl-2 text-[16px] border-l border-gray-300">2</p>

                            {{-- area --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 19.2563L7.14783 18.1236C7.34385 17.9292 7.66043 17.9304 7.85493 18.1263C8.04943 18.3222 8.04819 18.6386 7.85217 18.833L5.85217 20.8084C5.65723 21.0017 5.34277 21.0017 5.14783 20.8084L3.14783 18.833C2.95181 18.6386 2.95057 18.3222 3.14507 18.1263C3.33957 17.9304 3.65615 17.9292 3.85217 18.1236L5 19.2563V9.6821L3.85217 10.8148C3.65615 11.0092 3.33957 11.008 3.14507 10.8121C2.95057 10.6162 2.95181 10.2998 3.14783 10.1054L5.14783 8.13006C5.34277 7.93677 5.65723 7.93677 5.85217 8.13006L7.85217 10.1054C8.04819 10.2998 8.04943 10.6162 7.85493 10.8121C7.66043 11.008 7.34385 11.0092 7.14783 10.8148L6 9.6821V19.2563ZM9.70978 5.99806L10.8433 7.14514C11.0378 7.34104 11.0365 7.65741 10.8405 7.85179C10.6445 8.04616 10.3279 8.04492 10.1334 7.84902L8.15674 5.85032C7.96332 5.65551 7.96332 5.34125 8.15674 5.14644L10.1334 3.14773C10.3279 2.95184 10.6445 2.9506 10.8405 3.14497C11.0365 3.33935 11.0378 3.65572 10.8433 3.85162L9.70978 4.9987H19.2902L18.1567 3.85162C17.9622 3.65572 17.9635 3.33935 18.1595 3.14497C18.3555 2.9506 18.6721 2.95184 18.8666 3.14773L20.8433 5.14644C21.0367 5.34125 21.0367 5.65551 20.8433 5.85032L18.8666 7.84902C18.6721 8.04492 18.3555 8.04616 18.1595 7.85179C17.9635 7.65741 17.9622 7.34104 18.1567 7.14514L19.2902 5.99806H9.70978ZM21 19.0013C21 20.1052 20.1046 21 19 21H11C9.89543 21 9 20.1052 9 19.0013V11.0065C9 9.90263 9.89543 9.00778 11 9.00778H19C20.1046 9.00778 21 9.90263 21 11.0065V13.0052H20V11.0065C20 10.4546 19.5523 10.0071 19 10.0071H11C10.4477 10.0071 10 10.4546 10 11.0065V19.0013C10 19.5532 10.4477 20.0006 11 20.0006H19C19.5523 20.0006 20 19.5532 20 19.0013H21ZM21 17.0026H20V15.0039H21V17.0026Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] text-[16px]">2 <span>م<sup>2</sup></span></p>
                        </div>

                        <div class="flex items-center mt-2">
                            <i class="fa-solid fa-location-dot text-[16px]"></i>
                            <p class="mr-1 text-[16px] font-[500]">
                                <span>مصر</span>
                                |
                                <span>قنا الجديدة</span>
                                |
                                <span>الوحدة الاولي</span>
                            </p>
                        </div>

                        {{-- advance amount --}}
                        <div class="flex items-center bg-blue-100 text-blue-500 p-2 rounded w-fit mt-2 text-[10px]">
                            <i class="fa-solid fa-money-bills ml-2"></i>
                            <p><span class="font-[500]">مقدم :</span><span>500,215 ج.م</span></p>
                        </div>

                        {{-- contact --}}
                        <div
                            class="group py-1 hover:py-2 absolute bottom-[10px] left-[15px] w-[40px] z-[201] flex flex-col justify-center items-center bg-sky-200 rounded-md transition-all duration-300 ease-in-out translate-y-[83%] hover:translate-y-0 hover:bg-blue-100 cursor-pointer">
                            <!-- Main Share Button Icon -->
                            <span class="py-1 text-gray-800 group-hover:hidden">
                                <i class="fa-solid fa-paper-plane text-sky-500"></i>
                            </span>

                            <!-- Whatsapp Icon -->
                            <div
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-300 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-green-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-green-400">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>

                            <!-- Email Icon -->
                            <div
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-500 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-red-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-red-400 text-[16px]">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </div>

                            <!-- Instagram Icon -->
                            <button id="share-button"
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-700 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-blue-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-blue-400 text-[16px]">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </a>
                            </button>
                        </div>

                    </div>
                </div>

                <div
                    class="item overflow-hidden relative h-[400px] w-full lg:w-[32%] md:w-[49%] mb-4 border border-gray-300 rounded-lg">
                    {{-- link item --}}
                    <a href="" class="absolute w-full h-full z-[35]">
                    </a>

                    {{-- love --}}
                    <a href=""
                        class="love z-[200] absolute left-0 flex items-center justify-center bg-white ml-5 mt-3 p-3 w-[30px] h-[30px] rounded-full transform transition-transform duration-200 hover:scale-110 group">
                        <i
                            class="fa-regular fa-heart text-[15px] transition duration-200 group-hover:text-red-500"></i>
                    </a>

                    {{-- imgs , love --}}
                    <div class="carousel h-[60%]">
                        <div id="controls-carousel" class="relative w-full h-full group" data-carousel="static" di>
                            <!-- Carousel wrapper -->
                            <div class="relative h-full overflow-hidden rounded-tl-lg rounded-tr-lg">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 5 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 right-0 z-[40] items-center justify-center h-full px-4 cursor-pointer group-hover:flex transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 focus:outline-none"
                                data-carousel-prev id="prev-button">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition duration-200">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-[40] flex items-center justify-center h-full px-4 cursor-pointer group-hover:flex transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 focus:outline-none"
                                data-carousel-next id="next-button">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition duration-200">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                    </div>

                    {{-- detils --}}
                    <div class="relative p-3 h-[40%]">
                        {{-- tag --}}
                        <div
                            class="absolute top-[10px] left-[10px] flex item-center justify-center border border-green-500 rounded-md">
                            <p class="text-[12px] px-3 py-1 text-green-500 font-bold">جديد</p>
                        </div>
                        {{-- price --}}
                        <p class="font-bold text-[20px]">1.200.125 ج.م</p>

                        <div class="flex items-center mt-2">
                            {{-- type --}}
                            <p class="pl-2 text-[16px] font-[500] border-l border-gray-300">شالية</p>

                            {{-- bedroom --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.2929 18H7.70711L6.85355 18.8536C6.65829 19.0488 6.34171 19.0488 6.14645 18.8536C5.95118 18.6583 5.95118 18.3417 6.14645 18.1464L6.29289 18H6C4.89543 18 4 17.1046 4 16V15C4 13.8954 4.89543 13 6 13H7.26756C7.09739 12.7058 7 12.3643 7 12C7 10.8954 7.89543 10 9 10H11C11.5973 10 12.1335 10.2619 12.5 10.6771C12.8665 10.2619 13.4027 10 14 10H16C17.1046 10 18 10.8954 18 12C18 12.3643 17.9026 12.7058 17.7324 13H19C20.1046 13 21 13.8954 21 15V16C21 17.1046 20.1046 18 19 18H18.7071L18.8536 18.1464C19.0488 18.3417 19.0488 18.6583 18.8536 18.8536C18.6583 19.0488 18.3417 19.0488 18.1464 18.8536L17.2929 18ZM19 14H6C5.44772 14 5 14.4477 5 15V16C5 16.5523 5.44772 17 6 17H19C19.5523 17 20 16.5523 20 16V15C20 14.4477 19.5523 14 19 14ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H14C13.4477 11 13 11.4477 13 12C13 12.5523 13.4477 13 14 13H16ZM9 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H9C8.44772 11 8 11.4477 8 12C8 12.5523 8.44772 13 9 13ZM6 11.5C6 11.7761 5.77614 12 5.5 12C5.22386 12 5 11.7761 5 11.5V8.5C5 7.1384 5.9375 6 7.14706 6H17.8529C19.0625 6 20 7.1384 20 8.5V11.5C20 11.7761 19.7761 12 19.5 12C19.2239 12 19 11.7761 19 11.5V8.5C19 7.65246 18.4627 7 17.8529 7H7.14706C6.53732 7 6 7.65246 6 8.5V11.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] pl-2 text-[16px] border-l border-gray-300">5</p>

                            {{-- pathroom --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 9.90832V7.4753C5.5 6.66051 6.16057 6 6.99513 6C7.82969 6 8.5 6.66051 8.5 7.4753V8.13266C8.5 8.40139 8.27687 8.61923 8.00162 8.61923C7.72638 8.61923 7.50324 8.40139 7.50324 8.13266V7.4753C7.50324 7.19796 7.2792 6.97314 6.99513 6.97314C6.71106 6.97314 6.49676 7.19796 6.49676 7.4753V9.90832H12.5C12.5 9.36869 12.9477 8.93124 13.5 8.93124H16.5C17.0523 8.93124 17.5 9.36869 17.5 9.90832H19.5C20.0523 9.90832 20.5 10.3458 20.5 10.8854V13.3281C20.5 15.1507 19.0407 16.6403 17.2014 16.7423L17.6351 17.166C17.8303 17.3568 17.8303 17.6661 17.6351 17.8569C17.4398 18.0477 17.1232 18.0477 16.9279 17.8569L15.7929 16.7479H8.48861L7.35355 17.8569C7.15829 18.0477 6.84171 18.0477 6.64645 17.8569C6.45118 17.6661 6.45118 17.3568 6.64645 17.166L7.0744 16.7479H7C5.067 16.7479 3.5 15.2168 3.5 13.3281V10.8854C3.5 10.3458 3.94772 9.90832 4.5 9.90832H5.5ZM13.5 9.90832V10.8854H16.5V9.90832H13.5ZM12.5 10.8854H4.5V13.3281C4.5 14.6772 5.61929 15.7708 7 15.7708H17C18.3807 15.7708 19.5 14.6772 19.5 13.3281V10.8854H17.5V13.8166C17.5 14.3563 17.0523 14.7937 16.5 14.7937H13.5C12.9477 14.7937 12.5 14.3563 12.5 13.8166V10.8854ZM13.5 10.8854V13.8166H16.5V12.8396H14.7092C14.4331 12.8396 14.2092 12.6208 14.2092 12.351C14.2092 12.0812 14.4331 11.8625 14.7092 11.8625H16.5V10.8854H13.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] pl-2 text-[16px] border-l border-gray-300">2</p>

                            {{-- area --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 19.2563L7.14783 18.1236C7.34385 17.9292 7.66043 17.9304 7.85493 18.1263C8.04943 18.3222 8.04819 18.6386 7.85217 18.833L5.85217 20.8084C5.65723 21.0017 5.34277 21.0017 5.14783 20.8084L3.14783 18.833C2.95181 18.6386 2.95057 18.3222 3.14507 18.1263C3.33957 17.9304 3.65615 17.9292 3.85217 18.1236L5 19.2563V9.6821L3.85217 10.8148C3.65615 11.0092 3.33957 11.008 3.14507 10.8121C2.95057 10.6162 2.95181 10.2998 3.14783 10.1054L5.14783 8.13006C5.34277 7.93677 5.65723 7.93677 5.85217 8.13006L7.85217 10.1054C8.04819 10.2998 8.04943 10.6162 7.85493 10.8121C7.66043 11.008 7.34385 11.0092 7.14783 10.8148L6 9.6821V19.2563ZM9.70978 5.99806L10.8433 7.14514C11.0378 7.34104 11.0365 7.65741 10.8405 7.85179C10.6445 8.04616 10.3279 8.04492 10.1334 7.84902L8.15674 5.85032C7.96332 5.65551 7.96332 5.34125 8.15674 5.14644L10.1334 3.14773C10.3279 2.95184 10.6445 2.9506 10.8405 3.14497C11.0365 3.33935 11.0378 3.65572 10.8433 3.85162L9.70978 4.9987H19.2902L18.1567 3.85162C17.9622 3.65572 17.9635 3.33935 18.1595 3.14497C18.3555 2.9506 18.6721 2.95184 18.8666 3.14773L20.8433 5.14644C21.0367 5.34125 21.0367 5.65551 20.8433 5.85032L18.8666 7.84902C18.6721 8.04492 18.3555 8.04616 18.1595 7.85179C17.9635 7.65741 17.9622 7.34104 18.1567 7.14514L19.2902 5.99806H9.70978ZM21 19.0013C21 20.1052 20.1046 21 19 21H11C9.89543 21 9 20.1052 9 19.0013V11.0065C9 9.90263 9.89543 9.00778 11 9.00778H19C20.1046 9.00778 21 9.90263 21 11.0065V13.0052H20V11.0065C20 10.4546 19.5523 10.0071 19 10.0071H11C10.4477 10.0071 10 10.4546 10 11.0065V19.0013C10 19.5532 10.4477 20.0006 11 20.0006H19C19.5523 20.0006 20 19.5532 20 19.0013H21ZM21 17.0026H20V15.0039H21V17.0026Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] text-[16px]">2 <span>م<sup>2</sup></span></p>
                        </div>

                        <div class="flex items-center mt-2">
                            <i class="fa-solid fa-location-dot text-[16px]"></i>
                            <p class="mr-1 text-[16px] font-[500]">
                                <span>مصر</span>
                                |
                                <span>قنا الجديدة</span>
                                |
                                <span>الوحدة الاولي</span>
                            </p>
                        </div>

                        {{-- advance amount --}}
                        <div class="flex items-center bg-blue-100 text-blue-500 p-2 rounded w-fit mt-2 text-[10px]">
                            <i class="fa-solid fa-money-bills ml-2"></i>
                            <p><span class="font-[500]">مقدم :</span><span>500,215 ج.م</span></p>
                        </div>

                        {{-- contact --}}
                        <div
                            class="group py-1 hover:py-2 absolute bottom-[10px] left-[15px] w-[40px] z-[201] flex flex-col justify-center items-center bg-sky-200 rounded-md transition-all duration-300 ease-in-out translate-y-[83%] hover:translate-y-0 hover:bg-blue-100 cursor-pointer">
                            <!-- Main Share Button Icon -->
                            <span class="py-1 text-gray-800 group-hover:hidden">
                                <i class="fa-solid fa-paper-plane text-sky-500"></i>
                            </span>

                            <!-- Whatsapp Icon -->
                            <div
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-300 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-green-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-green-400">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>

                            <!-- Email Icon -->
                            <div
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-500 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-red-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-red-400 text-[16px]">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </div>

                            <!-- Instagram Icon -->
                            <button id="share-button"
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-700 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-blue-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-blue-400 text-[16px]">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </a>
                            </button>
                        </div>

                    </div>
                </div>

                <div
                    class="item overflow-hidden relative h-[400px] w-full lg:w-[32%] md:w-[49%] mb-4 border border-gray-300 rounded-lg">
                    {{-- link item --}}
                    <a href="" class="absolute w-full h-full z-[35]">
                    </a>

                    {{-- love --}}
                    <a href=""
                        class="love z-[200] absolute left-0 flex items-center justify-center bg-white ml-5 mt-3 p-3 w-[30px] h-[30px] rounded-full transform transition-transform duration-200 hover:scale-110 group">
                        <i
                            class="fa-regular fa-heart text-[15px] transition duration-200 group-hover:text-red-500"></i>
                    </a>

                    {{-- imgs , love --}}
                    <div class="carousel h-[60%]">
                        <div id="controls-carousel" class="relative w-full h-full group" data-carousel="static" di>
                            <!-- Carousel wrapper -->
                            <div class="relative h-full overflow-hidden rounded-tl-lg rounded-tr-lg">
                                <!-- Item 1 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 2 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 3 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 4 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                                <!-- Item 5 -->
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img loading="lazy" src="{{ asset('assets/imgs/feature-1.jpg') }}"
                                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="...">
                                </div>
                            </div>
                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 right-0 z-[40] items-center justify-center h-full px-4 cursor-pointer group-hover:flex transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 focus:outline-none"
                                data-carousel-prev id="prev-button">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition duration-200">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button"
                                class="absolute top-0 end-0 z-[40] flex items-center justify-center h-full px-4 cursor-pointer group-hover:flex transition-opacity duration-300 ease-in-out opacity-0 group-hover:opacity-100 focus:outline-none"
                                data-carousel-next id="next-button">
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none transition duration-200">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>

                    </div>

                    {{-- detils --}}
                    <div class="relative p-3 h-[40%]">
                        {{-- tag --}}
                        <div
                            class="absolute top-[10px] left-[10px] flex item-center justify-center border border-green-500 rounded-md">
                            <p class="text-[12px] px-3 py-1 text-green-500 font-bold">جديد</p>
                        </div>
                        {{-- price --}}
                        <p class="font-bold text-[20px]">1.200.125 ج.م</p>

                        <div class="flex items-center mt-2">
                            {{-- type --}}
                            <p class="pl-2 text-[16px] font-[500] border-l border-gray-300">شالية</p>

                            {{-- bedroom --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.2929 18H7.70711L6.85355 18.8536C6.65829 19.0488 6.34171 19.0488 6.14645 18.8536C5.95118 18.6583 5.95118 18.3417 6.14645 18.1464L6.29289 18H6C4.89543 18 4 17.1046 4 16V15C4 13.8954 4.89543 13 6 13H7.26756C7.09739 12.7058 7 12.3643 7 12C7 10.8954 7.89543 10 9 10H11C11.5973 10 12.1335 10.2619 12.5 10.6771C12.8665 10.2619 13.4027 10 14 10H16C17.1046 10 18 10.8954 18 12C18 12.3643 17.9026 12.7058 17.7324 13H19C20.1046 13 21 13.8954 21 15V16C21 17.1046 20.1046 18 19 18H18.7071L18.8536 18.1464C19.0488 18.3417 19.0488 18.6583 18.8536 18.8536C18.6583 19.0488 18.3417 19.0488 18.1464 18.8536L17.2929 18ZM19 14H6C5.44772 14 5 14.4477 5 15V16C5 16.5523 5.44772 17 6 17H19C19.5523 17 20 16.5523 20 16V15C20 14.4477 19.5523 14 19 14ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H14C13.4477 11 13 11.4477 13 12C13 12.5523 13.4477 13 14 13H16ZM9 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H9C8.44772 11 8 11.4477 8 12C8 12.5523 8.44772 13 9 13ZM6 11.5C6 11.7761 5.77614 12 5.5 12C5.22386 12 5 11.7761 5 11.5V8.5C5 7.1384 5.9375 6 7.14706 6H17.8529C19.0625 6 20 7.1384 20 8.5V11.5C20 11.7761 19.7761 12 19.5 12C19.2239 12 19 11.7761 19 11.5V8.5C19 7.65246 18.4627 7 17.8529 7H7.14706C6.53732 7 6 7.65246 6 8.5V11.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] pl-2 text-[16px] border-l border-gray-300">5</p>

                            {{-- pathroom --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 9.90832V7.4753C5.5 6.66051 6.16057 6 6.99513 6C7.82969 6 8.5 6.66051 8.5 7.4753V8.13266C8.5 8.40139 8.27687 8.61923 8.00162 8.61923C7.72638 8.61923 7.50324 8.40139 7.50324 8.13266V7.4753C7.50324 7.19796 7.2792 6.97314 6.99513 6.97314C6.71106 6.97314 6.49676 7.19796 6.49676 7.4753V9.90832H12.5C12.5 9.36869 12.9477 8.93124 13.5 8.93124H16.5C17.0523 8.93124 17.5 9.36869 17.5 9.90832H19.5C20.0523 9.90832 20.5 10.3458 20.5 10.8854V13.3281C20.5 15.1507 19.0407 16.6403 17.2014 16.7423L17.6351 17.166C17.8303 17.3568 17.8303 17.6661 17.6351 17.8569C17.4398 18.0477 17.1232 18.0477 16.9279 17.8569L15.7929 16.7479H8.48861L7.35355 17.8569C7.15829 18.0477 6.84171 18.0477 6.64645 17.8569C6.45118 17.6661 6.45118 17.3568 6.64645 17.166L7.0744 16.7479H7C5.067 16.7479 3.5 15.2168 3.5 13.3281V10.8854C3.5 10.3458 3.94772 9.90832 4.5 9.90832H5.5ZM13.5 9.90832V10.8854H16.5V9.90832H13.5ZM12.5 10.8854H4.5V13.3281C4.5 14.6772 5.61929 15.7708 7 15.7708H17C18.3807 15.7708 19.5 14.6772 19.5 13.3281V10.8854H17.5V13.8166C17.5 14.3563 17.0523 14.7937 16.5 14.7937H13.5C12.9477 14.7937 12.5 14.3563 12.5 13.8166V10.8854ZM13.5 10.8854V13.8166H16.5V12.8396H14.7092C14.4331 12.8396 14.2092 12.6208 14.2092 12.351C14.2092 12.0812 14.4331 11.8625 14.7092 11.8625H16.5V10.8854H13.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] pl-2 text-[16px] border-l border-gray-300">2</p>

                            {{-- area --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="mr-1">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 19.2563L7.14783 18.1236C7.34385 17.9292 7.66043 17.9304 7.85493 18.1263C8.04943 18.3222 8.04819 18.6386 7.85217 18.833L5.85217 20.8084C5.65723 21.0017 5.34277 21.0017 5.14783 20.8084L3.14783 18.833C2.95181 18.6386 2.95057 18.3222 3.14507 18.1263C3.33957 17.9304 3.65615 17.9292 3.85217 18.1236L5 19.2563V9.6821L3.85217 10.8148C3.65615 11.0092 3.33957 11.008 3.14507 10.8121C2.95057 10.6162 2.95181 10.2998 3.14783 10.1054L5.14783 8.13006C5.34277 7.93677 5.65723 7.93677 5.85217 8.13006L7.85217 10.1054C8.04819 10.2998 8.04943 10.6162 7.85493 10.8121C7.66043 11.008 7.34385 11.0092 7.14783 10.8148L6 9.6821V19.2563ZM9.70978 5.99806L10.8433 7.14514C11.0378 7.34104 11.0365 7.65741 10.8405 7.85179C10.6445 8.04616 10.3279 8.04492 10.1334 7.84902L8.15674 5.85032C7.96332 5.65551 7.96332 5.34125 8.15674 5.14644L10.1334 3.14773C10.3279 2.95184 10.6445 2.9506 10.8405 3.14497C11.0365 3.33935 11.0378 3.65572 10.8433 3.85162L9.70978 4.9987H19.2902L18.1567 3.85162C17.9622 3.65572 17.9635 3.33935 18.1595 3.14497C18.3555 2.9506 18.6721 2.95184 18.8666 3.14773L20.8433 5.14644C21.0367 5.34125 21.0367 5.65551 20.8433 5.85032L18.8666 7.84902C18.6721 8.04492 18.3555 8.04616 18.1595 7.85179C17.9635 7.65741 17.9622 7.34104 18.1567 7.14514L19.2902 5.99806H9.70978ZM21 19.0013C21 20.1052 20.1046 21 19 21H11C9.89543 21 9 20.1052 9 19.0013V11.0065C9 9.90263 9.89543 9.00778 11 9.00778H19C20.1046 9.00778 21 9.90263 21 11.0065V13.0052H20V11.0065C20 10.4546 19.5523 10.0071 19 10.0071H11C10.4477 10.0071 10 10.4546 10 11.0065V19.0013C10 19.5532 10.4477 20.0006 11 20.0006H19C19.5523 20.0006 20 19.5532 20 19.0013H21ZM21 17.0026H20V15.0039H21V17.0026Z"
                                    fill="currentColor"></path>
                            </svg>
                            <p class="font-[500] text-[16px]">2 <span>م<sup>2</sup></span></p>
                        </div>

                        <div class="flex items-center mt-2">
                            <i class="fa-solid fa-location-dot text-[16px]"></i>
                            <p class="mr-1 text-[16px] font-[500]">
                                <span>مصر</span>
                                |
                                <span>قنا الجديدة</span>
                                |
                                <span>الوحدة الاولي</span>
                            </p>
                        </div>

                        {{-- advance amount --}}
                        <div class="flex items-center bg-blue-100 text-blue-500 p-2 rounded w-fit mt-2 text-[10px]">
                            <i class="fa-solid fa-money-bills ml-2"></i>
                            <p><span class="font-[500]">مقدم :</span><span>500,215 ج.م</span></p>
                        </div>

                        {{-- contact --}}
                        <div
                            class="group py-1 hover:py-2 absolute bottom-[10px] left-[15px] w-[40px] z-[201] flex flex-col justify-center items-center bg-sky-200 rounded-md transition-all duration-300 ease-in-out translate-y-[83%] hover:translate-y-0 hover:bg-blue-100 cursor-pointer">
                            <!-- Main Share Button Icon -->
                            <span class="py-1 text-gray-800 group-hover:hidden">
                                <i class="fa-solid fa-paper-plane text-sky-500"></i>
                            </span>

                            <!-- Whatsapp Icon -->
                            <div
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-300 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-green-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-green-400">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </div>

                            <!-- Email Icon -->
                            <div
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-500 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-red-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-red-400 text-[16px]">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                            </div>

                            <!-- Instagram Icon -->
                            <button id="share-button"
                                class="py-1 opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-300 delay-700 transform -translate-x-full">
                                <a href="#"
                                    class="text-white text-gray-800 hover:bg-blue-500 transition duration-200 flex items-center justify-center w-[28px] h-[28px] rounded-md bg-blue-400 text-[16px]">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </a>
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- End Show Properties --}}

    @push('scripts')
        {{-- Make Dropdpwn Category Hidden When click Out Dropdown --}}
        <script>
            const dropdownWrapperCategory = document.getElementById('dropdownWrapperCategory');
            const toggleDropdownCategory = document.getElementById('toggleDropdownCategory');
            const dropdownButtonCategory = document.getElementById('dropdownButtonCategory');
            const dropdownMenuCategory = document.getElementById('dropdownMenuCategory');
            const buttonText = document.getElementById('buttonTextCategory');
            const dropdownArrow = document.getElementById('dropdownArrow');
            const resetSearch = document.getElementById('resetSearchCategory');
            const hideButtonCategory = document.getElementById('okCategory');

            // Function to set the default or selected option text
            function setDefaultOption() {
                const storedData = JSON.parse(localStorage.getItem('search')) || {};
                const defaultOption = storedData.category || "تحديد الفئة";
                buttonText.textContent = defaultOption;


                // Highlight the active option
                const options = dropdownMenuCategory.querySelectorAll('button');
                options.forEach(option => {
                    if (option.getAttribute('data-option') === defaultOption) {
                        option.setAttribute('active', 'true');
                        option.classList.add('active-option');
                    } else {
                        option.removeAttribute('active');
                        option.classList.remove('active-option');
                    }
                });
            }

            // Set default option on page load
            setDefaultOption();

            // Detect clicks outside the dropdown
            document.addEventListener('click', function(event) {
                if (!dropdownWrapperCategory.contains(event.target)) {
                    toggleDropdownCategory.checked = false; // Hide the dropdown
                    dropdownArrow.classList.remove('rotate-180'); // Reset arrow rotation
                }
            });

            // Update button text, localStorage, and arrow rotation on selection
            dropdownMenuCategory.addEventListener('click', function(event) {
                if (event.target.tagName === 'BUTTON') {
                    const selectedOption = event.target.getAttribute('data-option');
                    buttonText.textContent = selectedOption;

                    // Remove active attribute from all options
                    dropdownMenuCategory.querySelectorAll('button').forEach(option => {
                        option.removeAttribute('active');
                        option.classList.remove('active-option');
                    });

                    // Set active attribute on the selected option
                    event.target.setAttribute('active', 'true');
                    event.target.classList.add('active-option');

                    let searchData = localStorage.getItem('search');
                    if (searchData) {
                        searchData = JSON.parse(searchData);
                        searchData.category = selectedOption;
                        localStorage.setItem('search', JSON.stringify(searchData));
                    } else {
                        const searchData = {
                            category: selectedOption
                        };
                        localStorage.setItem('search', JSON.stringify(searchData));
                    }

                    // Optionally, keep the dropdown open or close it
                    // toggleDropdownCategory.checked = false; // Uncomment to close dropdown after selection
                    dropdownArrow.classList.remove('rotate-180'); // Reset arrow rotation
                }
            });

            // Toggle dropdown and arrow rotation
            dropdownButtonCategory.addEventListener('click', function() {
                dropdownArrow.classList.toggle('rotate-180');
            });

            resetSearch.addEventListener('click', function() {
                let searchData = localStorage.getItem('search');
                if (searchData) {
                    searchData = JSON.parse(searchData);
                    // Remove the category field
                    if (searchData.category) {
                        delete searchData.category;
                    }
                    // Save the updated search object back to localStorage
                    localStorage.setItem('search', JSON.stringify(searchData));
                }
                setDefaultOption();
            })

            hideButtonCategory.addEventListener('click', function() {
                toggleDropdownCategory.checked = false; // Hide the dropdown
                dropdownArrow.classList.remove('rotate-180'); // Reset arrow rotation
            })
        </script>

        {{-- Build an autocomplete search bar --}}
        <script>
            let countries = [{
                    name: "Afghanistan",
                    code: "AF"
                },
                {
                    name: "Åland Islands",
                    code: "AX"
                },
                {
                    name: "Albania",
                    code: "AL"
                },
                {
                    name: "Algeria",
                    code: "DZ"
                },
                {
                    name: "American Samoa",
                    code: "AS"
                },
                {
                    name: "AndorrA",
                    code: "AD"
                },
                {
                    name: "Angola",
                    code: "AO"
                },
                {
                    name: "Anguilla",
                    code: "AI"
                },
                {
                    name: "Antarctica",
                    code: "AQ"
                },
                {
                    name: "Antigua and Barbuda",
                    code: "AG"
                },
                {
                    name: "Argentina",
                    code: "AR"
                },
                {
                    name: "Armenia",
                    code: "AM"
                },
                {
                    name: "Aruba",
                    code: "AW"
                },
                {
                    name: "Australia",
                    code: "AU"
                },
                {
                    name: "Austria",
                    code: "AT"
                },
                {
                    name: "Azerbaijan",
                    code: "AZ"
                },
                {
                    name: "Bahamas",
                    code: "BS"
                },
                {
                    name: "Bahrain",
                    code: "BH"
                },
                {
                    name: "Bangladesh",
                    code: "BD"
                },
                {
                    name: "Barbados",
                    code: "BB"
                },
                {
                    name: "Belarus",
                    code: "BY"
                },
                {
                    name: "Belgium",
                    code: "BE"
                },
                {
                    name: "Belize",
                    code: "BZ"
                },
                {
                    name: "Benin",
                    code: "BJ"
                },
                {
                    name: "Bermuda",
                    code: "BM"
                },
                {
                    name: "Bhutan",
                    code: "BT"
                },
                {
                    name: "Bolivia",
                    code: "BO"
                },
                {
                    name: "Bosnia and Herzegovina",
                    code: "BA"
                },
                {
                    name: "Botswana",
                    code: "BW"
                },
                {
                    name: "Bouvet Island",
                    code: "BV"
                },
                {
                    name: "Brazil",
                    code: "BR"
                },
                {
                    name: "British Indian Ocean Territory",
                    code: "IO"
                },
                {
                    name: "Brunei Darussalam",
                    code: "BN"
                },
                {
                    name: "Bulgaria",
                    code: "BG"
                },
                {
                    name: "Burkina Faso",
                    code: "BF"
                },
                {
                    name: "Burundi",
                    code: "BI"
                },
                {
                    name: "Cambodia",
                    code: "KH"
                },
                {
                    name: "Cameroon",
                    code: "CM"
                },
                {
                    name: "Canada",
                    code: "CA"
                },
                {
                    name: "Cape Verde",
                    code: "CV"
                },
                {
                    name: "Cayman Islands",
                    code: "KY"
                },
                {
                    name: "Central African Republic",
                    code: "CF"
                },
                {
                    name: "Chad",
                    code: "TD"
                },
            ];

            function onkeyUp(e) {
                let keyword = e.target.value;
                let dropdownEl = document.querySelector("#dropdown");
                dropdownEl.classList.remove("hidden");
                let filteredCountries = countries.filter((c) =>
                    c.name.toLowerCase().includes(keyword.toLowerCase())
                );

                renderOptions(filteredCountries);
            }

            document.addEventListener("DOMContentLoaded", () => {
                // Check if 'search' exists in localStorage and set input value accordingly
                let searchData = localStorage.getItem('search');
                if (searchData) {
                    searchData = JSON.parse(searchData);
                    if (searchData.search_property) {
                        let input = document.querySelector("#autocompleteInput");
                        input.value = searchData.search_property; // Set the input value from localStorage
                    }
                }

                renderOptions(countries);
            });

            function renderOptions(options) {
                let dropdownEl = document.querySelector("#dropdown");

                let newHtml = ``;

                options.forEach((country) => {
                    newHtml += `<div
                onclick="selectOption('${country.name}')"
                class="px-5 py-3 border-b border-gray-200 text-stone-600 cursor-pointer hover:bg-slate-100 transition-colors"
              >
                ${country.name}
              </div>`;
                });

                dropdownEl.innerHTML = newHtml;
            }

            function selectOption(selectedOption) {
                hideDropdown();
                let input = document.querySelector("#autocompleteInput");
                input.value = selectedOption;

                let searchData = localStorage.getItem('search');

                if (searchData) {
                    searchData = JSON.parse(searchData);
                    // Update or add the search_property property
                    searchData.search_property = selectedOption;
                    localStorage.setItem('search', JSON.stringify(searchData));
                } else {
                    const searchData = {
                        search_property: selectedOption
                    };
                    localStorage.setItem('search', JSON.stringify(searchData));
                }
            }

            document.addEventListener("click", () => {
                hideDropdown();
            });

            function hideDropdown() {
                let dropdownEl = document.querySelector("#dropdown");
                dropdownEl.classList.add("hidden");
            }
        </script>

        {{-- Status Property --}}
        <script>
            // Function to handle radio button changes
            function handleRadioChange(event) {
                const radios = document.querySelectorAll('input[name="status-property"]');
                const selectedOption = event.target.value;

                // Add the active-option class to the checked label, remove from others
                radios.forEach(radio => {
                    const label = document.querySelector(`label[for="${radio.id}"]`);
                    if (radio.checked) {
                        label.classList.add('active-option');
                    } else {
                        label.classList.remove('active-option');
                    }
                });

                // Save the checked option to localStorage
                let searchData = localStorage.getItem('search');
                if (searchData) {
                    searchData = JSON.parse(searchData);
                    searchData.status_property = selectedOption;
                    localStorage.setItem('search', JSON.stringify(searchData));
                } else {
                    const searchData = {
                        status_property: selectedOption
                    };
                    localStorage.setItem('search', JSON.stringify(searchData));
                }
            }

            // Function to load the saved radio state from localStorage
            function loadSavedRadioState() {
                const searchData = localStorage.getItem('search');
                if (searchData) {
                    const parsedData = JSON.parse(searchData);
                    const savedStatus = parsedData.status_property;
                    if (savedStatus) {
                        const savedRadio = document.querySelector(`input[value="${savedStatus}"]`);
                        if (savedRadio) {
                            savedRadio.checked = true;
                            const label = document.querySelector(`label[for="${savedRadio.id}"]`);
                            label.classList.add('active-option');
                        }
                    }
                }
            }

            // Add event listeners to all radio buttons
            const radioButtons = document.querySelectorAll('input[name="status-property"]');
            radioButtons.forEach(radio => {
                radio.addEventListener('change', handleRadioChange);
            });

            // Load the saved radio state on page load
            window.onload = loadSavedRadioState;
        </script>

        {{-- Type Property --}}
        <script>
            const dropdownWrapperType = document.getElementById('dropdownWrapperType');
            const toggleDropdownType = document.getElementById('toggleDropdownType');
            const dropdownButtonType = document.getElementById('dropdownButtonType');
            const dropdownMenuType = document.getElementById('dropdownMenuType');
            const buttonTextType = document.getElementById('buttonTextType');
            const dropdownArrowType = document.getElementById('dropdownArrowType');
            const resetSearchType = document.getElementById('resetSearchType');
            const hideButtonType = document.getElementById('okType');

            // Function to set the default or selected option text
            function setDefaultOption() {
                const storedData = JSON.parse(localStorage.getItem('search')) || {};
                const defaultOption = storedData.type_property || "تحديد نوع العقار";
                buttonTextType.textContent = defaultOption;


                // Highlight the active option
                const options = dropdownMenuType.querySelectorAll('button');
                options.forEach(option => {
                    if (option.getAttribute('data-option') === defaultOption) {
                        option.setAttribute('active', 'true');
                        option.classList.add('active-option');
                    } else {
                        option.removeAttribute('active');
                        option.classList.remove('active-option');
                    }
                });
            }

            // Set default option on page load
            setDefaultOption();

            // Detect clicks outside the dropdown
            document.addEventListener('click', function(event) {
                if (!dropdownWrapperType.contains(event.target)) {
                    toggleDropdownType.checked = false; // Hide the dropdown
                    dropdownArrowType.classList.remove('rotate-180'); // Reset arrow rotation
                }
            });

            // Update button text, localStorage, and arrow rotation on selection
            dropdownMenuType.addEventListener('click', function(event) {
                if (event.target.tagName === 'BUTTON') {
                    const selectedOption = event.target.getAttribute('data-option');
                    buttonTextType.textContent = selectedOption;

                    // Remove active attribute from all options
                    dropdownMenuType.querySelectorAll('button').forEach(option => {
                        option.removeAttribute('active');
                        option.classList.remove('active-option');
                    });

                    // Set active attribute on the selected option
                    event.target.setAttribute('active', 'true');
                    event.target.classList.add('active-option');

                    let searchData = localStorage.getItem('search');
                    if (searchData) {
                        searchData = JSON.parse(searchData);
                        searchData.type_property = selectedOption;
                        localStorage.setItem('search', JSON.stringify(searchData));
                    } else {
                        const searchData = {
                            type_property: selectedOption
                        };
                        localStorage.setItem('search', JSON.stringify(searchData));
                    }

                    // Optionally, keep the dropdown open or close it
                    // toggleDropdownType.checked = false; // Uncomment to close dropdown after selection
                    dropdownArrowType.classList.remove('rotate-180'); // Reset arrow rotation
                }
            });

            // Toggle dropdown and arrow rotation
            dropdownButtonType.addEventListener('click', function() {
                dropdownArrow.classList.toggle('rotate-180');
            });

            resetSearchType.addEventListener('click', function() {
                let searchData = localStorage.getItem('search');
                if (searchData) {
                    searchData = JSON.parse(searchData);
                    // Remove the category field
                    if (searchData.type_property) {
                        delete searchData.type_property;
                    }
                    // Save the updated search object back to localStorage
                    localStorage.setItem('search', JSON.stringify(searchData));
                }
                setDefaultOption();
            })

            hideButtonType.addEventListener('click', function() {
                toggleDropdownType.checked = false; // Hide the dropdown
                dropdownArrowType.classList.remove('rotate-180'); // Reset arrow rotation
            })
        </script>

        {{-- Number of Rooms --}}
        <script>
            const dropdownWrapperRooms = document.getElementById('dropdownWrapperRooms');
            const toggleDropdownRooms = document.getElementById('toggleDropdownRooms');
            const dropdownButtonRooms = document.getElementById('dropdownButtonRooms');
            const dropdownMenuRooms = document.getElementById('dropdownMenuRooms');
            const buttonTextRooms = document.getElementById('buttonTextRooms');
            const dropdownArrowRooms = document.getElementById('dropdownArrowRooms');
            const resetSearchRooms = document.getElementById('resetSearchRooms');
            const hideButtonRooms = document.getElementById('okRooms');

            // Initialize default option
            function setDefaultOption() {
                const storedData = JSON.parse(localStorage.getItem('search')) || {};
                const bedrooms = storedData.bedrooms || 'عدد الغرف';
                const bathrooms = storedData.bathrooms || 'عدد الحمامات';
                buttonTextRooms.textContent = `${bedrooms} / ${bathrooms}`;

                // Highlight active options
                const bedroomOptions = dropdownMenuRooms.querySelectorAll('#bedroomOptions button');
                bedroomOptions.forEach(option => {
                    if (option.getAttribute('data-option') === bedrooms) {
                        option.setAttribute('active', 'true');
                        option.classList.add('active-option');
                    } else {
                        option.removeAttribute('active');
                        option.classList.remove('active-option');
                    }
                });

                const bathroomOptions = dropdownMenuRooms.querySelectorAll('#bathroomOptions button');
                bathroomOptions.forEach(option => {
                    if (option.getAttribute('data-option') === bathrooms) {
                        option.setAttribute('active', 'true');
                        option.classList.add('active-option');
                    } else {
                        option.removeAttribute('active');
                        option.classList.remove('active-option');
                    }
                });
            }

            // Set default option on page load
            setDefaultOption();

            // Detect clicks outside the dropdown
            document.addEventListener('click', function(event) {
                if (!dropdownWrapperRooms.contains(event.target)) {
                    toggleDropdownRooms.checked = false; // Hide the dropdown
                    dropdownArrowRooms.classList.remove('rotate-180'); // Reset arrow rotation
                }
            });

            // Update button text, localStorage, and arrow rotation on selection
            dropdownMenuRooms.addEventListener('click', function(event) {
                if (event.target.tagName === 'BUTTON') {
                    const selectedOption = event.target.getAttribute('data-option');
                    const optionType = event.target.parentElement.parentElement.id === 'bedroomOptions' ? 'bedrooms' :
                        'bathrooms';

                    let searchData = JSON.parse(localStorage.getItem('search')) || {};
                    searchData[optionType] = selectedOption;
                    localStorage.setItem('search', JSON.stringify(searchData));

                    buttonTextRooms.textContent =
                        `${searchData.bedrooms || 'عدد الغرف'} / ${searchData.bathrooms || 'عدد الحمامات'}`;

                    // Remove active attribute from all options
                    dropdownMenuRooms.querySelectorAll('button').forEach(option => {
                        option.removeAttribute('active');
                        option.classList.remove('active-option');
                    });

                    // Set active attribute on the selected option
                    event.target.setAttribute('active', 'true');
                    event.target.classList.add('active-option');

                    // Optionally, keep the dropdown open or close it
                    dropdownArrowRooms.classList.remove('rotate-180'); // Reset arrow rotation
                }
            });

            // Toggle dropdown and arrow rotation
            dropdownButtonRooms.addEventListener('click', function() {
                dropdownArrowRooms.classList.toggle('rotate-180');
            });

            resetSearchRooms.addEventListener('click', function() {
                let searchData = JSON.parse(localStorage.getItem('search')) || {};
                delete searchData.bedrooms;
                delete searchData.bathrooms;
                localStorage.setItem('search', JSON.stringify(searchData));
                setDefaultOption();
            })

            hideButtonRooms.addEventListener('click', function() {
                toggleDropdownRooms.checked = false; // Hide the dropdown
                dropdownArrowRooms.classList.remove('rotate-180'); // Reset arrow rotation
            })
        </script>

        {{-- Reset All Search --}}
        <script>
            resetAllSearch = document.querySelector('#resetAllSearch');

            resetAllSearch.addEventListener('click', function() {
                localStorage.removeItem('search');
                location.reload();
            });
        </script>

        {{-- Share Button --}}
        <script>
            const shareButton = document.querySelector('#share-button');

            shareButton.addEventListener('click', event => {
                if (navigator.share) {
                    navigator.share({
                            title: 'KHAMASAT ',
                            url: 'a7777'
                        }).then(() => {
                            console.log('Thanks for sharing!');
                        })
                        .catch(console.error);
                } else {
                    shareDialog.classList.add('is-open');
                }
            });
        </script>
    @endpush

</x-front-layout>
