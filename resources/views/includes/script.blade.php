  <!-- Bootstrap core JavaScript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('backend/js/sb-admin-2.min.js') }}"></script>
<script type="text/javascript" language="javascript">

        var idleTime = 0;
        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime = 1) {
                window.location="/logout";
            }
        }

        var timeout;
        document.onmousemove = function(){
        clearTimeout(timeout);
        timeout = setTimeout(timerIncrement, 60000*15);
        }

</script>

