{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Product ')

@section('head_breadcumb', 'Product ')
@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active">
        Product Furniture Pada
    </li>
@stop

{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <section class="section dashboard">
        <div class="row">
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <!-- Jumlah Pelanggan -->
                    <div class="card-body">
                        <h5 class="card-title">Produk Aktif</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: rgb(242, 242, 242);">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $products->where('is_active', true)->count() }}</h6>
                                <span class="text-muted small pt-1">
                                    Total Produk Aktif
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
                        <h5 class="card-title">Produk Segera Habis</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $products->where('stock', '>=', 1)->where('stock', '<', 5)->count() }}</h6>
                                <span class="text-muted small pt-1" style="font-size: 13px;">
                                    Total Produk Segera Habis
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
                        <h5 class="card-title">Produk Habis</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-dropbox"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $products->where('stock', 0)->count() }}</h6>
                                <span class="text-muted small pt-1">
                                    Total Produk Habis
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card info-card customers-card">
                    <!-- Jumlah Total Terjual -->
                    <div class="card-body">
                        <h5 class="card-title">Produk Diarsipkan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: rgb(232, 232, 232);">
                                <i class="bi bi-box-fill" style="color: rgb(173, 173, 173);"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $products->where('is_active', false)->count() }}</h6>
                                <span class="text-muted small pt-1">
                                    Total Produk Diarsipkan
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card info-card customers-card">
                    <!-- Jumlah Total Terjual -->
                    <div class="card-body">
                        <h5 class="card-title">Total Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: rgb(255, 254, 217);">
                                <i class="bi bi-boxes" style="color: rgb(255, 206, 69);"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $products->count() }}<span style="font-size: 1.2rem;"> Produk</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2">
            <a href="{{ route($this_helper . 'form') }}" class="btn btn-primary btn-lg">Tambah Produk</a>
        </div>


        <!-- tabel Produk Dataran -->
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-title">
                        List Produk Furnitur Dataran <br />
                        <span>Manajemen Produk Anda</span>
                    </div>
                </div>

                {{-- Produk Aktif --}}
                <div class="d-none d-md-block">
                    <div class="card top-selling overflow-auto mt-4">
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="card-title">
                                    Produk Aktif <span></span>
                                </div>
                                <div class="card-title">
                                    <span> 2 Produk </span>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover" id="table_product_active">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">
                                            Gambar
                                        </th>
                                        <th class="text-center">
                                            Produk
                                        </th>
                                        <th class="text-center">
                                            Varian
                                        </th>
                                        <th class="text-center">
                                            Harga
                                        </th>
                                        <th class="text-center">
                                            Kategori
                                        </th>
                                        <th class="text-center">
                                            Stok Awal
                                        </th>
                                        <th class="text-center">
                                            Stok Sekarang
                                        </th>
                                        <th class="text-center">
                                            Terjual
                                        </th>
                                        <th class="text-center">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Produk Segera Habis --}}
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <div class=" d-none d-md-block">
                                <div class="d-flex justify-content-between">
                                    <div class="card-title">Produk Aktif Segera Habis (Stok < 5)</div>
                                            <div class="card-title">
                                                <span>1 Produk </span>
                                            </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between d-block d-md-none">
                                    <div class="card-title" style="font-size: 1rem;">
                                        Produk Aktif Segera <br />
                                        Habis (Stok &lt; 5)
                                    </div>
                                    <div class="card-title">
                                        <span class="d-block d-md-none" style="font-size: 0.8rem;"> Produk Tampil </span>
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover" id="table_produk_kurang">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">Gambar</th>
                                            <th class="text-center">Produk</th>
                                            <th class="text-center">Varian</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Stok Awal</th>
                                            <th class="text-center">Stok Sekarang</th>
                                            <th class="text-center">Terjual</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        {{-- Produk Diarsipkan --}}
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <div class="d-none d-md-block">
                                    <div class="d-flex justify-content-between">
                                        <div class="card-title">Produk Habis (Stok = 0) dan Diarsipkan</div>
                                        <div class="card-title">
                                            <span>1 Produk </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between d-block d-md-none">
                                    <div class="card-title" style="font-size: 1rem;">
                                        Produk Habis (Stok = 0) <br /> dan Diarsipkan
                                    </div>
                                    <div class="card-title">
                                        <span class="d-block d-md-none" style="font-size: 0.8rem;"> Tidak <br />
                                            Ditampilkan </span>
                                    </div>
                                </div>
                                <table class="table table-bordered table-hover" id="table_produk_arsip">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th scope="col" class="text-center">Gambar</th>
                                            <th scope="col" class="text-center">Produk</th>
                                            <th scope="col" class="text-center">Varian</th>
                                            <th scope="col" class="text-center">Harga</th>
                                            <th scope="col" class="text-center">Kategori</th>
                                            <th scope="col" class="text-center">Stok Awal</th>
                                            <th scope="col" class="text-center">Stok Sekarang</th>
                                            <th scope="col" class="text-center">Terjual</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@include('Admin.modal-update-stock')
@push('js')
    <script>
        $(document).ready(function() {
            $('#table_product_active').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route($this_helper . 'data') }}/" +
                    "?is_active=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'varians',
                        name: 'varians'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'stok_sekarang',
                        name: 'stok_sekarang'
                    }, {
                        data: 'terjual',
                        name: 'terjual'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#table_produk_kurang').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route($this_helper . 'data') }}/" +
                    "?is_active=" + 1 + "&akan_habis=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'varians',
                        name: 'varians'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'stok_sekarang',
                        name: 'stok_sekarang'
                    }, {
                        data: 'terjual',
                        name: 'terjual'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#table_produk_arsip').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route($this_helper . 'data') }}/" +
                    "?is_active=" + 0 + "&habis=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'varians',
                        name: 'varians'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'stok_sekarang',
                        name: 'stok_sekarang'
                    }, {
                        data: 'terjual',
                        name: 'terjual'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });

        $('body').on('click', '.btn-delete', function() {
            let uuid = $(this).attr('data-uuid')

            const onConfirm = () => {
                const action = "{{ route($this_helper . 'delete') }}/" + uuid
                const ajax = new AjaxRequest(action, "DELETE")
                ajax.onBefore = () => {
                    $loaderEl.removeClass('d-none')
                }

                ajax.onfail = () => {
                    $loaderEl.addClass('d-none')
                }

                // let data = new FormData(this)
                ajax.submit(null, (resp) => {
                    if (resp.success) {
                        swal('success', null, resp.message ?? "Success delete category")
                        $loaderEl.addClass('d-none')
                        $('#table_product_active').DataTable().ajax.reload();
                        $('#table_produk_kurang').DataTable().ajax.reload();
                        $('#table_produk_arsip').DataTable().ajax.reload();
                    }
                })
            }

            const confirm = new swalConfirm(onConfirm,
                'Apakah Anda yakin ingin menghapus produk ini ?',
                'Produk yang sudah dihapus tidak bisa dikembalikan kembali');
            confirm.option.confirmButtonText = 'Ya, Hapus produk';
            confirm.fire()
        })

        $('body').on('click', '.arsip-product', function() {
            let uuid = $(this).attr('data-uuid')
            let active = $(this).attr('data-active')

            let title = "Apakah Anda yakin ingin mengarsipkan produk ini ?"
            let msg = "Seluruh Produk yang terdapat pada produk ini akan diarsipkan juga."
            let custom = "Ya, Arsipkan produk"

            if (active == 'true') {
                title = "Apakah Anda yakin ingin mengAktifkan produk ini ?"
                msg = "Seluruh Produk yang terdapat pada produk ini akan diaktifkan juga."
                custom = "Ya, Aktifkan produk"
            }

            const onConfirm = () => {
                const action = "{{ route($this_helper . 'status') }}/" + uuid
                const ajax = new AjaxRequest(action)
                ajax.onBefore = () => {
                    $loaderEl.removeClass('d-none')
                }

                ajax.onfail = () => {
                    $loaderEl.addClass('d-none')
                }

                // let data = new FormData(this)
                ajax.submit(null, (resp) => {
                    if (resp.success) {
                        $loaderEl.addClass('d-none')
                        $('#table_product_active').DataTable().ajax.reload();
                        $('#table_produk_arsip').DataTable().ajax.reload();
                        $('#table_produk_kurang').DataTable().ajax.reload();
                    }
                })
            }

            const swal = new swalConfirm(onConfirm, title, msg, true);
            swal.option.confirmButtonText = custom;
            swal.fire()
        })
    </script>
@endpush
