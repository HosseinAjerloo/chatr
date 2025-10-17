@include('panel.layouts.head')
@yield(section: 'head-tag')

<body class="bg-eaecf6 overflow-x-hidden">


    <main class="flex justify-between">
       @include('panel.layouts.aside')
        <section class="w-full xl:w-4/5 transition-all">
            @include('panel.layouts.header')

            <section class="p-4 w-full">
                @yield('content')

            </section>
        </section>
    </main>
    @yield(section: 'script-tag')
    @include('panel.toast.error')
    @include('panel.sweet.success')
    @include('panel.layouts.script')
</body>

</html>
