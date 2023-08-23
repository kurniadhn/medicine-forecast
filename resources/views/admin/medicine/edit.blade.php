@extends('layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <h1>Obat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Edit Obat</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form action="/medicine/{{ $medicine->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="card-header">
                                <h4>Edit Obat</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" name="nama_obat"
                                        value="{{ old('nama_obat', $medicine->nama_obat) }}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Total Stok</label>
                                    <input type="number" class="form-control" name="stok"
                                        value="{{ old('stok', $medicine->stok) }}">
                                </div>
                                <div class="form-group">
                                    <label>Harga Satuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="number" class="form-control currency" name="harga"
                                            value="{{ old('harga', $medicine->harga) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kadaluarsa</label>
                                    <input type="date" class="form-control datemask" name="tanggal_kadaluarsa"
                                        value="{{ old('tanggal_kadaluarsa', $medicine->tanggal_kadaluarsa) }}">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="/medicine" class="btn btn-secondary">Cancel</a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
