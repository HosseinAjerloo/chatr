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
            @if($operator->chargeCode()->where('used',0)->count()<=50)
                <div
                    class="p-3 rounded-xl space-y-1.5 w-full bg-fdf5e1 border-1 border-f79145 xl:w-[24%] sm:w-[49%] mb-2">
                    <div class="flex items-center space-x-2 w-full">
                        <img src="{{ asset('chartFront/assets/icons/Asset6.svg') }}" alt="" class="w-6"/>
                        <p class="font-semibold">هشدار {{$operator->name}}</p>
                    </div>
                    <p class="font-semibold">فقط {{$operator->chargeCode()->where('used',0)->count()}} عدد مانده است ،
                        لطفا شارژ کنید</p>
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
                    <p class="tracking-[20px]">{{$operator->chargeCode()->where('used',0)->count()}} عدد</p>
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
                   class="start py-1.5 px-2 border border-dcdde1 outline-none text-gray-600 rounded-xl w-full sm:w-[30%] xl:w-[25%] 2xl:w-[20%]"
            />
            <input type="text" name="start_date" class="start_date hidden">
            <input type="text" name="end_date" class="end_date hidden">

            <span class="font-semibold text-lg w-full sm:w-[auto] mt-2 sm:mt-0 flex">تا</span>
            <input type="text"
                   class="end py-1.5 px-2 border border-dcdde1 outline-none text-gray-600 rounded-xl w-full sm:w-[30%] xl:w-[25%] 2xl:w-[20%]"
                   placeholder="1404-01-01"/>

            <button
                class="get_message py-2 px-4 bg-2e799a border border-dcdde1 text-md text-white rounded-lg transition-all duration-700 eleHover mt-2 sm:m-0">
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
                   class="searchBox w-full md:w-[50%] xl:w-[38%] py-1.5 px-2 border border-dcdde1 outline-none text-gray-600 rounded-xl"
                   placeholder="جستجودرتعامل ها"/>
            <button
                class="search py-1.5 px-6 bg-2e799a border border-dcdde1 text-sm text-white rounded-lg transition-all duration-700 eleHover">
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
                    <th scope="col" class="px-6 py-3">ورودی</th>
                    <th scope="col" class="px-6 py-3">خروجی</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sms as $pm)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{\Morilog\Jalali\Jalalian::forge($pm->created_at)->format('Y/m/d H:i:s')}}

                        </th>
                        <td class="px-6 py-4">{{$pm->mobile}}</td>

                        <td class="px-6 py-4">

                            {{$pm->operator->name??'--'}}

                        </td>


                        <td class="px-6 py-4 text-left">
                            {{$pm->messageText??'--'}}

                        </td>
                        <td class="px-6 py-4 text-left">
                            {{$pm->message_send??''}}

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
                    @if($sms->currentPage() > 1)
                        <a href="{{ $sms->previousPageUrl() }}" class="flex items-center justify-center  ">
                            <i class="fa-solid fa-angle-left flex items-center justify-center  "></i>
                        </a>
                    @else
                        <span class="flex items-center justify-center  "><i class="fa-solid fa-angle-left"></i></span>
                    @endif
                </li>
                @if($sms->currentPage() > 4)
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $sms->url(1) }}">1</a>
                    </li>
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $sms->url(2) }}">2</a>
                    </li>
                    <li>...</li>

                @endif

                @for($i = max(1, $sms->currentPage() - 2); $i < $sms->currentPage(); $i++)

                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $sms->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor


                <li
                    class="activePage font-semibold text-lg  eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                    {{ $sms->currentPage() }}
                </li>


                @for($i = $sms->currentPage() + 1; $i <= min($sms->lastPage(), $sms->currentPage() + 2); $i++)
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $sms->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if($sms->currentPage() < $sms->lastPage() - 3)
                    <li>...</li>
                    <li
                        class="font-semibold text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $sms->url($sms->lastPage()) }}">{{ $sms->lastPage() }}</a>
                    </li>
                @endif


                @if($sms->currentPage() < $sms->lastPage())

                    <li
                        class="font-semibold flex items-center justify-center  text-lg text-black eleHover p-2 w-[7%] sm:w-[15%] h-[30px] rounded-full hover:text-white transition-all duration-700 flex items-center justify-center">
                        <a href="{{ $sms->nextPageUrl() }}" class="flex items-center justify-center ">
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

                    @foreach($groupBtUser as $key=> $group)
                        <tr class="bg-white border-b border-gray-200">
                            <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                                {{$key+1}}
                            </td>
                            <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                                {{$group->mobile??''}}
                            </td>
                            <td class="px-6 py-3 text-center border border-1 border-dcdde1 font-bold">
                                {{$group->total??''}}
                            </td>
                        </tr>
                    @endforeach
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
                تا کنکون تعداد {{\App\Models\Warrantye::where('used',1)->count()}} نفر گارانتی محصول خود را فعال کردند.
            </p>
        </div>
        <div
            class="flex items-center space-x-2 bg-white border border-dcdde1 rounded-lg p-6 w-full xl:w-[42%] mb-2">
            <img src="chartFront/assets/icons/Asset15.svg" alt="" class="w-5"/>
            <p class="font-bold">
                تا کنکون تعداد {{\App\Models\GiftCode::where('used',1)->count()}} نفر از کوپن شارژ خود استفاده کردند.
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
@section('script-tag')
    <script>
        let dataBar =@json($groupDaySend);
        let dataPieres =@json($groupOerator);
    </script>

    <script>
        $(document).ready(function () {
            $('.start').persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '.start_date'
            });
            $('.end').persianDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '.end_date'
            });

        })


    </script>

    <script>
        let get_message=document.querySelector('.get_message');
        get_message.addEventListener('click',function (){
            let start=document.querySelector('.start_date');
            let end=document.querySelector('.end_date');
            if(end.value.length>0 && start.value.length>0)
            {
                const data={
                    'start_date':start.value,
                    'end_date':end.value,
                }
                let sendRequest=fetch('{{route('panel.export')}}',{
                    method:'POST',
                    body:JSON.stringify(data),
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}",
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'

                    }
                });
                sendRequest.then(response=>{
                   if(response.status!=200)
                       throw new Error('con not download');
                        return response.blob();
                }).then(result=>{
                    const createObjectUrl=URL.createObjectURL(result);
                    const link=document.createElement('a');
                    link.href=createObjectUrl;
                    link.download='sms.xlsx';
                    link.classList.add('hidden');
                    link.click();
                    link.remove();
                    URL.revokeObjectURL(createObjectUrl)
                })
            }
        })
    </script>
    <script>
        let searchBtn=document.querySelector('.search');
        let searchBox=document.querySelector('.searchBox');
        searchBtn.addEventListener('click',function (){
           if (searchBox.value.length==0)
           {
               searchBox.value='';

           }
            const url=new URL(window.location);
            url.searchParams.set('text',searchBox.value);
            window.location.href=url.toString();
        });
    </script>

@endsection
