<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            Toastify({
                text: "{{ $error }}",
                duration: 5000,
                newWindow: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: "linear-gradient(to right, #ff7f7f, #cc0000)",
                    color:'black'
                },
                onClick: function() {} // Callback after click
            }).showToast();
        @endforeach
    @endif
</script>
