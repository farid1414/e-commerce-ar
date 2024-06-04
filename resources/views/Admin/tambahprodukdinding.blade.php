{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')

<section class="section dashboard">

    <h5 class="card-title">Informasi Produk</h5>

<div id="Informasi Produk">
    <form>
        <div class="form-group mb-3">
            <label for="namaProduk">Nama Produk</label>
            <input type="text" class="form-control" id="namaProduk" placeholder="Masukkan nama produk">
        </div>
        <!-- Form Group for Sub Nama Produk and Total Stok Produk -->
        <div class="d-flex justify-content-between mb-3">
            <div class="form-group w-50 pr-2 me-2">
                <label for="subNamaproduk">Sub Nama Produk</label>
                <input type="text" class="form-control" id="subNamaproduk" placeholder="Masukkan sub nama produk" required>
            </div>
            <div class="form-group w-50 pl-2 me-2">
                <label for="stokProduk">Total Stok Produk</label>
                <input type="number" class="form-control" id="stokProduk" placeholder="Contoh 20" required>
            </div>
        </div>
        <div class="d-flex justify-content-between mb-3">
            <div class="form-group w-50 pr-2 me-2">
                <label for="hargaProduk">Harga Produk</label>
                <input type="text" class="form-control" id="hargaProduk" placeholder="Masukkan harga produk" required>
            </div>
            <div class="form-group w-50 pl-2 me-2">
                <label for="kateGoriproduk">Kategori</label>
                <div class="input-group">
                    <select class="form-control" id="kateGoriproduk" placeholder="Pilih kategori" required>
                        <option value="default" disabled>Pilih kategori</option>
                        <option value="meja">Meja</option>
                        <option value="kursi">Kursi</option>
                        <option value="mejaDapur">Lemari</option>
                    </select>
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="toggleInputGroup()">
                            <FaChevronDown />
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between mb-3">
            <div class="form-group w-50 pr-2 me-2">
                <label for="pakaiOngkir">Pakai Ongkos Kirim?</label>
                <select class="form-control" id="pakaiOngkir" onchange="handlePakaiOngkirChange()">
                    <option value="" disabled selected>Pilih opsi</option>
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak (Free Ongkir)</option>
                </select>
            </div>
            <div class="form-group w-50 pl-2 me-2">
                <label for="ongkosKirim">Ongkos Kirim</label>
                <input type="text" class="form-control" id="ongkosKirim" placeholder="Pilih Opsi terlebih dahulu" disabled>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="deskripsiProduk">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsiProduk" rows="4" placeholder="Masukkan deskripsi produk....." required maxlength="300"></textarea>
            <div class="d-flex justify-content-end">
                <span class="text-muted" id="deskripsiLength"></span>
            </div>
        </div>
    </form>
</div>


<hr>

<h5 class="card-title">Gambar Produk</h5>

<div id="contentgambarproduk">
    <div class="container">
        <form>
            <div class="form-group mb-4" id="gambarThumbnail">
                <label for="thumbnail">Gambar Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" onchange="handleGambarThumbnailChange(event)" required>
                <figcaption class="blockquote-footer mt-2">
                    Sisa gambar Thumbnail yang dapat diupload (<span id="remainingThumbnailCount"></span>)
                </figcaption>
                <div id="thumbnailPreview" class="position-relative"></div>
            </div>

            <div class="form-group mb-1" id="gambarPendukung">
                <label for="pendukung">Gambar Pendukung (Maksimal 10)</label>
                <input type="file" class="form-control" id="pendukung" multiple onchange="handleGambarPendukungChange(event)" required>
                <figcaption class="blockquote-footer mt-2">
                    Sisa gambar pendukung yang dapat diupload (<span id="remainingPendukungCount"></span>)
                </figcaption>
                <div id="pendukungPreview" class="d-flex flex-wrap"></div>
            </div>
        </form>
    </div>

</div>

<hr>

{{-- Augmented reality --}}
<h5 class="card-title">Augmented Reality</h5>
<div id="contentAugmentedRealityDataran">
    <form>
      <div class="form-group" id="linkARAndroid">
        <label for="linkARAndroid">Link AR Android <b>(SRC)</b></label>
        <div style="display: flex;">
          <input type="text" class="form-control mb-3 me-2" id="linkARAndroidInput" placeholder="Masukkan Link Untuk Android (Format .glb)*" required>
          <i id="androidCheckIcon" class="bi"></i> <!-- Icon based on input condition will be added here -->
        </div>
        <p id="androidErrorMessage" style="color: red;"></p> <!-- Error message based on condition will be added here -->
      </div>
      <div class="form-group" id="linkARiOS">
        <label for="linkARIOS">Link AR iOS <b>(IOS-SRC)</b></label>
        <div style="display: flex;">
          <input type="text" class="form-control mb-3 me-2" id="linkARIOSInput" placeholder="Masukkan Link Untuk iOS (Format .usdz)*" required>
          <i id="iOSCheckIcon" class="bi"></i> <!-- Icon based on input condition will be added here -->
        </div>
        <p id="iOSErrorMessage" style="color: red;"></p> <!-- Error message based on condition will be added here -->
      </div>
      <div class="form-group" id="linkSkyBox">
        <label for="linkSkyBox">Link Skybox <b>(Opsional)</b></label>
        <div style="display: flex;">
          <input type="text" class="form-control mb-3" id="linkSkyBoxInput" placeholder="Masukkan link asset SkyBox berformat .jpg dan .png (opsional)">
          <i id="skyBoxCheckIcon" class="bi"></i> <!-- Icon based on input condition will be added here -->
        </div>
        <p id="skyBoxErrorMessage" style="color: red; margin-top: 10px;"></p> <!-- Error message based on condition will be added here -->
      </div>
      <div class="d-flex justify-content-end mb-3">
        <button id="livePreviewButton" class="btn btn-primary">Lihat Live Preview 3D</button>
      </div>
    </form>
</div>


  {{-- Live preview --}}
  <div id="contentLivePreviewARDataran">
    <model-viewer 
      id="modelViewer"
      src="https://cdn.glitch.global/483eed9c-fdd2-44f9-bc4b-a9d47fa50b8b/LemariLaci5Susun.glb?v=1699907215280"
      ios-src=""
      skybox-image="https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791"
      shadow-intensity="0"
      ar
      skybox-height="2.8m"
      max-camera-orbit="auto"
      camera-controls
      style="width: 100%; height: 400px; border-radius: 10px;"
    ></model-viewer>
    <br>
    <button id="toggleRangeInputButton" class="btn btn-primary">Atur intensitas bayangan objek 3D</button>
    <div id="rangeInputContainer" style="display: none;">
      <footer class="blockquote-footer mt-3">
        Bayangan ini akan tampil di Augmented Reality dan 3D interaktif di web.
      </footer>
      <input 
        type="range" 
        id="shadowIntensityRangeInput" 
        class="form-range mt-2" 
        min="0" 
        max="3" 
        step="0.5"
      >
      <hr>
    </div>
</div>

<hr>

{{-- Opsional  --}}
      <h5 class="card-title">Opsional</h5>
      <div class="d-flex justify-content-between">
        <p>
          Aktifkan Varian produk ?
          <span class="text-muted">(Opsional)</span>
        </p>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="custom-switch-varian">
          </div>
      </div>

      <div class="d-flex justify-content-between">
        <p>
          Aktifkan Diskon produk ?
          <span class="text-muted">(Opsional)</span>
        </p>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="custom-switch-diskon">
          </div>
      </div>
      <div class="d-flex justify-content-between">
        <p>
          Aktifkan Dimensi Produk ?
          <span class="text-muted">(Opsional)</span>
        </p>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch"id="custom-switch-skaladanDimensi">
          </div>
      </div>
  
      <div class="container">
        <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Varian Produk</h5>
                        <p>Isi masing-masing kotak dengan "Red", "Green" atau "#A52A2A", "#F0FFFF" tanpa menggunakan tanda (" "). </p>
                        <p>Warna harus disebutkan dalam Bahasa Inggris atau sebagai kode warna CSS (Maksimal 5 Warna) agar Augmented Reality dapat membaca warna tersebut. Stoknya diambil dari Jumlah stok yang sudah ditentukan di atas (Total Stok Produk).</p>
    
                        <h5 class="card-title">Varian Produk 1</h5>
                            <div class="d-flex align-items-center">
                                <input type="text" placeholder="Nama Varian" required class="form-control me-2">
                                <input type="text" placeholder="Varian Warna" value="" class="form-control me-2">
                                <input type="text" placeholder="Isi Stok" required class="form-control me-2">
                                <input type="text" placeholder="Isi Harga" required class="form-control me-2">
                                <div class="ml-2">
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <h5 class="card-title">Varian Produk 2</h5>
                            <div class="d-flex align-items-center">
                                <input type="text" placeholder="Nama Varian" required class="form-control me-2">
                                <input type="text" placeholder="Varian Warna" value="" class="form-control me-2">
                                <input type="text" placeholder="Isi Stok" required class="form-control me-2">
                                <input type="text" placeholder="Isi Harga" required class="form-control me-2">
                                <div class="ml-2">
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <h5 class="card-title">Varian Produk 3</h5>
                            <div class="d-flex align-items-center">
                                <input type="text" placeholder="Nama Varian" required class="form-control me-2">
                                <input type="text" placeholder="Varian Warna" value="" class="form-control me-2">
                                <input type="text" placeholder="Isi Stok" required class="form-control me-2">
                                <input type="text" placeholder="Isi Harga" required class="form-control me-2">
                                <div class="ml-2">
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <h5 class="card-title">Varian Produk 4</h5>
                            <div class="d-flex align-items-center">
                                <input type="text" placeholder="Nama Varian" required class="form-control me-2">
                                <input type="text" placeholder="Varian Warna" value="" class="form-control me-2">
                                <input type="text" placeholder="Isi Stok" required class="form-control me-2">
                                <input type="text" placeholder="Isi Harga" required class="form-control me-2">
                                <div class="ml-2">
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <h5 class="card-title">Varian Produk 5</h5>
                            <div class="d-flex align-items-center">
                                <input type="text" placeholder="Nama Varian" required class="form-control me-2">
                                <input type="text" placeholder="Varian Warna" value="" class="form-control me-2">
                                <input type="text" placeholder="Isi Stok" required class="form-control me-2">
                                <input type="text" placeholder="Isi Harga" required class="form-control me-2">
                                <div class="ml-2">
                                    <button class="btn btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary mt-4" id="addVariantBtn"><i class="fas fa-plus"></i> Tambah Varian produk</button>
                            <p class="text-danger mt-2" id="maxVariantError" style="display: none;">Maksimal 5 varian warna telah tercapai. Anda tidak bisa menambah lagi.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Persentase Diskon</h5>
            <form>
                <label for="diskon">Diskon Produk Keseluruhan</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="diskon" placeholder="{placeholder}" value="{diskon}" disabled="{isDisabled}">
                </div>
            </form>
            <div class="alert alert-primary d-flex align-items-center mt-3" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>
                <div>
                    <div>
                        Sistem mendeteksi bahwa Anda menggunakan 5 varian pada produk ini. Apakah Anda ingin menerapkan diskon pada masing-masing varian ?
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <p>{toggleText}</p> <!-- Tampilkan teks toggle sesuai state -->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                </div>
            </div>
            <div>
                <div>
                    <h5 class="card-title">1. Varian Merah.</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="diskon1" placeholder="Masukkan diskon, Contoh 20">
                    </div>
                    <hr style="margin-bottom: -7px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                </div>
                <div>
                    <h5 class="card-title">1. Varian Kuning.</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="diskon2" placeholder="Masukkan diskon, Contoh 20">
                    </div>
                    <hr style="margin-bottom: -7px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                </div>
                <div>
                    <h5 class="card-title">1. Varian Putih.</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="diskon3" placeholder="Masukkan diskon, Contoh 20">
                    </div>
                    <hr style="margin-bottom: -7px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                </div>
                <div>
                    <h5 class="card-title">1. Varian Hijau.</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="diskon4" placeholder="Masukkan diskon, Contoh 20">
                    </div>
                    <hr style="margin-bottom: -7px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                </div>
                <div>
                    <h5 class="card-title">1. Varian Biru.</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="diskon5" placeholder="Masukkan diskon, Contoh 20">
                    </div>
                </div>
                <footer class="blockquote-footer mt-3">Kosongi kotak jika tidak ingin memberi diskon pada varian tersebut</footer>
            </div>
            
        </div>
    </div>
    




    {{-- Opsional - Dimensi --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dimensi Produk</h5>
            <div class="d-flex justify-content-between">
                <p class="fw-bold">
                    Non-Aktifkan Dimensi Manual ?
                </p>
                <p>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefaultOtomatis">
                    </div>
                </p>
            </div>
            <footer class="blockquote-footer">
                Anda saat ini sedang mengaktifkan dimensi yang mengambil data dimensi ukuran dari 3D bawaan, kemungkinan ukuran dimensi yang diambil dari 3D bawaan tidak sesuai yang diinginkan. Aktifkan dimensi manual agar lebih akurat sesuai dengan yang diinginkan.
            </footer>
            <form style="display: block;">
                <hr>
                <div class="form-group">
                    <label for="panjang">Panjang</label>
                    <input type="text" class="form-control" id="panjang" placeholder="Masukkan panjang produk">
                </div>
                <div class="form-group">
                    <label for="lebar" class="mt-2">Lebar</label>
                    <input type="text" class="form-control" id="lebar" placeholder="Masukkan lebar produk">
                </div>
                <div class="form-group mt-2">
                    <label for="tinggi">Tinggi</label>
                    <input type="text" class="form-control" id="tinggi" placeholder="Masukkan tinggi produk">
                </div>
            </form>
            <footer class="blockquote-footer mt-3">
                Kosongi kotak jika tidak ingin memberi Skala dan Dimensi pada varian tersebut.
            </footer>
            <footer class="blockquote-footer">
                Dimensi ini juga akan tampil di Augmented Reality dan saat pelanggan akan memasukkan produk ke keranjang.
            </footer>
            <footer class="blockquote-footer">
                Jika mengaktifkan mode Dimensi Produk, pengguna tidak bisa memperbesar dan memperkecil produk di Augmented reality.
            </footer>
            <div class="alert alert-primary d-flex align-items-center mt-3" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>
                <div>
                    <div>
                        Sistem mendeteksi bahwa Anda menggunakan 5 varian pada produk ini. Apakah Anda ingin menerapkan Skala dan Dimensi pada masing-masing varian ?
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <p>
                    Aktifkan Dimensi per varian ?
                </p>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch">
                </div>
            </div>
            <div class="content-main-dimensi-pervarian">
                <div>
                    <div>
                        <h5 class="card-title">1. Dimensi Varian {warnaText[0]}</h5>
                        <div class="row">
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Panjang.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon1-panjang" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Lebar.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon1-lebar" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Tinggi.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon1-tinggi" placeholder="Contoh 20">
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: -5px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                    </div>
                    <div>
                        <h5 class="card-title">2. Dimensi Varian {warnaText[1]}</h5>
                        <div class="row">
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Panjang.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-panjang" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Lebar.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-lebar" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Tinggi.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-tinggi" placeholder="Contoh 20">
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: -5px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                    </div>

                    <div>
                        <h5 class="card-title">3. Dimensi Varian {warnaText[2]}</h5>
                        <div class="row">
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Panjang.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-panjang" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Lebar.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-lebar" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Tinggi.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-tinggi" placeholder="Contoh 20">
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: -5px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                    </div>
                    <div>
                        <h5 class="card-title">4. Dimensi Varian {warnaText[3]}</h5>
                        <div class="row">
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Panjang.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-panjang" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Lebar.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-lebar" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Tinggi.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-tinggi" placeholder="Contoh 20">
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: -5px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                    </div>
                    <div>
                        <h5 class="card-title">5. Dimensi Varian {warnaText[4]}</h5>
                        <div class="row">
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Panjang.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-panjang" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Lebar.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-lebar" placeholder="Contoh 20">
                                </div>
                            </div>
                            <div class="col">
                                <p style="margin-bottom: 6px;" class="text-muted">Tinggi.</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="diskon2-tinggi" placeholder="Contoh 20">
                                </div>
                            </div>
                        </div>
                        <hr style="margin-bottom: -5px;"> <!-- Tambahkan hr kecuali untuk varian terakhir -->
                    </div>
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
                <button type="button" class="btn btn-primary" onclick="handleSimpanData()">Tampilkan Produk</button>
            </div>
</section>


@stop



@push('js')
<script>
    function toggleInputGroup() {
        const isInputGroupOpen = document.getElementById("kateGoriproduk").getAttribute("aria-expanded");
        document.getElementById("kateGoriproduk").setAttribute("aria-expanded", isInputGroupOpen === "true" ? "false" : "true");
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


 {{-- Gambar Produk--}}
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
                androidErrorMessage.innerText = "Maaf, tampaknya Anda salah memasukkan link. Format file yang kompatibel dengan Android adalah '.glb'";
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
                iOSErrorMessage.innerText = "Maaf, tampaknya Anda salah memasukkan link. Format file yang kompatibel dengan iOS adalah '.usdz'";
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
                skyBoxErrorMessage.innerText = "Maaf, format file yang Anda masukkan tidak didukung. Format yang didukung adalah .jpg, .png, .jpeg.";
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
            livePreviewButton.innerText = currentButtonText === "Lihat Live Preview 3D" ? "Tutup Live Preview 3D" : "Lihat Live Preview 3D";
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
  
@endpush