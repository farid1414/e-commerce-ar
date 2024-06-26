{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Form tambah ' . $mCat->name)

@section('head_breadcumb', 'Product ' . $mCat->name)
@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item">
        Produk Furnitur Pada {{ $mCat->name }}
    </li>
    <li class="breadcrumb-item active">Form</li>
@stop
{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <section class="section dashboard">

        <form action="" method="POST" id="form-tambah-produk">
            <input type="hidden" readonly name="m_categories" value="{{ $mCat->id }}">
            @if ($edit && $product->uuid)
                <input type="hidden" readonly name="uuid" value="{{ $product->uuid }}" id="">
            @endif
            <div class="card large-card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Produk</h5>
                    <div id="Informasi Produk">
                        <div class="form-group mb-3">
                            <label for="namaProduk">Nama Produk</label>
                            <input type="text" class="form-control" name="name"
                                @if ($edit && $product->name) value="{{ $product->name }}" @endif id="namaProduk"
                                required placeholder="Masukkan nama produk">
                        </div>
                        <!-- Form Group for Sub Nama Produk and Total Stok Produk -->
                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-group w-50 pr-2 me-2">
                                <label for="subNamaproduk">Sub Nama Produk</label>
                                <input type="text" class="form-control" name="sub_name"
                                    @if ($edit && $product->sub_name) value="{{ $product->sub_name }}" @endif
                                    id="subNamaproduk" placeholder="Masukkan sub nama produk" required>
                            </div>
                            <div class="form-group w-50 pl-2 me-2">
                                <label for="stokProduk">Total Stok Produk</label>
                                <input type="number" name="stock"
                                    @if ($edit && $product->stock) value="{{ $product->stock }}" @endif
                                    class="form-control" id="stokProduk" placeholder="Contoh 20" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-group w-50 pr-2 me-2">
                                <label for="hargaProduk">Harga Produk</label>
                                <input type="text" @if ($edit && $product->harga) value="{{ $product->harga }}" @endif
                                    class="form-control" name="harga" id="hargaProduk" placeholder="Masukkan harga produk"
                                    required>
                            </div>
                            <div class="form-group w-50 pl-2 me-2">
                                <label for="kateGoriproduk">Kategori</label>
                                <div class="input-group">
                                    <select class="form-select" name="kategori" id="kateGoriproduk"
                                        placeholder="Pilih kategori" required>
                                        <option selected>Pilih kategori</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                @if ($edit && $product->categori_id == $cat->id) selected @endif>{{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text" onclick="toggleInputGroup()">
                                            <FaChevronDown />
                                        </span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="form-group w-50 pr-2 me-2">
                                <label for="pakaiOngkir">Pakai Ongkos Kirim?</label>
                                <select class="form-control" id="pakaiOngkir" name="check_ongkir"
                                    onchange="handlePakaiOngkirChange()">
                                    <option value="" disabled selected>Pilih opsi</option>
                                    <option value="ya" @if ($edit && $product->harga_ongkir) selected @endif>Ya</option>
                                    <option value="tidak" @if ($edit && !$product->harga_ongkir) selected @endif>Tidak (Free
                                        Ongkir)</option>
                                </select>
                            </div>
                            <div class="form-group w-50 pl-2 me-2">
                                <label for="ongkosKirim">Ongkos Kirim</label>
                                <input type="text" name="ongkir" class="form-control" id="ongkosKirim"
                                    placeholder="Pilih Opsi terlebih dahulu"
                                    @if ($edit && $product->harga_ongkir) value="{{ $product->harga_ongkir }}" @endif
                                    @if (!$edit || !$product->harga_ongkir) disabled @endif>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="deskripsiProduk">Deskripsi Produk</label>
                            <textarea class="form-control" name="description" id="deskripsiProduk" rows="4"
                                placeholder="Masukkan deskripsi produk....." required maxlength="300">
                            @if ($edit && $product->description)
{!! $product->description !!}
@endif
                            </textarea>
                            <div class="d-flex justify-content-end">
                                <span class="text-muted" id="deskripsiLength"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="card large-card">
                <div class="card-body">
                    <h5 class="card-title">Gambar Produk</h5>
                    <div id="contentgambarproduk">
                        <div class="form-group mb-4" id="gambarThumbnail">
                            <label for="thumbnail">Gambar Thumbnail</label>
                            <input type="file" name="thumbnail" accept="image/*" class="form-control" id="thumbnail"
                                onchange="handleGambarThumbnailChange(event)"
                                @if (!$edit) required @endif>
                            <figcaption class="blockquote-footer mt-2">
                                Sisa gambar Thumbnail yang dapat diupload (<span id="remainingThumbnailCount"></span>)
                            </figcaption>
                            <div id="thumbnailPreview" class="position-relative">
                                @if ($edit && $product->thumbnail)
                                    <img src="{{ url($product->thumbnail) }}" alt="preview thumbnail"
                                        style="max-width: 30%; cursor: pointer; border-radius: 10px; overflow: hidden; margin-top: 10px;">
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-1" id="gambarPendukung">
                            <label for="pendukung">Gambar Pendukung (Maksimal 10)</label>
                            <input type="file" class="form-control" name="image[]" accept="image/*" id="pendukung"
                                multiple onchange="handleGambarPendukungChange(event)"
                                @if (!$edit) required @endif>
                            <figcaption class="blockquote-footer mt-2">
                                Sisa gambar pendukung yang dapat diupload (<span id="remainingPendukungCount"></span>)
                            </figcaption>
                            <div id="pendukungPreview" class="d-flex flex-wrap">
                                @if ($edit && $product->images->count())
                                    @foreach ($product->images as $img)
                                        <img src="{{ url($img->image) }}" alt="preview image"
                                            style="max-width: 19%; cursor: pointer; object-fit: cover; position: relative; margin-top: 10px;margin-right:10px">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            {{-- Augmented reality --}}
            <div class="card large-card">
                <div class="card-body">
                    <h5 class="card-title">Augmented Reality</h5>
                    <div id="contentAugmentedRealityDataran">
                        <div class="form-group" id="linkARAndroid">
                            <label for="linkARAndroid">Link AR Android <b>(SRC)</b></label>
                            <div style="display: flex;">
                                <input type="text" class="form-control mb-3 me-2" name="link_ar_android"
                                    id="linkARAndroidInput" placeholder="Masukkan Link Untuk Android (Format .glb)*"
                                    required @if ($edit && $product->link_ar) value="{{ $product->link_ar }}" @endif>
                                <i id="androidCheckIcon" class="bi"></i>
                                <!-- Icon based on input condition will be added here -->
                            </div>
                            <p id="androidErrorMessage" style="color: red;"></p>
                            <!-- Error message based on condition will be added here -->
                        </div>
                        <div class="form-group" id="linkARiOS">
                            <label for="linkARIOS">Link AR iOS <b>(IOS-SRC)</b></label>
                            <div style="display: flex;">
                                <input type="text" name="link_ar_ios"
                                    @if ($edit && $product->link_ar_ios) value="{{ $product->link_ar_ios }}" @endif
                                    class="form-control mb-3 me-2" id="linkARIOSInput"
                                    placeholder="Masukkan Link Untuk iOS (Format .usdz)*" required>
                                <i id="iOSCheckIcon" class="bi"></i>
                                <!-- Icon based on input condition will be added here -->
                            </div>
                            <p id="iOSErrorMessage" style="color: red;"></p>
                            <!-- Error message based on condition will be added here -->
                        </div>
                        <div class="form-group" id="linkSkyBox">
                            <label for="linkSkyBox">Link Skybox <b>(Opsional)</b></label>
                            <div style="display: flex;">
                                <input type="text" name="link_skybox" class="form-control mb-3"
                                    @if ($edit && $product->link_skybox) value="{{ $product->link_skybox }}" @endif
                                    id="linkSkyBoxInput"
                                    placeholder="Masukkan link asset SkyBox berformat .jpg dan .png (opsional)">
                                <i id="skyBoxCheckIcon" class="bi"></i>
                                <!-- Icon based on input condition will be added here -->
                            </div>
                            <p id="skyBoxErrorMessage" style="color: red; margin-top: 10px;"></p>
                            <!-- Error message based on condition will be added here -->
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <button id="livePreviewButton" class="btn btn-primary">Lihat Live Preview 3D</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Live preview --}}

            <div id="contentLivePreviewARDataran">
                <model-viewer id="modelViewer"
                    src="https://cdn.glitch.global/483eed9c-fdd2-44f9-bc4b-a9d47fa50b8b/LemariLaci5Susun.glb?v=1699907215280"
                    ios-src=""
                    skybox-image="https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791"
                    shadow-intensity="0" ar skybox-height="2.8m" max-camera-orbit="auto" camera-controls
                    style="width: 100%; height: 400px; border-radius: 10px;"></model-viewer>
                <br>
                <button id="toggleRangeInputButton" class="btn btn-primary">Atur intensitas bayangan objek 3D</button>
                <div id="rangeInputContainer" style="display: none;">
                    <footer class="blockquote-footer mt-3">
                        Bayangan ini akan tampil di Augmented Reality dan 3D interaktif di web.
                    </footer>
                    <input type="range" id="shadowIntensityRangeInput" class="form-range mt-2" min="0"
                        max="3" step="0.5">
                    <hr>
                </div>
            </div>

            <hr>

            {{-- Opsional  --}}
            <div class="card large-card">
                <div class="card-body">
                    <h5 class="card-title">Opsional</h5>
                    <div class="d-flex justify-content-between">
                        <p>
                            Aktifkan Varian produk ?
                            <span class="text-muted">(Opsional)</span>
                        </p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="check_varian"
                                @if ($edit && $product->status_varian) checked @endif type="checkbox" role="switch"
                                id="custom-switch-varian">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p>
                            Aktifkan Diskon produk ?
                            <span class="text-muted">(Opsional)</span>
                        </p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="check_diskon"
                                @if ($edit && $product->status_diskon) checked @endif type="checkbox" role="switch"
                                id="custom-switch-diskon">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>
                            Aktifkan Dimensi Produk ?
                            <span class="text-muted">(Opsional)</span>
                        </p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="check_dimensi"
                                @if ($edit && $product->status_dimensi) checked @endif type="checkbox"
                                role="switch"id="custom-switch-dimensi">
                        </div>
                    </div>
                </div>
            </div>


            <div class="card large-card @if ($edit && $product->status_varian && $product->varians->count()) d-block @else d-none @endif"
                id="varian_produk">
                <div class="card-body">
                    <h5 class="card-title">Varian Produk</h5>
                    <p>Isi masing-masing kotak dengan "Red", "Green" atau "#A52A2A", "#F0FFFF" tanpa menggunakan tanda
                        (" "). </p>
                    <p>Warna harus disebutkan dalam Bahasa Inggris atau sebagai kode warna CSS (Maksimal 5 Warna) agar
                        Augmented Reality dapat membaca warna tersebut. Stoknya diambil dari Jumlah stok yang sudah
                        ditentukan di atas (Total Stok Produk).</p>

                    <div id="parent-varian">
                        @if ($edit && $product->status_varian && $product->varians->count())
                            @foreach ($product->varians as $index => $varian)
                                <div id="varian" data-index="{{ $index }}">
                                    <h5 class="card-title">Varian Produk {{ $index + 1 }}</h5>
                                    <div class="d-flex align-items-center">
                                        <input type="hidden" name="id_varian[]" value="{{ $varian->id }}">
                                        <input type="text" placeholder="Nama Varian" value="{{ $varian->name }}"
                                            name="name_varian[]" data-index="{{ $index }}" id="name_varian"
                                            required class="form-control me-2">
                                        <input type="text" placeholder="Varian Warna" value="{{ $varian->warna }}"
                                            name="warna_varian[]" value="" class="form-control me-2">
                                        <input type="text" placeholder="Isi Stok" value="{{ $varian->stock }}"
                                            name="stok_varian[]" required class="form-control me-2">
                                        <input type="text" placeholder="Isi Harga" value="{{ $varian->harga }}"
                                            name="harga_varian[]" required class="form-control me-2">
                                        <div class="ml-2">
                                            <button type="button" class="btn btn-outline-danger remove-varian"><i
                                                    class="bi bi-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-4" id="addVariantBtn"><i
                                class="fas fa-plus"></i>
                            Tambah Varian produk</button>
                        <p class="text-danger mt-2" id="maxVariantError" style="display: none;">Maksimal 5 varian
                            warna telah tercapai. Anda tidak bisa menambah lagi.</p>
                    </div>
                </div>
            </div>

            <div class="card large-card @if ($edit && $product->status_diskon) d-block @else d-none @endif"id="diskon_produk">
                <div class="card-body">
                    <h5 class="card-title">Persentase Diskon</h5>
                    <label for="diskon">Diskon Produk Keseluruhan</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="diskon_product" id="diskon"
                            placeholder="Contoh 20"@if ($edit && $product->diskon) value="{{ $product->diskon }}" @endif>
                    </div>
                    <div class="alert alert-primary d-flex align-items-center mt-3" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <div>
                            <div>
                                Sistem mendeteksi bahwa Anda menggunakan <span id="count-diskon">
                                    @if ($edit && $product->varians->count())
                                        {{ $product->varians->count() }}
                                    @else
                                        0
                                    @endif
                                </span> varian pada
                                produk
                                ini. Apakah Anda ingin menerapkan
                                diskon pada masing-masing varian ?
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p>Aktifkan diskon per varian ?</p> <!-- Tampilkan teks toggle sesuai state -->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                @if ($edit && count($product->varians->pluck('diskon')->filter())) checked @endif name="check_diskon_varian"
                                role="switch" id="switch-diskon-varian">
                        </div>
                    </div>
                    <div class=" @if ($edit && count($product->varians->pluck('diskon')->filter())) d-block
                    @else
                        d-none @endif "
                        id="diskon-varian">
                        <div id="parent-diskon-varian">
                            @if ($edit && count($product->varians->pluck('diskon')->filter()))
                                @foreach ($product->varians as $varian)
                                    <div id="diskon-varian">
                                        <h5 class="card-title">Varian {{ $varian->name }} </h5>
                                        <div class="form-group">
                                            <input type="text" value="{{ $varian->diskon }}" class="form-control"
                                                name="diskon_varian[]" id="diskon1"
                                                placeholder="Masukkan diskon, Contoh 20">
                                        </div>
                                        <hr style="margin-bottom: -7px;">
                                        <!-- Tambahkan hr kecuali untuk varian terakhir -->
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <footer class="blockquote-footer mt-3">Kosongi kotak jika tidak ingin memberi diskon pada varian
                            tersebut</footer>
                    </div>

                </div>
            </div>

            {{-- Opsional - Dimensi --}}
            <div class="card large-card @if ($edit && $product->status_dimensi) d-block @else d-none @endif "
                id="dimensi_produk">
                <div class="card-body">
                    <h5 class="card-title">Dimensi Produk</h5>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">
                            Non-Aktifkan Dimensi Manual ?
                        </p>
                        <p>
                            {{-- <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefaultOtomatis">
                        </div> --}}
                        </p>
                    </div>
                    <footer class="blockquote-footer">
                        Anda saat ini sedang mengaktifkan dimensi yang mengambil data dimensi ukuran dari 3D bawaan,
                        kemungkinan
                        ukuran dimensi yang diambil dari 3D bawaan tidak sesuai yang diinginkan. Aktifkan dimensi manual
                        agar
                        lebih akurat sesuai dengan yang diinginkan.
                    </footer>
                    <hr>
                    <div class="form-group">
                        <label for="panjang">Panjang</label>
                        <input type="text" class="form-control"
                            @if ($edit && $product->panjang) value="{{ $product->panjang }}" @endif
                            name="panjang_produk" id="panjang" placeholder="Masukkan panjang produk">
                    </div>
                    <div class="form-group">
                        <label for="lebar" class="mt-2">Lebar</label>
                        <input type="text" class="form-control"
                            @if ($edit && $product->lebar) value="{{ $product->lebar }}" @endif name="lebar_produk"
                            id="lebar" placeholder="Masukkan lebar produk">
                    </div>
                    <div class="form-group mt-2">
                        <label for="tinggi">Tinggi</label>
                        <input type="text" class="form-control"
                            @if ($edit && $product->tinggi) value="{{ $product->tinggi }}" @endif name="tinggi_produk"
                            id="tinggi" placeholder="Masukkan tinggi produk">
                    </div>
                    <footer class="blockquote-footer mt-3">
                        Kosongi kotak jika tidak ingin memberi Skala dan Dimensi pada varian tersebut.
                    </footer>
                    <footer class="blockquote-footer">
                        Dimensi ini juga akan tampil di Augmented Reality dan saat pelanggan akan memasukkan produk ke
                        keranjang.
                    </footer>
                    <footer class="blockquote-footer">
                        Jika mengaktifkan mode Dimensi Produk, pengguna tidak bisa memperbesar dan memperkecil produk di
                        Augmented reality.
                    </footer>
                    <div class="alert alert-primary d-flex align-items-center mt-3" role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        <div>
                            <div>
                                Sistem mendeteksi bahwa Anda menggunakan <span id="count-varian">
                                    @if ($edit && $product->varians->count())
                                        {{ $product->varians->count() }}
                                    @else
                                        0
                                    @endif
                                </span> varian pada
                                produk
                                ini. Apakah Anda ingin menerapkan
                                Skala dan Dimensi pada masing-masing varian ?
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between">
                        <p>
                            Aktifkan Dimensi per varian ?
                        </p>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                @if ($edit && count($product->varians->pluck('panjang')->filter())) checked @endif name="check_dimensi_varian"
                                role="switch" id="switch-dimensi-varian">
                        </div>
                    </div>
                    <div
                        class="content-main-dimensi-pervarian @if ($edit && count($product->varians->pluck('panjang')->filter())) d-block
                    @else
                        d-none @endif ">
                        <div id="parent-dimensi-varian">
                            @if ($edit && count($product->varians->pluck('panjang')->filter()))
                                @foreach ($product->varians as $varian)
                                    <div id="dimensi">
                                        <h5 class="card-title">Dimensi Varian {{ $varian->name }}</h5>
                                        <div class="row">
                                            <div class="col">
                                                <p style="margin-bottom: 6px;" class="text-muted">Panjang.</p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="{{ $varian->panjang }}" name="panjang_varian[]"
                                                        id="diskon1-panjang" placeholder="Contoh 20">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p style="margin-bottom: 6px;" class="text-muted">Lebar.</p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="{{ $varian->lebar }}" name="lebar_varian[]"
                                                        id="diskon1-lebar" placeholder="Contoh 20">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <p style="margin-bottom: 6px;" class="text-muted">Tinggi.</p>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="{{ $varian->tinggi }}" name="tinngi_varian[]"
                                                        id="diskon1-tinggi" placeholder="Contoh 20">
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="margin-bottom: -5px;">
                                        <!-- Tambahkan hr kecuali untuk varian terakhir -->
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <hr>
            {{-- Tombol untuk menyimpan Produk --}}
            <div class="d-flex justify-content-between mb-2 mt-4">
                <button type="button" class="btn btn-outline-dark" onclick="handleBatal()">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary" id="btn-save"><i class="fas fa-save"></i> Save</button>
            </div>
        </form>
    </section>

    <div id="elem-varian" style="display: none">
        <div id="varian">
            <h5 class="card-title">Varian Produk </h5>
            <div class="d-flex align-items-center">
                <input type="text" placeholder="Nama Varian" name="name_varian[]" id="name_varian" required
                    class="form-control me-2">
                <input type="text" placeholder="Varian Warna" name="warna_varian[]" value=""
                    class="form-control me-2">
                <input type="text" placeholder="Isi Stok" name="stok_varian[]" required class="form-control me-2">
                <input type="text" placeholder="Isi Harga" name="harga_varian[]" required class="form-control me-2">
                <div class="ml-2">
                    <button type="button" class="btn btn-outline-danger remove-varian"><i
                            class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div id="elem-diskon-varian" style="display: none">
        <div id="diskon-varian">
            <h5 class="card-title">Varian </h5>
            <div class="form-group">
                <input type="text" class="form-control" name="diskon_varian[]" id="diskon1"
                    placeholder="Masukkan diskon, Contoh 20">
            </div>
            <hr style="margin-bottom: -7px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
        </div>
    </div>

    <div id="elem-dimensi-varian" style="display: none">
        <div id="dimensi">
            <h5 class="card-title">Dimensi Varian</h5>
            <div class="row">
                <div class="col">
                    <p style="margin-bottom: 6px;" class="text-muted">Panjang.</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="panjang_varian[]" id="diskon1-panjang"
                            placeholder="Contoh 20">
                    </div>
                </div>
                <div class="col">
                    <p style="margin-bottom: 6px;" class="text-muted">Lebar.</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lebar_varian[]" id="diskon1-lebar"
                            placeholder="Contoh 20">
                    </div>
                </div>
                <div class="col">
                    <p style="margin-bottom: 6px;" class="text-muted">Tinggi.</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tinngi_varian[]" id="diskon1-tinggi"
                            placeholder="Contoh 20">
                    </div>
                </div>
            </div>
            <hr style="margin-bottom: -5px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
        </div>
    </div>
@stop



@push('js')
    {{-- Informasi Produk --}}
    <script>
        function toggleInputGroup() {
            const isInputGroupOpen = document.getElementById("kateGoriproduk").getAttribute("aria-expanded");
            document.getElementById("kateGoriproduk").setAttribute("aria-expanded", isInputGroupOpen === "true" ? "false" :
                "true");
        }

        function handlePakaiOngkirChange() {
            const pakaiOngkir = document.getElementById("pakaiOngkir").value;
            const ongkosKirimInput = document.getElementById("ongkosKirim");

            if (pakaiOngkir === "tidak") {
                ongkosKirimInput.value = "";
                ongkosKirimInput.setAttribute("disabled", "true");
                ongkosKirimInput.placeholder = "Gratis Ongkos Kirim";
            } else {
                ongkosKirimInput.removeAttribute("disabled");
                ongkosKirimInput.placeholder = "Contoh 5000";
            }
        }

        function handleStokProdukChange() {
            const stokProdukInput = document.getElementById("stokProduk");
            const stokProduk = parseInt(stokProdukInput.value);

            if (isNaN(stokProduk) || stokProduk <= 0) {
                Swal.fire({
                    icon: "error",
                    title: "Stok Produk Tidak Valid",
                    text: "Tidak boleh mengisi stok dibawah angka 1.",
                }).then(() => {
                    stokProdukInput.value = "";
                });
            }
        }

        function handleDeskripsiProdukChange() {
            const deskripsiProdukInput = document.getElementById("deskripsiProduk");
            const deskripsiLength = document.getElementById("deskripsiLength");
            deskripsiLength.textContent = deskripsiProdukInput.value.length + " / 300";
        }

        // Event listeners
        document.getElementById("stokProduk").addEventListener("change", handleStokProdukChange);
        document.getElementById("deskripsiProduk").addEventListener("input", handleDeskripsiProdukChange);
    </script>


    {{-- Gambar Produk --}}
    <script>
        // JavaScript functions
        const maxThumbnailCount = 1;
        const maxPendukungCount = 10;

        let gambarThumbnail = null;
        let gambarPendukungFiles = [];
        let showThumbnailModal = false;
        let showEnlargeModal = false;
        let enlargedImageUrl = "";
        let isLoading = false;

        function handleGambarThumbnailChange(event) {
            const file = event.target.files[0];
            gambarThumbnail = file;
            displayThumbnailPreview();
        }

        function handleGambarPendukungChange(event) {
            const selectedFiles = event.target.files;
            const totalFiles = selectedFiles.length + gambarPendukungFiles.length;

            if (totalFiles > maxPendukungCount) {
                alert(`Batas maksimal ${maxPendukungCount} gambar pendukung telah tercapai!`);
            } else {
                const remainingSpace = maxPendukungCount - gambarPendukungFiles.length;
                const filesToAdd = Array.from(selectedFiles).slice(0, remainingSpace);
                gambarPendukungFiles = [...gambarPendukungFiles, ...filesToAdd];
                displayPendukungPreview();

                if (selectedFiles.length > remainingSpace) {
                    alert(`Hanya ${remainingSpace} gambar pendukung yang ditambahkan karena batas maksimum tercapai!`);
                }
            }
        }

        function displayThumbnailPreview() {
            const previewDiv = document.getElementById("thumbnailPreview");
            previewDiv.innerHTML = "";

            if (gambarThumbnail) {
                const img = document.createElement("img");
                img.src = URL.createObjectURL(gambarThumbnail);
                img.alt = "Preview Gambar Thumbnail";
                img.style.maxWidth = "30%";
                img.style.cursor = "pointer";
                img.style.borderRadius = "10px";
                img.style.overflow = "hidden";
                img.style.marginTop = "10px";
                img.addEventListener("click", toggleThumbnailModal);

                previewDiv.appendChild(img);
            }

            const remainingCount = maxThumbnailCount - (gambarThumbnail ? 1 : 0);
            document.getElementById("remainingThumbnailCount").textContent = remainingCount;
        }

        function displayPendukungPreview() {
            const previewDiv = document.getElementById("pendukungPreview");
            previewDiv.innerHTML = "";

            gambarPendukungFiles.forEach((image, index) => {
                const div = document.createElement("div");
                div.className = "mr-2 mb-4";
                div.style.maxWidth = "19%";
                div.style.cursor = "pointer";
                div.style.objectFit = "cover";
                div.style.position = "relative";
                div.style.marginTop = "-10px";

                const img = document.createElement("img");
                img.src = URL.createObjectURL(image);
                img.alt = `Gambar Pendukung ${index + 1}`;
                img.style.width = "100%";
                img.style.height = "100%";
                img.style.objectFit = "cover";
                img.style.borderRadius = "10px";
                img.addEventListener("click", () => toggleEnlargeModal(image));

                const button = document.createElement("button");
                button.className = "btn btn-danger btn-sm";
                button.style.position = "absolute";
                button.style.top = "10px";
                button.style.right = "8px";
                button.innerHTML = isLoading ? "Loading..." : '<i class="fas fa-times"></i>';
                button.addEventListener("click", () => removePendukungImage(index));

                div.appendChild(img);
                div.appendChild(button);
                previewDiv.appendChild(div);
            });

            const remainingCount = maxPendukungCount - gambarPendukungFiles.length;
            document.getElementById("remainingPendukungCount").textContent = remainingCount;
        }

        function toggleThumbnailModal() {
            showThumbnailModal = !showThumbnailModal;
            // Toggle modal visibility
            // Add your modal toggling logic here
        }

        function toggleEnlargeModal(image) {
            enlargedImageUrl = URL.createObjectURL(image);
            showEnlargeModal = !showEnlargeModal;
            // Toggle modal visibility
            // Add your modal toggling logic here
        }

        function removeImage() {
            gambarThumbnail = null;
            displayThumbnailPreview();
        }

        function removePendukungImage(index) {
            isLoading = true;
            displayPendukungPreview();

            setTimeout(() => {
                gambarPendukungFiles.splice(index, 1);
                isLoading = false;
                displayPendukungPreview();
            }, 1000);
        }
    </script>

    {{-- LINK AR --}}
    <script>
        // Function to handle change in Android AR link input
        const handleLinkARAndroidChange = (e) => {
            const linkARAndroidInput = document.getElementById("linkARAndroidInput");
            const androidCheckIcon = document.getElementById("androidCheckIcon");
            const androidErrorMessage = document.getElementById("androidErrorMessage");

            linkARAndroidInput.value = e.target.value;

            if (linkARAndroidInput.value.trim()) {
                if (linkARAndroidInput.value.trim().toLowerCase().includes("glb")) {
                    androidCheckIcon.className = "bi bi-check-lg";
                    androidCheckIcon.style.fontSize = "20px";
                    androidCheckIcon.style.marginLeft = "10px";
                    androidCheckIcon.style.color = "green";
                    androidErrorMessage.innerText = "";
                } else if (linkARAndroidInput.value.trim().toLowerCase().includes("usdz")) {
                    androidCheckIcon.className = "bi bi-exclamation-triangle";
                    androidCheckIcon.style.fontSize = "20px";
                    androidCheckIcon.style.marginLeft = "10px";
                    androidCheckIcon.style.color = "red";
                    androidErrorMessage.innerText =
                        "Maaf, tampaknya Anda salah memasukkan link. Format file yang kompatibel dengan Android adalah '.glb'";
                }
            } else {
                androidCheckIcon.className = "";
                androidErrorMessage.innerText = "";
            }
        };

        // Function to handle change in iOS AR link input
        const handleLinkARIOSChange = (e) => {
            const linkARIOSInput = document.getElementById("linkARIOSInput");
            const iOSCheckIcon = document.getElementById("iOSCheckIcon");
            const iOSErrorMessage = document.getElementById("iOSErrorMessage");

            linkARIOSInput.value = e.target.value;

            if (linkARIOSInput.value.trim()) {
                if (linkARIOSInput.value.trim().toLowerCase().includes("usdz")) {
                    iOSCheckIcon.className = "bi bi-check-lg";
                    iOSCheckIcon.style.fontSize = "20px";
                    iOSCheckIcon.style.marginLeft = "10px";
                    iOSCheckIcon.style.color = "green";
                    iOSErrorMessage.innerText = "";
                } else {
                    iOSCheckIcon.className = "bi bi-exclamation-triangle";
                    iOSCheckIcon.style.fontSize = "20px";
                    iOSCheckIcon.style.marginLeft = "10px";
                    iOSCheckIcon.style.color = "red";
                    iOSErrorMessage.innerText =
                        "Maaf, tampaknya Anda salah memasukkan link. Format file yang kompatibel dengan iOS adalah '.usdz'";
                }
            } else {
                iOSCheckIcon.className = "";
                iOSErrorMessage.innerText = "";
            }
        };

        // Function to handle change in SkyBox link input
        const handleLinkSkyBoxChange = (e) => {
            const linkSkyBoxInput = document.getElementById("linkSkyBoxInput");
            const skyBoxCheckIcon = document.getElementById("skyBoxCheckIcon");
            const skyBoxErrorMessage = document.getElementById("skyBoxErrorMessage");

            linkSkyBoxInput.value = e.target.value;

            if (linkSkyBoxInput.value.trim()) {
                if (linkSkyBoxInput.value.trim().toLowerCase().includes("jpg") ||
                    linkSkyBoxInput.value.trim().toLowerCase().includes("png") ||
                    linkSkyBoxInput.value.trim().toLowerCase().includes("jpeg")) {
                    skyBoxCheckIcon.className = "bi bi-check-lg";
                    skyBoxCheckIcon.style.fontSize = "20px";
                    skyBoxCheckIcon.style.marginLeft = "10px";
                    skyBoxCheckIcon.style.color = "green";
                    skyBoxErrorMessage.innerText = "";
                } else {
                    skyBoxCheckIcon.className = "bi bi-exclamation-triangle";
                    skyBoxCheckIcon.style.fontSize = "20px";
                    skyBoxCheckIcon.style.marginLeft = "10px";
                    skyBoxCheckIcon.style.color = "red";
                    skyBoxErrorMessage.innerText =
                        "Maaf, format file yang Anda masukkan tidak didukung. Format yang didukung adalah .jpg, .png, .jpeg.";
                }
            } else {
                skyBoxCheckIcon.className = "";
                skyBoxErrorMessage.innerText = "";
            }
        };

        // Function to handle Live Preview button click
        const handleLivePreviewClick = () => {
            const loadingIndicator = document.getElementById("loadingIndicator");
            const livePreviewButton = document.getElementById("livePreviewButton");

            loadingIndicator.innerHTML = "<div>Loading...</div>"; // Placeholder loading indicator

            // Simulate loading for 1 second before showing Live Preview
            setTimeout(() => {
                loadingIndicator.innerHTML = "";
                const currentButtonText = livePreviewButton.innerText;
                livePreviewButton.innerText = currentButtonText === "Lihat Live Preview 3D" ?
                    "Tutup Live Preview 3D" : "Lihat Live Preview 3D";
            }, );
        };

        // Add event listeners to handle input changes
        document.getElementById("linkARAndroidInput").addEventListener("input", handleLinkARAndroidChange);
        document.getElementById("linkARIOSInput").addEventListener("input", handleLinkARIOSChange);
        document.getElementById("linkSkyBoxInput").addEventListener("input", handleLinkSkyBoxChange);

        // Add event listener to Live Preview button
        document.getElementById("livePreviewButton").addEventListener("click", handleLivePreviewClick);
    </script>


    {{-- Tombol untuk Live Preview --}}
    <script>
        // Function to toggle live preview visibility
        const toggleLivePreviewVisibility = () => {
            const livePreviewContent = document.getElementById("contentLivePreviewARDataran");
            livePreviewContent.style.display = livePreviewContent.style.display === "none" ? "block" : "none";
        };

        // Add event listener for live preview button
        document.getElementById("livePreviewButton").addEventListener("click", toggleLivePreviewVisibility);
    </script>



    {{-- Live Preview --}}
    <script>
        // Function to toggle range input visibility
        const toggleRangeInputVisibility = () => {
            const rangeInputContainer = document.getElementById("rangeInputContainer");
            rangeInputContainer.style.display = rangeInputContainer.style.display === "none" ? "block" : "none";
        };

        // Function to handle change in shadow intensity
        const handleShadowIntensityChange = () => {
            const shadowIntensityRangeInput = document.getElementById("shadowIntensityRangeInput");
            const modelViewer = document.getElementById("modelViewer");
            const shadowIntensity = shadowIntensityRangeInput.value;
            modelViewer.setAttribute("shadow-intensity", shadowIntensity);
        };

        // Add event listener for toggle range input button
        document.getElementById("toggleRangeInputButton").addEventListener("click", toggleRangeInputVisibility);

        // Add event listener for shadow intensity range input
        document.getElementById("shadowIntensityRangeInput").addEventListener("input", handleShadowIntensityChange);
    </script>

    {{-- Opsional --}}

    <script>
        function handleBatal() {
            Swal.fire({
                icon: "warning",
                title: "Anda yakin ingin membatalkan?",
                showCancelButton: true,
                confirmButtonText: "Ya, batalkan!",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: "info",
                        title: "Penambahan produk dataran dibatalkan!",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(() => {
                        window.history.back();
                        // "/Kategoridataranadmin";  // Mengarahkan ke halaman yang dimaksud
                    });
                }
            });
        }

        $('body').on('click', '#addVariantBtn', function() {
            let clone = $('#elem-varian >div').clone()
            let cloneDisc = $('#elem-diskon-varian >div').clone()
            let cloneDimn = $('#elem-dimensi-varian > div').clone()
            let count = $('#parent-varian #varian').length
            if (count > 4) {
                return swal('error', 'Maksimal 5 varian warna telah tercapai', 'Anda tidak bisa menambah lagi.')
            }
            clone.find('.card-title').html(`Variasi Produk ${ count + 1}`)
            clone.attr('data-index', count)
            clone.find('#name_varian').attr('data-index', count)
            $('#count-diskon').html(count + 1)
            $('#count-varian').html(count + 1)
            $('#parent-varian').append(clone)
            $('#parent-diskon-varian').append(cloneDisc)
            $('#parent-dimensi-varian').append(cloneDimn)

        })

        $('body').on('click', '.remove-varian', function() {
            let parent = $(this).parent().parent().parent();
            let index = parent.attr('data-index')

            const onConfirm = () => {
                parent.remove()
                let count = $('#parent-varian #varian').length
                $.each($('#parent-varian #varian'), function(index, val) {
                    $(val).find('.card-title').html(`Variasi Produk ${index +1}`)
                })
                $('#count-diskon').html(count)
                $('#count-varian').html(count)
                $($('#parent-diskon-varian #diskon-varian')[index]).remove()
                $($('#parent-dimensi-varian #dimensi')[index]).remove()
            }

            const confirm = new swalConfirm(onConfirm, 'Apakah anda yakin?',
                'Anda tidak dapat mengembalikan kembali');
            confirm.option.confirmButtonText = 'Ya, Hapus ';
            confirm.fire()
        })

        $('body').on('change', '#name_varian', function() {
            if ($(this).val()) {
                let value = $(this).val()
                let index = $(this).attr('data-index')

                $($('#parent-diskon-varian #diskon-varian')[index]).find('.card-title').html(`Varian ${value}`)
                $($('#parent-dimensi-varian #dimensi')[index]).find('.card-title').html(`Dimensi Varian ${value}`)
            }
        })

        $('body').on('change', '#custom-switch-diskon', function() {

            if ($(this).is(":checked")) {
                $('#diskon_produk').removeClass('d-none')

            } else {
                $('#diskon_produk').removeClass('d-block').addClass('d-none')
            }
        })

        $('body').on('change', '#switch-diskon-varian', function() {
            let countVarian = $('#parent-varian #varian').length
            if ($(this).is(":checked")) {
                if (countVarian == 0) {
                    swal('error', 'Validation', 'Silahkan tambah daftar varian terlebih dahulu')
                    $(this).prop("checked", false);
                    return false
                }
                $('#diskon-varian').removeClass('d-none')
            } else {
                $('#diskon-varian').removeClass('d-block').addClass('d-none')
            }
        })

        $('body').on('change', '#custom-switch-varian', function() {
            if ($(this).is(":checked")) {
                $('#varian_produk').removeClass('d-none')
            } else {
                $('#varian_produk').removeClass('d-block').addClass('d-none')
            }
        })

        $('body').on('change', '#custom-switch-dimensi', function() {
            if ($(this).is(":checked")) {
                $('#dimensi_produk').removeClass('d-none')
            } else {
                $('#dimensi_produk').removeClass('d-block').addClass('d-none')
            }
        })

        $('body').on('change', '#switch-dimensi-varian', function() {
            let countVarian = $('#parent-varian #varian').length

            if ($(this).is(":checked")) {
                if (countVarian == 0) {
                    swal('error', 'Validation', 'Silahkan tambah daftar varian terlebih dahulu')
                    $(this).prop("checked", false);
                    return false
                }
                $('.content-main-dimensi-pervarian').removeClass('d-none')
            } else {
                $('.content-main-dimensi-pervarian').removeClass('d-block').addClass('d-none')
            }
        })

        $("body").on('submit', '#form-tambah-produk', function(e) {
            e.preventDefault()

            const action = "{{ route($this_helper . 'store') }}"
            const ajax = new AjaxRequest(action)
            ajax.onBefore = () => {
                addLoader2El($('#btn-save'), "Saving...");
                $('#btn-save').attr('disabled', true);
            }

            ajax.onfail = () => {
                removeLoader($('#btn-save'))
            }

            let data = new FormData(this)
            ajax.submit(data, (resp) => {
                if (resp.success) {
                    swal('redirect', '', resp.message ?? "Success set pricelist", resp.url)
                    removeLoader($('#btn-save'))
                }
            })
        })
    </script>
@endpush
