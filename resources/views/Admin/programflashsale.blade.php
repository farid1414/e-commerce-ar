    {{-- Tahap 1 --}}
    @extends('layouts.admin.page')

    {{-- Tahap untuk judul  --}}
    @section('title', 'Dashboard')
    @section('content_header')
        <li class="breadcrumb-item">
            <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">
            Flash Sale Product
        </li>
    @stop
    {{-- tahap section jangan lupa di tutup --}}
    @section('content')
        <section class="section dashboard">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{sale.title}</h5>
                                <h5>
                                    <small class="badge badge-pill {sale.statusClass}">
                                        {sale.status}
                                    </small>
                                </h5>
                            </div>
                            <p class="card-text">
                            <div class="d-flex justify-content-between">
                                <p><b>Waktu Mulai</b></p>
                                <span class="text-muted">{sale.startTime}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><b>Waktu Berakhir</b></p>
                                <span class="text-muted">{sale.endTime}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><b>Total Produk</b></p>
                                <span class="text-muted">{sale.totalProducts}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><b>Total Terjual</b></p>
                                <span class="text-muted">{sale.totalSold}</span>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{sale.title}</h5>
                                <h5>
                                    <small class="badge badge-pill {sale.statusClass}">
                                        {sale.status}
                                    </small>
                                </h5>
                            </div>
                            <p class="card-text">
                            <div class="d-flex justify-content-between">
                                <p><b>Waktu Mulai</b></p>
                                <span class="text-muted">{sale.startTime}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><b>Waktu Berakhir</b></p>
                                <span class="text-muted">{sale.endTime}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><b>Total Produk</b></p>
                                <span class="text-muted">{sale.totalProducts}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p><b>Total Terjual</b></p>
                                <span class="text-muted">{sale.totalSold}</span>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <a href="{{ route('master.flash-sale.form') }}" class="btn btn-primary btn-lg" type="button">Tambah
                    Produk</a>
            </div>
            <!-- Isi Konten Produk Dataran -->
            <div class="card mt-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">
                            List Program Flash Sale<br />
                        </div>
                    </div>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Semua</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Sedang Berjalan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Akan Datang</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-disabled" type="button" role="tab"
                                aria-controls="pills-disabled" aria-selected="false">Telah Berakhir</button>
                        </li>
                    </ul>




                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">


                        </div>


                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                            tabindex="0">


                            <div class="card large-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">Flash Sale 1.1</h5>
                                        <h5>
                                            <span class="badge text-bg-primary mt-3">Sedang Berjalan</span>

                                        </h5>
                                    </div>
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Waktu Mulai</p>
                                            <span style="font-size: 0.8rem;">2023-05-12 23:59:00</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Waktu Berakhir</p>
                                            <span style="font-size: 0.8rem;">2023-05-12 23:59:00</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Daratan</p>
                                            <span>6 Produk</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Dinding</p>
                                            <span>6 Produk</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Keseluruhan</p>
                                            <span class="text-end">12 Produk dari 8 Kategori</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Terjual</p>
                                            <span class="fw-bold">12 Produk Terjual</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Pendapatan</p>
                                            <span class="fw-bold">Rp 1.500.000</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-outline-danger d-none d-md-block">
                                                Shutdown Flash Sale
                                            </button>
                                            <button class="btn btn-outline-success">Edit Flash Sale</button>
                                            <a href="/AnalisisFlashSale" class="btn btn-primary">Lihat Flash Sale</a>
                                        </div>
                                        <div class="d-block d-md-none">
                                            <hr>
                                            <button class="btn btn-outline-danger">Shutdown Flash Sale</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">



                            <div class="card large-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">Flash Sale 1.1</h5>
                                        <h5>
                                            <span class="badge text-bg-dark mt-3">Akan Datang</span>

                                        </h5>
                                    </div>
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Waktu Mulai</p>
                                            <span style="font-size: 0.8rem;">2023-05-12 23:59:00</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Waktu Berakhir</p>
                                            <span style="font-size: 0.8rem;">2023-05-12 23:59:00</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Daratan</p>
                                            <span>6 Produk</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Dinding</p>
                                            <span>6 Produk</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Keseluruhan</p>
                                            <span class="text-end">12 Produk dari 8 Kategori</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Terjual</p>
                                            <span class="fw-bold">Belum Mulai</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Pendapatan</p>
                                            <span class="fw-bold">Belum Mulai</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-success d-none d-md-block">
                                                Aktifkan Flash Sale
                                            </button>
                                            <button class="btn btn-outline-success">Edit Flash Sale</button>
                                            <a href="/AnalisisFlashSale" class="btn btn-primary">Lihat Flash Sale</a>
                                        </div>
                                        <div class="d-block d-md-none">
                                            <hr>
                                            <button class="btn btn-outline-danger">Shutdown Flash Sale</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                            aria-labelledby="pills-disabled-tab" tabindex="0">


                            <div class="card large-card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-title">Flash Sale 1.1</h5>
                                        <h5>
                                            <span class="badge text-bg-secondary mt-3">Telah Berakhir</span>

                                        </h5>
                                    </div>
                                    <div class="card-text">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Waktu Mulai</p>
                                            <span style="font-size: 0.8rem;">2023-05-12 23:59:00</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Waktu Berakhir</p>
                                            <span style="font-size: 0.8rem;">2023-05-12 23:59:00</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Daratan</p>
                                            <span>6 Produk</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Dinding</p>
                                            <span>6 Produk</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Produk Keseluruhan</p>
                                            <span class="text-end">12 Produk dari 8 Kategori</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Terjual</p>
                                            <span class="fw-bold">10 Produk</span>
                                        </div>
                                        <hr style="margin-top: -5px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Pendapatan</p>
                                            <span class="fw-bold">Rp 14.000.000</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-success d-none d-md-block">
                                                Aktifkan lagi Flash Sale
                                            </button>
                                            <button class="btn btn-outline-success">Edit Flash Sale</button>
                                            <a href="/AnalisisFlashSale" class="btn btn-primary">Lihat Flash Sale</a>
                                        </div>
                                        <div class="d-block d-md-none">
                                            <hr>
                                            <button class="btn btn-outline-danger">Shutdown Flash Sale</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

    @stop
