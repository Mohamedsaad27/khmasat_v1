<x-admin-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Property Details (2 columns) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title and Price Section -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $property->title }}</h1>
                            <div class="flex items-center text-gray-600 space-x-4 space-x-reverse">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    @if($property->address)
                                    {{ $property->address->country . ' - ' . $property->address->governorate . ' - ' . $property->address->city . ' - ' . $property->address->street }}
                                    @endif
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    {{ $property->category->name }}
                                </span>
                            </div>
                        </div>
                        <div class="text-left">
                            <div class="text-3xl font-bold text-yellow-600">{{ number_format($property->price) }} ريال</div>
                            @if($property->price_after_discount)
                            <div class="text-sm text-gray-500 line-through">{{ number_format($property->price_after_discount) }} ريال</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Property Features -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">مميزات العقار</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
                            <svg class="w-8 h-8 text-yellow-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="text-sm font-medium">{{ $property->area }} متر²</span>
                            <span class="text-xs text-gray-500">المساحة</span>
                        </div>
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
                            <svg class="w-8 h-8 text-yellow-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="text-sm font-medium">{{ $property->bedroom }}</span>
                            <span class="text-xs text-gray-500">غرف النوم</span>
                        </div>
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
                            <svg class="w-8 h-8 text-yellow-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="text-sm font-medium">{{ $property->bathroom }}</span>
                            <span class="text-xs text-gray-500">دورات المياه</span>
                        </div>
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
                            <svg class="w-8 h-8 text-yellow-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="text-sm font-medium">{{ $property->furnished ? 'مؤثث' : 'غير مؤثث' }}</span>
                            <span class="text-xs text-gray-500">التأثيث</span>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">وصف العقار</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $property->description }}</p>
                </div>

                <!-- Benefits -->
                @if($property->benefits->count() > 0)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">المميزات الإضافية</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($property->benefits as $benefit)
                        <div class="flex items-center space-x-2 space-x-reverse">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">{{ $benefit->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Contact Card -->
                

                <!-- Property Status Card -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-semibold text-lg mb-4">حالة العقار</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">الحالة</span>
                            <span class="px-3 py-1 rounded-full text-sm 
                                @if($property->status === 'available') 
                                    bg-green-100 text-green-800
                                @elseif($property->status === 'sold')
                                    bg-red-100 text-red-800
                                @else
                                    bg-yellow-100 text-yellow-800
                                @endif">
                                {{ $property->status === 'available' ? 'متاح' : ($property->status === 'sold' ? 'تم البيع' : 'محجوز') }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">نوع العقار</span>
                            <span class="text-gray-900">{{ $property->propertyType->type }}</span>
                        </div>
                        @if($property->installment_amount)
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">قسط شهري يبدأ من</span>
                            <span class="text-yellow-600 font-semibold">{{ number_format($property->installment_amount) }} ريال</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Location Map -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-semibold text-lg mb-4">الموقع على الخريطة</h3>
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="/api/placeholder/400/300" alt="موقع العقار" class="rounded-lg w-full h-48 object-cover">
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-semibold text-lg mb-4">مشاركة العقار</h3>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="https://www.facebook.com/profile.php?id=100091588466241&mibextid=ZbWKwL"
                         class="flex items-center justify-center space-x-2 space-x-reverse bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                            </svg>
                            <span>فيسبوك</span>
                        </a>
                        <a href="https://www.tiktok.com/@ahmedzeiozeiozeio?_t=8qJqwZANVAL&_r=1" class="flex items-center justify-center space-x-2 space-x-reverse
                                                                                                      bg-blue-400 text-white py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-200">
                            <svg class="fill-white relative z-10 transition-all duration-300 group-hover:fill-black "
                            xmlns="http://www.w3.org/2000/svg" width="20" height="24"
                            viewBox="0 0 42 47" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M30.6721 17.4285C33.7387 19.6085 37.4112 20.7733 41.1737 20.7592V13.3024C40.434 13.3045 39.6963 13.2253 38.9739 13.0663V19.0068C35.203 19.0135 31.5252 17.8354 28.4599 15.6389V30.9749C28.4507 33.4914 27.7606 35.9585 26.4628 38.1146C25.165 40.2706 23.3079 42.0353 21.0885 43.2215C18.8691 44.4076 16.37 44.9711 13.8563 44.852C11.3426 44.733 8.90795 43.9359 6.81055 42.5453C8.75059 44.5082 11.2295 45.8513 13.9333 46.4044C16.6372 46.9576 19.4444 46.6959 21.9994 45.6526C24.5545 44.6093 26.7425 42.8312 28.2864 40.5436C29.8302 38.256 30.6605 35.5616 30.6721 32.8018V17.4285ZM33.3938 9.82262C31.8343 8.13232 30.8775 5.97386 30.6721 3.68324V2.71387H28.5842C28.8423 4.16989 29.4039 5.5553 30.2326 6.78004C31.0612 8.00479 32.1383 9.04144 33.3938 9.82262ZM11.645 36.642C10.9213 35.6957 10.4779 34.5653 10.365 33.3793C10.2522 32.1934 10.4746 30.9996 11.0068 29.9338C11.5391 28.8681 12.3598 27.9731 13.3757 27.3508C14.3915 26.7285 15.5616 26.4039 16.7529 26.4139C17.4106 26.4137 18.0644 26.5143 18.6916 26.7121V19.0068C17.9584 18.9097 17.2189 18.8682 16.4794 18.8826V24.8728C14.9522 24.39 13.2992 24.4998 11.8492 25.1803C10.3992 25.8608 9.25851 27.0621 8.65394 28.5454C8.04937 30.0286 8.02524 31.6851 8.58636 33.1853C9.14748 34.6855 10.2527 35.9196 11.6823 36.642H11.645Z"
                                fill="#FFF" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M28.4589 15.5892C31.5241 17.7857 35.2019 18.9638 38.9729 18.9571V13.0166C36.8243 12.5623 34.8726 11.4452 33.3927 9.82262C32.1372 9.04144 31.0601 8.00479 30.2315 6.78004C29.4029 5.5553 28.8412 4.16989 28.5831 2.71387H23.09V32.8018C23.0849 34.1336 22.6629 35.4304 21.8831 36.51C21.1034 37.5897 20.0051 38.3981 18.7425 38.8217C17.4798 39.2453 16.1162 39.2629 14.8431 38.872C13.57 38.4811 12.4512 37.7012 11.6439 36.642C10.3645 35.9965 9.3399 34.9387 8.7354 33.6394C8.1309 32.3401 7.98177 30.875 8.31208 29.4805C8.64239 28.0861 9.43286 26.8435 10.556 25.9535C11.6791 25.0634 13.0693 24.5776 14.5023 24.5745C15.1599 24.5766 15.8134 24.6772 16.4411 24.8728V18.8826C13.7288 18.9477 11.0946 19.8033 8.86172 21.3444C6.62887 22.8855 4.89458 25.0451 3.87175 27.5579C2.84892 30.0708 2.58205 32.8276 3.10392 35.49C3.62579 38.1524 4.91367 40.6045 6.80948 42.5453C8.90731 43.9459 11.3458 44.7512 13.8651 44.8755C16.3845 44.9997 18.8904 44.4383 21.1158 43.2509C23.3413 42.0636 25.2031 40.2948 26.5027 38.133C27.8024 35.9712 28.4913 33.4973 28.4962 30.9749L28.4589 15.5892Z"
                                fill="" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M38.9736 13.0161V11.4129C37.0005 11.4213 35.0655 10.8696 33.3934 9.82211C34.8695 11.4493 36.8229 12.5674 38.9736 13.0161ZM28.5838 2.71335C28.5838 2.42751 28.4968 2.12924 28.4596 1.8434V0.874023H20.8785V30.9744C20.872 32.6598 20.197 34.2738 19.0017 35.4621C17.8064 36.6504 16.1885 37.3159 14.503 37.3126C13.5106 37.3176 12.5311 37.0876 11.6446 36.6415C12.4519 37.7007 13.5707 38.4805 14.8438 38.8715C16.1169 39.2624 17.4805 39.2448 18.7432 38.8212C20.0058 38.3976 21.1041 37.5892 21.8838 36.5095C22.6636 35.4298 23.0856 34.1331 23.0907 32.8013V2.71335H28.5838ZM16.4418 18.8696V17.167C13.3222 16.7432 10.1511 17.3885 7.44529 18.9977C4.73944 20.6069 2.65839 23.0851 1.54131 26.0284C0.424223 28.9718 0.336969 32.2067 1.29377 35.206C2.25057 38.2053 4.195 40.792 6.81017 42.5448C4.92871 40.5995 3.65455 38.1484 3.14333 35.4908C2.63212 32.8333 2.906 30.0844 3.9315 27.5799C4.957 25.0755 6.68974 22.924 8.91801 21.3882C11.1463 19.8524 13.7736 18.9988 16.4791 18.9318L16.4418 18.8696Z"
                                fill="" />
                        </svg>
                            <span>تيك توك</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slider = tns({
                container: '#property-gallery',
                items: 1,
                slideBy: 'page',
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayButtonOutput: false,
                controls: true,
                nav: true,
                responsive: {
                    640: {
                        edgePadding: 20,
                        gutter: 20,
                        items: 1
                    },
                    700: {
                        gutter: 30
                    },
                    900: {
                        items: 1
                    }
                }
            });
        });
    </script>
</x-admin-layout>
