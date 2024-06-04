{{-- Tahap 1 wajib --}}
@extends('layouts.admin.page')

{{-- Tahap 2 untuk judul  --}}
@section('title', 'Detail Akun Admin')

@section('content')

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <i class="bi bi-person-badge"></i> Informasi Admin
            </h5>
            <p class="text-muted">Jhon Doe 1</p>
            <p class="text-muted">JhonDoe1@gmail.com</p>
            <p class="text-muted">081213133187</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <i class="bi bi-person-lines-fill me-2"></i> Informasi Akun
            </h5>
            <div class="d-flex justify-content-between mb-2">
                <p class="text-muted">Waktu Ditambahkan</p>
                <p class="text-muted" style="font-size: 0.9rem;">2023-06-21 12:20</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="text-muted">Terakhir Login</p>
                <p class="text-muted" style="font-size: 0.9rem;">2023-06-21 22:20</p>
            </div>
            <h5 class="card-title">
                <i class="bi bi-person-exclamation me-2"></i>Status Akun
            </h5>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-lg me-2"></i>
                <div>Akun Aktif</div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <i class="bi bi-person-badge"></i> Informasi Admin
            </h5>
            <p class="text-muted">{{ $adminNama }}</p>
            <p class="text-muted">{{ $adminEmail }}</p>
            <p class="text-muted">{{ $adminPhone }}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <i class="bi bi-person-lines-fill me-2"></i> Informasi Akun
            </h5>
            <div class="d-flex justify-content-between mb-2">
                <p class="text-muted">Waktu Ditambahkan</p>
                <p class="text-muted" style="font-size: 0.9rem;">{{ $waktuDitambahkan }}</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="text-muted">Terakhir Login</p>
                <p class="text-muted" style="font-size: 0.9rem;">{{ $terakhirLogin }}</p>
            </div>
            <h5 class="card-title">
                <i class="bi bi-person-exclamation me-2"></i>Status Akun
            </h5>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-lg me-2"></i>
                <div>{{ $statusAkun }}</div>
            </div>
        </div>
    </div>
</section> --}}


@stop