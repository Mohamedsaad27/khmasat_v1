@forelse($items as $item)
    <li>
        @if (isset($item['childItems']))
            <button type="button"
                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-200 rounded-lg group hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 focus:outline focus:outline-2 focus:outline-white
                {{ request()->is($item['active']) ? 'text-gray-200 bg-gray-200 dark:bg-gray-700 outline outline-2 outline-white' : '' }}"
                aria-controls="dropdown-{{ $item['title'] }}" data-collapse-toggle="dropdown-{{ $item['title'] }}">
            @else
                <a href="{{ route($item['route']) }}"
                    class="flex items-center p-2 text-base text-gray-900 transition duration-200 rounded-lg hover:bg-gray-200 group dark:text-gray-200 dark:hover:bg-gray-700
                {{ request()->is($item['active']) ? 'bg-gray-200 dark:bg-gray-700 outline outline-2 outline-white' : '' }}
                ">
        @endif

        {{-- ICON ITEM --}}
        <div
            class="text-gray-500 dark:text-gray-400
            {{ request()->is($item['active']) ? 'text-gray-900 dark:text-white' : '' }}">
            {!! $item['icon'] !!}
        </div>

        <span
            class="mr-3 text-gray-500 font-[500] transition duration-200 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white
                    {{ isset($item['childItems']) ? 'flex-1 text-right whitespace-nowrap' : '' }} 
                    {{ request()->is($item['active']) ? 'text-gray-900 dark:text-white' : '' }}"
            sidebar-toggle-item>{{ $item['title'] }}</span>

        @if (isset($item['childItems']))
            {{-- DROPDOWH ICON --}}
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            </button>
            {{-- CHILD ITEM --}}
            <ul id="dropdown-{{ $item['title'] }}"
                class="hidden py-2 space-y-1 pr-11 pl-5 relative after:content-[''] after:absolute after:h-[90%] after:w-px after:bg-gray-200 after:right-[34px] after:top-[5px]">
                @forelse ($item['childItems'] as $childItem)
                    <li>
                        <a href="{{ route($childItem['route']) }}"
                            class="flex items-center p-2 text-sm font-[500] text-gray-900 transition duration-200 rounded-lg pr-4 group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700
                            {{ request()->is($childItem['active']) ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
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
