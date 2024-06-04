{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')


<section class="section dashboard">
  <div class="row">
      <!-- Card Informasi Atas -->
      <section class="section dashboard">
        <div class="row">
          <div class="col-sm-4">
            <div class="card info-card sales-card">
              <!-- Jumlah Pelanggan -->
              <div class="card-body">
                <h5 class="card-title">Kategori Aktif</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                    <i class="bi bi-box"></i>
                  </div>
                  <div class="ps-3">
                    <h6>20</h6>
                    <span class="text-muted small pt-1">
                      Total Kategori Aktif
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card info-card revenue-card">
              <!-- Jumlah Terjual -->
              <div class="card-body">
                <h5 class="card-title">Kategori Diarsipkan</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-seam"></i>
                  </div>
                  <div class="ps-3">
                    <h6>20</h6>
                    <span class="text-muted small pt-1" style="font-size: 13px;">
                      Total Kategori Diarsipkan
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card info-card customers-card">
              <!-- Jumlah Total Terjual -->
              <div class="card-body">
                <h5 class="card-title">Total Keseluruhan</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-dropbox"></i>
                  </div>
                  <div class="ps-3">
                    <h6>25</h6>
                    <span class="text-muted small pt-1">
                      Total Produk Habis
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="d-grid gap-2">
            <button class="btn btn-primary btn-lg" type="button">Tambah Kategori</button>
          </div>
        <!-- Isi Konten Produk Dataran -->
        <div class="card mt-4">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="card-title">
                List Kategori Furnitur Dataran <br />
                <span>Manajemen Kategori Anda</span>
              </div>
            </div>
            <div class="d-none d-md-block">
              <!-- Tambahkan konten tabel di sini -->
            </div>
          </div>
        </div>
      </section>
      @stop