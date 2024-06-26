<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-6">
                <div class="mb-3">
                    <p><b>Informasi Pemesan</b></p>
                    <span>{{ $transaction->user->name }}</span><br />
                    <span>{{ $transaction->user->email }}</span><br />
                    <span>{{ $transaction->user->customer->phone }}</span>
                </div>
                <div>
                    <p><b>Informasi Alamat Pelanggan</b></p>
                    <p>{!! $transaction->user->customer->address !!}</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-6">
                <div>
                    <p><b>No. Transaksi</b></p>
                    <p>{{ $transaction->code }}</p>
                </div>
                {{-- <div>
                    <p><b>No. Pesanan</b></p>
                    <p>AR-F/ORD-20230815-0003</p>
                </div> --}}
            </div>
            <div class="col-xs-12 col-md-4 col-6">
                <div>
                    <p><b>Waktu Pemesanan</b></p>
                    <p>{{ $transaction->created_date() }}</p>
                </div>
                <div>
                    <p><b>Status Pembayaran</b></p>
                    <h4><b><span class="badge rounded-pill bg-success text-white">Lunas/ Sudah dibayar</span></b></h4>
                    <p><b>Waktu Pembayaran</b></p>
                    <p>{{ $transaction->payment_date() }}</p>
                    <p><b>Metode Pembayaran</b></p>
                    <p>{{ $transaction->payment_type ?? '' }}</p>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="mb-4"><b>Produk Yang Anda Pesan.</b></h4>
        @php
            $totalHarga = 0;
        @endphp
        @foreach ($transaction->transactionDetail as $detail)
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
        <div class="mt-4 mb-4">
            <h4 class="fw-bold" style="font-size: 1.4rem;">Penilaian & Ulasan Anda.</h4>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Tampilkan ulasan yang anda berikan.
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <Ulasanprodukdihalamandetailpesananlunas />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <hr class="mt-5">
        <div class="d-flex justify-content-between">
            <p class="fw-bold">Total Keseluruhan: </p>
            <p class="fw-bold">2 Produk </p>
            <p><b> Rp. 1.500.000</b></p>
        </div>
        <hr style="margin-top: -5px;">
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success">Beri Penilaian</button>
            <a href="/Invoicepesanan" class="btn btn-dark">
                Tampilkan Invoice
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
