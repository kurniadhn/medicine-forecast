@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">All Users</div>
            </div>
        </div>

        @if (session()->has('activated'))
            <script>
                swal("Berhasil!", "User berhasil diaktifkan!", "success");
            </script>
        @endif

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Users</h4>
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
                                                    <div class="badge badge-success">Activated</div>
                                                </td>
                                                <td class="text-center">
                                                    <form action="/users/{{ $user->id }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        <button class="badge badge-danger border-0"
                                                            onclick="return confirm('Nonaktifkan User Ini?')"><span
                                                                class="fas fa-times"></span>
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
