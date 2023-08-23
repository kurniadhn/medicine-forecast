<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Medicine Forecast</title>
    <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/login.css">

    {{-- Sweetalert JS --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    @if (session()->has('success'))
        <script>
            swal("Berhasil!", "Registrasi Berhasil! Silahkan Login", "success");
        </script>
    @endif

    @if (session()->has('loginError'))
        <script>
            swal("Gagal!", "Email atau Password Salah!", "error");
        </script>
    @endif

    @if (session()->has('loginFailed'))
        <script>
            swal("Gagal!", "Akun Dinonaktifkan! Silahkan Hubungi Admin", "error");
        </script>
    @endif

    @if (session()->has('loginPending'))
        <script>
            swal("Gagal!", "Akun Belum Diaktivasti! Silahkan Hubungi Admin", "error");
        </script>
    @endif

    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                        <label for="reg-log"></label>

                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <form action="/login" method="post">
                                    @csrf
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-style"
                                                        placeholder="Your Email" id="email"
                                                        value="{{ old('email') }}" autofocus required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style"
                                                        placeholder="Your Password" id="password" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="btn mt-4">Submit</button>
                                                {{-- <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot
                                                        your password?</a></p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-back">
                                    <div class="center-wrap">
                                        <form action="/register" method="post">
                                            @csrf
                                            <div class="section text-center">
                                                <h4 class="mt-4 pt-3 mb-2 pb-3">Sign Up</h4>
                                                <div class="form-group">
                                                    <input type="text" name="name"
                                                        class="form-style @error('name') is-invalid @enderror"
                                                        placeholder="Your Full Name" id="name"
                                                        value="{{ old('name') }}">
                                                    <i class="input-icon uil uil-user"></i>
                                                    @error('name')
                                                        <div class="invalid-feedback text-white">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="email"
                                                        class="form-style @error('email') is-invalid @enderror"
                                                        placeholder="Your Email" id="email"
                                                        value="{{ old('email') }}">
                                                    <i class="input-icon uil uil-at"></i>
                                                    @error('email')
                                                        <div class="invalid-feedback text-white">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password"
                                                        class="form-style @error('password') is-invalid @enderror"
                                                        placeholder="Your Password" id="password">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                    @error('password')
                                                        <div class="invalid-feedback text-white">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="number" name="phone"
                                                        class="form-style @error('phone') is-invalid @enderror"
                                                        placeholder="Your Phone Number">
                                                    <i class="input-icon uil uil-phone"></i>
                                                    @error('phone')
                                                        <div class="invalid-feedback text-white">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="text" name="address"
                                                        class="form-style @error('address') is-invalid @enderror"
                                                        placeholder="Your Address">
                                                    <i class="input-icon uil uil-home"></i>
                                                    @error('address')
                                                        <div class="invalid-feedback text-white">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn mt-4">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script src="js/login.js"></script>
</body>

</html>
