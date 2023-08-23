@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Pending Users</div>
            </div>
        </div>

        @if (session()->has('deactivated'))
            <script>
                swal("Berhasil!", "User berhasil dinonaktifkan!", "success");
            </script>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pending Users</h4>
                            {{-- <a href="javascript:void(0)" class="btn btn-primary ml-auto">Tambah Obat</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->is_admin === 1 ? 'Root' : 'Admin' }}</td>
                                                <td class="text-center">
                                                    @if ($user->status == 'deactivated')
                                                        <div class="badge badge-danger">Deactivated</div>
                                                    @else
                                                        <div class="badge badge-warning">Pending</div>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <form action="/pending/{{ $user->id }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        <button class="badge badge-success border-0"
                                                            onclick="return confirm('Aktifkan User Ini?')"><span
                                                                class="fas fa-check"></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
