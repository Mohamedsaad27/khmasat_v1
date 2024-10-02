<x-front-layout class="md:px-6">

    <x-auth.layout>
        <div
            class="w-full md:w-[50%] xl:w-[62%] px-6 md:px-0 pt-[25px] pb-[54px] md:pb-0 mt-[-100px] md:mt-0 bg-white rounded-[50px] md:rounded-0 flex flex-col items-center">
            <div class="text-[28px] font-bold text-center">سجل الان !</div>

            <form class="sm:w-[385px]" method="POST" action=""> 
                @csrf

                {{-- name --}}
                <div class="w-full max-w-sm min-w-[200px] mt-5">
                    <label class="font-[500]" for="">الأسم</label>
                    <input
                        class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow"
                        placeholder="ادخل الاسم بالكامل هنا ...">
                </div>

                {{-- email --}}
                <div class="w-full max-w-sm min-w-[200px] mt-3">
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

                {{-- confirm password --}}
                <div class="w-full max-w-sm min-w-[200px] mt-3">
                    <label class="font-[500]" for="confirm_password">تاكيد كلمة السر</label>
                    <div class="relative">
                        <input type="password" id="confirm_password"
                            class="auth__password w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-400 rounded-md px-3 py-2 transition duration-200 ease focus:outline-none focus:border-slate-600 hover:border-slate-600 shadow-sm focus:shadow"
                            placeholder="ادخل كلمة السر مرة اخري ...">
                        <span class="password__icon">
                            <i
                                class="fa-solid fa-eye-slash absolute left-[14px] top-[15.5px] text-[16px] eye cursor-pointer hover:text-sky-500 transition duration-200"></i>
                        </span>
                    </div>
                </div>

                <button type="submit"
                    class="w-full font-[500] py-2 bg-[#171717] border border-[#171717] text-white rounded-[5px] block mt-4 transition-all duration-200 hover:bg-transparent hover:text-black hover:tracking-[1px]">
                    سجل
                </button>

                <div class="relative flex items-center w-full my-4">
                    <span class="flex-1 h-[1px] bg-gray-400"></span>
                    <p class="mx-4">او, تسجيل بواسطة</p>
                    <span class="flex-1 h-[1px] bg-gray-400"></span>
                </div>

                <a href=""
                    class="w-full flex items-center justify-center border border-gray-400 rounded-[5px] py-2 transition-all duration-200 hover:bg-gray-200">
                    <img class="w-[30px]" src="{{ asset('assets/imgs/front/google logo.png') }}" alt="">
                    <p class="font-500 mr-2">تسجيل الدخول باستخدام جوجل</p>
                </a>

            </form>
        </div>
    </x-auth.layout>

</x-front-layout>
