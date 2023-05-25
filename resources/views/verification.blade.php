<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Verify Your Account</p>
                                    <p id="message_error" style="color:red;"></p>
                                    <p id="message_success" style="color:green;"></p>

                                    <form action="{{ route('verifiedOtp') }}" method="post" id="verificationForm" class="mx-1 mx-md-4">

                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label font-weight-bold" for="">Your
                                                    Email</label>
                                                <input type="text" name="email" id="" class="form-control"
                                                    value="{{ $email }}" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label font-weight-bold" for="">Enter
                                                    Otp</label>
                                                <input type="number" name="otp" class="form-control"
                                                    placeholder="Enter OTP" required>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-info btn-lg">Verify</button>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <p class="time"></p>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>












{{--
    <p id="message_error" style="color:red;"></p>
<p id="message_success" style="color:green;"></p>
<form method="post" id="verificationForm">
    @csrf
    <input type="email" name="email" value="{{ $email }}"><br><br>
    <input type="number" name="otp" placeholder="Enter OTP" required>
    <br>
    <br>
    <button type="submit">Verify</button>
</form>
    <button id="resendOtpVerification">Resend Verification OTP</button> --}}



    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

    <script>
        function timer() {
            var seconds = 30;
            var minutes = 1;
            var timer = setInterval(() => {

                if (minutes < 0) {
                    $('.time').text('');
                    clearInterval(timer);
                } else {
                    let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                    let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                    $('.time').text(tempMinutes + ':' + tempSeconds);
                }
                if (seconds <= 0) {
                    minutes--;
                    seconds = 59;
                }
                seconds--;
            }, 1000);
        }


        // $(document).ready(function() {
        //     $('#verificationForm').submit(function(e) {
        //         e.preventDefault();
        //         var formData = $(this).serialize();
        //         console.log('test');

        //         $.ajax({
        //             url: "{{ route('verifiedOtp') }}",
        //             type: "POST",
        //             data: formData,
        //             success: function(res) {
        //                 if (res.success) {
        //                     alert(res.msg);
        //                 } else {
        //                     $('#message_error').text(res.msg);
        //                     setTimeout(() => {
        //                         $('#message_error').text('');
        //                     }, 3000);
        //                 }
        //             }
        //         });
        //     });
        // });

        if ($('#verificationForm').length > 0) {
            timer();
        }
    </script>
</body>

</html>
