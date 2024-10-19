<x-admin-layout>
    <div class="container mx-auto px-4 py-8 bg-gray-800 text-gray-300">
        <h1 class="text-3xl font-bold mb-8">لوحة التحكم لموقع خماسات</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Properties Card -->
            <div class="bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Properties</h2>
                <p class="text-4xl font-bold text-blue-500">{{ $properties }}</p>
            </div>
            <div class="bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Users</h2>
                <p class="text-4xl font-bold text-blue-500">{{ $users }}</p>
            </div>
            <div class="bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Admins</h2>
                <p class="text-4xl font-bold text-blue-500">{{ $admins }}</p>
            </div>
            <div class="bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Total Employees</h2>
                <p class="text-4xl font-bold text-blue-500">{{ $employees }}</p>
            </div>
            <!-- Available Properties Card -->
            <div class="bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Available Properties</h2>
                <p class="text-4xl font-bold text-green-500">{{ $availableProperties }}</p>
            </div>
            
            <!-- Occupied Properties Card -->
            <div class="bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Sold Properties</h2>
                <p class="text-4xl font-bold text-orange-500">{{ $soldProperties }}</p>
            </div>
            
            <!-- Total Revenue Card -->
            <div class="bg-gray-700 rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">Rented Properties</h2>
                <p class="text-4xl font-bold text-indigo-500">{{ $rentedProperties }}</p>
            </div>
        </div>

        <!-- Recent Listings Section -->
        <div class="container mx-auto px-4 py-8">
        
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-6">اخر العقارات المضافة</h2>
                <div class="bg-gray-700 rounded-lg shadow-md overflow-x-auto">
                    <table class="w-full table-auto text-sm">
                        <thead class="bg-gray-600 text-white">
                            <tr>
                                <th class="px-4 py-3 text-right">العقار</th>
                                <th class="px-4 py-3 text-right">البلد</th>
                                <th class="px-4 py-3 text-right">المدينة</th>
                                <th class="px-4 py-3 text-right">السعر</th>
                                <th class="px-4 py-3 text-right">الحالة</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-200">
                            @foreach ($recentProperties as $property)
                            <tr class="hover:bg-gray-600 transition-colors duration-200">
                                <td class="border-t border-gray-500 px-4 py-3">{{ $property->title }}</td>
                                <td class="border-t border-gray-500 px-4 py-3">{{ $property->address->country ?? 'N/A' }}</td>
                                <td class="border-t border-gray-500 px-4 py-3">{{ $property->address->city ?? 'N/A' }}</td>
                                <td class="border-t border-gray-500 px-4 py-3">{{ $property->price }}</td>
                                <td class="border-t border-gray-500 px-4 py-3">
                                    <span class="px-2 py-1 bg-green-500 text-green-900 rounded-full text-xs font-semibold">
                                        {{ $property->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>