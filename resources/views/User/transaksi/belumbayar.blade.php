@forelse ($transaction->where('status', '=', 0) as $index => $tr)
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
                        <div class="text-right">Menunggu Pembayaran</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse mb-4" id="collapse_{{ $index }}">
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
                <div class="col-auto">
                    <button type="button" class="btn btn-danger mr-2 cancel-pesanan" data-id="{{ $tr->id }}">
                        Batalkan Pesanan
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-dark" data-id="{{ $tr->id }}"
                        data-token="{{ $tr->snap_token }}" id="bayar">
                        Bayar
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@empty
    <h3 class="text-center">Tidak ada Transaksi.</h3>
@endforelse

<div class="modal fade" id="cancelOrderModal" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelOrderModalLabel">Konfirmasi Pembatalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="form-reason">
                <div class="modal-body">
                    <input type="hidden" readonly name="transaction_id" id="transaction_id">
                    <div class="form-group">
                        <label for="cancelReason">Alasan Pembatalan</label>
                        <select class="form-control" required name="reason" id="cancelReason">
                            <option value="" selected disabled>Pilih alasan</option>
                            <option value="not_needed">Ingin merubah rincian & membuat pesanan baru.</option>
                            <option value="ordered_mistake">Lainnya/berubah pikiran.</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Batalkan Pesanan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<pre><div id="result-json"><br></div></pre>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
</script>
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

    $('body').on('click', '#bayar', function() {
        let id = $(this).attr('data-id')
        let token = $(this).attr('data-token')
        console.log('click', id, token);

        snap.pay(token, {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result,
                    null, 2);
                let payment_type = result.payment_type
                window.location.href =
                    "{{ route('transaction-success') }}/" + id + '/' +
                    payment_type
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result,
                    null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result,
                    null, 2);
                window.location.href =
                    "{{ route('transaction-failed') }}/" + id
            }
        });
    })

    $('body').on('click', '.cancel-pesanan', function() {
        let id = $(this).attr('data-id')
        $('#cancelOrderModal').find('#transaction_id').val(id)
        $('#cancelOrderModal').modal('show')
    })
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
