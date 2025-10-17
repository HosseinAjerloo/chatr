@extends('panel.layouts.master')

@section('content')

    <article class="flex w-full justify-between flex-wrap space-y-4 lg:space-y-0">
        <div class="bg-white p-4 rounded-lg w-full lg:w-[58%]" id="operators">
            <div class="flex items-center space-x-2">
                <img src="{{asset('chartFront/assets/icons/sim.png')}}" alt="" class="w-8"/>
                <h1 class="font-[600] text-2e799a text-2xl">
                    لیست پیش شماره و اپراتور
                </h1>
            </div>
            @foreach($operators as $operator)
                <article class="mt-4" >
                    <a href="{{route('panel.operator.edit',$operator)}}" class="flex items-center cursor-pointer prefix-title" data-name="{{$operator->name}}">
                        <h1 class="font-bold text-122e4d text-xl">
                            پیش شماره های
                            {{$operator->name}}
                        </h1>
                    </a>
                    <div class="mt-4 flex items-center flex-wrap space-x-1.5 "
                         id="operator-{{$operator->id}}">
                        @foreach($operator->prefix as $prefix)

                            <span
                                class="flex mt-2 items-center justify-center px-4 py-2 rounded-lg border-1 bg-2e799a text-white font-bold text-lg border-dcdde1">{{$prefix->prefix_num}}</span>
                        @endforeach

                    </div>
                </article>
            @endforeach

        </div>
        <div class="w-full  lg:w-[41%] space-y-4">

            <div class="bg-white max-h-max p-4 rounded-lg">
                <div class="flex items-center space-x-2">
                    <img
                        src="{{asset('chartFront/assets/icons/addOperator.png')}}"
                        alt=""
                        class="w-8"
                    />
                    <h1 class="font-[600] text-2e799a text-lg">
                        اضافه کردن اپراتور
                    </h1>
                </div>
                <div class="flex flex-wrap mt-4 space-y-3 items-center">
                    <div class="flex items-center space-x-2 w-full w-[42%]">
                        <h1 class="font-[600] text-122e4d text-lg">
                            نام اپراتور را وارد کنید :
                        </h1>
                        <span class="cursor-pointer">لغو</span>
                    </div>
                    <div class="flex items-center space-x-2 w-full w-[56%]">
                        <input
                            type="text"
                            class="w-4/5 outline-none px-4 py-1.5 border border-dcdde1 rounded-lg"
                            placeholder="همراه اول"
                        />
                        <button id="addOperator"
                                class="w-4/5 border-1 border-dcdde1 rounded-lg px-4 py-1.5 text-white bg-2e799a transition-all eleHover"
                        >
                            اضافه کردن
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-white max-h-max p-4 rounded-lg">
                <div class="flex items-center space-x-2">
                    <img
                        src="{{asset('chartFront/assets/icons/addOperator.png')}}"
                        alt=""
                        class="w-8"
                    />
                    <h1 class="font-[600] text-2e799a text-lg">
                        اضافه کردن پیش شماره
                    </h1>
                </div>
                <div class="flex flex-wrap mt-4 space-y-3 items-center">
                    <div class="flex items-center space-x-2 w-full w-[42%]">
                        <h1 class="font-[600] text-122e4d text-lg">
                            اپراتور خود را وارد کنید:
                        </h1>
                        <div class="px-4 w-1/2 sm:w-[30%] rounded-lg border border-dcdde1 py-1 bg-012b38 text-white">
                            <select name="operator_id" id="operator" class="w-full border-none outline-none">
                                @foreach($operators as $operator)
                                    <option class="bg-012b38 text-white"
                                            value="{{$operator->id}}">{{$operator->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 w-full w-[56%]">
                        <input
                            type="text"
                            class="w-4/5 outline-none px-4 py-1.5 border border-dcdde1 rounded-lg"
                            placeholder="همراه اول"
                        />
                        <button id="addPrefix"
                                class="w-4/5 border-1 border-dcdde1 rounded-lg px-4 py-1.5 text-white bg-2e799a transition-all eleHover"
                        >
                            اضافه کردن
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </article>


@endsection
@section('script-tag')
    <script src="{{asset('chartFront/assets/js/ajax/ajax.js')}}"></script>
    <script>
        function addOperator() {
            let value = '';
            const addOperator = document.getElementById('addOperator');
            let prev = addOperator.previousElementSibling;
            prev.addEventListener('input', function (ele) {
                if (ele.target.value.length > 0) {
                    value = ele.target.value;
                }
            })
            addOperator.addEventListener('click', function (e) {

                if (value) {
                    const data = {
                        csrfToken: "{{csrf_token()}}",
                        name: value
                    }
                    const sendRequest = new AjaxRequest("{{route('panel.operator.store')}}", 'POST', data)
                    sendRequest.send(function (xhr) {
                        const response = JSON.parse(xhr.responseText);

                        if (sendRequest.status) {
                            sweetAlert(response.message)
                            console.log(response.data)
                            const options = document.createElement('option');
                            options.classList.add('bg-012b38', 'text-white');
                            options.setAttribute('value', response.data.id);
                            options.innerText = response.data.name;
                            document.getElementById('operator').appendChild(options);



                            const article=document.createElement('article');
                            article.classList.add('mt-4')
                            const operatorsFirstChild=document.createElement('div');
                            operatorsFirstChild.classList.add('flex','items-center');
                            const h1=document.createElement('h1');
                            h1.classList.add('font-bold','text-122e4d','text-xl')
                            h1.innerText=' پیش شماره های ';
                            h1.innerText+=prev.value;
                            operatorsFirstChild.appendChild(h1);
                            article.append(operatorsFirstChild)
                            document.getElementById('operators').append(article)


                            const secondChild=document.createElement('div')
                            secondChild.classList.add("mt-4",'flex','items-center','flex-wrap','space-x-1.5');

                            secondChild.setAttribute('id',`operator-${response.data.id}`)
                            article.append(secondChild)

                            prev.value = '';
                        } else {
                            Object.entries(response.errors).map(([name, [value]]) => {
                                setError(value)
                            })
                        }
                    })
                } else {
                    setError('نام اپراتور نمیتواند خالی باشد')
                }

            });
        }

        function addPrefix() {
            let value = '';
            const addPrefix = document.getElementById('addPrefix');
            let prevPrefix = addPrefix.previousElementSibling;
            prevPrefix.addEventListener('input', function (ele) {
                if (ele.target.value.length > 0) {
                    value = ele.target.value;
                }
            })
            addPrefix.addEventListener('click', function (e) {

                if (value) {

                    const select = document.getElementById('operator');
                    let selectValue = select.options[select.selectedIndex].value;
                    if (selectValue == undefined || selectValue == null) {
                        setError('لطفا اپراتور پیش شماره را انتخاب کنید');
                        return;
                    }

                    const data = {
                        csrfToken: "{{csrf_token()}}",
                        'prefix_num': value,
                        'operator_id': selectValue
                    }
                    const sendRequest = new AjaxRequest("{{route('panel.operator.storePrefix')}}", 'POST', data)
                    sendRequest.send(function (xhr) {
                        const response = JSON.parse(xhr.responseText);

                        if (sendRequest.status) {
                            sweetAlert(response.message)
                            console.log(response.data)
                            const span = document.createElement('span');
                            span.classList.add('flex', 'items-center','mt-2', 'justify-center', 'px-4', 'py-2', 'rounded-lg', 'border-1', 'bg-2e799a', 'text-white', 'font-bold', 'text-lg', 'border-dcdde1')
                            span.innerText = data.prefix_num;
                            document.getElementById(`operator-${data.operator_id}`).append(span)
                            prevPrefix.value = '';
                        } else {
                            Object.entries(response.errors).map(([name, [value]]) => {
                                setError(value)
                            })
                        }
                    })
                } else {
                    setError('پیش شماره نمیتواند خالی باشد')
                }

            });
        }

        addOperator();
        addPrefix();
    </script>

@endsection
