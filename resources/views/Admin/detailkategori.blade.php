
{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Detail Kategori')

{{-- tahap section jangan lupa di tutup --}}
@section('content')


<section class="section dashboard">
  <div class="row">
    <div class="col-lg-8 col-sm-12">
      <!-- ContentInformasiDetailKategoriDataran -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Informasi Kategori</h5>
          <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <td>Status Kategori</td>
                <td style="width: 65%;">
                  <span class="badge rounded-pill text-bg-success">
                    Kategori Aktif | Kategori Tampil
                  </span>
                </td>
              </tr>
              <tr>
                <td>Kategori</td>
                <td>Sofa</td>
              </tr>
              <tr>
                <td>Dibuat Oleh</td>
                <td>Admin 2</td>
              </tr>
              <tr>
                <td>Waktu Dibuat</td>
                <td>Kamis, 2 November 2023 15:29:22</td>
              </tr>
              <tr>
                <td>Total Produk</td>
                <td>12</td>
              </tr>
              <tr>
                <td>Kategori Terlaris</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-12">
      <!-- ContentGambarKategoriDataran -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Gambar Kategori</h5>
          <img class="d-block w-100" src="assets/assets/img/product-1.jpg" alt="Slide 1" style="border-radius: 10px;">
        </div>
      </div>
    </div>
  </div>

  <!-- ContentListProdukDetailKategoriDataran -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">List Produk di Kategori Sofa</h5>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th class="text-center">Gambar</th>
              <th class="text-center">Nama Produk</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Total Terjual</th>
              <th class="text-center">Total Dilihat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">
                <img src="assets/assets/img/product-1.jpg" alt="Produk A" width="70" height="70" style="border-radius: 10px;">
              </td>
              <td class="text-center">Produk A</td>
              <td class="text-center">Rp 1.000.000</td>
              <td class="text-center">50x</td>
              <td class="text-center">500x</td>
            </tr>
            <tr>
              <td class="text-center">
                <img src="assets/assets/img/product-1.jpg" alt="Produk B" width="70" height="70" style="border-radius: 10px;">
              </td>
              <td class="text-center">Produk B</td>
              <td class="text-center">Rp 1.500.000</td>
              <td class="text-center">30x</td>
              <td class="text-center">300x</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </section>

  @stop