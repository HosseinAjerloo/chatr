@extends('panel.layouts.master')


@section('content')

    <article
        class="flex items-center items-center justify-between flex-wrap mb-4"
    >
        <div
            class="flex items-center space-x-2 bg-white border border-dcdde1 rounded-lg p-6 w-full xl:w-[100%] mb-2"
        >
            <img src="{{asset('chartFront/assets/icons/Asset15.svg')}}" alt="" class="w-8"/>
            <p class="font-semibold text-2xl">
                کاربرگرامی لطفاهنگام آپلود فایل ها نهایت دقت را به کارببرید.
            </p>
        </div>
    </article>
    <article class="flex items-center w-full mb-4">
        <img
            src="{{asset('chartFront/assets/images/baner2.jpg')}}"
            alt=""
            class="rounded-xl shadow shadow-md shadow-black/50"
        />
    </article>

    <section class="flex items-center w-full  p-4 bg-white rounded-lg">
        <div class="flex flex-wrap items-center space-x-4 w-full">
            <h1 class="text-012b38 font-bold text-xl w-full lg:w-[13%]">آپلود کارت شارژ :</h1>
            <div
                class="relative flex flex-wrap items-center justify-center lg:justify-start w-full lg:w-[85%]  lg:space-x-4">
                <form action="{{route('panel.upload_excel.charge_code')}}" enctype="multipart/form-data" method="POST" class="w-full lg:w-[49%] xl:w-[50%]   lg:space-x-2 flex flex-wrap items-center ">
                   @csrf
                    <div class="mb-2 border-1 w-full lg:w-[30%] xl:w-[30%]  border-dcdde1  relative">
                        <div>
                            <div
                                class="absolute left-6 top-[50%] -translate-[50%] max-w-max h-full flex items-center justify-center">
                                <i class="fa-solid fa-arrow-down font-bold text-xl text-white"></i>
                            </div>
                            <select name="operator_id"
                                class="w-full cursor-pointer outline-none rounded-lg bg-012b38 py-2.5 px-2 appearance-none block text-white"
                            >
                                @foreach($operators as $operator)
                                    <option value="{{$operator->id}}">{{$operator->name??''}}</option>
                                @endforeach
                            </select>
                            <input type="file" accept=".xlsx" id="uploadCharge" name="charge_code" class="hidden">
                        </div>
                    </div>
                    <div
                        class="mb-2 border-1 w-full lg:w-[34%] xl:w-[33%] border-dcdde1  cursor-pointer bg-d8d8d8 rounded-lg uploadCharge">
                        <div class="flex items-center space-x-2 py-1.5 px-2 cursor-pointer " >
                            <h1
                                class="font-semibold text-122e4d font-semibold text-bases"
                            >
                                آپلود اکسل
                            </h1>
                            <img src="{{asset('chartFront/assets/icons/upload.png')}}" alt=""/>
                        </div>
                    </div>
                    <button type="submit"
                        class="form_charge mb-2 border-1 w-full lg:w-[30%] xl:w-[30%]  border-dcdde1  cursor-pointer bg-2e799a rounded-lg py-[8px] text-white px-2 font-bold">
                        اضافه کردن
                    </button>
                </form>
{{--                <div--}}
{{--                    class="w-full mt-4 lg:mt-0 lg:w-[49%] xl:w-[45%] p-2 rounded-xl space-y-1.5  bg-fdf5e1 border-1 border-f79145  ">--}}
{{--                    <div class="flex items-center space-x-2 w-full">--}}
{{--                        <img src="{{asset('chartFront/assets/icons/Asset6.svg')}}" alt="" class="w-6">--}}
{{--                        <p class="font-semibold">کاربر گرامی آپلود به درستی انجام نشددوباره تلاش کنید.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <form method="POST" action="{{route('panel.upload_excel.warrantye')}}" enctype="multipart/form-data" class="flex items-center w-full  p-4 bg-white rounded-lg">
        @csrf
        <input type="file" accept=".xlsx" id="warrantye" name="warrantye" class="hidden">
        <div class="flex flex-wrap items-center space-x-4 w-full">
            <h1 class="text-012b38 font-bold text-xl w-full lg:w-[14%] xl:w-[13%]">آپلود کارت گارانتی :</h1>
            <div class="  flex flex-wrap items-center justify-center lg:justify-start w-full lg:w-[83%]  lg:space-x-4">
                <div class="w-full lg:w-[35%]   lg:space-x-2 flex flex-wrap items-center ">

                    <div class="warrantye mb-2 border-1 w-full lg:w-[48%]  border-dcdde1  cursor-pointer bg-d8d8d8 rounded-lg cursor-pointer ">
                        <div class="flex items-center space-x-2 py-1.5 px-2">
                            <h1
                                class="font-semibold text-122e4d font-semibold text-bases"
                            >
                                آپلود اکسل
                            </h1>
                            <img src="{{asset('chartFront/assets/icons/upload.png')}}" alt=""/>
                        </div>
                    </div>
                    <button type="submit"
                        class="mb-2 border-1 w-full lg:w-[48%]   border-dcdde1  cursor-pointer bg-2e799a rounded-lg py-[8px] text-white px-2 font-bold">
                        اضافه کردن
                    </button>
                </div>
{{--                <div--}}
{{--                    class="w-full mt-4 lg:mt-0 lg:w-[60%]  p-2 rounded-xl space-y-1.5  bg-fdf5e1 border-1 border-f79145  ">--}}
{{--                    <div class="flex items-center space-x-2 w-full">--}}
{{--                        <img src="{{asset('chartFront/assets/icons/Asset6.svg')}}" alt="" class="w-6">--}}
{{--                        <p class="font-semibold">کاربر گرامی آپلود به درستی انجام نشددوباره تلاش کنید.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </form>
    <form method="POST" action="{{route('panel.upload_excel.copen')}}" enctype="multipart/form-data" class="flex items-center w-full  p-4 bg-white rounded-lg">
        @csrf
        <input type="file" accept=".xlsx" id="copen" name="copen" class="hidden">
        <div class="flex flex-wrap items-center space-x-4 w-full">
            <h1 class="text-012b38 font-bold text-xl w-full lg:w-[14%] xl:w-[13%]">آپلود کارت کوپن شارژ :</h1>
            <div class="  flex flex-wrap items-center justify-center lg:justify-start w-full lg:w-[83%]  lg:space-x-4">
                <div class="w-full lg:w-[35%]   lg:space-x-2 flex flex-wrap items-center ">

                    <div class="copen mb-2 border-1 w-full lg:w-[48%]  border-dcdde1  cursor-pointer bg-d8d8d8 rounded-lg cursor-pointer ">
                        <div class="flex items-center space-x-2 py-1.5 px-2">
                            <h1
                                class="font-semibold text-122e4d font-semibold text-bases"
                            >
                                آپلود اکسل
                            </h1>
                            <img src="{{asset('chartFront/assets/icons/upload.png')}}" alt=""/>
                        </div>
                    </div>
                    <button type="submit"
                            class="mb-2 border-1 w-full lg:w-[48%]   border-dcdde1  cursor-pointer bg-2e799a rounded-lg py-[8px] text-white px-2 font-bold">
                        اضافه کردن
                    </button>
                </div>
                {{--                <div--}}
                {{--                    class="w-full mt-4 lg:mt-0 lg:w-[60%]  p-2 rounded-xl space-y-1.5  bg-fdf5e1 border-1 border-f79145  ">--}}
                {{--                    <div class="flex items-center space-x-2 w-full">--}}
                {{--                        <img src="{{asset('chartFront/assets/icons/Asset6.svg')}}" alt="" class="w-6">--}}
                {{--                        <p class="font-semibold">کاربر گرامی آپلود به درستی انجام نشددوباره تلاش کنید.</p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </form>

@endsection

@section('script-tag')
    <script>
        const event=new MouseEvent('click',{bubbles:true})
        const btnChargeSubmit=document.querySelector('.uploadCharge');
        const warrantyeSubmit=document.querySelector('.warrantye');
        const copenSubmit=document.querySelector('.copen');
        copenSubmit.addEventListener('click',function (){
            const event=new MouseEvent('click',{bubbles:true})
            document.getElementById('copen').dispatchEvent(event);
        })
        btnChargeSubmit.addEventListener('click',function (){
            const event=new MouseEvent('click',{bubbles:true})
            document.getElementById('uploadCharge').dispatchEvent(event);
        })
        warrantyeSubmit.addEventListener('click',function (){
            const event=new MouseEvent('click',{bubbles:true})
            document.getElementById('warrantye').dispatchEvent(event);
        })

    </script>

@endsection
