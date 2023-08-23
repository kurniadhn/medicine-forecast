@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Password</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Password</div>
            </div>
        </div>

        @if (session()->has('wrongPassword'))
            <script>
                swal("Gagal!", "Password lama salah!", "error");
            </script>
        @endif

        @if (session()->has('confirmPassword'))
            <script>
                swal("Gagal!", "Konfirmasi Password salah!", "error");
            </script>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/updatePassword" method="post">
                            @csrf
                            <div class="card-header">
                                <h4>Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" name="oldPassword">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPassword">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
