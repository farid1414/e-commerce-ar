<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chekout Produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@include('user.komponenuser.navbaruser')



@include('user.include.style')

<body>
    @include('layouts.loader')
    <div class="container">
        <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
            <h2><b>Periksa Kembali Pesanan Anda.
                </b></h2>
        </div>

        <div class="mb-4">
            <h5><b>Informasi Pelanggan.</b></h5>
            <p>{{ Auth::user()->name }}</p>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->customer->phone }}</p>
        </div>

        <hr class="my-4" />

        <div class="row">
            <div class="col-md-6 mb-4">
                <h5 class="font-weight-bold"><b>Alamat Lengkap Anda.</b></h5>
                <p>{!! Auth::user()->customer->address !!}</p>
            </div>
            {{-- <div class="col-md-6 d-flex align-items-center justify-content-end">
                <button class="btn btn-outline-dark mr-2" style="margin-right: 10px;">Batal</button>
                <button class="btn btn-dark">Simpan</button>
            </div> --}}
        </div>

        <hr style="margin-top: -5px;" />
        <div>
            <div class="mb-4">
                <h4 style="margin-bottom: 25px; margin-top: 30px;"><b>Ringkasan Pesanan Anda.</b></h4>
                @php
                    $totalHarga = 0;
                @endphp
                {{-- {{ dd($transaction->transactionDetail) }} --}}
                @foreach ($transaction->transactionDetail as $i => $cart)
                    @php
                        $subTotal = $cart->harga;
                        $diskon = $transaction->diskon ?? 0;
                        $ongkir = $cart->ongkir ?? 0;
                        $harga = $subTotal - $diskon;
                        $totalOngkir = $harga + $ongkir;
                        $totalHarga += $totalOngkir;
                    @endphp

                    <input type="hidden" readonly name="product_id[]" value="{{ $cart->product->id }}">
                    @if ($cart->product->flashSale)
                        @php
                            $flashSale = $cart->product->flashSale
                                ->where('product_varian_id', $cart->varian->id)
                                ->first()->flashSale;
                        @endphp
                        @if ($flashSale)
                            <input type="hidden" readonly name="flash_sale_id[{{ $i }}]"
                                value="{{ $flashSale->id }}">
                        @endif
                    @endif
                    {{-- <input type="hidden" readonly name="varian_id[]" value="{{ $cart->varian->id }}">
                    <input type="hidden" readonly name="qty[]" value="{{ $cart->qty }}">
                    <input type="hidden" readonly name="harga[]" value="{{ $cart->harga }}">
                    <input type="hidden" readonly name="total[]" value="{{ $cart->sub_total }}">
                    <input type="hidden" readonly name="ongkir[]" value="{{ $ongkir }}"> --}}
                    @if ($cart->diskon)
                        <input type="hidden" readonly name="diskon[{{ $i }}]" value="{{ $cart->id }}">
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between" style="margin-bottom: -20px;">
                                <p class="fw-bold" style="font-size: 20px;">Rician Pesanan</p>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col d-flex flex-column">
                                    <img src="{{ url($cart->product->thumbnail) }}" alt="Produk"
                                        style="max-width: 130px; border-radius: 10px; margin-left: 17px;" />
                                </div>

                                <div class="col d-flex flex-column">
                                    <div>
                                        <p class="fw-bold" style="font-size: 1.2rem;">{{ $cart->product->name }}
                                        </p>
                                        <p class="text-muted">Varian : {{ $cart->varian->name }}</p>
                                        <span>Kuantitas : {{ $cart->quantity }}x</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p style="font-size: 20px;"><b>Rincian Harga</b></p>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p>Harga Satuan: </p>
                                <p>{{ formatRupiah($cart->harga) }}</p>
                            </div>
                            @if ($cart->diskon)
                                <div class="d-flex justify-content-between">
                                    <p>Diskon:</p>
                                    <p>- {{ formatRupiah($cart->diskon) }} </p>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <p>Sub Total Produk: </p>
                                <p>{{ formatRupiah($harga) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Ongkos Kirim: </p>
                                <p>{{ formatRupiah($cart->ongkir ?? 0) }}</p>
                            </div>
                            {{-- <div class="d-flex justify-content-between">
                                <p>Sub Total Ongkos Kirim: </p>
                                <p>-Rp 500.000</p>
                            </div> --}}
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold">Total Pesanan: </p>
                                <p class="fw-bold ">{{ formatRupiah($totalOngkir) }}</p>
                            </div>
                        </div>
                    </div>
                    <hr />
                @endforeach
            </div>

            <hr style="margin-top: 40px;" />

            <div class="d-flex justify-content-between">
                <p class="fw-bold">Total Keseluruhan :</p>
                <p class="fw-bold">{{ $cart->count() }} Produk,</p>
                <p class="fw-bold">{{ formatRupiah($totalHarga) }}</p>
            </div>
        </div>
        <input type="hidden" readonly name="order_amount" value="{{ $totalHarga }}">
        <hr style="margin-top: -5px; margin-bottom: 40px;" />
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3><b>Metode Pembayaran Yang Tersedia.</b></h3>
                <p style="text-align: justify;">
                    Kami menyediakan berbagai opsi metode pembayaran yang dapat Anda pilih. Kami menerima metode
                    pembayaran berikut ini. Silakan pilih metode pembayaran yang sesuai dengan preferensi Anda.
                </p>
            </div>
            <div class="col-md-6 text-center mt-3 mt-md-0">
                <img src="{{ asset('gambar/metode-pembayaran.png') }}" alt="Metode Pembayaran" class="img-fluid" />
            </div>
        </div>

        <hr />

        <!-- Tombol navigasi -->
        <div class="d-flex justify-content-between">
            <button class="btn btn-outline-dark" type="button">
                <i class="fas fa-arrow-left ml-2" style="margin-right: 10px;"></i>
                Kembali
            </button>
            <button class="btn btn-dark d-flex align-items-center" type="button" id="pay-button">
                Bayar
                <i class="fas fa-arrow-right ml-2" style="margin-left: 10px;"></i>
            </button>
        </div>
        <pre><div id="result-json"><br></div></pre>
    </div>
    @include('user.include.script')

    @include('user.komponenuser.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
    <script>
        const $loaderEl = $("#loading");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            // $('body').on('submit', '#checkout', function(e) {
            //     e.preventDefault()
            //     console.log("submit");
            //     let data = new FormData(this)
            //     $.ajax({
            //         url: "{{ route('transaction') }}",
            //         method: 'POST',
            //         data: data,
            //         contentType: false,
            //         processData: false,
            //         beforeSend: function() {
            //             $loaderEl.removeClass('d-none')
            //         },
            //         success: function(response) {
            //             $loaderEl.addClass('d-none')
            //             Swal.fire({
            //                 title: 'Sucess',
            //                 text: response.message,
            //                 icon: 'success',
            //                 confirmButtonText: 'OK'
            //             }).then((result) => {
            //                 if (result.isConfirmed) {
            //                     // window.location.href = response.url
            //                 }
            //             });
            //         },
            //         error: function(err) {
            //             $loaderEl.addClass('d-none')
            //             let message = "";
            //             const json = err.responseJSON;
            //             if (json !== undefined) {
            //                 message = json.message ?? "Internal Server Error";
            //                 if (json.errors !== undefined && typeof json.errors === "string")
            //                     message +=
            //                     `\n${json.errors}`;
            //             } else message = `[${err.status}] ${err.statusText}`;
            //             let login = "{{ route('login') }}"
            //             if (message == "Unauthenticated.") {
            //                 window.location.href = login;
            //                 return
            //             }

            //             Swal.fire({
            //                 title: 'Error',
            //                 text: message,
            //                 icon: 'error',
            //                 confirmButtonText: 'OK'
            //             })
            //         }
            //     })
            // })
            document.getElementById('pay-button').onclick = function() {
                // SnapToken acquired from previous step
                snap.pay("{{ $transaction->snap_token }}", {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result,
                            null, 2);
                        console.log("res", result);
                        let payment_type = result.payment_type
                        window.location.href =
                            "{{ route('transaction-success', $transaction->id) }}/" + payment_type
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
                            "{{ route('transaction-failed', $transaction->id) }}"
                    }
                });
            };
        })
    </script>

    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>

</body>

</html>
