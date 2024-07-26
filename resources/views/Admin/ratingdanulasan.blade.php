{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')
@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active">
        Rating & Ulasan
    </li>
@stop
{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <!-- Card Informasi Atas -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <!-- Jumlah Pelanggan -->
                    <div class="card-body">
                        <h5 class="card-title">Sudah Dibalas</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: rgb(242, 242, 242);">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $balasan }}</h6>
                                <span class="text-muted small pt-1">
                                    Total Sudah dibalas
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
                        <h5 class="card-title">Perlu Dibalas</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $belumBalas }}</h6>
                                <span class="text-muted small pt-1" style="font-size: 13px;">
                                    Total Perlu Dibalas
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
                                <h6>{{ $rating->count() }}</h6>
                                <span class="text-muted small pt-1">
                                    Total Rating Keseluruhan
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Isi Konten Produk Dataran -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-title">
                        List Rating dan Ulasan<br />
                        <span>Manajemen Rating & Ulasan Pelanggan
                        </span>
                    </div>
                </div>

                <div class="d-none d-md-block">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Semua</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">Perlu Dibalas
                                <span class="badge rounded-pill bg-primary"
                                    style="margin-left: 5px;">{{ $belumBalas }}</span>
                            </button>

                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false">Sudah Dibalas
                            </button>
                        </li>
                    </ul>



                    {{-- Semua --}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                {{-- <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Filter
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Terbaru</a></li>
                                        <li><a class="dropdown-item" href="#">Terlama</a></li>
                                        <li><a class="dropdown-item" href="#">Rating tertinggi</a></li>
                                        <li><a class="dropdown-item" href="#">Rating terendah</a></li>
                                    </ul>
                                </div> --}}
                                <select name="" id="filter-rating" class="form-select w-25">
                                    <option selected>Filter</option>
                                    <option value="terbaru">Terbaru</option>
                                    <option value="terlama">Terlama</option>
                                    <option value="tinggi">Rating tertinggi</option>
                                    <option value="terendah">Rating Terendah</option>
                                </select>
                            </div>

                            <div id="rating-semua"></div>

                        </div>

                        {{-- Perlu Dibalas --}}
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <select name="" id="filter-rating" class="form-select w-25">
                                    <option selected>Filter</option>
                                    <option value="terbaru">Terbaru</option>
                                    <option value="terlama">Terlama</option>
                                    <option value="tinggi">Rating tertinggi</option>
                                    <option value="terendah">Rating Terendah</option>
                                </select>
                            </div>

                            <div id="rating-belum-dibalas"></div>

                        </div>


                        {{-- Sudah Dibalas --}}
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                            tabindex="0">

                            <div class="d-flex justify-content-end mt-4 mb-3">
                                <select name="" id="filter-rating" class="form-select w-25">
                                    <option selected>Filter</option>
                                    <option value="terbaru">Terbaru</option>
                                    <option value="terlama">Terlama</option>
                                    <option value="tinggi">Rating tertinggi</option>
                                    <option value="terendah">Rating Terendah</option>
                                </select>
                            </div>

                            <div id="sudah-dibalas"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gambar dari pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" style="width: 100%; border-radius: 10px;" alt="Gambar Lebih Besar" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="comp-rating d-none">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title" id="title">Jhon Doe 1</h5>
                    <h5 class="card-title">
                        <span style="font-size: 0.78rem;" id="created_at">2023-08-02 23:59:10</span>
                    </h5>
                </div>
                <p class="fw-bold" id="name_prod">Sofa Klasik Eropa</p>
                <div class="d-flex">
                    <img id="img_prod" src="" style="max-height: 130px; border-radius: 10px;"
                        alt="Gambar produk" />
                    <div class="d-flex flex-column justify-content-center align-items-start ml-3"
                        style="margin-top: -9px;">
                        <div class="star-rating" id="start_rating">
                            <i class="bi bi-star-fill text-gold"></i>
                        </div>
                        <p class="mt-1 text-justify" id="desc"></p>
                    </div>
                </div>

                {{-- gambar dari pelanggan --}}
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-row">
                        <img id="image-pelanggan" class="d-none" src=""
                            style="max-width: 6rem; cursor: pointer; margin-right: 10px; margin-left: 10px; border-radius: 5px;"
                            alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button onclick="toggleReply()" class="btn btn-primary" id="replyButton">Balas
                        Penilaian Ini</button>
                </div>
                <div id="replySection" style="display: block;">
                    <form action="" method="POST" id="form-balasan">
                        <input type="hidden" readonly name="id" id="id_balasan">
                        <input type="hidden" readonly name="rating_id" id="rating_id">
                        <textarea id="replyTextarea" name="balasan" class="mt-4 w-100"
                            placeholder="Masukkan tanggapan anda...... (Min 50 Karakter)" style="border-radius: 5px;" rows="4"
                            cols="50" maxlength="250" oninput="handleDeskripsiProdukChange(event)"></textarea>
                        <div class="d-flex justify-content-end">
                            <span class="text-muted" id="characterCount">0 / 250</span>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary" id="sendReplyButton">Kirim
                                Balasan <i class="bi bi-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="comp-diabalas d-none">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title" id="title"></h5>
                    <h5 class="card-title">
                        <span style="font-size: 0.78rem;" id="created_at">2023-08-02 23:59:10</span>
                    </h5>
                </div>
                <p class="fw-bold" id="name_prod">Sofa Klasik Eropa - Merah</p>
                <div class="d-flex">
                    <img id="img_prod" src="" style="max-height: 130px; border-radius: 10px;"
                        alt="Gambar produk" />
                    <div class="d-flex flex-column justify-content-center align-items-start ml-3"
                        style="margin-top: -9px;">
                        <div class="star-rating" id="start_rating">
                            <i class="bi bi-star-fill text-gold"></i>
                        </div>
                        <p class="mt-1 text-justify" id="desc">
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-row">
                        <img id="image-pelanggan" class="d-none"
                            style="max-width: 6rem; cursor: pointer; margin-right: 10px; margin-left: 10px; border-radius: 5px;"
                            alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Tanggapan Anda</h5>
                    <h5 class="card-title">
                        <span style="font-size: 0.78rem;" id="date-tanggapan">2023-08-02 23:59:10</span>
                    </h5>
                </div>
                <p class="text-justify" id="balasan">
                </p>
            </div>
        </div>
    </div>

@stop

@push('js')
    <script>
        let elem_rating = ''
        const openModal = (imageSrc) => {
            const modalImage = document.getElementById("modalImage");
            modalImage.src = imageSrc;
            $('#exampleModal').modal('show')
            // const modal = new bootstrap.Modal(document.getElementById("exampleModal"));
            // modal.show();
        };
        let rating = []
        const createRating = (data) => {
            if (elem_rating == 'belum-dibalas') {
                $('#rating-belum-dibalas').html('')
            } else if (elem_rating == 'dibalas') {
                $('#sudah-dibalas').html('')
            } else {
                $('#rating-semua').html('')
            }
            $.each(data, function(i, val) {
                let clone = ''
                if (elem_rating == 'dibalas') {
                    clone = $('.comp-diabalas > div').clone();
                } else {
                    clone = $('.comp-rating > div').clone()
                }
                clone.find('#title').html(val.name)
                clone.find('#created_at').html(val.create)
                clone.find('#name_prod').html(val.product.name)
                clone.find('#img_prod').attr('src', val.product_image)
                clone.find('#desc').html(val.text)
                let rating = ''
                for (let index = 0; index < parseInt(val.rating_value); index++) {
                    rating += '<i class="bi bi-star-fill text-gold"></i>'

                }
                if (val.image != null) {
                    clone.find('#image-pelanggan').removeClass('d-none').attr('src', val.image).attr('onclick',
                        `openModal('${val.image}')`)
                } else {
                    clone.find('#image-pelanggan').addClass('d-none')
                }
                clone.find('#start_rating').html(rating)
                if (elem_rating == '') {
                    clone.find('#rating_id').val(val.id)

                    if (val.balasan != null) {
                        clone.find('#id_balasan').val(val.balasan.id)
                        clone.find('#replyTextarea').text(val.balasan.balasan)
                    }
                }

                if (elem_rating == 'dibalas') {
                    clone.find('#date-tanggapan').html(val.balasan.create)
                    clone.find('#balasan').html(val.balasan.balasan)
                }
                if (elem_rating == 'belum-dibalas') {
                    $('#rating-belum-dibalas').append(clone)
                } else if (elem_rating == 'dibalas') {
                    $('#sudah-dibalas').append(clone)
                } else {
                    $('#rating-semua').append(clone)
                }
            })
        }

        const getRating = (filter = null, search = null) => {
            const action = "{{ route($this_helper . 'data') }}"
            const ajax = new AjaxRequest(action, 'GET', 'swal', {
                processData: true,
                contentType: true,
            })

            ajax.onBefore = () => {
                $('#rating-semua').html('')
                $loaderEl.removeClass('d-none')
            }

            ajax.onfail = () => {
                $loaderEl.addClass('d-none')
            }
            let data = ''
            if (search != null && filter != null) {
                data = {
                    search: search,
                    filter: filter
                }
            } else if (search != null) {
                data = {
                    search: search
                }
            } else if (filter != null) {
                data = {
                    filter: filter
                }
            }
            ajax.submit(data, (resp) => {
                if (resp.success) {
                    $loaderEl.addClass('d-none');
                    createRating(resp.data)
                }
            })
        }

        $('body').on('click', '#profile-tab', function() {
            elem_rating = 'belum-dibalas'
            getRating(null, 'belum-dibalas')
        })

        $('body').on('click', '#home-tab', function() {
            elem_rating = ''
            getRating(null, null)
        })

        $('body').on('change', '#filter-rating', function() {
            let value = $(this).val()
            getRating(value, elem_rating)
        })
        $('body').on('click', '#contact-tab', function() {
            elem_rating = 'dibalas'
            getRating(null, 'dibalas')
        })

        getRating()

        $('body').on('submit', '#form-balasan', function(e) {
            e.preventDefault()

            const action = "{{ route($this_helper . 'balasan') }}"
            const ajax = new AjaxRequest(action)
            ajax.onBefore = () => {
                addLoader2El($('#sendReplyButton'), "Saving...");
                $('#sendReplyButton').attr('disabled', true);
            }

            ajax.onfail = () => {
                $('#sendReplyButton').attr('disabled', false).html(
                    "Kirim Balasan <i class='bi bi-arrow-right'></i>")
                // removeLoader($('#sendReplyButton'))''
            }

            let data = new FormData(this)
            ajax.submit(data, (resp) => {
                if (resp.success) {
                    swal('redirect', '', resp.message ?? "Success set pricelist", resp.url)
                    $('#sendReplyButton').attr('disabled', false).html(
                        "Kirim Balasan <i class='bi bi-arrow-right'></i>")
                }
            })
        })
    </script>
@endpush
