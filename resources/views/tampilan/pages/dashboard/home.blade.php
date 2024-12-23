@extends('tampilan.index')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a>Home</a></li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container" style="margin-top: -40px;">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <img src="{{ asset('gambar/posyandu.jpg') }}" class="img-fluid rounded" style="width: 80%; height: auto;" alt="Posyandu Header">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Selamat Datang di Halaman Dashboard Posyandu</h2>
            <p class="lead">Di sini Anda dapat melihat informasi terbaru mengenai kegiatan dan data Posyandu.</p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4" style="margin-top: -20px;">
            <div class="card text-center" style="transform: scale(0.9);">
                <img class="card-img-top mx-auto d-block" src="{{ asset('gambar/pencatatan.jpg') }}" style="max-width: 70%;" alt="Gambar 1">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Pencatatan Kesehatan</h5>
                    <p class="card-text">Informasi mengenai Pencatatan Kesehatan.</p>
                    <a href="{{ route('pencatatan-kesehatan.index') }}" class="btn btn-primary btn-block" style="width: 100%;">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="margin-top: -20px;">
            <div class="card text-center" style="transform: scale(0.9);">
                <img class="card-img-top mx-auto d-block" src="{{ asset('gambar/data.jpg') }}" style="max-width: 70%;" alt="Gambar 2">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Data Anggota</h5>
                    <p class="card-text">Jumlah anggota Posyandu yang terdaftar.</p>
                    <a href="{{ route('anggota-posyandu.index') }}" class="btn btn-primary btn-block" style="width: 100%;">Lihat Data</a>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="margin-top: -20px;">
            <div class="card text-center" style="transform: scale(0.9);">
                <img class="card-img-top mx-auto d-block" src="{{ asset('gambar/laporan.jpg') }}" style="max-width: 70%;" alt="Gambar 3">
                <div class="card-body d-flex flex-column align-items-center">
                    <h5 class="card-title">Laporan Kunjungan</h5>
                    <p class="card-text">Laporan Kunjungan Posyandu.</p>
                    <a href="{{ route('pencatatan-kesehatan.laporan') }}" class="btn btn-primary btn-block" style="width: 100%;">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection