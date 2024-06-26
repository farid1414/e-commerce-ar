@forelse ($transaction->where('status', false) as $tr)
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
                    <button onclick="toggleCollapse('collapse2')" class="btn btn-light collapse-button"
                        style="border-radius: 15px;">
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
                        <div class="text-right">Menunggu Pembayaran</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse" id="collapse2">
        <br>
        <p class="p-3 bg-primary text-white text-center" style="border-radius: 3px;">Belum Dibayar</p>
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
        {{-- <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <a href="/DetailPesananUserLunas" class="btn btn-outline-dark mb-3">Detail Pesanan</a>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#cancelOrderModal">
                        Batalkan Pesanan
                    </button>
                </div>
                <div class="col-auto">
                    <a href="/Invoicepesanan" class="btn btn-dark d-flex align-items-center">
                        Bayar Pesanan
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
        </div> --}}
    </div>
@empty
    <h3 class="text-center">Tidak ada produk</h3>
@endforelse


<!-- Script untuk menangani pembatalan pesanan -->
<script>
    function showConfirmation() {
        Swal.fire({
            title: 'Konfirmasi Pembatalan Pesanan',
            text: 'Apakah Anda yakin ingin membatalkan pesanan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Batalkan Pesanan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                cancelOrder();
            }
        });
    }

    function cancelOrder() {
        var reason = document.getElementById('reasonDropdown').value;
        // Simulasi proses pembatalan pesanan (misalnya, kirim permintaan ke server)
        setTimeout(() => {
            // Proses pembatalan berhasil
            console.log("Alasan Pembatalan: " + reason);
            // Menampilkan pesan bahwa pesanan berhasil dibatalkan menggunakan Swal
            Swal.fire(
                'Pesanan Dibatalkan!',
                'Pesanan Anda telah berhasil dibatalkan.',
                'success'
            ).then(() => {
                // Setelah menampilkan SweetAlert, Anda bisa menutup modal Bootstrap
                $('#cancelOrderModal').modal('hide');
            });
        }, );
    }
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
</script>
