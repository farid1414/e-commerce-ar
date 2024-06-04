{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')


<section class="section dashboard">
  <div class="row d-flex flex-wrap justify-content-between">
      <div class="col-12 mb-0">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Informasi FlashSale.</h5>
                  <form>
                      <div class="mb-4">
                          <label for="flashSaleTitle" class="form-label">Judul Flash Sale</label>
                          <input type="text" class="form-control" id="flashSaleTitle" placeholder="Contoh Flash Sale 11.11">
                      </div>
                      <div class="row mb-4">
                          <div class="col mb-3">
                              <label for="startTime" class="form-label">Waktu Mulai</label>
                              <input type="datetime-local" class="form-control" id="startTime">
                          </div>
                          <div class="col">
                              <label for="endTime" class="form-label">Waktu Berakhir <small>(Durasi Max 1 Minggu)</small></label>
                              <input type="datetime-local" class="form-control" id="endTime">
                          </div>
                      </div>
                      <hr>
                      <!-- Tabel Produk Flash Sale -->
                      <div id="productTableContainer" class="mt-3">
                          <div class="card top-selling overflow-auto">
                              <div class="card-body">
                                  <h5 class="card-title">List Semua Produk</h5>
                                  <table class="table table-bordered table-hover">
                                      <thead>
                                          <tr>
                                              <th class="text-center">Produk</th>
                                              <th class="text-center">Nama Produk</th>
                                              <th class="text-center">varian</th>
                                              <th class="text-center">Kategori</th>
                                              <th class="text-center">Harga</th>
                                              <th class="text-center">Aksi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td class="text-center">
                                                  <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="" class="img-thumbnail" />
                                              </td>
                                              <td class="text-center">Meja Gaming</td>
                                              <td class="text-center fw-bold">Meja<br /><small>Dataran</small></td>
                                              <th class="text-center">-</th>
                                              <td class="text-center">Rp 1.100.000</td>
                                              <td class="text-center align-middle">
                                                  <div class="form-check d-flex justify-content-center">
                                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td class="text-center">
                                                  <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="" class="img-thumbnail" />
                                              </td>
                                              <td class="text-center">Meja Gaming</td>
                                              <td class="text-center fw-bold">Meja<br /><small>Dataran</small></td>
                                              <th class="text-center">Merah, Biru</th>
                                              <td class="text-center">Rp 1.100.000</td>
                                              <td class="text-center align-middle">
                                                  <div class="form-check d-flex justify-content-center">
                                                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                  </div>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                      <div class="btn btn-primary mt-3">
                          Konfirmasi Produk
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- Tabel Produk Flash Sale -->
  <div id="productTableContainer" class="mt-3">
      <div class="card top-selling overflow-auto">
          <div class="card-body">
              <h5 class="card-title">Produk yang Anda Pilih</h5>
              <table class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th class="text-center">Produk</th>
                          <th class="text-center">Nama Produk</th>
                          <th class="text-center">stok</th>
                          <th class="text-center">Varian</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Persentase Diskon</th>
                          <th class="text-center">Stok flash sale</th>

                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td class="text-center">
                              <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="" class="img-thumbnail" />
                          </td>
                          <td class="text-center">Meja Gaming</td>
                          <td class="text-center fw-bold">20</td>
                          <td class="text-center">-</td>
                          <td class="text-center">Rp 1.100.000</td>
                          <td class="text-center fw-bold">
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="contoh 20 ">
                          </td>
                          <td class="text-center fw-bold">
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="contoh 20">
                          </td>
                      </tr>
                      <tr>
                          <td class="text-center">
                              <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="" class="img-thumbnail" />
                          </td>
                          <td class="text-center">Meja Gaming</td>
                          <td class="text-center fw-bold">20</td>
                          <td class="text-center">Merah<br>Biru</td>
                          <td class="text-center">Rp 1.100.000</td>
                          <td class="text-center fw-bold">
                              <input type="text" class="form-control mb-2" id="exampleInputEmail1" placeholder="varian Merah, contoh 20">
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="varian Biru, contoh 20">
                          </td>
                          <td class="text-center fw-bold">
                              <input type="text" class="form-control mb-2" id="exampleInputEmail1" placeholder="varian Merah, contoh 20">
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="varian Biru, contoh 20">
                          </td>
                      </tr>
                  </tbody>
              </table>
              <footer class="blockquote-footer mt-3">Kosongi kotak jika tidak ingin mengisi pada varian tersebut</cite></footer>
              <footer class="blockquote-footer">Untuk Diskon flash sale diisi tanpa tanda (%)</cite></footer>

          </div>
      </div>
  </div>
  <!-- Content presentasi diskon dari produk yang dipilih -->
  <div class="card mt-3">
      <div class="card-body">
          <div class="d-flex justify-content-between mt-3">
              <a href="/Programflashsaleadmin">
                  <button class="btn btn-outline-secondary">
                      <i class="bi bi-arrow-left me-2"></i>Batal
                  </button>
              </a>
              <button type="button" class="btn btn-primary" onclick="handleFormSubmit()">Buat Flash Sale</button>
          </div>
      </div>
  </div>
</section>

@stop