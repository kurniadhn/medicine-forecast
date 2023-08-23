@extends('layouts.main')

@section('container')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Obat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">Obat</div>
            </div>
        </div>

        <div class="section-body">
            @if (session()->has('success'))
                <script>
                    swal("Berhasil!", "Obat berhasil ditambah", "success");
                </script>
            @endif

            @if (session()->has('edit'))
                <script>
                    swal("Berhasil!", "Obat berhasil diupdate", "success");
                </script>
            @endif

            @if (session()->has('delete'))
                <script>
                    swal("Berhasil!", "Obat berhasil dihapus", "success");
                </script>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Obat</h4>
                            <a href="/medicine/create" class="btn btn-primary ml-auto">Tambah Obat</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Obat</th>
                                            <th>Harga Satuan</th>
                                            <th>Stok Obat</th>
                                            <th>Tanggal Kadaluarsa</th>
                                            {{-- <th>Status</th> --}}
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medicines as $medicine)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $medicine->nama_obat }}</td>
                                                <td>Rp. {{ $medicine->harga }}</td>
                                                <td>{{ $medicine->stok }}</td>
                                                <td>{{ date('d M Y', strtotime($medicine->tanggal_kadaluarsa)) }}</td>
                                                {{-- <td>
                                                    <div class="badge badge-danger">Out of Stock</div>
                                                </td> --}}
                                                <td class="text-center">
                                                    <a href="/medicine/{{ $medicine->id }}/edit"
                                                        class="badge badge-info"><span class="fas fa-edit"></span></a>
                                                    <form action="/medicine/{{ $medicine->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge badge-danger border-0"
                                                            onclick="return confirm('Delete this medicine?')"><span
                                                                class="fas fa-trash"></span>
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
