@extends('layout_public.app')
@section('content')
    <div class="container mt-2" id="myDivform">
        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-4"> Application </p>
        <form action="{{ route('post.complaints') }}" id="verificationForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card text-black " style="border-radius: 25px;">
                <div class="card-body p-md-4">
                    <section id="applicationform">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label font-weight-bold" for="">Your
                                    Name</label>
                                <input type="text" name="name" id="" class="form-control"
                                    value="{{ old('name') }}" />
                                <span class="text-danger font-weight-bold">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4 mt-3">
                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="email">Your Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email') }}" />
                                <span class="text-danger font-weight-bold">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-phone-square fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="number" name="phone" id="" class="form-control"
                                    value="{{ old('phone') }}" />
                                @error('phone')
                                    <span class="text-danger font-weight-bold">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="	fa fa-comment fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label" for="message">Message</label>
                                <textarea type="text" class="form-control" name="message" id="message" rows="4" value="{{ old('message') }}"></textarea>
                                @error('message')
                                    <span class="text-danger font-weight-bold">
                                        {{ $message }}
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-check  mt-3">
                            <h6 class="mb-0 me-4">Type: </h6>
                            <label class="form-check-label mt-2">
                                <input type="radio" class="form-check-input" name="type" id="flexRadioDefault1"
                                    value="complaint" {{ old('type') == 'complaint' ? 'checked' : '' }}>
                                Complaint
                            </label>
                            <br><br>
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="flexRadioDefault2"
                                    value="suggestion" {{ old('type') == 'suggestion' ? 'checked' : '' }}>
                                Suggestion
                            </label>
                        </div>
                        @error('type')
                            <span class="text-danger font-weight-bold">
                                {{ $message }}
                            </span>
                        @enderror


                        <div class="d-flex flex-row align-items-center mt-3  mb-4">
                            <i class="fa fa-file fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <label>File Upload</label>
                                <input type="file" class="form-control" name="file" value="{{ old('file') }}" />
                                <span class="text-danger font-weight-bold">
                                    @error('file')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </section>

                    <section id="myDiv">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <label class="form-label font-weight-bold" for="">Enter
                                    Otp</label>
                                <input type="number" name="otp" class="form-control" placeholder="Enter OTP" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <div class="form-outline flex-fill mb-0">
                                <button type="submit" class="btn btn-primary btn-lg">verify and
                                    submit</button>
                            </div>
                        </div>
                    </section>
                    <section id="applicationformotp">
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button class="btn btn-primary btn-lg" id="showButton">Send Otp</button>
                        </div>
                    </section>

        </form>
    </div>
@endsection

@push('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myDiv").hide();
            $("#showButton").click(function() {
                $("#myDiv").show();
                applicationform
                $("#applicationform").hide();
                $("#applicationformotp").hide();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#showButton").click(function() {
                // Make the ajax call
                var email = document.getElementById('email').value;
                console.log(email);
                console.log('test');
                $.ajax({
                    url: '{{ route('sendOtp') }}',
                    type: 'post',
                    data: {
                        'email': email,
                        "_token": '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        $('#verificationForm').html(response.data);
                    }
                });
            });
        });
    </script>
@endpush

</body>
</html>
