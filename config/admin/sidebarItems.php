<?php

return [
    [
        'icon' => '<svg class="flex-shrink-0 w-6 h-6 text-inherit transition duration-200 group-hover:text-gray-900 dark:group-hover:text-white
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path fill="currentColor" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path fill="currentColor" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>',
        'title' => "الصفحة الرئسية",
        'route' => "admin.dashboard",
        'active' => "admin/dashboard"
    ],
    [
        'icon' => '<svg version="1.1" class="flex-shrink-0 w-6 h-6 text-inherit transition duration-200 group-hover:text-gray-900 dark:group-hover:text-white
                        id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 256 173" enable-background="new 0 0 256 173" xml:space="preserve">
                        <path fill="currentColor" d="M128.253,56.864c15.186,0,27.432-12.247,27.432-27.432S143.536,2,128.253,2
                            c-15.186,0-27.432,12.247-27.432,27.432C100.918,44.716,113.165,56.864,128.253,56.864z M64.571,136.32h-49.28
                            c-15.969,0-16.851-24.395,0.294-24.395H58.3l24.493-36.054c7.25-9.895,15.48-14.598,27.138-14.598h36.544
                            c11.659,0,19.888,4.311,27.138,14.598l24.591,36.054h43.01c17.243,0,16.165,24.395,0.588,24.395h-49.28
                            c-3.919,0-8.622-1.372-11.365-5.584l-18.811-26.844l-0.098,67.209H94.844l-0.098-67.209l-18.811,26.844
                            C73.192,134.85,68.49,136.32,64.571,136.32z"></path>
                        <path fill="currentColor" d="M254,100h-21.913V85.625h-9.35V100h-21.913V31.339h13.148v-4.967h26.88v4.967H254V100z M218.355,66.341h-8.765v8.765h8.765
                            V66.341z M218.355,53.252h-8.765v8.765h8.765V53.252z M218.355,40.104h-8.765v8.765h8.765V40.104z M232.087,66.341h-9.35v8.765h9.35
                            V66.341z M232.028,62.017v-8.765h-4.616h-0.058h-4.616v8.765h9.35H232.028z M232.087,40.104h-4.616h-0.058h-4.616v8.765h4.616h0.058
                            h4.616V40.104z M245.235,66.341h-8.765v8.765h8.765V66.341z M245.235,53.252h-8.765v8.765h0.76h8.006V53.252z M245.235,40.104
                            h-8.765v8.765h8.765V40.104z"></path>
                        <path fill="currentColor" d="M65.924,68.48c0,1.924-1.56,3.537-3.537,3.537c-1.04,0-2.029-0.468-2.653-1.196l-4.161-3.849V100H40.683V76.721h-12.82V100
                            H12.767V66.711l-4.785,4.317c-0.624,0.624-1.508,0.988-2.445,0.988C3.612,72.017,2,70.456,2,68.48c0-1.092,0.52-2.133,1.3-2.757
                            L34.3,38l9.31,8.478V39.3h7.958v14.46L65.04,66.087C65.612,66.711,65.924,67.544,65.924,68.48z"></path>
                        <g id="shopping_cart">
                        </g>
                        <g id="cross">
                        </g>
                        <g id="leaf">
                        </g>
                    </svg>',
        'title' => "انواع العقارات",
        'route' => "admin.dashboard",
        'active' => "lls",
        'childItems' => [
            [
                'title' => 'إضافة نوع جديد',
                'route' => 'properties.create',
                'active' => 'admin/properties/create'
            ],
            [
                'title' => 'عرض الانواع',
                'route' => 'properties.index',
                'active' => 'admin/properties'
            ]
        ]
    ],
    [
        'icon' => '<svg class="flex-shrink-0 w-6 h-6 text-inherit transition duration-200 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                        </path>
                    </svg>',
        'title' => 'العقارات',
        'active' => 'admin/properties*',
        'childItems' => [
            [
                'title' => 'اضافة عقار جديد',
                'route' => 'properties.create',
                'active' => 'admin/properties/create'
            ],
            [
                'title' => 'العقارات',
                'route' => 'properties.index',
                'active' => 'admin/properties'
            ]
        ]
    ],
    [
        'icon' => '<svg class="flex-shrink-0 w-6 h-6 text-inherit transition duration-200 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path
                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z">
                        </path>
                    </svg>',
        'title' => 'مميزات العقارات',
        'active' => 'admin/benefit-properties*',
        'childItems' => [
            [
                'title' => 'اضافة ميزة جديد',
                'route' => 'properties.create',
                'active' => 'admin/benefit-properties/create'
            ],
            [
                'title' => 'عرض المميزات',
                'route' => 'properties.index',
                'active' => 'admin/benefit-properties'
            ]
        ]
    ]
];