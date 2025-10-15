@extends('panel.layouts.master')

@section('content')

    <article class="flex  justify-between flex-wrap w-full">
        <form action="{{route('panel.config.off')}}"  method="POST" class="bg-white p-4 rounded-lg w-full mb-2 lg:w-[49%] xl:w-[27%]">
            @csrf
            <div class="flex items-center space-x-2 mb-2">
                <img src="{{asset('chartFront/assets/images/off.jpg')}}" alt="" class="w-10">
                <h1 class="font-semibold text-2e799a text-xl">وضعیت سامانه</h1>
            </div>
            <div class="flex items-center space-x-2 space-x-4">
                <p class="font-semibold text-lg text-012b38 mb-2">
                    وضعیت ارسال پیامک از سامانه
                </p>

                <div>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="on" class="sr-only peer" id="status_system" name="status_system"@if($config->status=='on') checked="checked" @endif>
                        <div class="tr relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:end-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                    </label>
                </div>

            </div>
        </form>
        <div class="bg-white p-4 rounded-lg w-full mb-2 lg:w-[49%] xl:w-[36%]">
            <div class="flex items-center space-x-2 mb-2">
                <img src="{{asset('chartFront/assets/images/gallery.jpg')}}" alt="" class="w-10">
                <h1 class="font-semibold text-2e799a text-xl">آپلودبنر</h1>
            </div>
            <div class="flex flex-col justify-center">
                <form action="{{route('panel.config.upload_baner')}}" method="POST" class="mt-4 flex items-center space-x-2" enctype="multipart/form-data" >
                    @csrf
                    <input type="file" id="photo_baner" name="photo_baner" class="hidden">

                    <h1 class="text-012b38 text-md font-semibold">آپلود بنر صفحه داشبورد :</h1>
                    <div class="bg-dcdde1 flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 photo_baner cursor-pointer">
                        <p class="font-semibold text-base text-012b38">آپلود تصویر</p>
                        <img src="{{asset('chartFront/assets/images/upload.jpg')}}" alt="" class="w-8">
                    </div>
                    <button type="submit" class="transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2">
                        <p class="font-semibold text-base text-white">اضافه کردن</p>
                    </button>
                </form>
                <form method="POST" action="{{route('panel.config.dashboard_baner')}}" class="mt-4 flex items-center space-x-2" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="dashboard_baner" name="dashboard_baner" class="hidden">
                    <h1 class="text-012b38 text-md font-semibold">آپلود بنر صفحه آپلود اکسل ها :</h1>

                    <div class="bg-dcdde1 flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 cursor-pointer dashboard_baner">
                        <p class="font-semibold text-base text-012b38">آپلود تصویر</p>
                        <img src="{{asset('chartFront/assets/images/upload.jpg')}}" alt="" class="w-8">
                    </div>
                    <button type="submit" class="transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2">
                        <p class="font-semibold text-base text-white">اضافه کردن</p>
                    </button>
                </form>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg w-full mb-2 lg:w-[49%] xl:w-[36%]">
            <div class="flex items-center space-x-2 mb-2">
                <img src="{{asset('chartFront/assets/images/role.jpg')}}" alt="" class="w-10">
                <h1 class="font-semibold text-2e799a text-xl">نقش ها و دسترسی کاربران</h1>
            </div>
            <div class="flex flex-col justify-center">
                <div class="mt-4 flex items-center space-x-2">
                    <h1 class="text-012b38 text-md font-semibold">اضافه کردن نقش جدید :</h1>
                    <div>
                        <input type="text" id="role" class="rounded-lg outline-none border border-dcdde1 px-2 py-1">
                    </div>
                    <div class="transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2 " id="role_submit">
                        <p class="font-semibold text-base text-white">اضافه کردن</p>
                    </div>
                </div>
                <div>
                    <p class="text-012b38 font-semibold mt-2">لیست نقش موجود در سامانه</p>
                    <div class="mt-4 flex items-center space-x-2  flex-wrap" id="role_item">

                            @foreach($roles as $role)
                            <span class="rounded-lg px-4 mt-2 py-1 bg-2e799a font-semibold text-white">{{$role->name}}</span>

                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="bg-white p-4 rounded-lg w-full mb-2 lg:w-[49%] xl:w-[36%]">
            <div class="flex items-center space-x-2 mb-2">
                <img src="{{asset('chartFront/assets/images/group.jpg')}}" alt="" class="w-10">
                <h1 class="font-semibold text-2e799a text-xl">برندهای گروه بازرگانی چتر</h1>
            </div>
            <div class="flex flex-col justify-center">
                <div class="mt-4 flex items-center space-x-2">
                    <h1 class="text-012b38 text-md font-semibold">اضافه کردن برند جدید :</h1>
                    <div>
                        <input type="text" class="rounded-lg outline-none border border-dcdde1 px-2 py-1">
                    </div>
                    <div class="transition-all eleHover bg-2e799a flex items-center rounded-lg px-4 py-1.5 max-w-max space-x-2" id="baner_submit">
                        <p class="font-semibold text-base text-white">اضافه کردن</p>
                    </div>
                </div>
                <div>
                    <p class="text-012b38 font-semibold mt-2">لیست برندهای موجود در سامانه</p>
                    <div class="mt-4 flex items-center space-x-2 flex-wrap" id="baner_item">
                        @foreach($brands as $brand)
                            <span class="rounded-lg px-4 py-1 mt-2 bg-2e799a font-semibold text-white">{{$brand->name}}</span>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </article>


@endsection

@section('script-tag')
    <script>
        const offBtn=document.getElementById('status_system');
        offBtn.addEventListener('change',function (e){
            e.target.closest('form').submit();
        });
    </script>
    <script>
        const uploadBarner=document.querySelector('.photo_baner');
        uploadBarner.addEventListener('click',function (e){
            const input=document.getElementById('photo_baner');
            const click=new MouseEvent('click',{bubbles:true});
            input.dispatchEvent(click)
        })
        const uploadDashboard=document.querySelector('.dashboard_baner');
        uploadDashboard.addEventListener('click',function (e){
            const input=document.getElementById('dashboard_baner');
            const click=new MouseEvent('click',{bubbles:true});
            input.dispatchEvent(click)
        })
    </script>

    <script src="{{asset('chartFront/assets/js/ajax/ajax.js')}}"></script>

    <script>
        function addRole() {
            let value = '';
            const addPrefix = document.getElementById('role_submit');
            let prevPrefix = addPrefix.previousElementSibling.firstElementChild;
            prevPrefix.addEventListener('input', function (ele) {
                if (ele.target.value.length > 0) {
                    value = ele.target.value;
                }
            })
            addPrefix.addEventListener('click', function (e) {

                if (value) {


                    const data = {
                        csrfToken: "{{csrf_token()}}",
                        'role': value,
                    }
                    const sendRequest = new AjaxRequest("{{route('panel.config.role_store')}}", 'POST', data)
                    sendRequest.send(function (xhr) {
                        const response = JSON.parse(xhr.responseText);

                        if (sendRequest.status) {
                            sweetAlert(response.message)
                            const span = document.createElement('span');

                            span.classList.add('rounded-lg', 'px-4','mt-2', 'py-1', 'px-4', 'font-semibold', 'text-white','bg-2e799a');
                            span.innerText = response.data.name;
                            console.log(response.data.name,span)
                            document.getElementById('role_item').append(span)
                            prevPrefix.value = '';
                        } else {
                            Object.entries(response.errors).map(([name, [value]]) => {
                                setError(value)
                            })
                        }
                    })
                } else {
                    setError('نام نقش نمیتواند خالی باشد')
                }

            });
        }
        function addBaner() {
            let value = '';
            const addPrefix = document.getElementById('baner_submit');
            console.log(addPrefix)
            let prevPrefix = addPrefix.previousElementSibling.firstElementChild;
            prevPrefix.addEventListener('input', function (ele) {
                if (ele.target.value.length > 0) {
                    value = ele.target.value;
                }
            })
            addPrefix.addEventListener('click', function (e) {

                if (value) {


                    const data = {
                        csrfToken: "{{csrf_token()}}",
                        'baner': value,
                    }
                    const sendRequest = new AjaxRequest("{{route('panel.config.baner_store')}}", 'POST', data)
                    sendRequest.send(function (xhr) {
                        const response = JSON.parse(xhr.responseText);

                        if (sendRequest.status) {
                            sweetAlert(response.message)
                            const span = document.createElement('span');

                            span.classList.add('rounded-lg', 'px-4','mt-2', 'py-1', 'px-4', 'font-semibold', 'text-white','bg-2e799a');
                            span.innerText = response.data.name;
                            console.log(response.data.name,span)
                            document.getElementById('baner_item').append(span)
                            prevPrefix.value = '';
                        } else {
                            Object.entries(response.errors).map(([name, [value]]) => {
                                setError(value)
                            })
                        }
                    })
                } else {
                    setError('نام بنر نمیتواند خالی باشد')
                }

            });
        }

        addRole();
        addBaner();
    </script>
@endsection
