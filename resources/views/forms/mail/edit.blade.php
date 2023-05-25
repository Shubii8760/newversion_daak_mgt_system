{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>



    <div class="container mt-2">
        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-2">Edit & Update Application </p>
        <form action="{{ route('update', ['id' => $application->id]) }}" id="verificationForm" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card text-black " style="border-radius: 25px;">
                <div class="card-body p-md-3">
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label font-weight-bold fw-bolder" for="">Your
                                Name:</label>
                            <input type="text" name="name" id="" class="form-control"
                                value="{{ $application->name }}" />
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
                            <label class="form-label fw-bolder" for="email">Your Email:</label>
                            <input type="email" name="email" id="" class="form-control"
                                value="{{ $application->email }}" />
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
                            <label class="form-label fw-bolder" for="phone">Phone:</label>
                            <input type="number" name="phone" id="" class="form-control"
                                value="{{ $application->phone }}" />
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
                            <label class="form-label fw-bolder" for="message">Message:</label>
                            <textarea type="text" class="form-control" name="message" id="message" rows="4">{{ $application->message }}</textarea>
                            @error('message')
                                <span class="text-danger font-weight-bold">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-check  mt-3">
                        <h6 class="mb-0 me-4 fw-bolder">Choose: </h6>
                        <label class="form-check-label  mt-2">
                            <input type="radio" class="form-check-input" name="type" id="flexRadioDefault1"
                                value="complaint" {{ $application->type == 'complaint' ? 'checked' : '' }}>
                            Complaint:
                        </label>
                        <br><br>
                        <label class="form-check-label ">
                            <input type="radio" class="form-check-input" name="type" id="flexRadioDefault2"
                                value="suggestion" {{ $application->type == 'suggestion' ? 'checked' : '' }}>
                            Suggestion:
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
                            <label class="form-label fw-bolder">File Upload:</label>
                            <input type="file" class="form-control" name="file"
                                value="{{ $application->file }}" />
                            <span class="text-danger font-weight-bold">
                                @error('file')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <img src="/storage/images/{{ $application->file }}" alt="" height="200px">

                    <div class="d-flex flex-row align-items-center mt-4  mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label fw-bolder" for="">Select Office:</label>
                            <select class="form-select" aria-label="Default select example" name="Office">
                                <option selected>Select Office</option>
                                <option value="Netgen">Netgen</option>
                                <option value="saraswati">saraswati</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>




                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg" id="showbtn">Update</button>
                    </div>

        </form>
    </div>
{{-- @endsection --}}

</body>

</html>

