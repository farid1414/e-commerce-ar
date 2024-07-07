<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Pelanggan</title>
</head>
@include('user.komponenuser.navbaruser')


@include('user.include.style')

<body>

    <div class="container">

        <div class="text-center mt-5 mb-5">
            <h1><b>Detail Pesanan Saya.</b></h1>
        </div>

        @include('user.transaksi.detaillunas')

        {{-- @include('user.transaksi.detailbelumbayar') --}}

        {{-- @include('user.transaksi.detaildibatalkan') --}}
        <pre><div id="result-json"><br></div></pre>
    </div>

    @include('user.include.script')

    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>

    @include('user.komponenuser.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>


    <script>
        $('body').on('click', '#bayar-pesanan', function() {
            console.log("asa");
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
    </script>
</body>

</html>
