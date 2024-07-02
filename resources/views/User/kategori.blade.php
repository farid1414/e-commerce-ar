<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@include('user.komponenuser.navbaruser')


@include('user.include.style')

<body>

    <section>
        <div class="container">
            <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
                <h2><b>Tentukan Kategori Pilihan Anda.

                    </b></h2>
            </div>
            <div style="margin-bottom: 30px;">
                <div class="container">
                    <div class="row">
                        <div class="col" data-aos="fade-up-right">
                            <a href="/Kategoriground">
                                <div style="position: relative; overflow: hidden; border-radius: 12px;">
                                    <img class="img-fluid" src="../gambar/testbg.png" alt="" />
                                    <div
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); border-radius: 10px;">
                                    </div>
                                    <div
                                        style="position: absolute; bottom: 10px; left: 15px; color: white; font-weight: bold; font-size: 3.4vw; display: flex; flex-direction: column; align-items: start;">
                                        <span>
                                            Place <br /> Furniture <br /> On The Ground
                                        </span>
                                    </div>
                                    <div
                                        style="position: absolute; bottom: 10px; right: 15px; color: white; font-size: 5vw;">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col" data-aos="fade-up-left">
                            <a href="/Kategoridinding">
                                <div style="position: relative; overflow: hidden; border-radius: 12px;">
                                    <img class="img-fluid" src="../gambar/testbg2.png" alt=""
                                        style="border-radius: 20px;" />
                                    <div
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); border-radius: 10px;">
                                    </div>
                                    <div
                                        style="position: absolute; bottom: 10px; left: 15px; color: white; font-weight: bold; font-size: 3.4vw; display: flex; flex-direction: column; align-items: start;">
                                        <span>
                                            Place <br /> Furniture <br /> On The Wall
                                        </span>
                                    </div>
                                    <div
                                        style="position: absolute; bottom: 10px; right: 15px; color: white; font-size: 5vw;">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @include('user.komponenuser.footer')
            @include('user.include.script')
            <div class='d-block d-lg-none'>
                @include('user.komponenuser.bottomnavbar')
            </div>
            
</body>

</html>
