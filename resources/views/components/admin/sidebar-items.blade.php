@forelse($items as $item)
    <li>
        @if (isset($item['childItems']))
            <button type="button"
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700
                @if (request()->routeIs($item['active'])) bg-gray-100 dark:bg-gray-700 @endif"
                aria-controls="dropdown-{{ $item['title'] }}" data-collapse-toggle="dropdown-{{ $item['title'] }}">
            @else
                <a href="{{ route($item['route']) }}"
                    class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700
                @if (request()->routeIs($item['active'])) bg-gray-100 dark:bg-gray-700 @endif
                ">
        @endif

        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            {!! $item['icon'] !!}
        </svg>
        <span class="mr-3 @if (isset($item['childItems'])) flex-1 text-right whitespace-nowrap @endif"
            sidebar-toggle-item>{{ $item['title'] }}</span>
        @if (isset($item['childItems']))
            {{-- Dropdown icon --}}
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            </button>
            {{-- Child items --}}
            <ul id="dropdown-{{ $item['title'] }}" class="hidden py-2 space-y-2">
                @forelse ($item['childItems'] as $childItem)
                    <li>
                        {{-- {{dd($childItem )}} --}}
                        <a href="{{ route($childItem['route']) }}"
                            class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg pr-11 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700">
                            {{ $childItem['title'] }}
                        </a>
                    </li>
                @empty
                @endforelse
            </ul>
        @else
            </a>
        @endif
    </li>
@empty
    <p class="text-red-500">لا يوجد عناصر</p>
@endforelse
