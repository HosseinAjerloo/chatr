@extends('panel.layouts.master')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <article class="bg-white p-4 rounded-lg">
        <div class="flex flex-wrap items-center space-x-2">
            <img src="../assets/icons/Asset21.svg" alt="" class="w-8">
            <h1 class="font-semibold text-2e799a text-xl">ویرایش حساب کاربری</h1>
            <div class="w-full mt-4">
                <img src="../assets/images/user.png" alt="">
            </div>
        </div>

        <div class="mt-4 flex items-center space-x-2">
            <h1 class="text-012b38 text-lg font-semibold">آپلود کارت شارژ :</h1>
            <div class="bg-dcdde1 flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 cursor-pointer upload"
                 data-name="phto">
                <p class="font-semibold text-base text-012b38 ">آپلود تصویر</p>
                <img src="../assets/images/upload.png" alt="">
            </div>
        </div>


        <form class="mt-4 flex flex-wrap space-y-2" action="{{ route('panel.user.update',$user) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" name="photo" class="hidden" data-name="phto" accept=".png, .jpg, .jpeg">
            <section class="flex items-center mt-2 justify-between  w-full flex-wrap xl:flex-nowrap">
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[25%] space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block w-full sm:w-[15%] md:w-[30%] xl:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">نام :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <input value="{{ old('name',$user->name) }}" type="text" name="name" placeholder="نام "
                           class="w-full sm:w-[80%] md:w-[60%]   border-dcdde1 rounded-lg px-4 py-1.5 border outline-none">
                </div>
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[30%]  space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block w-full sm:w-[15%] md:w-[30%] xl:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">نام خانوادگی :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <input value="{{ old('family',$user->family) }}" type="text" name="family" placeholder="نام خانوادگی"
                           class="w-full sm:w-[80%] md:w-[60%]  border-dcdde1 rounded-lg px-4 py-1.5 border outline-none">
                </div>
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[25%]  space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block  w-full sm:w-[15%] md:w-[30%] xl:w-[25%]">
                        <span class="text-012b38 text-[15.7px] font-semibold">نام کاربری :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <input value="{{ old('username',$user->username) }}" id="username" type="text" name="username"
                           placeholder="نام کاربری"
                           class="w-full sm:w-[80%] md:w-[60%] border-dcdde1 rounded-lg px-4 py-1.5 border outline-none">
                </div>
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[25%]  space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block   w-full sm:w-[15%] md:w-[30%] xl:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">سمت :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <input value="{{ old('side',$user->side) }}" type="text" name="side" placeholder="سمت "
                           class="w-full sm:w-[80%] md:w-[60%] border-dcdde1 rounded-lg px-4 py-1.5 border outline-none">
                </div>
            </section>
            <section class="flex items-center mt-2 justify-between  w-full flex-wrap xl:flex-nowrap">
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[25%] space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block w-full sm:w-[15%] md:w-[30%] xl:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">کدملی :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <input value="{{ old('nationality',$user->nationality) }}" type="text" name="nationality" placeholder="کدملی"
                           class="w-full sm:w-[80%] md:w-[60%]   border-dcdde1 rounded-lg px-4 py-1.5 border outline-none">
                </div>
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[30%]  space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block w-full sm:w-[15%] md:w-[30%] xl:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">شماره تماس :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <input value="{{ old('phone_number',$user->phone_number) }}" type="text" name="phone_number" placeholder="شماره تماس"
                           class="w-full sm:w-[80%] md:w-[60%]  border-dcdde1 rounded-lg px-4 py-1.5 border outline-none">
                </div>
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[25%]  space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block   w-full sm:w-[15%] md:w-[30%] xl:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">شهر :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>

                    <div class=" md:w-[62%] lg:w-[60%] rounded-lg border border-dcdde1 py-1 bg-012b38 text-white px-2">
                        <select  name="city_id"   class="w-full border-none outline-none city">
                            @foreach ($cities as $city )
                                <option class="bg-012b38 text-white" @if (old('city_id',$user->city_id)==$city->id) selected="selected" @endif
                                value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="mt-2 flex items-center w-full md:w-[49%] xl:w-[25%]  space-x-4 flex-wrap sm:flex-nowrap">
                    <label class="block   w-full sm:w-[15%] md:w-[30%] xl:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">برند :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>

                    <div class=" md:w-[62%] lg:w-[60%] rounded-lg border border-dcdde1 py-1 bg-012b38 text-white px-2">
                        <select name="brand_id" class="w-full border-none outline-none">
                            @foreach ($brands as $brand )
                                <option class="bg-012b38 text-white"
                                        @if (old('brand_id',$user->brand?->id)==$brand->id) selected="selected" @endif
                                        value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </section>
            <section class="flex items-center  w-full flex-wrap xl:flex-nowrap">
                <div class="mt-4 flex items-center space-x-4 w-full  md:w-[50%] lg:w-[25%] flex-wrap ">
                    <label class="block w-full sm:w-[15%] md:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">نقش :</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <div
                        class="px-2 sm:w-[80%] md:w-[62%] lg:w-[55%] rounded-lg border border-dcdde1 py-1 bg-012b38 text-white">
                        <select name="role_id" class="w-full border-none outline-none">
                            @foreach ($roles as $role )
                                <option class="bg-012b38 text-white" @if (old('role_id',$user->roles()->first()?->id)==$role->id ) selected="selected"
                                        @endif
                                        value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="mt-4 flex items-center space-x-4 w-full  md:w-[50%] lg:w-[25%] flex-wrap">
                    <label class="block w-full sm:w-[15%] md:w-[25%]  ">
                        <span class="text-012b38 text-[15.7px] font-semibold">رمز عبور:</span>
                        <span class="font-bold text-sm">*</span>
                    </label>
                    <input type="text" name="password" placeholder="رمزعبور"
                           class="sm:w-[80%] w-full md:w-[65%] xl:w-[67%] border-dcdde1 rounded-lg px-4 py-1.5 border outline-none">
                </div>
            </section>
            <section class="mt-8 flex w-full flex justify-end items-center sm:space-x-2 flex-wrap">
                <a href="{{route('panel.user.destroy',$user)}}"
                   class="cursor-pointer eleHover transition-all flex items-center justify-center mt-4 border border-dcdde1 py-1.5 px-4 bg-rose-600 font-semibold rounded-lg text-white w-full sm:w-[auto] ">حذف
                    کاربر</a>
                <button
                    class="mt-4 border border-dcdde1 transition-all py-1.5 px-4 bg-2e799a font-semibold rounded-lg text-white w-full sm:w-[auto] cursor-pointer eleHover">
                    ویرایش کابر
                </button>

            </section>

        </form>

    </article>
    <script>

    </script>
@endsection

@section('script-tag')

    <script>
        const input2 = document.getElementById("username");


        input2.addEventListener("input", function (event) {
            this.value = this.value.replace(/[^A-Za-z0-9]/g, "");
        });

        input2.addEventListener("beforeinput", function (event) {
            const char = event.data;
            if (char && !/[A-Za-z0-9]/.test(char)) {
                event.preventDefault();
            }
        });
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('.city').select2({
                dir: 'rtl',
                width: '100%'
            });
        });
    </script>
@endsection
