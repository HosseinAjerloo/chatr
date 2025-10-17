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
                        class="relative w-full sm:w-1/2 flex items-center space-x-4 md:border-r md:border-r-2 border-dcdde1 px-6 md:w-[25%] profile cursor-pointer">
                        <div class="transition-all -z-[10] opacity-0  absolute   translate-y-[40px] w-full left-0 right-0 top-[100%] h-[100px] mt-4 before:content-[''] before:absolute before:w-[15px] before:h-[15px] before:-top-[5px] before:right-[40%] before:bg-012b38 before:rotate-45">
                            <ul class="bg-012b38 border-none rounded-lg">
                                <li class=" py-2 cursor-pointer  border-b border-b-1 border-b-dcdde1">
                                    <a href="{{route('panel.user.edit_profile',$user)}}" class=" text-white w-full flex items-center justify-center space-x-4">
                                        <div class="w-[20%] flex items-center justify-center ">
                                            <i class="fa-solid fa-user w-5"></i>
                                        </div>
                                        <span class="text-lg font-semibold flex items-center justify-center w-[60%]">ویرایش پروفایل</span>
                                    </a>
                                </li>
                                <li class=" py-2 cursor-pointer  border-b border-b-1 border-b-dcdde1">
                                    <a href="" class="text-white w-full flex items-center justify-center space-x-4">
                                        <div class="w-[20%] flex items-center justify-center">
                                            <i class="fa-solid fa-message w-5">

                                            </i>
                                        </div>
                                        <span class="text-lg font-semibold flex items-center justify-center  w-[60%]">مدیریت و ارسال پیام</span>
                                    </a>
                                </li>
                                <li class=" py-2 cursor-pointer ">
                                    <a href="{{route('logout')}}" class="text-white w-full flex items-center justify-center space-x-4">
                                        <div class="w-[20%] flex items-center justify-center">
                                            <i class="fas fa-sign-out 2-5"></i>
                                        </div>
                                        <span class="text-lg font-semibold flex items-center justify-center  w-[60%]">خروج</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <img src="{{ asset($user->photo?->path?$user->photo->path:'chartFront/assets/images/avatar.jpg') }}" alt="day"
                            class="w-[60px] h-[60px] border border-2 border-black/80 bg-center flex rounded-full" />
                        <div>
                            <h4 class="text-base font-semibold">{{$user->fullName??''}}</h4>
                            <h5 class="text-sm text-gray-600">{{$user->side??''}}</h5>
                        </div>
                    </div>
                </nav>
            </header>
