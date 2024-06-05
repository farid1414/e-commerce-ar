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
@include('user.komponenuser.breadcrumb')

<body>
    
    <div class="container">

        <div class="text-center mt-5 mb-5">
            <h1><b>Akun Saya.</b></h1>
          </div>

          <div class="d-none d-lg-block">
            <ul class="nav nav-pills mb-3 d-flex justify-content-around" id="pills-tab" role="tablist" style="margin-bottom: 20px;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn-outline-dark" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Profil Saya</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn-outline-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pesanan Belum Bayar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn-outline-dark" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Pesanan Sudah Bayar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn-outline-dark" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Pesanan Dibatalkan</button>
                </li>
            </ul>          
        </div>

          <div class="d-block d-md-none">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-bottom: 20px;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn-outline-dark"
                     id="pills-home-tab" data-bs-toggle="pill" 
                     data-bs-target="#pills-home" type="button" role="tab"
                      aria-controls="pills-home" aria-selected="true" style="font-size: 15px"> Saya</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn-outline-dark" 
                    id="pills-profile-tab" data-bs-toggle="pill" 
                    data-bs-target="#pills-profile" type="button" 
                    role="tab" aria-controls="pills-profile" aria-selected="false" style="font-size: 14px">Belum Bayar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn-outline-dark" id="pills-contact-tab" 
                    data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" 
                    role="tab" aria-controls="pills-contact" aria-selected="false" style="font-size: 14px">Sudah Bayar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn-outline-dark" id="pills-disabled-tab" 
                    data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" 
                    role="tab" aria-controls="pills-disabled" aria-selected="false" style="font-size: 14px">Dibatalkan</button>
                </li>
            </ul>        
         </div>
         
        
         <hr style="border-width: 3px; color:black" >

        
        
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home"
             role="tabpanel" aria-labelledby="pills-home-tab" 
             tabindex="0">
            
             {{-- Data diri --}}
             <h4>Data diri anda.</h4>
             <hr>
             <div class="d-flex justify-content-between">
              <p>Nama :</p>
              <p>Jhon Doe</p>
          </div>
          <hr>
          <div class="d-flex justify-content-between">
              <p>Nomor Hand Phone :</p>
              <p>08132828112</p>
          </div>
          
          <hr>
          <div class="d-flex justify-content-between">
              <p>Email :</p>
              <p>JhonDoe@gmail.com</p>
          </div>
          
          <hr>
          <div class="d-flex justify-content-between">
              <p>Alamat  :</p>
              <p>JL jhondoew 111, 2120i12821</p>
          </div>
          
          <hr>
          <div class="d-flex justify-content-between">
              <p>Password  :</p>
              <p>***********************</p>
          </div>
          <hr>
          
          <div class="d-flex justify-content-between">
          <button class="btn btn-outline-danger" onclick="logoutConfirmation()">
          <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log Out / Keluar
          </button>
          <button class="btn btn-outline-dark">
          Ubah <i class="bi bi-pencil-square"></i>
          </button>

        </div>
            
            </div>

            {{-- transaksi Belum bayar --}}
            <div class="tab-pane fade" id="pills-profile" 
            role="tabpanel" aria-labelledby="pills-profile-tab" 
            tabindex="0">
            <h4>Belum Dibayar.</h4>

            @include('user.transaksi.belumbayar')

            </div>
            </div>

            {{-- tranaksi sudah bayar --}}
            <div class="tab-pane fade" id="pills-contact" 
            role="tabpanel" aria-labelledby="pills-contact-tab" 
            tabindex="0">
            <h4>Sudah Dibayar.</h4>

           @include('user.transaksi.lunas')

        </div>

        {{-- transaksi dibatalkan --}}
            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
            <h4>Dibatalkan.</h4>

        @include('user.transaksi.dibatalkan')

    </div>
          
        </div>   
    </div>
    @include('user.include.script')

    @include('user.komponenuser.footer')

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
                            window.location.href = '/beranda'; // Ganti '/beranda' dengan URL beranda Anda
                        }
                    });
                }
            });
        }
    </script>
   
</body>
</html>
