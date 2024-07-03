<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5 pt-lg-5">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-lg-5 p-0">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="p-5">
                                    <div class="text-center mb-4">
                                        <h1 class="text-muted">Login</span>
                                    </div>
                                    <form action="" method="post" class="user text-center">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <input autofocus="autofocus" autocomplete="off" value="{{ old('username') }}" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                            @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                            @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: `{{ session('success') }}`,
            showConfirmButton: true,
            timer: 3000
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: `{{ session('error') }}`,
            showConfirmButton: true,
            timer: 3000
        });
    </script>
    @endif
</body>

</html>