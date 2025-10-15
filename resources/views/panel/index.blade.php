@extends('panel.layouts.master')
@section('content')
    <article class="flex items-center justify-between mb-4 flex-wrap">
        <div class="p-3 rounded-xl space-y-1.5 w-full xl:w-[24%] sm:w-[49%] mb-2">
            <h1 class="font-bold text-[1.8rem]">سلام خوش آمدید!</h1>
            <p class="text-sm text-gray-600">
                سامانه مدیریتی گروه بازرگانی چتر
            </p>
        </div>
        @foreach($operators as $operator)
            @if($operator->chargeCode()->count()<=50)
                <div
                    class="p-3 rounded-xl space-y-1.5 w-full bg-fdf5e1 border-1 border-f79145 xl:w-[24%] sm:w-[49%] mb-2">
                    <div class="flex items-center space-x-2 w-full">
                        <img src="{{ asset('chartFront/assets/icons/Asset6.svg') }}" alt="" class="w-6"/>
                        <p class="font-semibold">هشدار {{$operator->name}}</p>
                    </div>
                    <p class="font-semibold">فقط {{$operator->chargeCode()->count()}} عدد مانده است ، لطفا شارژ کنید</p>
                </div>
            @endif
        @endforeach
    </article>
    <article class="flex items-center justify-between mb-4 flex-wrap">
        <div
            class="text-white p-3 rounded-xl space-y-1.5 bg-linear-100 from-2e799a to-1f978c to-60 border-1 border-dcdde1 w-full sm:w-[49%] w-[19%] xl:w-[19%] mb-2 shadow shadow-md shadow-black/50">
            <div class="flex items-center text-sm space-x-2 w-full">
                <img src="{{ asset('chartFront/assets/icons/Asset3.svg') }}" alt="" class="w-6"/>
                <p>تعداد کد های گارانتی</p>
            </div>
            <div class="font-semibold text-2xl flex items-center justify-center">
                <p class="tracking-[20px]">{{$warrantyes->count()}} عدد</p>
            </div>
        </div>
        <div
            class="text-white p-3 rounded-xl space-y-1.5 bg-linear-100 from-ef3f5d to-f1778b to-60 border-1 border-dcdde1 w-full sm:w-[49%] w-[19%] xl:w-[19%] mb-2 shadow shadow-md shadow-black/50">
            <div class="flex items-center text-sm space-x-2 w-full">
                <img src="{{ asset('chartFront/assets/icons/Asset4.svg') }}" alt="" class="w-6"/>
                <p>تعداد کد کپن های شارژ</p>
            </div>
            <div class="font-semibold text-2xl flex items-center justify-center">
                <p class="tracking-[20px]">{{$giftCodes->count()}} عدد</p>
            </div>
        </div>
        @foreach($operators as $operator)
        <div
            class="text-white p-3 rounded-xl space-y-1.5 @if($operator->id==1) bg-linear-100 from-f36c31 to-eea75f to-60 @else bg-linear-100 from-079567 to-61c2a1 to-60 @endif  border-1 border-dcdde1 w-full sm:w-[49%] w-[19%] xl:w-[19%] mb-2 shadow shadow-sm shadow-black/50">
            <div class="flex items-center text-sm space-x-2 w-full">
                <img src="{{ asset('chartFront/assets/icons/Asset5.svg') }}" alt="" class="w-6"/>
                <p>موجودی {{$operator->name??''}}</p>
            </div>
            <div class="font-semibold text-2xl flex items-center justify-center">
                <p class="tracking-[20px]">{{$operator->chargeCode()->count()}} عدد</p>
            </div>
        </div>
        @endforeach

    </article>
    <article class="flex items-center w-full mb-4">
        <img src="{{asset($config->photo?->path??'chartFront/assets/images/baner.png')}}" alt=""
             class="rounded-xl shadow shadow-md shadow-black/50"/>
    </article>
    <article
        class="border border-2 border-dcdde1 bg-white p-6 flex items-center justify-between mb-4 flex-wrap rounded-xl">
        <div class="w-full flex items-center space-x-2 space-y-2">
            <img src="chartFront/assets/icons/Asset19.svg" alt="" class="w-10"/>
            <p class="font-semibold text-lg text-268ec8">
                خروجی اکسل آخرين پيامها
            </p>
        </div>
        <div class="w-full flex items-center space-x-2 flex-wrap">
            <p class="font-semibold text-lg w-full md:w-[auto]">
                از (روز-ماه-سال):
            </p>
            <input type="text"
                   class="py-1.5 px-2 border border-dcdde1 outline-none text-gray-600 rounded-xl w-full sm:w-[30%] xl:w-[25%] 2xl:w-[20%]"
                   placeholder="1404-01-01"/>
            <span class="font-semibold text-lg w-full sm:w-[auto] mt-2 sm:mt-0 flex">تا</span>
            <input type="text"
                   class="py-1.5 px-2 border border-dcdde1 outline-none text-gray-600 rounded-xl w-full sm:w-[30%] xl:w-[25%] 2xl:w-[20%]"
                   placeholder="1404-01-01"/>
            <button
                class="py-2 px-4 bg-2e799a border border-dcdde1 text-md text-white rounded-lg transition-all duration-700 eleHover mt-2 sm:m-0">
                دریافت فایل
            </button>
        </div>
    </article>
    <article
        class="border border-2 border-dcdde1 bg-white p-6 flex items-center justify-between mb-4 flex-wrap rounded-xl space-y-4">
        <div class="flex items-center space-x-2 space-y-2 w-full md:w-[30%]">
            <img src="chartFront/assets/icons/Asset18.svg" alt="" class="w-10 h-10"/>
            <p class="font-semibold text-lg text-268ec8">
                جدول آخرين تعاملها
            </p>
        </div>
        <div class="flex items-center justify-end space-x-2 w-full md:w-[60%]">
            <input type="text"
                   class="w-full md:w-[50%] xl:w-[38%] py-1.5 px-2 border border-dcdde1 outline-none text-gray-600 rounded-xl"
                   placeholder="جستجودرتعامل ها"/>
            <button
                class="py-1.5 px-6 bg-2e799a border border-dcdde1 text-sm text-white rounded-lg transition-all duration-700 eleHover">
                جستجو
            </button>
        </div>

        <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full sticky top-[80px]">
                <thead
                    class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">تاريخ /ساعت (شمسی)</th>
                    <th scope="col" class="px-6 py-3">شماره</th>
                    <th scope="col" class="px-6 py-3">اپراتور</th>
                    <th scope="col" class="px-6 py-3">خروجی</th>
                </tr>
                </thead>
                <tbody>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        00:27 1404-07-07
                    </th>
                    <td class="px-6 py-4">09186414452</td>
                    <td class="px-6 py-4">همراه اول</td>
                    <td class="px-6 py-4 text-left">
                        مشتری گرامی، گارانتی شما در تاريخ ١٤٠٤-٠٧-٠٧ فعال شد. با
                        تشکر! گروه بازرگانی چتر
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-center mt-4 w-full">
            <ul
                class="flex w-full sm:w-2/3 lg:w-1/2 xl:w-[40%] 2xl:w-[34%] items-center space-x-2 px-6 py-2 rounded-2xl shadow shadow-md shadow-black/20 border border-black/50">
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    <
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    1
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    2
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    3
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    chartFront.
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    30
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    31
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    32
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    33
                </li>
                <li
                    class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    >
                </li>
            </ul>
        </div>
    </article>
    <article
        class="border border-2 border-dcdde1 bg-white p-6 flex items-center justify-between mb-4 flex-wrap rounded-xl space-y-4">
        <div class="flex items-center space-x-2 space-y-3 w-full md:w-[30%]">
            <img src="chartFront/assets/icons/Asset17.svg" alt="" class="w-10 h-10"/>
            <p class="font-semibold text-lg text-268ec8">
                نمودار تعداد پيامهای ارسالی در ٣٠ روز اخیر
            </p>
        </div>
        <div class="w-full relative h-[300px] md:h-[600px]">
            <canvas id="myBarChart"></canvas>
        </div>
    </article>
    <article class="w-full flex flex flex-wrap items-center justify-between mb-4">
        <div class="w-full lg:w-[49%] border border-2 border-dcdde1 rounded-lg p-4 bg-white">
            <div class="flex items-center space-x-2 space-y-3">
                <img src="chartFront/assets/icons/Asset14.svg" alt="" class="w-8"/>
                <h1 class="font-semibold text-lg text-268ec8">
                    نمودار رتبه بندی مشتريان
                </h1>
            </div>
            <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-center border border-dcdde1">
                    <thead
                        class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3 border border-1 border-dcdde1">
                            رتبه
                        </th>
                        <th class="px-6 py-3 border border-1 border-dcdde1">
                            شماره
                        </th>
                        <th class="px-6 py-3 border border-1 border-dcdde1">
                            تعداد
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            1
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            2
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            3
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            4
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            5
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            6
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            7
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            8
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            9
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            10
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            09186414452
                        </td>
                        <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                            34
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div
            class="w-full lg:w-[49%] border border-2 border-dcdde1 rounded-lg p-4 bg-white flex-wrap items-center">
            <div class="flex items-center space-x-2 space-y-3">
                <img src="chartFront/assets/icons/Asset13.svg" alt="" class="w-8"/>
                <h1 class="font-semibold text-lg text-268ec8">
                    نمودار توزيع اپراتورها برحسب اپراتورها
                </h1>
            </div>
            <div class="w-full relative h-[300px] md:h-[532px] flex items-center justify-center">
                <canvas id="myPieChart"></canvas>
            </div>
        </div>
    </article>
    <article class="flex items-center items-center justify-between flex-wrap mb-4">
        <div
            class="flex items-center space-x-2 bg-white border border-dcdde1 rounded-lg p-6 w-full xl:w-[57%] mb-2">
            <img src="chartFront/assets/icons/Asset15.svg" alt="" class="w-5"/>
            <p class="font-bold">
                تا کنکون تعداد ١٢٤٠ نفر گارانتی محصول خود را فعال کردند. تا
                کنکون تعداد ٥٦٢٣ نفر از کوپن شارژ خود کردند.
            </p>
        </div>
        <div
            class="flex items-center space-x-2 bg-white border border-dcdde1 rounded-lg p-6 w-full xl:w-[42%] mb-2">
            <img src="chartFront/assets/icons/Asset15.svg" alt="" class="w-5"/>
            <p class="font-bold">
                تا کنکون تعداد ٥٦٢٣ نفر از کوپن شارژ خود کردند.
            </p>
        </div>
    </article>
    <article class="flex items-center items-center justify-center flex-wrap mb-4">
        <p>
            کاربر گرامی! تمامی حقوق مادی و معنوی این سامانه متعلق به
            <span class="font-semibold text-268ec8">گروه بازرگانی چتر</span>
            می باشد و هر گونه کپی بردازی و استفاده از محتوای این سامانه پيگرد
            حقوقی دارد.
        </p>
    </article>
@endsection
