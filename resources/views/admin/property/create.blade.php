<x-admin-layout>
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.31.3/tagify.min.css" />
    @endpush

    @push('alerts')
        @error('feature')
            <script>
                iziToast.error({
                    title: "{{ $message }}",
                    position: 'topRight',
                });
            </script>
        @enderror
    @endpush

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <div class="p-5">

        {{-- START Breadcrumb --}}
        <div class="mb-10">
            <nav class="dark:bg-gray-800 bg-white rounded-lg shadow flex py-5 px-2" aria-label="Breadcrumb">
                <ol class="inline-flex flex-wrap items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex mr-2 items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 ml-2.5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            الصفحة الرئيسية
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mt-[1px] text-gray-400 rotate-180" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('properties.index') }}"
                                class="mr-1 text-gray-700 hover:text-primary-600 md:mr-2 dark:text-gray-300 dark:hover:text-white">العقارات</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 mt-[1px] text-gray-400 rotate-180" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">إضافة عقار
                                جديد</span>
                        </div>
                    </li>
                </ol>
            </nav>

            {{-- title page --}}
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mt-4">إضافة عقار جديد</h1>
        </div>
        {{-- END Breadcrumb --}}

        <form class="flex flex-wrap justify-between" action="{{ route('properties.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div
                class="w-full h-fit lg:w-[59%] xl:w-[69%] p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">

                <div class="flex flex-wrap items-center justify-between mb-5">

                    <div
                        class="flex items-center justify-between w-[49%] sm:w-[32.5%] bg-gray-50 dark:bg-gray-700 rounded border-2 border-gray-300 border-dashed dark:border-gray-600 p-2">
                        <p class="font-medium text-gray-900 dark:text-white">خصم</p>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input id="discount-checkbox" type="checkbox" class="peer sr-only"
                                @checked(old('price_after_discount')) />
                            <label for="discount-checkbox" class="hidden"></label>
                            <div
                                class="peer h-4 w-11 rounded border bg-slate-200 after:absolute after:-top-1 after:left-0 after:h-6 after:w-6 after:rounded-md after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-focus:ring-green-500">
                            </div>
                        </label>
                    </div>
                    <div
                        class="flex items-center justify-between w-[49%] sm:w-[32.5%] bg-gray-50 dark:bg-gray-700 rounded border-2 border-gray-300 border-dashed dark:border-gray-600 p-2">
                        <p class="font-medium text-gray-900 dark:text-white">مميز</p>

                        <label class="relative inline-flex cursor-pointer items-center">
                            <input id="feature" name="feature" type="checkbox" class="peer sr-only"
                                @checked(old('feature')) value="1" />
                            <div
                                class="peer h-4 w-11 rounded border bg-slate-200 after:absolute after:-top-1 after:left-0 after:h-6 after:w-6 after:rounded-md after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-focus:ring-green-500">
                            </div>
                        </label>
                    </div>

                    <div
                        class="flex items-center justify-between mt-2 sm:mt-0 w-full sm:w-[32.5%] bg-gray-50 dark:bg-gray-700 rounded border-2 border-gray-300 border-dashed dark:border-gray-600 p-2">
                        <p class="font-medium text-gray-900 dark:text-white">تقسيط</p>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input id="installment-checkbox" type="checkbox" class="peer sr-only"
                                @checked(old('installment_amount')) />
                            <label for="installment-checkbox" class="hidden"></label>
                            <div
                                class="peer h-4 w-11 rounded border bg-slate-200 after:absolute after:-top-1 after:left-0 after:h-6 after:w-6 after:rounded-md after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-focus:ring-green-500">
                            </div>
                        </label>
                    </div>
                </div>

                {{-- title --}}
                <div class="mb-3">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">العنوان</label>
                    <input type="text" name="title" id="title"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                        placeholder="ادخل عنوان للعقار" required value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="price-parent flex items-center justify-between mb-3">
                    <div class="price w-[49%]">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">السعر</label>
                        <input type="number" name="price" id="price"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل سعر للعقار" required value="{{ old('price') }}">
                        @error('price')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="discount-amount-parent w-[49%]">
                        <label for="discount-amount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">السعر بعد الخصم</label>
                        <input type="number" name="price_after_discount" id="discount-amount"
                            value="{{ old('price_after_discount') }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل السعر بعد الخصم " />
                        @error('price_after_discount')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="installment-parent flex items-center justify-between mb-3">
                    <div class="w-full installment">
                        <label for="installment-amount"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">المقدم</label>
                        <input type="number" name="installment_amount" id="installment-amount"
                            value="{{ old('installment_amount') }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل المقدم " />
                        @error('installment_amount')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- description --}}
                <div class="mb-3">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الوصف</label>
                    <textarea id="message" rows="2" name="description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="اكتب وصف العقار هنا...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 flex items-center justify-between">
                    {{-- type --}}
                    <div class="w-[49%]">
                        <label for="type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">النوع</label>
                        <select id="type" name="property_type_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($propertyTypes as $propertyType)
                                <option value="{{ $propertyType->id }}">{{ $propertyType->type }}</option>
                            @endforeach
                        </select>
                        @error('property_type_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- category --}}
                    <div class="w-[49%]">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الفئة</label>
                        <select id="category" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 flex items-center justify-between">
                    {{-- area --}}
                    <div class="w-[49%]">
                        <label for="area"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">المساحة <span
                                class="text-blue-500">م <sup>2</sup></span></label>
                        <input type="number" name="area" id="price"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل المساحة بالمتر المربع" required value="{{ old('area') }}">
                        @error('area')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- bedroom --}}
                    <div class="w-[49%]">
                        <label for="bedroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عدد
                            الغرف</label>
                        <input type="number" name="bedroom" id="bedroom"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل عدد الغرف" required value="{{ old('bedroom') }}">
                        @error('bedroom')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 flex items-center justify-between">
                    {{-- bathroom --}}
                    <div class="w-[49%]">
                        <label for="bathroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عدد
                            الحمامات</label>
                        <input type="number" name="bathroom" id="bathroom"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل عدد الحمامات" required value="{{ old('bathroom') }}">
                        @error('bathroom')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- status --}}
                    <div class="w-[49%]">
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">حالة
                            العقار</label>
                        <select id="status" name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="available" selected>متاح</option>
                            <option value="sold">تم البيع</option>
                            <option value="rented">تم التأجير</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- benefits --}}
                @php
                    $benefitIds = old('benefits', []);

                    $benefitsNames = \App\Models\Benefit::whereIn('id', $benefitIds)->pluck('name')->toArray();
                @endphp

                <div class="mb-3">
                    <label for="input-benefits" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        المميزات
                    </label>
                    <input name='benefits' id="input-benefits"
                        class='tagify--custom-dropdown shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200'
                        placeholder='ادخل مميزات العقار' value="{{ e(implode(',', $benefitsNames)) }}">

                    @error('benefits')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hidden input container for benefit IDs -->
                <div id="hidden-benefit-ids"></div>
            </div>

            <div class="w-full h-fit lg:w-[39%] xl:w-[29%] mb-4">
                <div
                    class="w-full p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    @error('images')
                        <p class="text-red-500 text-center font-[500] text-sm mb-2">{{ $message }}</p>
                    @enderror
                    <div class="flex flex-col items-center justify-center w-full">

                        <label for="fileInput"
                            class="flex flex-col items-center justify-center w-full h-[176px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-1 text-sm text-gray-500 dark:text-gray-400 font-semibold">اضغط لرفع الصور
                                </p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400 text-sm">لرفع اكثر من صورة <span
                                        class="font-semibold">ctrl + right click</span> </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)
                                </p>
                            </div>
                            <input id="fileInput" type="file" name="images[]" class="hidden" multiple />
                        </label>
                        <!-- Container to show the file names -->
                        <div id="fileList" class="file-list"></div>
                    </div>
                </div>

                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 py-4 px-6 dark:bg-gray-800">
                    <p class="font-medium text-gray-900 dark:text-white text-center mb-3"> حدد عنوان العقار</p>
                    @if ($errors->has('latitude') || $errors->has('longitude'))
                        <p class="text-red-500 text-center font-[500] text-sm mb-2">
                            {{ $errors->first('latitude') ?: $errors->first('longitude') }}
                        </p>
                    @endif
                    <div id="map" class="w-full h-[400px] rounded"></div>
                </div>
            </div>

            <div class="w-full">
                <button
                    class="bg-blue-700 dark:bg-blue-600 dark:focus:ring-blue-800 dark:hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium hover:bg-blue-800 px-5 py-2.5 rounded-lg text-sm text-white transition duration-200 ">إضافة
                    العقار</button>
            </div>

            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">

        </form>

    </div>

    @push('scripts')
        {{-- create benefits input using tagify  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.31.3/tagify.min.js"></script>
        <script>
            const benefits = [
                @foreach ($benefits as $benefit)
                    {
                        value: '{{ $benefit->name }}',
                        id: '{{ $benefit->id }}'
                    },
                @endforeach
            ];

            // Initialize Tagify
            var input = document.querySelector('#input-benefits'),
                tagify = new Tagify(input, {
                    whitelist: benefits.map(b => b.value), // Use benefit names for display
                    maxTags: 10,
                    dropdown: {
                        maxItems: 20,
                        classname: 'tags-look',
                        enabled: 0,
                        closeOnSelect: false
                    }
                });

            function updateHiddenInputs() {
                const hiddenInputContainer = document.getElementById('hidden-benefit-ids');
                hiddenInputContainer.innerHTML = ''; // Clear previous hidden inputs

                let selectedBenefits = tagify.value.map(item => {
                    const benefit = benefits.find(b => b.value === item.value);
                    return benefit ? benefit.id : null; // Return ID if found
                }).filter(id => id !== null); // Filter out any null values

                selectedBenefits.forEach(id => {
                    let hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'benefits[]'; // Name should be benefits[]
                    hiddenInput.value = id; // Set the value to the benefit ID
                    hiddenInputContainer.appendChild(hiddenInput);
                });
            }

            // Update hidden inputs when tags are added or removed
            tagify.on('add', updateHiddenInputs);
            tagify.on('remove', updateHiddenInputs);

            // Initial call to populate hidden inputs
            updateHiddenInputs();
        </script>

        {{-- integreation with google map --}}
        <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQHLpdaz5lAAXlWz1vq7oyJEAminaCOds&callback=initMap&libraries=places&v=weekly">
        </script>
        <script src="{{ asset('assets/js/admin/property/google-map.js') }}"></script>

        {{-- link script this page --}}
        <script src="{{ asset('assets/js/admin/property/script.js') }}"></script>
    @endpush

</x-admin-layout>
