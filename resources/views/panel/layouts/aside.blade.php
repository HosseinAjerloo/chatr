
 <aside
            class="w-[0px] h-vh xl:w-1/5 transition-all sticky bg-white right-0 left-0 top-0 overflow-y-scroll h-screen space-y-4">
            <article class="px-4 w-full flex xl:hidden items-end justify-end flex-col max-auto mt-6 ">
                  <div class="closehambergerElement cursor-pointer max-w-max space-y-1 ml-2">
                    <div class="h-[4px] w-[30px] bg-black/60 hambergerMenu" style="--i: 1"></div>
                    <div class="h-[4px] w-[30px] bg-black/60 hambergerMenu" style="--i: 2"></div>
                    <div class="h-[4px] w-[30px] bg-black/60 hambergerMenu" style="--i: 3"></div>
                </div>
            </article>
            <article class="px-4 w-full max-auto mt-6">
                <div class="pt-4 pb-6 border-b-2 border-b-dcdde1">
                    <img src="{{ asset('chartFront/assets/icons/Asset1.svg') }}" alt="" />
                </div>
            </article>
            <article class="px-4 flex items-center justify-center flex-col space-y-4">
                <div class="w-[150px] h-[150px] bg-linear-100 from-3c63ad to-0db1dc to-60 rounded-full relative">

                    <img src="{{ asset($user->photo?->path?$user->photo->path:'chartFront/assets/images/avatar.jpg') }}" alt="" class="rounded-full w-full h-full p-1.5" />
                    <div
                        class="absolute w-[27px] h-[27px] bg-3fb54a bottom-[15px] left-[8px] border border-3 border-white rounded-full">
                    </div>
                </div>
                <div class="flex items-center justify-center flex-col space-y-2">
                    <h1 class="font-semibold text-3xl">{{$user->fullName}}</h1>
                    <h4 class="font-semibold text-xl text-gray-500">{{$user->side??''}}</h4>
                </div>
            </article>

            <article class="px-4 flex items-center justify-center flex-col">
                <ul class="flex w-full items-center justify-center flex-col space-y-4">
                    <li
                        class=" @if(\Illuminate\Support\Facades\Route::current()->getName()== 'panel.index') bg-012b38 @else bg-2e799a  @endif w-full py-4 flex items-center justify-center text-white font-[500] eleHover transition-all duration-700 rounded-lg hover:scale-[1.05] text-lg">
                        <a href="{{route('panel.index')}}">داشبورد</a>
                    </li>
                    <li
                        class="@if(\Illuminate\Support\Facades\Route::current()->getName()== 'panel.upload_excel.index') bg-012b38 @else bg-2e799a  @endif w-full py-4 flex items-center justify-center text-white font-[500] eleHover transition-all duration-700 rounded-lg hover:scale-[1.05]">
                        <a href="{{route('panel.upload_excel.index')}}">آپلود اکسل ها</a>
                    </li>
                    <li
                        class="@if(\Illuminate\Support\Facades\Route::current()->getName()== 'panel.operator.index') bg-012b38  @else bg-2e799a  @endif  w-full py-4 flex items-center justify-center text-white font-[500] eleHover transition-all duration-700 rounded-lg hover:scale-[1.05] text-lg">
                        <a href="{{route('panel.operator.index')}}">مدیریت پیش شماره ها</a>
                    </li>
                    <li
                        class="@if(str_contains(\Illuminate\Support\Facades\Route::current()->getName(),'user')) bg-012b38 @else bg-2e799a  @endif w-full py-4 flex items-center justify-center text-white font-[500] eleHover transition-all duration-700 rounded-lg hover:scale-[1.05] text-lg">
                        <a href="{{ route('panel.user.index') }}">مدیریت کاربران</a>
                    </li>
                    <li
                        class="@if(\Illuminate\Support\Facades\Route::current()->getName()== 'panel.config.index') bg-012b38 @else bg-2e799a  @endif w-full py-4 flex items-center justify-center text-white font-[500] eleHover transition-all duration-700 rounded-lg hover:scale-[1.05] text-lg">
                        <a href="{{route('panel.config.index')}}">تنظیمات سامانه</a>
                    </li>
                </ul>
            </article>

            <article class="px-4 flex items-center justify-center flex-col">
                <ul class="flex w-full items-center justify-center flex-col space-y-4">
                    <li
                        class="w-full py-4 flex items-center justify-flex text-black space-x-2 font-[500] border-b border-b-2 py-2 border-dcdde1">
                        <img src="{{ asset('chartFront/assets/icons/Asset12.svg') }}" alt="" class="w-8" />
                        <h1 class="font-bold text-xl text-268ec8">کاربران آنلاین</h1>
                    </li>

                    @foreach($activeUsers as $active)
                    <li
                        class="w-full flex items-center justify-flex text-black space-x-2 font-[500] border-b border-b-2 py-1 border-dcdde1">
                        <div class="w-[50px] h-[50px] border border-2 border-black rounded-full relative">
                            <img src="{{ asset('chartFront/assets/images/profile.jpg') }}" alt="" class="rounded-full w-full h-full" />
                            <div
                                class="absolute w-[16px] h-[16px] bg-3fb54a bottom-[2px] -left-[2px] border border-3 border-white rounded-full">
                            </div>
                        </div>
                        <div class="flex items-center justify-center flex-col space-y-1">
                            <h1 class="font-semibold text-md">{{\App\Models\User::find($active->user_id)->fullName??' '}}</h1>
                            <h4 class="font-semibold text-sm text-gray-500">{{\App\Models\User::find($active->user_id)->side??' '}}</h4>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </article>
        </aside>
