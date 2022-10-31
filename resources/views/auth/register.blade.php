<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO APP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS only -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
</head>

<body>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('register') }}" class="form-parsley" method="post">
                        @csrf

                        <!-- Email input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Name *</label>

                            <input type="text" id="form3Example3" class="form-control form-control-md"
                                placeholder="Enter a valid name" name="name" required />
                        </div>

                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Email *</label>

                            <input type="email" id="form3Example3" class="form-control form-control-md"
                                placeholder="Enter a valid email " name="email" required/>
                            @error('email')
                            <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Mobile Number * </label>

                            <input type="number" id="form3Example3" class="form-control form-control-md"
                                placeholder="Enter a Mobile Number " name="mobile_number" required/>
                            @error('mobile_number')
                            <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example4">Password *</label>

                            <input type="password" id="form3Example4" class="form-control form-control-md"
                                name="password" placeholder="Enter password" required />
                            @error('password')
                            <span class="alert alert-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Confirm Password *</label>

                            <input type="password" id="form3Example4" class="form-control form-control-md"
                                name="password_confirmation" placeholder="Enter password" required />
                        </div>



                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a
                                    href="{{ url('/login') }}" class="link-danger">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2022. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->

    </section>
</body>

</html>
