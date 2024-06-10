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
                                        @if ($categori->is_active)
                                            <span class="badge rounded-pill text-bg-success">
                                                Kategori Aktif | Kategori Tampil
                                            </span>
                                        @else
                                            <span class="badge rounded-pill text-bg-danger">
                                                Kategori Tidak Aktid | Kategori Tidak Tampil
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>{{ $categori->name }}</td>
                                </tr>
                                <tr>
                                    <td>Dibuat Oleh</td>
                                    <td>{{ $categori->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Dibuat</td>
                                    <td>{{ $categori->date_indo() }}</td>
                                </tr>
                                <tr>
                                    <td>Total Produk</td>
                                    <td>{{ $categori->products->count() }}</td>
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
                        <img class="d-block w-100" src="{{ url($categori->image) }}" alt="Slide 1"
                            style="border-radius: 10px;">
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
                            @forelse($categori->products->where('is_active', true) as $prod)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ url($prod->thumbnail) }}" alt="Produk A" width="70" height="70"
                                            style="border-radius: 10px;">
                                    </td>
                                    <td class="text-center">{{ $prod->name }}</td>
                                    <td class="text-center">{{ formatRupiah($prod->harga) }}</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada produk</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
