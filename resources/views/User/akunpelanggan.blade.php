<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil Pelanggan</title>
</head>

@include('user.komponenuser.navbaruser')


<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>

@include('user.include.style')

<body>
    @include('layouts.loader')
    <main>
        <div class="container">

            <div class="text-center mt-5 mb-5">
                <h1><b>Akun Saya.</b></h1>
            </div>

            {{-- PC --}}
            <div class="d-none d-lg-block">
                <ul class="nav nav-pills mb-3 d-flex justify-content-around" id="pills-tab" role="tablist"
                    style="margin-bottom: 20px;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active btn-outline-dark" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Profil Saya</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-dark" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Pesanan Belum Bayar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-dark" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Pesanan Sudah Bayar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-dark" id="pills-disabled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-disabled" type="button" role="tab"
                            aria-controls="pills-disabled" aria-selected="false">Pesanan Dibatalkan</button>
                    </li>
                </ul>
            </div>

            {{-- MOBILE --}}
            <div class="d-block d-md-none">
                <ul class="nav nav-pills mb-3 d-flex justify-content-around" id="pills-tab" role="tablist"
                    style="margin-bottom: 20px;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active btn-outline-dark" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true" style="font-size: 15px"> Saya</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-dark" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false" style="font-size: 14px">Belum Bayar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-dark" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false" style="font-size: 14px">Sudah Bayar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link btn-outline-dark" id="pills-disabled-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-disabled" type="button" role="tab"
                            aria-controls="pills-disabled" aria-selected="false"
                            style="font-size: 14px">Dibatalkan</button>
                    </li>
                </ul>
            </div>


            <hr style="border-width: 3px; color:black">



            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">

                    <form action="" method="POST" id="form-profil">
                        <div class="container">
                            {{-- Data diri --}}
                            <h4>Data diri anda.</h4>
                            <hr>

                            <!-- Nama -->
                            <div class="d-flex justify-content-between align-items-center">
                                <p>Nama :</p>
                                <div>
                                    <p id="nama">{{ Auth::user()->name }}</p>
                                    <input type="text" name="name" class="form-control form-control-md"
                                        id="edit-nama" style="display: none;" value="{{ Auth::user()->name }}">
                                </div>
                            </div>

                            <hr>

                            <!-- Nomor Hand Phone -->
                            <div class="d-flex justify-content-between">
                                <p>Nomor Hand Phone :</p>
                                <p id="phone">{{ Auth::user()->customer->phone }}</p>
                                <input type="text" name="phone" class="form-control" id="edit-phone"
                                    style="display: none;" value="{{ Auth::user()->customer->phone }}">
                            </div>
                            <hr>

                            <!-- Email -->
                            <div class="d-flex justify-content-between">
                                <p>Email :</p>
                                <p id="email">{{ Auth::user()->email }}</p>
                                <input type="email" name="email" class="form-control" id="edit-email"
                                    style="display: none;" value="{{ Auth::user()->email }}">
                            </div>
                            <hr>

                            <!-- Alamat -->
                            <div class="d-flex justify-content-between">
                                <p>Alamat :</p>
                                <p id="alamat">{{ Auth::user()->customer->address }}</p>
                                <textarea class="form-control" name="address" id="edit-alamat" style="display: none;">{{ Auth::user()->customer->address }}</textarea>
                            </div>
                            <hr>

                            <!-- Password (bisa juga ditambahkan jika diperlukan) -->
                            <div class="d-flex justify-content-between mt-4">
                                <p>Password :</p>
                                <p>*********************</p>
                            </div>
                            <hr>

                            <!-- Tombol Ubah dan Simpan/Batal -->
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-outline-dark" id="btn-ubah">
                                    Ubah <i class="bi bi-pencil-square"></i>
                                </a>

                                <a class="btn btn-outline-secondary me-5" id="btn-batal" style="display: none;">
                                    Batal <i class="bi bi-x"></i>
                                </a>
                                <button class="btn btn-dark" id="btn-simpan" type="submit" style="display: none;">
                                    Simpan <i class="bi bi-check"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                {{-- transaksi Belum bayar --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <h4>Belum Dibayar.</h4>
                    @include('user.transaksi.belumbayar')

                </div>

                {{-- tranaksi sudah bayar --}}
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <h4>Sudah Dibayar.</h4>
                    @include('user.transaksi.lunas')

                </div>

                {{-- transaksi dibatalkan --}}
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab"
                    tabindex="0">
                    <h4>Dibatalkan.</h4>
                    @include('user.transaksi.dibatalkan')

                </div>

            </div>
        </div>
    </main>
    @include('user.include.script')

    @include('user.komponenuser.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>

    <script>
        const $loaderEl = $("#loading");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Script untuk mengatur perubahan dari tampilan data ke form edit
        $(document).ready(function() {
            $('#btn-ubah').click(function() {
                // Sembunyikan tombol Ubah dan tampilkan tombol Simpan dan Batal
                $('#btn-ubah').hide();
                $('#btn-simpan').show();
                $('#btn-batal').show();

                // Tampilkan form input untuk setiap data yang ingin diedit
                $('#nama').hide();
                $('#edit-nama').show();

                $('#phone').hide();
                $('#edit-phone').show();

                $('#email').hide();
                $('#edit-email').show();

                $('#alamat').hide();
                $('#edit-alamat').show();
            });

            $('#btn-batal').click(function() {
                // Tombol Batal diklik, kembalikan ke tampilan semula
                $('#btn-ubah').show();
                $('#btn-simpan').hide();
                $('#btn-batal').hide();

                $('#nama').show();
                $('#edit-nama').hide();

                $('#phone').show();
                $('#edit-phone').hide();

                $('#email').show();
                $('#edit-email').hide();

                $('#alamat').show();
                $('#edit-alamat').hide();
            });

            $('#btn-simpan').click(function() {
                // Implementasikan logika untuk menyimpan perubahan
                var nama = $('#edit-nama').val();
                var phone = $('#edit-phone').val();
                var email = $('#edit-email').val();
                var alamat = $('#edit-alamat').val();

                // Lakukan request untuk menyimpan perubahan (misalnya dengan AJAX)
                // Di sini Anda bisa menggunakan AJAX untuk mengirim data yang diedit ke backend

                // Contoh AJAX:
                /*
                $.ajax({
                    type: 'POST',
                    url: '/update-profile',
                    data: {
                        nama: nama,
                        phone: phone,
                        email: email,
                        alamat: alamat
                    },
                    success: function(response) {
                        // Tampilkan pesan sukses atau sesuaikan dengan kebutuhan
                        alert('Data berhasil diupdate!');

                        // Kembalikan ke tampilan semula setelah update
                        $('#btn-ubah').show();
                        $('#btn-simpan').hide();
                        $('#btn-batal').hide();

                        $('#nama').text(nama).show();
                        $('#edit-nama').hide();

                        $('#phone').text(phone).show();
                        $('#edit-phone').hide();

                        $('#email').text(email).show();
                        $('#edit-email').hide();

                        $('#alamat').text(alamat).show();
                        $('#edit-alamat').hide();
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan error atau sesuaikan dengan kebutuhan
                        alert('Terjadi kesalahan: ' + error);
                    }
                });
                */
            });
        });
    </script>


    <script>
        function toggleCollapse(collapseId) {
            var collapseElement = document.getElementById(collapseId);
            var isCollapsed = collapseElement.classList.contains('show');
            if (isCollapsed) {
                collapseElement.classList.remove('show');
            } else {
                collapseElement.classList.add('show');
            }
        }

        function logoutConfirmation() {
            Swal.fire({
                title: 'Apakah Anda ingin keluar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Logout Berhasil!',
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        willClose: () => {
                            window.location.href =
                                '/beranda'; // Ganti '/beranda' dengan URL beranda Anda
                        }
                    });
                }
            });
        }

        $('body').on('submit', '#form-profil', function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ route('update-profil') }}",
                method: 'POST',
                data: new FormData(this),
                contentType: 'application/json',
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $loaderEl.removeClass('d-none')
                },
                success: function(response) {
                    $loaderEl.addClass('d-none')
                    Swal.fire({
                        title: 'Sucess',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function(err) {
                    $loaderEl.addClass('d-none')
                    let message = "";
                    const json = err.responseJSON;
                    if (json !== undefined) {
                        message = json.message ?? "Internal Server Error";
                        if (json.errors !== undefined && typeof json
                            .errors === "string") message +=
                            `\n${json.errors}`;
                    } else message = `[${err.status}] ${err.statusText}`;
                    let login = "{{ route('login') }}"
                    if (message == "Unauthenticated.") {
                        window.location.href = login;
                        return
                    }
                    Swal.fire({
                        title: 'Error',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            })
        })

        $('body').on('submit', '#form-reason', function(e) {
            e.preventDefault()
            $.ajax({
                url: "{{ route('batalkan-pesanan') }}",
                method: 'POST',
                data: new FormData(this),
                contentType: 'application/json',
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $loaderEl.removeClass('d-none')
                },
                success: function(response) {
                    $loaderEl.addClass('d-none')
                    Swal.fire({
                        title: 'Sucess',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                },
                error: function(err) {
                    $loaderEl.addClass('d-none')
                    let message = "";
                    const json = err.responseJSON;
                    if (json !== undefined) {
                        message = json.message ?? "Internal Server Error";
                        if (json.errors !== undefined && typeof json
                            .errors === "string") message +=
                            `\n${json.errors}`;
                    } else message = `[${err.status}] ${err.statusText}`;
                    let login = "{{ route('login') }}"
                    if (message == "Unauthenticated.") {
                        window.location.href = login;
                        return
                    }
                    Swal.fire({
                        title: 'Error',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            })
        })
    </script>

</body>

</html>
