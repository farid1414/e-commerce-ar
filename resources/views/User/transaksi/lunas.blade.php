@forelse ($transaction->where('status', true) as $index => $tr)
    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 0.85rem;">{{ $tr->code ?? '' }}</span>
                </div>
                <div class="col-auto">
                    <span style="font-size: 0.85rem;">{{ $tr->created_date() }}</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title" style="margin-bottom: -10px;">
                        <p class="fs-3 fs-md-5">{{ formatRupiah($tr->order_amount) }}</p>
                    </h5>
                </div>
                <div class="col-auto">
                    <button onclick="toggleCollapse('collapse_{{ $index }}')"
                        class="btn btn-light collapse-button" style="border-radius: 15px;">
                        <svg class="bi bi-chevron-up" width="30" height="30" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M7.646 4.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 5.707 5.354 8.354a.5.5 0 11-.708-.708l3-3z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted bg-white">
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-between">
                        <div class="text-left">{{ $tr->transactionDetail->count() }} Produk</div>
                        <div class="text-right">Sudah Dibayar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse" id="collapse_{{ $index }}">
        <br>
        <p class="p-3 bg-success text-white text-center" style="border-radius: 3px;">Lunas</p>
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title fw-bold">No. Pesanan</h5>
                    <h5 class="card-title text-muted d-flex align-items-center" style="font-size: 1rem;">
                        {{ $tr->code ?? '' }}</h5>
                </div>
            </div>
        </div>
        @php
            $totalHarga = 0;
        @endphp
        @foreach ($tr->transactionDetail as $detail)
            @php
                $subTotal = $detail->total;
                $diskon = $detail->diskon ?? 0;
                $ongkir = $detail->ongkir ?? 0;
                $harga = $subTotal - $diskon;
                $totalOngkir = $harga + $ongkir;
                $totalHarga += $totalOngkir;
            @endphp
            <div class="mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="margin-bottom: -20px;">
                            <p class="fw-bold" style="font-size: 20px;">Rician Pesanan</p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <img src="{{ url($detail->product->thumbnail) }}" alt="Produk"
                                    style="max-width: 150px; border-radius: 10px;">
                            </div>
                            <div class="col d-flex flex-column">
                                <div>
                                    <p class="fw-bold" style="font-size: 1.2rem;">{{ $detail->product->name }}</p>
                                    <p class="text-muted">Varian : {{ $detail->varian->name }}</p>
                                    <span>Kuantitas : {{ $detail->quantity }}x</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p style="font-size: 20px;"><b>Rincian Harga</b></p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p>Harga Satuan: </p>
                            <p>{{ formatRupiah($detail->harga) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Sub Total Produk: </p>
                            <p>{{ formatRupiah($detail->total) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Diskon: </p>
                            <p>-{{ formatRupiah($diskon) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Ongkos Kirim: </p>
                            <p>{{ formatRupiah($ongkir) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Sub Total Ongkos Kirim: </p>
                            <p>{{ formatRupiah($ongkir) }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Total Pesanan: </p>
                            <p class="fw-bold">{{ formatRupiah($harga) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="d-flex justify-content-between">
            <p class="fw-bold">Total Keseluruhan: </p>
            <p class="fw-bold">{{ $tr->transactionDetail->count() }} Produk</p>
            <p><b>{{ formatRupiah($totalHarga) }}</b></p>
        </div>
        <hr>
        <!-- Baris tombol -->
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a href="/DetailPesananUserLunas" class="btn btn-outline-dark mb-3">Detail Pesanan</a>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-success mr-2" onclick="handleShowModal()">
                        Beri Penilaian
                    </button>
                </div>
                <div class="col-auto">
                    <a href="/Invoicepesanan" class="btn btn-dark d-flex align-items-center">
                        Tampilkan Invoice
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right ml-2" viewBox="0 0 16 16" style="margin-left: 20px;">
                            <path fill-rule="evenodd"
                                d="M9.5 1.5a.5.5 0 01.5.5v4a.5.5 0 01-1 0v-3h-3a.5.5 0 010-1h4a.5.5 0 01.5.5z" />
                            <path fill-rule="evenodd"
                                d="M9.293 1.207a.5.5 0 01.708 0l4 4a.5.5 0 010 .708l-4 4a.5.5 0 01-.708-.708L12.793 6H1.5a.5.5 0 010-1h11.293L9.293 2.707a.5.5 0 010-.708z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@empty
    <h3 class="text-center">Tidak ada produk</h3>
@endforelse
{{-- Modal Penilaian --}}
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <!-- tambahkan kelas modal-lg untuk modal lebih besar -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Beri Penilaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 350px; overflow-y: auto;">
                <!-- menggunakan inline style max-height dan overflow-y -->
                <div class="row">
                    <div class="col-md-4">
                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 2/Produk2gambar1.jpg"
                            class="img-fluid" alt="Gambar Produk" style="border-radius: 10px">
                    </div>
                    <div class="col-md-8">
                        <h5>Nama Produk</h5>
                        <div class="d-flex justify-content-between">
                            <p>Kuantitas: </p>
                            <p>1x</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Varian: </p>
                            <p>-</p>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- Star rating --}}
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="alert" role="alert" style="background-color: #F5F5F5;">
                    <div>
                        <textarea rows="5" id="comment" placeholder="Tulis ulasan Anda Disini... (Min 50 Karakter)"
                            style="width: 100%; padding: 8px; border-radius: 4px;" required minlength="50" maxlength="250"
                            oninput="updateCommentCount()"></textarea>
                        <div class="d-flex justify-content-end">
                            <span class="text-muted" id="commentCount">0 / 250</span>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <figcaption class="blockquote-footer mt-2">
                            Gambar yang dapat diupload (
                            <span id="remainingImagesCount">
                                3
                            </span>
                            )
                        </figcaption>
                        <label for="imageInput" class="btn btn-outline-dark" style="margin-bottom: 10px;">
                            <i class="bi bi-camera"></i> Tambah Foto
                            <input type="file" accept="image/*" id="imageInput" style="display: none;">
                        </label>
                    </div>
                    <div class="row" id="imageRow"
                        style="display: grid; grid-template-columns: repeat(3, 1fr); grid-gap: 10px; margin-top: 20px;">
                    </div>
                </div>


                <div class="container">
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <p>
                                Tampilkan nama pada penilaian.
                            </p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="customSwitch"
                                    onchange="toggleSwitch()">
                                <label class="form-check-label" for="customSwitch"></label>
                            </div>
                        </div>
                        <span style="margin-top: -20px">
                            <figcaption class="blockquote-footer mt-1" id="namaPenilaian">
                                Nama yang ditampilkan adalah
                                <cite title="Source Title">Jhon Doe</cite>
                            </figcaption>
                        </span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="d-flex justify-content-between w-100">
                    <!-- tambahkan kelas w-100 untuk membuat div memiliki lebar 100% -->
                    <button type="button" class="btn btn-outline-secondary" onclick="handleReset()">Reset</button>
                    <button type="button" class="btn btn-dark" onclick="handleButtonClick()">
                        Kirim Penilaian
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


{{-- Sensor nama --}}
<script>
    var originalName;

    // Simpan nama asli saat halaman dimuat
    window.onload = function() {
        originalName = document.querySelector('#namaPenilaian cite').textContent;
    }

    function toggleSwitch() {
        var nama = document.querySelector('#namaPenilaian cite').textContent;

        if (originalName === undefined) {
            originalName = nama;
        }

        if (document.getElementById("customSwitch").checked) {
            // Mengubah nama dengan sensor bintang sesuai panjang nama
            var maskedName = '';
            for (var i = 0; i < nama.length; i++) {
                if (i === 0 || i === nama.length - 1 || nama[i] === ' ') {
                    maskedName += nama[i]; // Biarkan karakter pertama, terakhir, dan spasi tidak tersensor
                } else {
                    maskedName += '*'; // Sensor semua karakter lainnya
                }
            }
            document.querySelector('#namaPenilaian cite').textContent = maskedName;
        } else {
            // Mengembalikan nama ke kondisi asal
            document.querySelector('#namaPenilaian cite').textContent = originalName;
            originalName = undefined;
        }
    }
</script>


{{-- Menghitung jumlah text area --}}
<script>
    function updateCommentCount() {
        var comment = document.getElementById("comment").value;
        var count = comment.length;
        document.getElementById("commentCount").textContent = count + " / 250";
    }
</script>


{{-- Menampilkan modal --}}
<script>
    function handleShowModal() {
        $('#myModal').modal('show');
    }
</script>
