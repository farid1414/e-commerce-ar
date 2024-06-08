<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Pelanggan</title>
</head>
@include('user.komponenuser.navbaruser')

<div class='d-block d-lg-none'>
@include('user.komponenuser.bottomnavbar')
</div>

@include('user.komponenuser.breadcrumb')

@include('user.include.style')

<body>
    
    <div class="container">

        <div class="text-center mt-5 mb-5">
            <h1><b>Detail Pesanan Saya.</b></h1>
          </div>
       
@include('user.transaksi.detaillunas')

{{-- @include('user.transaksi.detailbelumbayar') --}}

{{-- @include('user.transaksi.detaildibatalkan') --}}

    </div>
       
    @include('user.include.script')

    @include('user.komponenuser.footer')

   
   
</body>
</html>
