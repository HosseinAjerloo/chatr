<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود به بازرگانی چتر</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('FontAwesome/all.min.css')}}">
    <script src="{{ asset('chartFront/assets/FontAwesome.Pro.6.7.1/Web/js/all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('chartFront/toast/toastify.min.css') }}">


</head>
<body class="overflow-x-hidden">
@include('panel.layouts.script')
@include('panel.toast.error')
<div class="w-full relative flex items-center justify-center h-screen bg-gradient-to-b from-[#261132] from-[52%] via-[#211f4a] via-[82%] to-[#7f8fc2] to-[130%]">
    <div class="absolute right-[50%] top-[10%] w-[300px]  h-[250px] -translate-x-[-50%] bg-rose-900 blur-[90px]	"></div>
    <div class="absolute right-[23%] bottom-[10%] w-[250px]  h-[250px] bg-sky-200 blur-[150px]	"></div>
    <div class="absolute right-[25%] bottom-[17%] w-[300px]  h-[200px] bg-sky-300/70 blur-[180px]"></div>
    <div class="absolute left-[25%] bottom-[17%] w-[300px]  h-[300px] bg-orange-700  blur-[160px]"></div>
    <article class="w-[90%] sm:w-2/3  md:w-1/2 lg:w-1/3 xl:w-1/4 rounded-xl backdrop-blur-sm bg-white/10 px-4 h-[500px]  flex flex-col justify-evenly py-10">
        <div class="flex  mb-[20px] items-center  w-full justify-center py-1.5 px-2">
            <img src="{{asset('login.png')}}" alt="" class="w-[300px]">
        </div>
        <form action="{{route('login.login')}}" method="POST" class="w-full flex items-center justify-between flex-col space-y-6">
                @csrf
            <div class="w-[90%] mb-4 border-b-2 border-b-white flex items-center justify-between ">
                <input name="username" class=" outline-none text-white py-2 bg-transparent w-[90%] " placeholder="USERNAME">
                <i class="fa-solid fa-user text-white text-xl"></i>
            </div>
            <div class="w-[90%] mb-4 border-b-2 border-b-white flex items-center justify-between  ">
                <input name="password" class="outline-none text-white py-2 bg-transparent w-[90%]" placeholder="PASSWORD">
                <i class="fa-solid fa-lock text-xl text-white"></i>
            </div>

            <div class="w-[90%] flex items-center justify-center  cursor-pointer">
                <button class="py-2 px-8 bg-gradient-to-r from-rose-900/70 from-[30%]  to-sky-700 w-1/2 rounded-lg text-lg text-white font-bold cursor-pointer" >ورود</button>
            </div>
        </form>
    </article>
</div>


</body>
</html>
