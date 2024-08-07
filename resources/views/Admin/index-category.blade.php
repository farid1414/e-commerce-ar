@extends('layouts.admin.page')
@section('title', 'Kategroi ' . $mCat->name)

@section('head_breadcumb', 'Kategori ' . $mCat->name)
@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active">
        Kategori Furnitur Pada {{ $mCat->name }}
    </li>
@stop
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <!-- Jumlah Pelanggan -->
                    <div class="card-body">
                        <h5 class="card-title">Kategori Aktif</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: rgb(242, 242, 242);">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $categories->where('is_active', true)->count() }}</h6>
                                <span class="text-muted small pt-1">
                                    Kategori Aktif
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
                                <h6>{{ $categories->where('is_active', false)->count() }}</h6>
                                {{-- <h6>{{ $kategoriDiarsipkan }}</h6> --}}

                                <span class="text-muted small pt-1" style="font-size: 13px;">
                                    Kategori Diarsipkan
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
                                <h6>{{ $categories->count() }}</h6>
                                {{-- <h6>{{ $totalKategoriKeseluruhan}}</h6> --}}

                                <span class="text-muted small pt-1">
                                    Total Kategori Keseluruhan
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            {{-- <button class="btn btn-primary btn-lg" type="button">Tambah Kategori</button> --}}
            <a href="{{ route($this_helper . 'form', $mCat->slug) }}" class="btn btn-primary btn-lg">Tambah
                Kategori</a>
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

                    <div class="card top-selling overflow-auto mt-4">
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="card-title">Kategori Aktif</div>
                                <div class="card-title">
                                    <span>{{ $categories->where('is_active', true)->count() }} Kategori</span>
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="table_active_dataran">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Total Produk</th>
                                        <th class="text-center">Dibuat Oleh</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="card top-selling overflow-auto mt-4">
                        <div class="card-body pb-0">
                            <div class="d-flex justify-content-between">
                                <div class="card-title">Kategori Non-aktif / Diarsipkan</div>
                                <div class="card-title">
                                    <span>{{ $categories->where('is_active', false)->count() }} Kategori</span>
                                </div>
                            </div>

                            <table class="table table-bordered table-hover" id="tabel_arvhive_dataran">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Total Produk</th>
                                        <th class="text-center">Dibuat Oleh</th>
                                        <th class="text-center">Aksi</th>
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
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#table_active_dataran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route($this_helper . 'data', $mCat->slug) }}/" +
                    "?categori={{ $mCat->id }}&is_active=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'product',
                        name: 'product',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'total_product',
                        name: 'total_product',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'created_date',
                        name: 'created_date',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });


            $('#tabel_arvhive_dataran').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route($this_helper . 'data', $mCat->slug) }}/" +
                    "?categori={{ $mCat->id }}&is_active=" + 0,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'product',
                        name: 'product',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'total_product',
                        name: 'total_product',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'created_date',
                        name: 'created_date',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });


            $('body').on('click', '.btn-active-cat', function() {
                let id = $(this).attr('data-id')
                let active = $(this).attr('data-active')

                let title = "Apakah Anda yakin ingin mengarsipkan kategori ini ?"
                let msg = "Seluruh Produk yang terdapat pada kategori ini akan diarsipkan juga."
                let custom = "Ya, Arsipkan kategori"

                if (active == 'true') {
                    title = "Apakah Anda yakin ingin mengAktifkan produk ini ?"
                    msg = "Seluruh Produk yang terdapat pada kategori ini akan diaktifkan juga."
                    custom = "Ya, Aktifkan kategori"
                }
                const onConfirm = () => {
                    const action = "{{ route($this_helper . 'status') }}/" + id
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
                            $('#table_active_dataran').DataTable().ajax.reload();
                            $('#tabel_arvhive_dataran').DataTable().ajax.reload();
                        }
                    })
                }

                const swal = new swalConfirm(onConfirm, title, msg, true);
                swal.option.confirmButtonText = custom;
                swal.fire()
            })

            $('body').on('click', '.btn-delete', function() {
                let id = $(this).attr('data-id')
                let slug = $(this).attr('data-slug')

                const onConfirm = () => {
                    const action = "{{ route($this_helper . 'delete', $mCat->slug) }}/" + id
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
                            $('#table_active_dataran').DataTable().ajax.reload();
                            $('#tabel_arvhive_dataran').DataTable().ajax.reload();
                        }
                    })
                }

                const confirm = new swalConfirm(onConfirm,
                    'Apakah Anda yakin ingin menghapus kategori ini ?',
                    'Kategori yang sudah dihapus tidak bisa dikembalikan kembali');
                confirm.option.confirmButtonText = 'Ya, Hapus kategori';
                confirm.fire()

            })
        })
    </script>
@endpush
