<x-admin-layout>

    @push('alerts')
        @if (Session::has('successCreate'))
            <script>
                iziToast.success({
                    title: "{{ session('successCreate') }}",
                    position: 'topRight',
                });
            </script>
        @endif
        @if (Session::has('successUpdate'))
            <script>
                iziToast.success({
                    title: "{{ session('successUpdate') }}",
                    position: 'topRight',
                });
            </script>
        @endif
        @if (Session::has('successDelete'))
            <script>
                iziToast.success({
                    title: "{{ session('successDelete') }}",
                    position: 'topRight',
                });
            </script>
        @endif
    @endpush
    <div class="p-5">

        {{-- START Breadcrumb --}}
        <div class="mb-10">
            <nav class="dark:bg-gray-800 bg-white rounded-lg shadow flex py-5 px-2" aria-label="Breadcrumb">
                <ol class="inline-flex flex-wrap items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}"
                            class="inline-flex mr-2 items-center text-gray-700 hover:text-blue-600 dark:text-gray-300 dark:hover:text-white">
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
                            <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                aria-current="page">العقارات</span>
                        </div>
                    </li>
                </ol>
            </nav>

            {{-- title page --}}
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white mt-4">العقارات</h1>
        </div>
        {{-- END Breadcrumb --}}

        <div
            class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700 mb-4">
            <div class="flex items-center mb-4 sm:mb-0">
                <form action="#" method="GET">
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="products-search"
                            class="relative bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 transition duration-200"
                            placeholder="ابحث عن عقار ...">
                        <i class="top-[15px] right-[10px] absolute text-gray-400 fa-solid fa-magnifying-glass"></i>
                    </div>
                </form>
            </div>
            <a href="{{ route('properties.create') }}"
                class="bg-blue-700 dark:bg-blue-600 dark:focus:ring-blue-800 dark:hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium hover:bg-blue-800 px-5 py-2.5 rounded-lg text-sm text-white transition duration-200">
                إضافة عقار جديد
            </a>
        </div>

        <div class="flex flex-col">
            <div class="table-scrollerbar overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        العنوان
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        السعر
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        الوصف
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        نوع العقار
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        عدد الغرف
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        عدد الحمامات
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        مساحة العقار
                                    </th>
                                    <th scope="col" class=" p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        الإجراءات
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($properties as $property)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                    <td
                                        class="max-w-[250px] p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div
                                            class="text-base font-semibold text-gray-900 dark:text-white overflow-hidden text-ellipsis whitespace-nowrap">
                                            {{ $property->title }}
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span class="text-sm font-bold mr-2">{{ $property->price }} ج.م</span>
                                        <span class="text-gray-500 line-through">{{ $property->price_after_discount }} ج.م</span>
                                    </td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                        {{ $property->description }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $property->propertyType->type }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $property->bedroom }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $property->bathroom }}
                                    </td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $property->area }} م<sup>2</sup>
                                    </td>
                                    <td class=" p-4 whitespace-nowrap">
                                        <a href="{{ route('properties.edit', ['property' => $property->slug]) }}"
                                            class=" inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-200">
                                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            تعديل
                                        </a>
                                        <a href="{{ route('properties.showPropertyInDashboard', ['property' => $property->slug]) }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 transition duration-200">
                                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 442.04 442.04"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="currentColor" stroke-width="10">
                                                    <g>
                                                        <path
                                                            d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203 c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219 c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367 c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021 c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212 c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071 c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188 c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993 c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5 s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z" />
                                                    </g>
                                                </g>
                                            </svg>
                                            مشاهدة
                                        </a>
                                        <a href="{{ route('properties.destroy', $property->slug) }}"
                                            onclick="event.preventDefault(); 
                                                     if(confirm('هل أنت متأكد من حذف العقار؟')) { 
                                                       document.getElementById('delete-form-{{ $property->slug }}').submit(); 
                                                     }"
                                        type="button" id="deleteProductButton"
                                            data-drawer-target="drawer-delete-product-default"
                                            data-drawer-show="drawer-delete-product-default"
                                            aria-controls="drawer-delete-product-default"
                                            data-drawer-placement="right"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 transition duration-200">
                                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            حذف
                                        </a>
                                        <form id="delete-form-{{ $property->slug }}" action="{{ route('properties.destroy', $property->slug) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination">
            {{ $properties->links() }}
        </div>

    </div>

</x-admin-layout>
