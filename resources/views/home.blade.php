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

        @if (Auth()->user()->is_admin === 1)
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Active Users</h4>
                            </div>
                            <div class="card-body">
                                {{ $activated }}
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
                                <h4>Pending Users</h4>
                            </div>
                            <div class="card-body">
                                {{ $deactivated }}
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
                                <h4>Activities</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalActivity }}
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
                                {{ $totalChangelog }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>User ID</h4>
                            </div>
                            <div class="card-body">
                                {{ Auth()->User()->id }}
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
                                {{ $medicines }}
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
                                <h4>Transactions</h4>
                            </div>
                            <div class="card-body">
                                Progress
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
                                <h4>Forecasts</h4>
                            </div>
                            <div class="card-body">
                                Progress
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if (Auth()->user()->is_admin === 1)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Activities</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($activities as $activity)
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-1.png"
                                            alt="avatar">
                                        <div class="media-body">
                                            <div class="float-right text-primary text-job">
                                                {{ $activity->updated_at->diffForHumans() }}</div>
                                            <div class="media-title">{{ $activity->user->name }}</div>
                                            <span class="text-muted">{{ $activity->message }}
                                                <strong>{{ $activity->medicine_name }}</strong> pada halaman <a
                                                    href="{{ $activity->page }}"><strong>{{ $activity->page }}</strong></a></span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center mt-4 pt-1 pb-1">
                                <a href="/activities" class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Changelog</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($changelogs as $changelog)
                                    <li class="media">
                                        <img class="mr-3 rounded-circle" width="50" src="/img/avatar/avatar-1.png"
                                            alt="avatar">
                                        <div class="media-body">
                                            <div class="float-right text-primary text-job">
                                                {{ $changelog->updated_at->diffForHumans() }}</div>
                                            <div class="media-title">{{ $changelog->user->name }}
                                            </div>
                                            <span class="text-muted">{{ $changelog->message }} pada halaman <a
                                                    href="{{ $changelog->page }}"><strong>{{ $changelog->page }}</strong></a></span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center mt-4 pt-1 pb-1">
                                <a href="/activities" class="btn btn-primary btn-lg btn-round">
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
