@extends('panel.layouts.master')

@section('content')

    <article class="flex  justify-between flex-wrap w-full">

        <form action="{{route('panel.operator.update',$operator)}}" method="POST" class="bg-white p-4 rounded-lg mb-2 w-[49%]">
            @csrf
            @method('PUT')
            <div class="flex items-center space-x-2 mb-2">
                <i class="fa-solid fa-user-headset text-2e799a"></i>
                <h1 class="font-semibold text-2e799a text-xl"> اپراتور {{$operator->name}}</h1>
            </div>
            <div class="flex flex-col justify-center">
                <div class="mt-4 flex items-center space-x-2">
                    <h1 class="text-012b38 text-md font-semibold">نام اپراتور :</h1>
                    <div>
                        <input type="text" name="name" class="rounded-lg outline-none border border-dcdde1 px-2 py-1" value="{{old('name',$operator->name)}}">
                    </div>
                    <button type="submit" class="transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 " >
                        <p class="font-semibold text-base text-white">ویرایش کردن</p>
                    </button>
                    <a href="{{route('panel.operator.destroy',$operator)}}" class="transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 bg-rose-700" >
                        <p class="font-semibold text-base text-white">حذف</p>
                    </a>
                </div>
                <div>
                    <p class="text-012b38 font-semibold mt-2">پیش شماره های {{$operator->name}} </p>
                    <div class="mt-4 flex items-center space-x-2  flex-wrap" id="role_item">
                        @foreach($operator->prefix as $prefix)
                            <span data-action="{{route('panel.operator.update_prefix',$prefix)}}" data-delete="{{route('panel.operator.destroy_prefix',$prefix)}}" class="prefix_number rounded-lg px-4 mt-2 py-1 bg-2e799a font-semibold text-white cursor-pointer transition-all eleHover hover:scale-[1.05]">{{$prefix->prefix_num??''}}</span>

                        @endforeach


                    </div>

                </div>
            </div>
        </form>
        <form id="form"  class="bg-white p-4 rounded-lg  mb-2 w-[49%]">
            @csrf
            @method('PUT')
            <div class="flex items-center space-x-2 mb-2">
                <h1 class="font-semibold text-2e799a text-xl"> پیش شماره های {{$operator->name}}</h1>
            </div>
            <div class="flex flex-col justify-center">
                <div class="mt-4 flex items-center space-x-2">
                    <h1 class="text-012b38 text-md font-semibold">پیش شماره :</h1>
                    <div>
                        <input type="text" name="prefix_num" class="rounded-lg outline-none border border-dcdde1 px-2 py-1 prefix_box ">
                    </div>
                    <button type="submit" class="transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 " id="role_submit">
                        <p class="font-semibold text-base text-white">ویرایش کردن</p>
                    </button>
                    <a  class="destroy transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 bg-rose-700" >
                        <p class="font-semibold text-base text-white">حذف</p>
                    </a>
                </div>

            </div>
        </form>


    </article>


@endsection

@section('script-tag')

    <script>
        const prefix_number=document.querySelectorAll('.prefix_number');
        const prefix_box=document.querySelector('.prefix_box');
        prefix_number.forEach((elem)=>{
            elem.addEventListener('click',function (e){
                prefix_box.value=e.currentTarget.innerText
                document.querySelector('.destroy').setAttribute('href',e.currentTarget.dataset.delete)
                const form=document.getElementById('form');
                form.setAttribute('method','POST');
                form.setAttribute('action',e.currentTarget.dataset.action);
            })
        })
    </script>
@endsection

