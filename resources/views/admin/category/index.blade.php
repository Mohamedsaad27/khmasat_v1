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
            <a href="{{ route('categories.create') }}"
                class="bg-blue-700 dark:bg-blue-600 dark:focus:ring-blue-800 dark:hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium hover:bg-blue-800 px-5 py-2.5 rounded-lg text-sm text-white transition duration-200">
                إضافة نوع عقار جديد
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
                                        النوع
                                    </th>
                                    <th scope="col" class="p-4 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        الإجراءات
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($categories as $category)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                    <td
                                        class="max-w-[250px] p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        <div
                                            class="text-base font-semibold text-gray-900 dark:text-white overflow-hidden text-ellipsis whitespace-nowrap">
                                            {{ $category->name }}
                                        </div>
                                    </td>
                                    <td class="p-4 whitespace-nowrap flex justify-between">
                                        <div>
                                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-200">
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
                                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذا النوع؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 transition duration-200">
                                                    <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    حذف
                                                </button>
                                            </form>

                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @push('scripts')
        <script>
            function deleteCategory(id) {
                if (confirm('Are you sure you want to delete this category?')) {
                    window.location.href = '/admin/categories/' + id + '/destroy';
                }
            }
        </script>
    @endpush
</x-admin-layout>
