    {{-- Start Breadcrumb --}}
    <div class="flex text-gray-700 my-4" aria-label="Breadcrumb">
        <div class="container mx-auto">
            <ol
                class="px-5 py-3 inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse border border-gray-200 rounded-lg bg-gray-50">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">العقارات</span>
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
                    <div class="z-[250] before:absolute before:bottom-full before:left-[12.6rem] before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))]  hidden peer-checked:block absolute mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
                        id="dropdownMenuCategory">
                        <div class="p-3">
                            <p class="text-[#4c4a4a] text-[15px] font-[600] w-fit mb-3">نوع العرض</p>
                            <ul class="flex flex-wrap justify-between w-full border-[.1rem] rounded p-2 mb-3 z-[500]">
                                @forelse($categories as $category)
                                    <li class="w-[49%]">
                                        <button role="checkbox" name="category"
                                            class="w-full block px-4 py-2 mb-1 text-sm text-gray-700 hover:bg-gray-100 rounded transition duration-200"
                                            data-option="{{ $category->name }}">{{ $category->name }}
                                        </button>
                                    </li>
                                @empty
                                    <p class="text-center">لا يوجد فئة</p>
                                @endforelse
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
                        class="w-full h-60 border border-gray-300 rounded-md bg-white absolute overflow-y-auto hidden z-[251]">
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
                <div class="relative w-1/2 sm:w-auto mt-2 lg:mt-0 inline-block text-left lg:mr-2.5 md:mr-0 ml-2.5 md:ml-0"
                    id="dropdownWrapperType">
                    <!-- Hidden checkbox to control the dropdown toggle -->
                    <input type="checkbox" id="toggleDropdownType" class="peer hidden">

                    <!-- Button with SVG arrow -->
                    <label id="dropdownButtonType" for="toggleDropdownType"
                        class="border border-gray-300 w-full focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex justify-between items-center cursor-pointer">
                        <span id="buttonTextType"></span> <!-- Default text will be set by JavaScript -->
                        <svg id="dropdownArrowType" class="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </label>

                    <!-- Dropdown Menu -->
                    <div class="dropdown-type z-[250] before:absolute before:bottom-full before:left-[12.6rem] before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white
                    before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] 
                    before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))] hidden peer-checked:block
                    absolute lg:left-0 right-0 mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
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
                <div class="relative min-w-[50%] sm:min-w-fit mt-2 lg:mt-0 inline-block text-left md:mr-2.5 ml-2.5 md:ml-0"
                    id="dropdownWrapperRooms">
                    <!-- Hidden checkbox to control the dropdown toggle -->
                    <input type="checkbox" id="toggleDropdownRooms" class="peer hidden">

                    <!-- Button with SVG arrow -->
                    <label id="dropdownButtonRooms" for="toggleDropdownRooms"
                        class="ring-1 ring-blue-300 w-full focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center inline-flex justify-between items-center cursor-pointer">
                        <span id="buttonTextRooms">عدد الغرف / عدد الحمامات</span>
                        <!-- Default text will be set by JavaScript -->
                        <svg id="dropdownArrowRooms" class="w-2.5 h-2.5 ms-3 transition-transform duration-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </label>

                    <!-- Dropdown Menu -->
                    <div class="dropdown-room z-[250] before:absolute lg:before:left-[1.6rem] before:left-[12.6rem] before:bottom-full before:w-0 before:h-0 before:border-t-0 before:border-b-[.75rem] before:border-b-white
                                before:border-transparent before:border-l-[.75rem] before:border-r-[.75rem] before:border-transparent before:content-[''] 
                                before:[filter:drop-shadow(0_-0.0625rem_0.0625rem_rgba(0,_0,_0,_0.1))] hidden peer-checked:block
                                absolute lg:left-0 right-0 lg:right-auto mt-[16px] w-[250px] rounded-md shadow-xl bg-white border border-gray-200"
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
            <div class="flex flex-wrap gap-2 md:gap-3 lg:gap-4 mb-5">

                @foreach ($properties as $property)
                    <x-front.property-item :propertyRoute="route('front.property-detiles', $property->slug)" :imgs="$property->propertyImages" :price="$property->price" :tag="$property->feature"
                        :propertyType="$property->propertyType->name" :bedroom="$property->bedroom" :bathroom="$property->bathroom" :area="$property->area" :address="$property->address"
                        :advanceAmount="$property->installment_amount ?? null" />
                @endforeach

            </div>

            {{ $properties->links() }}

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
            let countries = [
                @forelse($addresses as $address)
                    {
                        name: "{{ trim(($address->country ?? '') . ' - ' . ($address->governorate ?? '') . ' - ' . ($address->city ?? '') . ' - ' . ($address->street ?? '')) }}",
                    },
                @empty
                    // You can leave this part empty or provide a fallback if no addresses are available
                @endforelse
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
                class="px-5 py-3 border-b border-gray-200 text-stone-600 cursor-pointer hover:bg-slate-100 transition-colors">
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

        <script>
            $(document).ready(function() {
                $('#filterForm').submit(function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        url: '{{ route('filter') }}',
                        type: 'GET',
                        data: formData,
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });

            });
        </script>
    @endpush