<x-front-layout class="px-6">

    <div class="flex flex-wrap justify-between h-[calc(100vh-78px)]">
        <div class="w-[50%] pt-[54px] flex flex-col items-center">
            <div class="text-[28px] font-bold text-center">تسجيل الدخول</div>

            <form class="w-[385px]">
                {{-- email --}}
                <div class="w-full max-w-sm min-w-[200px] mt-5">
                    <label class="font-[500]" for="">البريد الإلكتروني</label>
                    <input
                        class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow"
                        placeholder="ادخل البريد الإلكتروني هنا ...">
                </div>

                {{-- password --}}
                <div class="w-full max-w-sm min-w-[200px] mt-3">
                    <label class="font-[500]" for="">كلمة السر</label>
                    <div class="relative">
                        <input type="password"
                            class="auth__password w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow"
                            placeholder="ادخل كلمة السر هنا ...">
                        <span class="password__icon">
                            <i
                                class="fa-solid fa-eye-slash absolute left-[14px] top-[15.5px] text-[16px] eye cursor-pointer hover:text-sky-500 transition duration-200"></i>
                        </span>
                    </div>
                </div>

                {{-- forget password --}}
                <a href="" class="text-sm font-[500] hover:text-sky-500 transition duration-200">هل نسيت كلمة
                    السر ؟</a>

                <button type="submit"
                    class="w-full font-[500] py-2 bg-[#171717] border border-[#171717] text-white rounded-[5px] block mt-4 transition-all duration-200 hover:bg-transparent hover:text-black hover:tracking-[1px]">
                    تسجيل الدخول
                </button>

                <div class="relative flex items-center w-full my-4">
                    <span class="flex-1 h-[1px] bg-gray-400"></span>
                    <p class="mx-4">او, تسجيل بواسطة</p>
                    <span class="flex-1 h-[1px] bg-gray-400"></span>
                </div>

                <a href=""
                    class="w-full flex items-center justify-center border border-gray-400 rounded-[5px] py-2 transition-all duration-200 hover:bg-red-400">
                    <img class="w-[30px]" src="{{ asset('assets/imgs/front/google logo.png') }}" alt="">
                    <p class="font-500 mr-2">تسجيل الدخول باستخدام جوجل</p>
                </a>

                <div class="flex items-center mt-4">
                    <p class="font-[500]">ليس لديك حساب ؟</p>
                    <a class="mr-2 text-sky-500 font-[500] text-[17px] transition-all duration-200 hover:text-sky-600" href="">سجل من هنا</a>
                </div>

            </form>

        </div>
        <div class="w-[43%] h-[calc(100vh-150px)]">
            <img class="h-full object-cover rounded-tl-[5px] rounded-tr-[5px] rounded-bl-[5px] rounded-br-[100px]"
                src="{{ asset('assets/imgs/front/login.jpg') }}" alt="">
        </div>
    </div>

</x-front-layout>
