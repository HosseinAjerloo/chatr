<header class="bg-fdfdfd py-2 pr-6">
                <nav class="flex items-center justify-between px-6">

                <div class="hambergerElement cursor-pointer max-w-max space-y-1 ml-2 block xl:hidden ">
                    <div class="h-[4px] w-[30px] bg-black/60 hambergerMenu" style="--i: 1"></div>
                    <div class="h-[4px] w-[30px] bg-black/60 hambergerMenu" style="--i: 2"></div>
                    <div class="h-[4px] w-[30px] bg-black/60 hambergerMenu" style="--i: 3"></div>
                </div>
                    <div class="hidden sm:w-1/2 sm:flex md:w-[35%]">
                        <input type="text" placeholder="جستجوکنید"
                            class="border-1 w-[80%] border-dcdde1 py-2 rounded-4xl px-2 bg-edeff8" />
                    </div>
                    <div class="hidden md:flex items-center justify-between md:w-[35%]">
                        <div class="flex items-center space-x-3 space-x-revers w-[75%] px-4">
                            <img src="{{ asset('chartFront/assets/icons/Asset10.svg') }}" alt="day" class="w-8 flex" />
                            <div>
                                <p> امروز {{\Morilog\Jalali\Jalalian::forge('today')->format('%A, %d %B %Y')}}</p>
                                <p>اوقات خوبی را برای شما آرزومندیم</p>
                            </div>
                        </div>
                        <article class="flex items-center w-[25%] justify-between space-x-4">
                            <div>
                                <img src="{{ asset('chartFront/assets/icons/Asset8.svg') }}" alt="day" class="w-8 flex" />
                            </div>
                            <div>
                                <img src="{{ asset('chartFront/assets/icons/Asset9.svg') }}" alt="day" class="w-8 flex" />
                            </div>
                        </article>
                    </div>
                    <div
                        class="w-full sm:w-1/2 flex items-center space-x-4 md:border-r md:border-r-2 border-dcdde1 px-6 md:w-[25%]">
                        <img src="{{ asset('chartFront/assets/images/profile.jpg') }}" alt="day"
                            class="w-[60px] h-[60px] border border-2 border-black/80 bg-center flex rounded-full" />
                        <div>
                            <h4 class="text-base font-semibold">حسین آجرلو</h4>
                            <h5 class="text-sm text-gray-600">مدیر اجرایی</h5>
                        </div>
                    </div>
                </nav>
            </header>
