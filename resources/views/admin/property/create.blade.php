<x-admin-layout>

    <style>
        .file-list {
            margin-top: 10px;
        }
    </style>

    <div class="p-5">

        {{-- START Breadcrumb --}}
        <div class="mb-10">
            <nav class="dark:bg-gray-800 bg-white rounded-lg shadow flex py-5 px-2" aria-label="Breadcrumb">
                <ol class="inline-flex flex-wrap items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="#"
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
                            <a href="#"
                                class="mr-1 text-gray-700 hover:text-primary-600 md:mr-2 dark:text-gray-300 dark:hover:text-white">E-commerce</a>
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

        <form class="flex flex-wrap justify-between">

            <div
                class="w-full h-fit lg:w-[59%] xl:w-[69%] p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">

                <div class="flex items-center justify-between mb-5">

                    <div
                        class="flex items-center justify-between w-[49%] bg-gray-50 dark:bg-gray-700 rounded border-2 border-gray-300 border-dashed dark:border-gray-600 p-2">
                        <p class="font-medium text-gray-900 dark:text-white">خصم</p>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input id="discount-checkbox" type="checkbox" class="peer sr-only" checked />
                            <label for="discount-checkbox" class="hidden"></label>
                            <div
                                class="peer h-4 w-11 rounded border bg-slate-200 after:absolute after:-top-1 after:left-0 after:h-6 after:w-6 after:rounded-md after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-green-500 peer-checked:after:translate-x-full peer-focus:ring-green-500">
                            </div>
                        </label>
                    </div>
                    <div
                        class="flex items-center justify-between w-[49%] bg-gray-50 dark:bg-gray-700 rounded border-2 border-gray-300 border-dashed dark:border-gray-600 p-2">
                        <p class="font-medium text-gray-900 dark:text-white">تقسيط</p>
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input id="installment-checkbox" type="checkbox" class="peer sr-only" checked />
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
                        placeholder="ادخل عنوان للعقار" required>
                </div>

                <div class="price-parent flex items-center justify-between mb-3">
                    <div class="w-full price">
                        <label for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">السعر</label>
                        <input type="number" name="price" id="price"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل سعر للعقار" required>
                    </div>

                    {{-- when discount checked print input for this --}}
                </div>

                <div class="installment-parent flex items-center justify-between mb-3">
                    <div class="w-full installment">
                        {{-- when installment checked print input for this --}}
                    </div>
                </div>

                {{-- description --}}
                <div class="mb-3">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">الوصف</label>
                    <textarea id="message" rows="2"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="اكتب وصف العقار هنا..."></textarea>
                </div>

                <div class="mb-3 flex items-center justify-between">
                    {{-- type --}}
                    <div class="w-[49%]">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">النوع</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>شالية</option>
                            <option value="US">شقة</option>
                            <option value="CA">عمارة</option>
                            <option value="FR">فيلا</option>
                        </select>
                    </div>

                    {{-- area --}}
                    <div class="w-[49%]">
                        <label for="area"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">المساحة <span
                                class="text-blue-500">م <sup>2</sup></span></label>
                        <input type="number" name="price" id="price"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل المساحة بالمتر المربع" required>
                    </div>
                </div>

                <div class="mb-3 flex items-center justify-between">
                    {{-- bedroom --}}
                    <div class="w-[49%]">
                        <label for="bedroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عدد
                            الغرف</label>
                        <input type="number" name="bedroom" id="bedroom"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل عدد الغرف" required>
                    </div>

                    {{-- bathroom --}}
                    <div class="w-[49%]">
                        <label for="bathroom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">عدد
                            الحمامات</label>
                        <input type="number" name="bathroom" id="bathroom"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                            placeholder="ادخل عدد الحمامات" required>
                    </div>
                </div>
            </div>

            <div
                class="w-full h-fit lg:w-[39%] xl:w-[29%] p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">

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
                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400 font-semibold">اضغط لرفع الصور</p>
                            <p class="mb-2 text-gray-500 dark:text-gray-400 text-sm">لرفع اكثر من صورة <span
                                    class="font-semibold">ctrl + right click</span> </p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                            </p>
                        </div>
                        <input id="fileInput" type="file" class="hidden" multiple />
                    </label>
                    <!-- Container to show the file names -->
                    <div id="fileList" class="file-list"></div>
                </div>


            </div>

        </form>

    </div>

    <script>
        const fileInput = document.getElementById('fileInput');
        const fileList = document.getElementById('fileList');

        // Listen for file selection
        fileInput.addEventListener('change', function() {
            fileList.innerHTML = ''; // Clear the previous list
            fileList.classList.add('w-full', 'mt-[10px]');

            // Loop through the selected files
            Array.from(fileInput.files).forEach(file => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item', 'flex', 'items-center', 'mt-[10px]', 'dark:bg-gray-700',
                    'bg-gray-50', 'p-2', 'rounded', 'w-full');

                // Display image preview
                const parentImg = document.createElement('div');
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file); // Create a temporary URL for the image
                img.alt = file.name;
                parentImg.classList.add('w-[50px]', 'h-[50px]', 'ml-[10px]');
                img.classList.add('w-full', 'h-full', 'object-cover', 'rounded');

                // Display the file name
                const fileNameWrapper = document.createElement('div');
                fileNameWrapper.classList.add('truncate');
                fileNameWrapper.style.width = `calc(100% - 60px)`;
                const fileName = document.createElement('span');
                fileName.textContent = file.name;
                fileName.classList.add('text-gray-500', 'dark:text-gray-400', 'truncate');

                // Append file name to the wrapper and file item
                fileNameWrapper.appendChild(fileName);
                parentImg.appendChild(img);
                fileItem.appendChild(parentImg);
                fileItem.appendChild(fileNameWrapper);

                // Append the file item to the file list
                fileList.appendChild(fileItem);
            });
        });
    </script>

    <script>
        var priceParent = document.querySelector('.price-parent');
        var price = document.querySelector('.price');
        var discountCheckbox = document.getElementById('discount-checkbox');

        // Function to handle the price and discount element visibility
        function handleDiscount() {
            if (!discountCheckbox.checked) {
                price.classList.add('w-full');
                price.classList.remove('w-[49%]');

                // Remove discount element if it exists
                var existingDiscountElement = document.getElementById('discount-amount');
                if (existingDiscountElement) {
                    existingDiscountElement.parentNode.remove();
                }
            } else {
                price.classList.remove('w-full');
                price.classList.add('w-[49%]');

                // Create and append the discount element if it doesn't exist
                if (!document.getElementById('discount-amount')) {
                    var discountElement = document.createElement('div');
                    discountElement.classList.add('w-[49%]');
                    discountElement.innerHTML = `
                    <label for="discount-amount"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">السعر بعد الخصم</label>
                    <input type="number" name="discount-amount" id="discount-amount"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                        placeholder="ادخل السعر بعد الخصم " required>`;

                    // Append the discount element to the parent
                    priceParent.appendChild(discountElement);
                }
            }
        }

        // Run on page load
        window.addEventListener('load', handleDiscount);

        // Run when checkbox changes
        discountCheckbox.addEventListener('change', handleDiscount);
    </script>

    <script>
        var installment = document.querySelector('.installment');
        var installmentCheckbox = document.getElementById('installment-checkbox');

        // Function to handle the installment input visibility
        function handleInstallment() {
            if (!installmentCheckbox.checked) {
                // Remove installment input if it exists
                var existingInstallmentElement = document.getElementById('installment-amount');
                if (existingInstallmentElement) {
                    existingInstallmentElement.parentNode.remove();
                }
            } else {
                // Create and append the installment input if it doesn't exist
                if (!document.getElementById('installment-amount')) {
                    var installmentElement = document.createElement('div');
                    installmentElement.innerHTML = `
                    <label for="installment-amount"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">المقدم</label>
                    <input type="number" name="installment-amount" id="installment-amount"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 transition duration-200"
                        placeholder="ادخل المقدم " required>`;

                    // Append the new element to the installment div
                    installment.appendChild(installmentElement);
                }
            }
        }

        // Run on page load
        window.addEventListener('load', handleInstallment);

        // Run when checkbox changes
        installmentCheckbox.addEventListener('change', handleInstallment);
    </script>

</x-admin-layout>
