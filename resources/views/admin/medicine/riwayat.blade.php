@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Obat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                <div class="breadcrumb-item">Riwayat Penjualan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Riwayat Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Nama Obat</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($forecasts as $forecast)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d M Y', strtotime($forecast->tgl_jual)) }}</td>
                                                <td>{{ $forecast->nama_obat }}</td>
                                                <td>{{ $forecast->jumlah_keluar }}</td>
                                                <td>Rp. {{ $forecast->harga_satuan }}</td>
                                                <td>Rp. {{ $forecast->total_harga }}</td>
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
