@forelse ($transaction->where('status', '=', -1) as $index => $tr)
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
                        <div class="text-right">Dibatalkan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse" id="collapse_{{ $index }}">
        <br>
        <p class="p-3 bg-secondary text-white text-center" style="border-radius: 3px;">Pesanan Dibatalkan</p>
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
                $subTotal = $detail->harga;
                $diskon = $detail->diskon ?? 0;
                $ongkir = $detail->ongkir ?? 0;
                $harga = ($subTotal - $diskon) * $detail->quantity;
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
                                    @if ($detail->product_varian_id)
                                        <p class="text-muted">Varian : {{ $detail->varian->name }}</p>
                                    @endif
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
                            <p>Diskon: </p>
                            <p>-{{ formatRupiah($diskon) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Sub Total Produk: </p>
                            <p>{{ formatRupiah($harga) }}</p>
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
                            <p class="fw-bold">{{ formatRupiah($totalOngkir) }}</p>
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
                    <a href="{{ route('detail-transaction', $tr->id) }}" class="btn btn-outline-dark mb-3">Detail
                        Pesanan</a>
                </div>
            </div>
        </div>
    </div>
@empty
    <h3 class="text-center">Tidak ada Transaksi.</h3>
@endforelse
