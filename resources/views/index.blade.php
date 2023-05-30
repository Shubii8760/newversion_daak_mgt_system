<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daak_Management_System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- toastr css  --}}
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>

<body>

    @include('layout_public.nav');
    <div class="container-fluid bg-light text-center mt-5">
        <br>
        <div class="row">
            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic16.jpg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>
            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic2.jpg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>
            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic9.jpeg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>
        </div>
    </div>
    <hr>

    <div class="container-fluid bg-light text-center mt-4">
        <h3 class="margin">Where To Find Me?</h3><br>
        <div class="row">
            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic10.jpeg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>

            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic8.jpeg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>

            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic13.jpg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>
        </div>
    </div>
    <hr>


    <div class="container-flex text-center mt-3">
        <footer class=" container-fluid  text-light bg-dark">
            <div class="row">

                <p>Copyright © 2023 Shubham sharma</p>
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0

                </div>
        </footer>
    </div>


    {{-- toastr js  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}")
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if (session('warning'))
            toastr.warning("{{ session('warning') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
        @endif
    </script>

</body>

</html>
