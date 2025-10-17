<script src="{{ asset('chartFront/assets/js/chart/chart.js') }}"></script>
<script src="{{ asset('chartFront/assets/js/chart/chart.js') }}"></script>
<script src="{{ asset('chartFront/assets/js/chart/bar.js') }}"></script>
<script src="{{ asset('chartFront/assets/js/chart/pie.js') }}"></script>
<script src="{{ asset('chartFront/assets/js/saidbar/saidBar.js') }}"></script>
<script src="{{ asset('chartFront/toast/toastify-js.js') }}"></script>
<script src="{{ asset('chartFront/sweetAlert/sweetalert2@11.js') }}"></script>


<script>
    document.querySelector('.upload').addEventListener('click', function (e) {
        const data = e.currentTarget.dataset.name;
        const input = document.querySelector(`input[data-name=${data}]`);
        const click = new MouseEvent('click', {bubbles: true});
        input.dispatchEvent(click)

    })

    function setError(message) {
        Toastify({
            text: message,
            duration: 5000,
            newWindow: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
                background: "linear-gradient(to right, #ff7f7f, #cc0000)",
                color: 'black'
            },
            onClick: function () {
            }
        }).showToast();
    }
    function sweetAlert(message) {
        Swal.fire({
            title: message,
            icon: "success",
            draggable: true
        })
    }
</script>

<script>
    const profile=document.querySelector('.profile');
        profile.addEventListener('click',function (e){
           const elem = e.currentTarget.firstElementChild;
           if(elem.classList.contains('opacity-0')){
               elem.classList.remove('opacity-0');
               elem.classList.add('opacity-100');
               elem.classList.remove('translate-y-[40px]');
               elem.classList.remove('-z-[10]');
               elem.classList.add('z-[10]');
           }else {
               elem.classList.add('opacity-0');
               elem.classList.remove('opacity-100');
               elem.classList.add('translate-y-[40px]');
               elem.classList.add('-z-[10]');
               elem.classList.remove('z-[10]');

           }
        })
</script>
