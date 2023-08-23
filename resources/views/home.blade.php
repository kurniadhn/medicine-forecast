@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        @if (session()->has('updateProfile'))
            <script>
                swal("Berhasil!", "Profile berhasil diupdate", "success");
            </script>
        @endif

        @if (session()->has('updatePassword'))
            <script>
                swal("Berhasil!", "Password berhasil diupdate!", "success");
            </script>
        @endif

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            3
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Obat</h4>
                        </div>
                        <div class="card-body">
                            5
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi</h4>
                        </div>
                        <div class="card-body">
                            5
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Changelogs</h4>
                        </div>
                        <div class="card-body">
                            {{ $changelogs }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth()->user()->is_admin === 1)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-1.png"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right text-primary">Now</div>
                                        <div class="media-title">Ciaobella Puti Nurdiyanti</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-2.png"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">12m</div>
                                        <div class="media-title">Salman Pardi Nashiruddin</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in
                                            gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="/activities" class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Changelog</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <div class="activities">
                                        @foreach ($messages as $message)
                                            <div class="activity">
                                                <div class="activity-icon bg-primary text-white shadow-primary">
                                                    <i class="fas fa-comment-alt"></i>
                                                </div>
                                                <div class="activity-detail">
                                                    <div class="mb-2">
                                                        <span
                                                            class="text-job text-primary">{{ $message->updated_at->diffForHumans() }}</span>
                                                        <span class="bullet"></span>
                                                    </div>
                                                    <p>User "{{ $message->user->name }}" {{ $message->message }} pada
                                                        halaman
                                                        <a href="{{ $message->page }}">"{{ $message->page }}"</a>.
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center pt-1 pb-1">
                                <a href="/changelog" class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
