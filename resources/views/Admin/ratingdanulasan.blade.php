<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('admin.include.style')
</head>

<body>

 @include('admin.komponenadmin.header')
@include('admin.komponenadmin.sidebar')

  <main id="main" class="main">
    <div class="pagetitle">
        <h1>Rating dan Ulasan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Rating dan Ulasan
            </li>
          </ol>
        </nav>
      </div>
    <section class="section dashboard">
      <div class="row">
        
        
          <!-- Card Informasi Atas -->
          <section class="section dashboard">
            <div class="row">
              <div class="col-sm-4">
                <div class="card info-card sales-card">
                  <!-- Jumlah Pelanggan -->
                  <div class="card-body">
                    <h5 class="card-title">Sudah Dibalas</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                        <i class="bi bi-box"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1">
                          Total Sudah dibalas
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card info-card revenue-card">
                  <!-- Jumlah Terjual -->
                  <div class="card-body">
                    <h5 class="card-title">Perlu Dibalas</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1" style="font-size: 13px;">
                          Total Perlu Dibalas
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card info-card customers-card">
                  <!-- Jumlah Total Terjual -->
                  <div class="card-body">
                    <h5 class="card-title">Total Keseluruhan</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-dropbox"></i>
                      </div>
                      <div class="ps-3">
                        <h6>25</h6>
                        <span class="text-muted small pt-1">
                          Total Produk Habis
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <!-- Isi Konten Produk Dataran -->
           <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="card-title">
                  List Rating dan Ulasan<br />
                  <span>Manajemen Rating & Ulasan Pelanggan
                  </span>
                </div>
              </div>               

                <div class="d-none d-md-block">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" 
                      data-bs-target="#home-tab-pane" type="button" role="tab" 
                      aria-controls="home-tab-pane" aria-selected="true">Semua</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" 
                      data-bs-target="#profile-tab-pane" type="button" role="tab" 
                      aria-controls="profile-tab-pane" aria-selected="false">Perlu Dibalas
                      <span class="badge rounded-pill bg-primary" style="margin-left: 5px;">2</span>

                    </button>

                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" 
                      data-bs-target="#contact-tab-pane" type="button" role="tab" 
                      aria-controls="contact-tab-pane" aria-selected="false">Sudah Dibalas
                    </button>
                    </li>
                  </ul>



                  {{-- Semua --}}
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                      
                      <div class="d-flex justify-content-end mt-4 mb-3">
                      <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Filter
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Terbaru</a></li>
                          <li><a class="dropdown-item" href="#">Terlama</a></li>
                          <li><a class="dropdown-item" href="#">Rating tertinggi</a></li>
                          <li><a class="dropdown-item" href="#">Rating terendah</a></li>
                        </ul>
                      </div>
                      </div>

                      <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Jhon Doe 1</h5>
                                <h5 class="card-title">
                                    <span style="font-size: 0.78rem;">2023-08-02 23:59:10</span>
                                </h5>
                            </div>
                            <p class="fw-bold">Sofa Klasik Eropa</p>
                            <div class="d-flex">
                              <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-height: 130px; border-radius: 10px;" alt="Gambar produk" />
                              <div class="d-flex flex-column justify-content-center align-items-start ml-3" style="margin-top: -9px;">
                                    <div class="star-rating">
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                    </div>
                                    <p class="mt-1 text-justify">
                                        There are many variations of passages of Lorem Ipsum available,
                                        but the majority have suffered alteration in some form, by
                                        injected humour, or randomised words which don't look even
                                        slightly believable.
                                    </p>
                                </div>
                            </div>

                        {{-- gambar dari pelanggan --}}
                            <div class="d-flex justify-content-end">
                                <div class="d-flex flex-row">
                                    <img src="../assets/assets/img/card.jpg" style="max-width: 6rem; cursor: pointer; margin-right: 10px; margin-left: 10px; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                    <img src="../assets/assets/img/card.jpg" style="max-width: 6rem; cursor: pointer; margin-right: 10px; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                    <img src="../assets/assets/img/card.jpg" style="max-width: 6rem; cursor: pointer; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <button onclick="toggleReply()" class="btn btn-primary" id="replyButton">Balas Penilaian Ini</button>
                            </div>
                            <div id="replySection" style="display: none;">
                                <textarea id="replyTextarea" class="mt-4 w-100" placeholder="Masukkan tanggapan anda...... (Min 50 Karakter)" style="border-radius: 5px;" rows="4" cols="50" maxlength="250" oninput="handleDeskripsiProdukChange(event)"></textarea>
                                <div class="d-flex justify-content-end">
                                    <span class="text-muted" id="characterCount">0 / 250</span>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button onclick="handleSendReply()" class="btn btn-primary" id="sendReplyButton" disabled>Kirim Balasan <i class="bi bi-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    
                    
                    </div>

                    {{-- Perlu Dibalas --}}
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                      
                      <div class="d-flex justify-content-end mt-4 mb-3">
                        <div class="dropdown">
                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Terbaru</a></li>
                            <li><a class="dropdown-item" href="#">Terlama</a></li>
                            <li><a class="dropdown-item" href="#">Rating tertinggi</a></li>
                            <li><a class="dropdown-item" href="#">Rating terendah</a></li>
                          </ul>
                        </div>
                        </div>
                    
                      <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Jhon Doe 1</h5>
                                <h5 class="card-title">
                                    <span style="font-size: 0.78rem;">2023-08-02 23:59:10</span>
                                </h5>
                            </div>
                            <p class="fw-bold">Sofa Klasik Eropa</p>
                            <div class="d-flex">
                              <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-height: 130px; border-radius: 10px;" alt="Gambar produk" />
                              <div class="d-flex flex-column justify-content-center align-items-start ml-3" style="margin-top: -9px;">
                                    <div class="star-rating">
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                    </div>
                                    <p class="mt-1 text-justify">
                                        There are many variations of passages of Lorem Ipsum available,
                                        but the majority have suffered alteration in some form, by
                                        injected humour, or randomised words which don't look even
                                        slightly believable.
                                    </p>
                                </div>
                            </div>

                             {{-- gambar dari pelanggan --}}
                            <div class="d-flex justify-content-end">
                                <div class="d-flex flex-row">
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-width: 6rem; cursor: pointer; margin-right: 10px; margin-left: 10px; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-width: 6rem; cursor: pointer; margin-right: 10px; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-width: 6rem; cursor: pointer; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <button onclick="toggleReply()" class="btn btn-primary" id="replyButton">Balas Penilaian Ini</button>
                            </div>
                            <div id="replySection" style="display: none;">
                                <textarea id="replyTextarea" class="mt-4 w-100" placeholder="Masukkan tanggapan anda...... (Min 50 Karakter)" style="border-radius: 5px;" rows="4" cols="50" maxlength="250" oninput="handleDeskripsiProdukChange(event)"></textarea>
                                <div class="d-flex justify-content-end">
                                    <span class="text-muted" id="characterCount">0 / 250</span>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button onclick="handleSendReply()" class="btn btn-primary" id="sendReplyButton" disabled>Kirim Balasan <i class="bi bi-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
  
                    </div>


                    {{-- Sudah Dibalas --}}
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                      
                      <div class="d-flex justify-content-end mt-4 mb-3">
                        <div class="dropdown">
                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Terbaru</a></li>
                            <li><a class="dropdown-item" href="#">Terlama</a></li>
                            <li><a class="dropdown-item" href="#">Rating tertinggi</a></li>
                            <li><a class="dropdown-item" href="#">Rating terendah</a></li>
                          </ul>
                        </div>
                        </div>

                      <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Jhon Doe 1</h5>
                                <h5 class="card-title">
                                    <span style="font-size: 0.78rem;">2023-08-02 23:59:10</span>
                                </h5>
                            </div>
                            <p class="fw-bold">Sofa Klasik Eropa - Merah</p>
                            <div class="d-flex">
                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-height: 130px; border-radius: 10px;" alt="Gambar produk" />
                                <div class="d-flex flex-column justify-content-center align-items-start ml-3" style="margin-top: -9px;">
                                    <div class="star-rating">
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                        <i class="bi bi-star-fill text-gold"></i>
                                    </div>
                                    <p class="mt-1 text-justify">
                                        There are many variations of passages of Lorem Ipsum available,
                                        but the majority have suffered alteration in some form, by
                                        injected humour, or randomised words which don't look even
                                        slightly believable.
                                    </p>
                                </div>
                            </div>

                            {{-- gambar dari pelanggan --}}
                            <div class="d-flex justify-content-end">
                                <div class="d-flex flex-row">
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"  style="max-width: 6rem; cursor: pointer; margin-right: 10px; margin-left: 10px; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-width: 6rem; cursor: pointer; margin-right: 10px; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" style="max-width: 6rem; cursor: pointer; border-radius: 5px;" alt="Gambar Pendukung Ulasan" onclick="openModal('../assets/assets/img/card.jpg')" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Tanggapan Anda</h5>
                                <h5 class="card-title">
                                    <span style="font-size: 0.78rem;">2023-08-02 23:59:10</span>
                                </h5>
                            </div>
                            <p class="text-justify">
                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s, when an unknown printer took a galley of
                                type and scrambled it to make a type specimen book
                            </p>
                        </div>
                    </div>
                    
                    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Gambar dari pelanggan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img id="modalImage" style="width: 100%; border-radius: 10px;" alt="Gambar Lebih Besar" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    </div>
                  </div>
                </div>


          </div>
            
          </section>
        </div>
  </main><!-- End #main -->

  <script>
    const openModal = (imageSrc) => {
    setSelectedImage(imageSrc);
    setShowModal(true);
};

const closeModal = () => {
    setSelectedImage("");
    setShowModal(false);
};

const toggleReply = () => {
    const replySection = document.getElementById("replySection");
    const replyButton = document.getElementById("replyButton");
    if (replySection.style.display === "none") {
        replySection.style.display = "block";
        replyButton.textContent = "Batal Balas Penilaian Ini";
        replyButton.classList.remove("btn-primary");
        replyButton.classList.add("btn-danger");
    } else {
        replySection.style.display = "none";
        replyButton.textContent = "Balas Penilaian Ini";
        replyButton.classList.remove("btn-danger");
        replyButton.classList.add("btn-primary");
    }
};

const handleSendReply = () => {
    const textareaValue = document.getElementById("replyTextarea").value;
    if (textareaValue.length < 50) {
        Swal.fire(
            "Perhatian!",
            "Balasan minimal harus memiliki 50 karakter.",
            "warning"
        );
    } else {
        Swal.fire({
            title: "Apakah Anda Ingin Mengirim Balasan?",
            text: "Anda hanya dapat mengirim balasan ini satu kali saja.",
            showCancelButton: true,
            confirmButtonText: "Iya, Kirimkan",
            cancelButtonText: "Batal Kirim",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Tunda loading selama 1,5 detik
                setLoading(true);
                setTimeout(() => {
                    setLoading(false);
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Balasan Anda telah dikirim.",
                        timer: 2000,
                        timerProgressBar: true
                    });
                }, 1500);
            }
        });
    }
};

const handleDeskripsiProdukChange = (e) => {
    const inputValue = e.target.value;
    const characterCount = inputValue.length;
    document.getElementById("characterCount").textContent = characterCount + " / 250";
    const sendReplyButton = document.getElementById("sendReplyButton");
    if (characterCount >= 50 && characterCount <= 250) {
        sendReplyButton.removeAttribute("disabled");
    } else {
        sendReplyButton.setAttribute("disabled", true);
    }
    if (characterCount > 250) {
        e.target.value = e.target.value.slice(0, 250);
    }
};


  </script>

<script>
  const openModal = (imageSrc) => {
      const modalImage = document.getElementById("modalImage");
      modalImage.src = imageSrc;
      const modal = new bootstrap.Modal(document.getElementById("exampleModal"));
      modal.show();
  };
</script>


                @include('admin.komponenadmin.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.include.script')


</body>

</html>