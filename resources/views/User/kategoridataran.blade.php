<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori Dataran</title>
</head>
@include('user.komponenuser.navbaruser')



@include('user.include.style')

<body>

    <div class="container">
        <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
            <h2><b>Kategori Terbaik Untuk Anda.
                </b></h2>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($cat as $cat)
                    <div class="col-xs-12 col-md-4" style="flex-basis: 33.33%;">
                        <a href="{{ route('product-category', $cat->id) }}" style="text-decoration: none;">
                            <div class="text-center">
                                <img src="{{ url($cat->image) }}" alt="Gambar 1"
                                    style="border-radius: 10px; max-width: 100%;" class="img-fluid">
                                <p class="fw-bold mt-3 text-black">{{ $cat->name }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                <!-- Add more columns for additional images -->
            </div>
        </div>



    </div>
    @include('user.include.script')
    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>
    @include('user.komponenuser.footer')

</body>

</html>
