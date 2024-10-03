<x-front-layout class="p-6">

    {{-- Start Breadcrumb --}}
    <div class="flex text-gray-700 my-4 pb-4 border-b" aria-label="Breadcrumb">
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

    {{-- Start Property Detiles --}}
    <div class="property-detiles" dir="ltr">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-wrap -mx-4">
                <!-- Product Images -->
                
                <div class="w-full md:w-1/2 px-4 mb-8">
                    <img src="{{ asset($property->propertyImages->first()->image_path) }}" alt="Product"
                        class="w-full h-auto rounded-lg shadow-md mb-4" id="mainImage">
                    <div class="flex gap-4 py-4 justify-center overflow-x-auto">
                        @foreach ($property->propertyImages as $propertyImage)
                        <img src="{{ asset($propertyImage->image_path) }}" alt="Thumbnail 1"
                            class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
                            onclick="changeImage(this.src)">
                        @endforeach
                    </div>

                    </div>
              
                <!-- property Details -->
                <div class="w-full md:w-1/2 px-4" dir="rtl">
                    {{-- name & price --}}
                    <h2 class="text-2xl font-bold mb-4">{{ $property->name }}</h2>
                    <div class="mb-4 flex items-center justify-between border-b pb-5">
                        <div>
                            <span class="text-2xl font-bold mr-2">{{ $property->price }} ج.م</span>
                            <span class="text-gray-500 line-through">{{ $property->price_after_discount }} ج.م</span>
                        </div>
                    </div>
                    {{-- price & contact --}}
                    <p class="text-xl font-bold mb-5">الدفع والتواصل</p>
                    <div class="w-full flex items-center justify-between mb-4 pb-4 border-b">
                        <div class="w-full sm:w-fit border rounded p-3">
                            <div class="w-full flex items-center">
                                <div class="w-1/2 flex flex-col items-center py-2 bg-gray-100 rounded ml-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3 5.5C3 4.67157 3.67157 4 4.5 4H19.5C20.3284 4 21 4.67157 21 5.5V14.5C21 15.3284 20.3284 16 19.5 16H4.5C3.67157 16 3 15.3284 3 14.5V5.5ZM4.5 5C4.22386 5 4 5.22386 4 5.5V14.5C4 14.7761 4.22386 15 4.5 15H19.5C19.7761 15 20 14.7761 20 14.5V5.5C20 5.22386 19.7761 5 19.5 5H4.5ZM6 7H6.5H8V8H7V9H6V7.5V7ZM17 8H16V7H17.5H18V7.5V9H17V8ZM9.5 10C9.5 8.61929 10.6193 7.5 12 7.5C13.3807 7.5 14.5 8.61929 14.5 10C14.5 11.3807 13.3807 12.5 12 12.5C10.6193 12.5 9.5 11.3807 9.5 10ZM12 8.5C11.1716 8.5 10.5 9.17157 10.5 10C10.5 10.8284 11.1716 11.5 12 11.5C12.8284 11.5 13.5 10.8284 13.5 10C13.5 9.17157 12.8284 8.5 12 8.5ZM6 12.5V11H7V12H8V13H6.5H6V12.5ZM18 11V12.5V13H17.5H16V12H17V11H18ZM3 17.5C3 17.2239 3.22386 17 3.5 17H20.5C20.7761 17 21 17.2239 21 17.5C21 17.7761 20.7761 18 20.5 18H3.5C3.22386 18 3 17.7761 3 17.5ZM3.5 19C3.22386 19 3 19.2239 3 19.5C3 19.7761 3.22386 20 3.5 20H20.5C20.7761 20 21 19.7761 21 19.5C21 19.2239 20.7761 19 20.5 19H3.5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <p>طريقة الدفع</p>
                                    <div class="font-bold">
                                        <span>نقداً</span>
                                        <span class="font-normal">او</span>
                                        <span>تقسيط</span>
                                    </div>
                                </div>
                                @if($property->installment_amount > 0)
                                <div class="w-1/2 flex flex-col items-center py-2 bg-gray-100 rounded">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.7427 6.63847C11.7427 6.59533 11.7672 6.48021 11.9808 6.30658C12.1904 6.1362 12.5241 5.96057 12.9807 5.80357C13.8891 5.49124 15.1763 5.28906 16.6216 5.28906C18.0668 5.28906 19.354 5.49124 20.2624 5.80357C20.719 5.96057 21.0527 6.1362 21.2623 6.30658C21.4759 6.48021 21.5004 6.59533 21.5004 6.63847L21.5004 6.64125H21.498V6.66345C21.4884 6.71842 21.443 6.82344 21.2623 6.97036C21.0527 7.14073 20.719 7.31636 20.2624 7.47336C19.354 7.78569 18.0668 7.98787 16.6216 7.98787C15.1763 7.98787 13.8891 7.78569 12.9807 7.47336C12.5241 7.31636 12.1904 7.14073 11.9808 6.97036C11.7672 6.79672 11.7427 6.6816 11.7427 6.63847ZM22.5004 6.63847C22.5004 6.66348 22.4996 6.68822 22.498 6.71268V8.78162L22.498 8.78513H22.5006V10.9255C22.5006 10.9501 22.4998 10.9744 22.4983 10.9985V13.0621L22.4981 13.0848V15.1986L22.4981 15.2022H22.4999V17.3425C22.4999 17.7951 22.2377 18.1629 21.9097 18.435C21.5785 18.7098 21.1231 18.9386 20.5871 19.123C19.5114 19.4928 18.0857 19.692 16.6211 19.692C15.4283 19.692 14.2935 19.5608 13.3529 19.3274C12.6303 19.148 11.9735 18.8966 11.4992 18.5623C10.4373 19.2926 9.16577 19.6915 7.85348 19.6915C4.35387 19.6915 1.5 16.909 1.5 13.456C1.5 10.003 4.35387 7.22048 7.85348 7.22048C8.89279 7.22048 9.87515 7.46589 10.7427 7.90139V6.64125V6.63847C10.7427 6.1709 11.0193 5.7995 11.35 5.53062C11.6848 5.25847 12.1388 5.03559 12.6556 4.85791C13.6939 4.50089 15.0961 4.28906 16.6216 4.28906C18.147 4.28906 19.5492 4.50089 20.5875 4.85791C21.1043 5.03559 21.5583 5.25847 21.8931 5.53062C22.2238 5.7995 22.5004 6.1709 22.5004 6.63847ZM20.5875 8.41902C20.9225 8.30384 21.2312 8.16966 21.498 8.01537V8.78162C21.498 8.81974 21.4768 8.93231 21.2693 9.10453C21.0649 9.27412 20.7324 9.45387 20.26 9.6164C19.3175 9.94042 18.008 10.131 16.6192 10.131C15.1339 10.131 13.7528 9.9134 12.8119 9.55664C12.4981 9.17291 12.139 8.82649 11.7427 8.52511V8.01401C12.0101 8.16887 12.3196 8.3035 12.6556 8.41902C13.6939 8.77604 15.0961 8.98787 16.6216 8.98787C18.147 8.98787 19.5492 8.77604 20.5875 8.41902ZM14.0424 12.0391C13.9427 11.6175 13.7995 11.2126 13.6176 10.8289C14.5183 11.0266 15.5582 11.131 16.6192 11.131C18.0839 11.131 19.5096 10.9318 20.5854 10.562C20.927 10.4445 21.2358 10.3089 21.5006 10.155V10.9217H21.4983V10.9493C21.4891 11.001 21.4463 11.1036 21.2718 11.2484C21.0674 11.418 20.7351 11.5977 20.2626 11.7603C19.32 12.0843 18.0106 12.2749 16.6218 12.2749C15.708 12.2749 14.8185 12.192 14.0424 12.0391ZM20.5879 12.7059C20.9275 12.5891 21.2346 12.4545 21.4983 12.3017L21.4981 13.0583V13.069C21.4954 13.1128 21.4657 13.2222 21.2695 13.385C21.0651 13.5546 20.7328 13.7343 20.2604 13.8968C19.3179 14.2208 18.0084 14.4115 16.6195 14.4115C15.753 14.4115 14.9083 14.3373 14.1617 14.199C14.1917 13.9537 14.207 13.7056 14.207 13.456C14.207 13.3308 14.2032 13.2065 14.1958 13.0831C14.954 13.2093 15.7827 13.2749 16.6218 13.2749C18.0864 13.2749 19.5122 13.0757 20.5879 12.7059ZM20.5856 14.8424C20.9261 14.7253 21.2339 14.5903 21.4981 14.437V15.1986C21.4981 15.2367 21.4769 15.3493 21.2693 15.5215C21.0649 15.6911 20.7326 15.8708 20.2602 16.0333C19.3176 16.3574 18.0081 16.548 16.6193 16.548C15.4955 16.548 14.4235 16.4232 13.5565 16.2041C13.7213 15.8748 13.8562 15.5316 13.9597 15.1786C14.7801 15.332 15.6938 15.4115 16.6195 15.4115C18.0841 15.4115 19.5099 15.2123 20.5856 14.8424ZM12.342 17.8686C12.5887 17.627 12.8132 17.3674 13.014 17.093C14.0374 17.3897 15.3132 17.548 16.6193 17.548C18.0839 17.548 19.5097 17.3488 20.5854 16.979C20.9267 16.8616 21.2353 16.7262 21.4999 16.5724V17.3425C21.4999 17.3807 21.4787 17.4932 21.2711 17.6655C21.0667 17.8351 20.7343 18.0148 20.2619 18.1773C19.3193 18.5014 18.0099 18.692 16.6211 18.692C15.4962 18.692 14.4437 18.5678 13.5938 18.3568C13.0551 18.2231 12.6272 18.0617 12.3166 17.8934L12.342 17.8686ZM2.5 13.456C2.5 10.5743 4.88693 8.22048 7.85348 8.22048C10.82 8.22048 13.207 10.5743 13.207 13.456C13.207 14.8412 12.6453 16.1718 11.6423 17.1542C10.6388 18.1371 9.27609 18.6915 7.85348 18.6915C4.88693 18.6915 2.5 16.3377 2.5 13.456ZM8.35459 9.71002V10.1187C9.13107 10.3469 9.70001 11.0887 9.70001 11.9685H8.77501C8.77501 11.4377 8.36087 11.0074 7.85001 11.0074C7.33914 11.0074 6.925 11.4377 6.925 11.9685C6.925 12.4992 7.33914 12.9295 7.85001 12.9295C8.87174 12.9295 9.70001 13.79 9.70001 14.8516C9.70001 15.7314 9.13107 16.4731 8.35459 16.7013V17.11H7.3455V16.7013C6.56898 16.4732 6 15.7314 6 14.8516H6.925C6.925 15.3824 7.33914 15.8126 7.85001 15.8126C8.36087 15.8126 8.77501 15.3824 8.77501 14.8516C8.77501 14.3208 8.36087 13.8905 7.85001 13.8905C6.82828 13.8905 6 13.03 6 11.9685C6 11.0886 6.56898 10.3469 7.3455 10.1187V9.71002H8.35459Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <p>مُقدم</p>
                                    <div class="font-bold">
                                        <span>500,215 ج.م</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            {{-- contact --}}
                            <div
                                class="mt-2 animate-bounce text-[15px] focus:animate-none inline-flex text-md font-medium bg-indigo-900 mt-3 px-4 py-1 rounded-lg tracking-wide text-white">
                                تواصل معنا
                            </div>
                            <div class="w-full flex items-center justify-between mt-1">
                                {{-- email --}}
                                <a href="#_"
                                    class="relative h-[35px] w-[32%] inline-flex items-center justify-center p-4 px-6 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-red-500 rounded shadow-md group">
                                    <span
                                        class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-red-500 group-hover:translate-x-0 ease">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="absolute flex items-center justify-center w-full h-full text-red-500 transition-all duration-300 transform group-hover:translate-x-full ease">
                                        <i class="fa-regular fa-envelope ml-2"></i>
                                        إيميل</span>
                                    <span class="relative invisible">
                                        <i class="fa-regular fa-envelope ml-2"></i>
                                        إيميل</span>
                                </a>
                                {{-- what's app --}}
                                <a href="#_"
                                    class="relative h-[35px] w-[32%] inline-flex items-center justify-center p-4 px-6 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-green-500 rounded shadow-md group">
                                    <span
                                        class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-green-500 group-hover:translate-x-0 ease">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="absolute flex items-center justify-center w-full h-full text-green-500 transition-all duration-300 transform group-hover:translate-x-full ease">
                                        <i class="fa-brands fa-whatsapp ml-2"></i>
                                        واتساب</span>
                                    <span class="relative invisible">
                                        <i class="fa-brands fa-whatsapp ml-2"></i>
                                        واتساب</span>
                                </a>
                                {{-- phone --}}
                                <a href="#_"
                                    class="relative h-[35px] w-[32%] inline-flex items-center justify-center p-4 px-6 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out border-2 border-cyan-500 rounded shadow-md group">
                                    <span
                                        class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-cyan-500 group-hover:translate-x-0 ease">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </span>
                                    <span
                                        class="absolute flex items-center justify-center w-full h-full text-cyan-500 transition-all duration-300 transform group-hover:translate-x-full ease">
                                        <i class="fa-solid fa-phone ml-2"></i>
                                        هاتف</span>
                                    <span class="relative invisible">
                                        <i class="fa-solid fa-phone ml-2"></i>
                                        هاتف</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- description --}}
                    <div class="description max-h-[400px] overflow-scroll pb-1 mb-4 border-b">
                        <p class="text-xl font-bold sticky top-[-1px] bg-white">الوصف</p>
                        {{-- title --}}
                        <p class="text-lg font-[500] my-2">امتلك شقة 195 م بمقدم مليون و تقسيط حتي 6 سنوات </p>
                        <ul class="list-disc list-inside text-gray-700 mx-2">
                            <li>هل تبحث عن الرفاهية والراحة في مسكنك الجديد؟ شركة لافيردي للتطوير العقاري بتقدم لك أفضل
                                العروض في كمبوند لافيردي نيوكابيتال المتميز </li>
                            <li>لموقع : منطقة الR8 كمبوند لافيردي نيوكابيتال بقلب العاصمة الادارية علي المحور المركزي
                                مباشرة
                            </li>
                            <li>بالقرب من :
                                - حي السفارات
                                - مقر الرئاسة
                                - حي الوزارات
                                - مركز المؤتمرات
                            </li>
                            <li>
                                المساحة :195 متر
                            </li>
                            <li>التصميم الداخلي للوحدة :
                                3 غرف نوم
                                2 حمام
                                ريسيبشن كبير
                                مطبخ
                                تيراس</li>
                            <li>لخدامات المتاحة في الكمبوند :
                                - نادي رياضي ومجمع خدمات متكامل.
                                - نادي اجتماعي به:( جيم ، جاكوزي ،حمامات سباحة)
                                - مبنى طبي
                                - فندق
                                - مسجد
                                - مول للتسوق علي النهر الاخضر مباشرة
                                - حضانة دولية</li>
                            <li>اجمالي سعر الوحدة :
                                8,979,999. ج.م</li>
                        </ul>
                    </div>
                    {{-- detiles property --}}
                    <div class="mb-4 pb-4 border-b">
                        <p class="text-xl font-bold">تفاصيل العقار </p>
                        <div class="flex flex-wrap items-center justify-between mt-5">
                            <div class="w-full lg:w-[47%] xl:w-[42%] flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.5 13.012V4C11.5 3.44772 11.9477 3 12.5 3H19.5C20.0523 3 20.5 3.44772 20.5 4V20.5C20.5 20.7761 20.2761 21 20 21C19.7239 21 19.5 20.7761 19.5 20.5V4H12.5V13.012H14.5C15.0523 13.012 15.5 13.4597 15.5 14.012V20.5C15.5 20.7761 15.2761 21 15 21C14.7239 21 14.5 20.7761 14.5 20.5V14.012H4.5V20.5C4.5 20.7761 4.27614 21 4 21C3.72386 21 3.5 20.7761 3.5 20.5V14.012C3.5 13.4597 3.94772 13.012 4.5 13.012H11.5ZM6.5 20.5C6.5 20.7761 6.27614 21 6 21C5.72386 21 5.5 20.7761 5.5 20.5V18.507C5.5 17.1262 6.61929 16.007 8 16.007C9.38071 16.007 10.5 17.1262 10.5 18.507V20.5C10.5 20.7761 10.2761 21 10 21C9.72386 21 9.5 20.7761 9.5 20.5V18.507C9.5 17.6785 8.82843 17.007 8 17.007C7.17157 17.007 6.5 17.6785 6.5 18.507V20.5ZM14.5 7C14.2239 7 14 6.77614 14 6.5C14 6.22386 14.2239 6 14.5 6H17.5C17.7761 6 18 6.22386 18 6.5C18 6.77614 17.7761 7 17.5 7H14.5ZM14.5 10C14.2239 10 14 9.77614 14 9.5C14 9.22386 14.2239 9 14.5 9H17.5C17.7761 9 18 9.22386 18 9.5C18 9.77614 17.7761 10 17.5 10H14.5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <p class="mr-2 font-[500]">نوع العقار</p>
                                </div>
                                <p class="font-bold">شقة</p>
                            </div>
                            <div class="w-full lg:w-[47%] xl:w-[42%] flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6 19.2563L7.14783 18.1236C7.34385 17.9292 7.66043 17.9304 7.85493 18.1263C8.04943 18.3222 8.04819 18.6386 7.85217 18.833L5.85217 20.8084C5.65723 21.0017 5.34277 21.0017 5.14783 20.8084L3.14783 18.833C2.95181 18.6386 2.95057 18.3222 3.14507 18.1263C3.33957 17.9304 3.65615 17.9292 3.85217 18.1236L5 19.2563V9.6821L3.85217 10.8148C3.65615 11.0092 3.33957 11.008 3.14507 10.8121C2.95057 10.6162 2.95181 10.2998 3.14783 10.1054L5.14783 8.13006C5.34277 7.93677 5.65723 7.93677 5.85217 8.13006L7.85217 10.1054C8.04819 10.2998 8.04943 10.6162 7.85493 10.8121C7.66043 11.008 7.34385 11.0092 7.14783 10.8148L6 9.6821V19.2563ZM9.70978 5.99806L10.8433 7.14514C11.0378 7.34104 11.0365 7.65741 10.8405 7.85179C10.6445 8.04616 10.3279 8.04492 10.1334 7.84902L8.15674 5.85032C7.96332 5.65551 7.96332 5.34125 8.15674 5.14644L10.1334 3.14773C10.3279 2.95184 10.6445 2.9506 10.8405 3.14497C11.0365 3.33935 11.0378 3.65572 10.8433 3.85162L9.70978 4.9987H19.2902L18.1567 3.85162C17.9622 3.65572 17.9635 3.33935 18.1595 3.14497C18.3555 2.9506 18.6721 2.95184 18.8666 3.14773L20.8433 5.14644C21.0367 5.34125 21.0367 5.65551 20.8433 5.85032L18.8666 7.84902C18.6721 8.04492 18.3555 8.04616 18.1595 7.85179C17.9635 7.65741 17.9622 7.34104 18.1567 7.14514L19.2902 5.99806H9.70978ZM21 19.0013C21 20.1052 20.1046 21 19 21H11C9.89543 21 9 20.1052 9 19.0013V11.0065C9 9.90263 9.89543 9.00778 11 9.00778H19C20.1046 9.00778 21 9.90263 21 11.0065V13.0052H20V11.0065C20 10.4546 19.5523 10.0071 19 10.0071H11C10.4477 10.0071 10 10.4546 10 11.0065V19.0013C10 19.5532 10.4477 20.0006 11 20.0006H19C19.5523 20.0006 20 19.5532 20 19.0013H21ZM21 17.0026H20V15.0039H21V17.0026Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <p class="mr-2 font-[500]">مساحة العقار</p>
                                </div>
                                <p class="font-bold">{{$property->area}} متر مربع</p>
                            </div>
                            <div class="w-full lg:w-[47%] xl:w-[42%] flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.2929 18H7.70711L6.85355 18.8536C6.65829 19.0488 6.34171 19.0488 6.14645 18.8536C5.95118 18.6583 5.95118 18.3417 6.14645 18.1464L6.29289 18H6C4.89543 18 4 17.1046 4 16V15C4 13.8954 4.89543 13 6 13H7.26756C7.09739 12.7058 7 12.3643 7 12C7 10.8954 7.89543 10 9 10H11C11.5973 10 12.1335 10.2619 12.5 10.6771C12.8665 10.2619 13.4027 10 14 10H16C17.1046 10 18 10.8954 18 12C18 12.3643 17.9026 12.7058 17.7324 13H19C20.1046 13 21 13.8954 21 15V16C21 17.1046 20.1046 18 19 18H18.7071L18.8536 18.1464C19.0488 18.3417 19.0488 18.6583 18.8536 18.8536C18.6583 19.0488 18.3417 19.0488 18.1464 18.8536L17.2929 18ZM19 14H6C5.44772 14 5 14.4477 5 15V16C5 16.5523 5.44772 17 6 17H19C19.5523 17 20 16.5523 20 16V15C20 14.4477 19.5523 14 19 14ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H14C13.4477 11 13 11.4477 13 12C13 12.5523 13.4477 13 14 13H16ZM9 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H9C8.44772 11 8 11.4477 8 12C8 12.5523 8.44772 13 9 13ZM6 11.5C6 11.7761 5.77614 12 5.5 12C5.22386 12 5 11.7761 5 11.5V8.5C5 7.1384 5.9375 6 7.14706 6H17.8529C19.0625 6 20 7.1384 20 8.5V11.5C20 11.7761 19.7761 12 19.5 12C19.2239 12 19 11.7761 19 11.5V8.5C19 7.65246 18.4627 7 17.8529 7H7.14706C6.53732 7 6 7.65246 6 8.5V11.5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <p class="mr-2 font-[500]">غرف النوم</p>
                                </div>
                                <p class="font-bold">{{$property->bedroom}}</p>
                            </div>
                            <div class="w-full lg:w-[47%] xl:w-[42%] flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.5 9.90832V7.4753C5.5 6.66051 6.16057 6 6.99513 6C7.82969 6 8.5 6.66051 8.5 7.4753V8.13266C8.5 8.40139 8.27687 8.61923 8.00162 8.61923C7.72638 8.61923 7.50324 8.40139 7.50324 8.13266V7.4753C7.50324 7.19796 7.2792 6.97314 6.99513 6.97314C6.71106 6.97314 6.49676 7.19796 6.49676 7.4753V9.90832H12.5C12.5 9.36869 12.9477 8.93124 13.5 8.93124H16.5C17.0523 8.93124 17.5 9.36869 17.5 9.90832H19.5C20.0523 9.90832 20.5 10.3458 20.5 10.8854V13.3281C20.5 15.1507 19.0407 16.6403 17.2014 16.7423L17.6351 17.166C17.8303 17.3568 17.8303 17.6661 17.6351 17.8569C17.4398 18.0477 17.1232 18.0477 16.9279 17.8569L15.7929 16.7479H8.48861L7.35355 17.8569C7.15829 18.0477 6.84171 18.0477 6.64645 17.8569C6.45118 17.6661 6.45118 17.3568 6.64645 17.166L7.0744 16.7479H7C5.067 16.7479 3.5 15.2168 3.5 13.3281V10.8854C3.5 10.3458 3.94772 9.90832 4.5 9.90832H5.5ZM13.5 9.90832V10.8854H16.5V9.90832H13.5ZM12.5 10.8854H4.5V13.3281C4.5 14.6772 5.61929 15.7708 7 15.7708H17C18.3807 15.7708 19.5 14.6772 19.5 13.3281V10.8854H17.5V13.8166C17.5 14.3563 17.0523 14.7937 16.5 14.7937H13.5C12.9477 14.7937 12.5 14.3563 12.5 13.8166V10.8854ZM13.5 10.8854V13.8166H16.5V12.8396H14.7092C14.4331 12.8396 14.2092 12.6208 14.2092 12.351C14.2092 12.0812 14.4331 11.8625 14.7092 11.8625H16.5V10.8854H13.5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <p class="mr-2 font-[500]">الحمامات</p>
                                </div>
                                <p class="font-bold">{{$property->bathroom}}</p>
                            </div>
                        </div>
                    </div>
                    {{-- location --}}
                    <div class="">
                        <p class="text-xl font-bold">الموقع</p>
                        <div id="map" class="w-full h-[500px]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Property Detiles --}}

    @push('scripts')
        <script>
            function changeImage(src) {
                document.getElementById('mainImage').src = src;
            }
        </script>
        <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQHLpdaz5lAAXlWz1vq7oyJEAminaCOds&callback=initMap&libraries=places&v=weekly">
        </script>
        </script>
        <script>
            function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: -33.866,
                        lng: 151.196
                    },
                    zoom: 15,
                });

                const request = {
                    placeId: "ChIJN1t_tDeuEmsRUsoyG83frY4",
                    fields: ["name", "formatted_address", "place_id", "geometry"],
                };

                const infowindow = new google.maps.InfoWindow();
                const service = new google.maps.places.PlacesService(map);

                service.getDetails(request, (place, status) => {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        const marker = new google.maps.Marker({
                            map,
                            position: place.geometry.location,
                        });

                        google.maps.event.addListener(marker, "click", () => {
                            const content = `
                        <div>
                            <h2>${place.name}</h2>
                            <p>${place.place_id}</p>
                            <p>${place.formatted_address}</p>
                        </div>
                    `;
                            infowindow.setContent(content);
                            infowindow.open(map, marker);
                        });
                    } else {
                        console.error('Error fetching place details:', status);
                    }
                });
            }

            window.initMap = initMap;
        </script>
    @endpush

</x-front-layout>
