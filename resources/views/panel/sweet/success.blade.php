@if (session('success'))
    <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                draggable: true
            })

    </script>
@endif
