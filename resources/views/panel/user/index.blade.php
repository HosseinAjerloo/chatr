@extends('panel.layouts.master')


@section('content')
    <article
        class="border border-2 border-dcdde1 flex-wrap  bg-white p-6 flex items-center justify-between mb-4 flex-wrap rounded-xl space-y-4">
        <div class="flex items-center space-x-2 space-y-2 w-full xl:w-[30%]">
            <img src="{{ asset('chartFront/assets/icons/Asset18.svg') }}" alt="" class="w-10 h-10">
            <p class="font-semibold text-lg text-268ec8">
                مدیریت کاربران
            </p>
        </div>
        <form action="{{route('panel.user.export_excel')}}" method="POST" class="flex flex-wrap items-center justify-end  w-full xl:w-[60%]">
            @csrf
            <button type="submit"
               class="w-full lg:w-[25%] mt-2 eleHover py-2.5 px-6 bg-2e799a border border-dcdde1 text-sm text-white rounded-lg transition-all duration-700 eleHover">
                دریافت اکسل
            </button>

            <div
                class="w-full lg:w-[25%] mt-2 eleHover py-2 flex items-center px-6 bg-2e799a border border-dcdde1 text-sm text-white rounded-lg transition-all duration-700 eleHover">
                <span>برند</span>
                <select name="brand_id" class="w-full border-none outline-none">
                    <option class="bg-012b38 text-white" value="">انتخاب کنید</option>
                    @foreach ($brands as $brand )
                        <option class="bg-012b38 text-white" value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div
                class="w-full lg:w-[25%] mt-2 eleHover xl:w-[25%] flex items-center px-6 bg-2e799a border border-dcdde1 text-sm text-white rounded-lg transition-all duration-700 eleHover">
                <span>شهر</span>

                <select name="city_id" class="w-full border-none outline-none city">
                    <option class="bg-012b38 text-white" value="">انتخاب کنید</option>
                    @foreach ($cities as $city )
                        <option class="bg-012b38 text-white" value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('panel.user.create') }}"
               class="w-full lg:w-[25%] mt-2 eleHover py-2.5 px-6 bg-2e799a border border-dcdde1 text-sm text-white rounded-lg transition-all duration-700 eleHover">
                اضافه کردن کاربر
            </a>


        </form>

        <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full sticky top-[80px]">
                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-268ec8 font-semibold text-white">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">ردیف</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">آواتار</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">نام کاربری</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">نام</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">نام خانوادگی</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">نقش</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">شهر</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">برند</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">شماره تماس</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">کدملی</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-white text-md">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key=> $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{$key+1}}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center">
                                <img
                                    src="{{ asset($user->photo?->path?$user->photo->path:'chartFront/assets/images/avatar.jpg') }}"
                                    alt="" class="w-20 h-20 object-cover rounded-full">
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->username??''}}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->name??''}}

                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->family??''}}

                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->roles()?->first()->name??'-'}}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->city->name??''}}

                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->brand?->name??'-'}}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->phone_number??'-'}}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="flex items-center justify-center">
                                {{$user->nationality??'-'}}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center ">
                                <a href="{{route('panel.user.edit',$user)}}">
                                    <i class="fas fa-edit text-xl text-2e799a "></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-center mt-4 w-full">
            <ul style="direction: ltr"
                class="flex w-full justify-center sm:w-2/3 lg:w-1/2 xl:w-[40%] 2xl:w-[34%] items-center space-x-2 px-6 py-2 rounded-2xl shadow shadow-md shadow-black/20 border border-black/50">
                <li
                    class="font-semibold flex items-center justify-center   text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    @if($users->currentPage() > 1)
                        <a href="{{ $users->previousPageUrl() }}" class="flex items-center justify-center  ">
                            <i class="fa-solid fa-angle-left flex items-center justify-center  "></i>
                        </a>
                    @else
                        <span class="flex items-center justify-center  "><i class="fa-solid fa-angle-left"></i></span>
                    @endif
                </li>
                @if($users->currentPage() > 4)
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $users->url(1) }}">1</a>
                    </li>
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $users->url(2) }}">2</a>
                    </li>
                    <li>...</li>

                @endif

                @for($i = max(1, $users->currentPage() - 2); $i < $users->currentPage(); $i++)

                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $users->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor


                <li
                    class="activePage font-semibold text-lg  eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    {{ $users->currentPage() }}
                </li>


                @for($i = $users->currentPage() + 1; $i <= min($users->lastPage(), $users->currentPage() + 2); $i++)
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $users->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if($users->currentPage() < $users->lastPage() - 3)
                    <li>...</li>
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $users->url($users->lastPage()) }}">{{ $users->lastPage() }}</a>
                    </li>
                @endif


                @if($users->currentPage() < $users->lastPage())

                    <li
                        class="font-semibold flex items-center justify-center  text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $users->nextPageUrl() }}" class="flex items-center justify-center ">
                            <i class="fa-solid fa-angle-right flex items-center justify-center "></i>
                        </a>
                    </li>

                @else
                    <li
                        class="font-semibold flex items-center justify-center text-lg text-black eleHover  w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <span class="flex items-center justify-center  "><i class="fa-solid fa-angle-right"></i></span>
                    </li>

                @endif

            </ul>
        </div>

    </article>
@endsection
@section('script-tag')

    <script>
        jQuery(document).ready(function($) {
            $('.city').select2({
                dir: 'rtl',
                width: '100%'
            });
        });
    </script>
@endsection
