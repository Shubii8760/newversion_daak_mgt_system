<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daak_Management_System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    @include('layout_public.nav');



    <div class="container-fluid bg-light text-center mt-5">
        {{-- <h3 class="margin">Where To Find Me?</h3> --}}
        <br>
        <div class="row">
            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic2.jpg') }}" class="img-responsive margin" style="width:80%"
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
                <img src="{{ asset('assets/images/pic2.jpg') }}" class="img-responsive margin" style="width:80%"
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
                <img src="{{ asset('assets/images/pic3.jpg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>

            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic3.jpg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>

            <div class="col-sm-4 text-dark">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
                <img src="{{ asset('assets/images/pic3.jpg') }}" class="img-responsive margin" style="width:80%"
                    alt="Image">
            </div>
        </div>
    </div>
<hr>


    <div class="container-flex text-center mt-3" >
        <footer class=" container-fluid  text-light bg-dark">
            <div class="row">

                <p>Copyright © 2023 Shubham sharma</p>
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.2.0

            </div>
        </footer>
    </div>

</body>

</html>
