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
{{-- hasil pencarian untuk search bar PC only --}}
    <section>
    <div class="container">
        <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
            <h2><b>Frequently Asked Questions (FAQ).
            </b></h2>
        </div>
        <hr>


        <!-- F.A.Q Group 3 -->
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dolore occaecati ducimus quam</h5>

              <div class="accordion accordion-flush" id="faq-group-3">

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-1" type="button" data-bs-toggle="collapse">
                        Bagaimana cara melakukan pemesanan produk di AR-Furniture ?
                    </button>
                  </h2>
                  <div id="faqsThree-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                        <p><b>A. Bagaimana cara melakukan pemesanan produk di AR-Furniture?</b></p>
                        <ul>
                          <li>Pilih produk yang Anda inginkan lalu klik "Tambah ke keranjang"</li>
                          <li>Produk tersebut akan masuk secara otomatis ke keranjang belanja Anda,
                            kemudian Anda bisa memilih untuk melanjutkan belanja atau ke proses selanjutnya
                            yaitu checkout. Jika Anda ingin melihat detail dan menyelesaikan pesanan Anda,
                            klik tombol "CART" pada pop up atau "KERANJANG BELANJA" yang berada di posisi kanan atas layar.</li>
                          <li>Pada halaman detail pesanan, pastikan pesanan sudah sesuai dengan yang Anda pesan, klik "CHECKOUT" untuk memproses ke langkah selanjutnya.</li>
                        </ul>
              
                        <p><b>B. Untuk Pelanggan Baru Yang Belum Memiliki Akun</b></p>
                        <ul>
                          <li>Untuk pelanggan baru akan diminta untuk memasukkan nama, email, telepon, alamat, dan password. Setelah itu, klik tombol "Daftar".</li>
                        </ul>
              
                        <p><b>C. Untuk Pelanggan Yang Sudah Memiliki Akun</b></p>
                        <ul>
                          <li>Untuk pelanggan yang sudah terdaftar, Anda bisa membeli produk.</li>
                          <li>Pilih metode pembayaran, lalu klik “CONTINUE” untuk menyelesaikan pesanan.</li>
                          <li>Periksa pesanan Anda dengan teliti.</li>
                          <li>Setelah proses pesanan selesai, Anda akan mendapatkan “ORDER SUMMARY”.</li>
                          <li>Mohon memasukkan detail pembayaran dan klik “CONFIRM PAYMENT”.</li>
                        </ul>                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-2" type="button" data-bs-toggle="collapse">
                        Metode pembayaran apa saja yang tersedia ?
                    </button>
                  </h2>
                  <div id="faqsThree-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                        <p><b>A. Metode pembayaran apa saja yang tersedia?</b></p>
                        <ul>
                          <li>Metode pembayaran yang kami gunakan adalah Midtrans.
                            Midtrans adalah partner pembayaran AR-Furniture. Untuk metode pembayaran yang kami terima adalah sebagai berikut:</li>
                          <ul>
                            <li>Kartu Kredit (Credit Card)</li>
                            <li>Transfer Bank Virtual Account</li>
                            <li>E-Wallet</li>
                          </ul>
                        </ul>
              
                        <p><b> Catatan Penting</b></p>
                        <ul>
                          <p>Harap melakukan transfer maksimal 48 jam setelah Anda melakukan pesanan,
                            jika tidak transfer dalam kurun waktu 48 jam, maka transaksi akan dibatalkan secara otomatis oleh kami.</p>
                        </ul>
              
                        <p><b>B. Apakah aman jika melakukan transaksi di AR-Furniture?</b></p>
                        <ul>
                          <p>Sangat aman. Kami bekerja sama dengan Midtrans yang dapat menjamin keamanan transaksi Anda di AR-Furniture.
                            Demi keamanan, kami tidak mengumpulkan informasi kartu kredit Anda.
                            Setelah Anda melakukan pemesanan, Anda akan diarahkan ke situs aman dan diminta untuk memasukkan nomor PIN telepon sekali pakai untuk menjaga keamanan akun Anda.</p>
                        </ul>                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-3" type="button" data-bs-toggle="collapse">
                        Bagaimana cara menggunakan Augmented Reality ?   
                    </button>
                  </h2>
                  <div id="faqsThree-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                        <ul>
                            <p>Augmented reality pada produk AR-Furniture bisa ditemukan pada setiap produk furnitur.
                              Untuk menggunakannya, Anda bisa klik tombol “Hey, Gunakan AR” untuk mulai menggunakan Augmented Reality.
                              Tombol akan tersedia apabila perangkat sudah mendukung augmented reality.</p>
                          </ul>                   
                         </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-4" type="button" data-bs-toggle="collapse">
                        Bagaimana agar saya tetap bisa melihat produk furnitur 3D meskipun perangkat tidak mengukung Augmented Reality ?
                    </button>
                  </h2>
                  <div id="faqsThree-4" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                        <ul>
                            <li>AR-Furniture menyediakan alternatif visualisasi 3D pada setiap produk.
                              Jadi, meskipun Anda tidak bisa menggunakan Augmented Reality, Anda tetap bisa memvisualisasikan produk 3D dan berinteraksi dengan model 3D.</li>
                          </ul>                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" data-bs-target="#faqsThree-5" type="button" data-bs-toggle="collapse">
                        Apakah Augmented Reality pada AR-Furniture bisa diakses di Android dan iOS ?

                    </button>
                  </h2>
                  <div id="faqsThree-5" class="accordion-collapse collapse" data-bs-parent="#faq-group-3">
                    <div class="accordion-body">
                        <p><b>A. Apakah Augmented Reality pada AR-Furniture bisa diakses di Android dan iOS?</b></p>
                        <ul>
                          <li>Tentu saja, Augmented Reality pada AR-Furniture bisa digunakan pada Android dan iOS</li>
                        </ul>
              
                        <ul>
                        <p><b> Catatan Penting :</b></p>
              
                          <p>Augmented Reality hanya bisa digunakan pada Ponsel atau Tablet Android dan iOS yang kompatibel atau mendukung Augmented Reality.</p>
                        </ul>
              
                        <p><b>B. Apakah Augmented Reality pada AR-Furniture bisa diakses di Laptop atau Komputer?</b></p>
                        <ul>
                          <li>Mohon maaf <b>TIDAK BISA!!</b> Augmented Reality pada AR-Furniture hanya bisa diakses pada Android dan iOS yang kompatibel atau mendukung Augmented Reality</li>
                        </ul>
              
                        <p><b>C. Bagaimana cara mengetahui apakah ponsel / tablet saya mendukung Augmented Reality?</b></p>
                        <ul>
                          <li>
                            Untuk mengetahui apakah posel / tablet Anda bisa menjalankan Augmented Reality,
                            silakan klik <b><a href="https://developers.google.com/ar/devices#:~:text=device%20list.-,Device%20list%20(table),-The%20following%20table" target="_blank" rel="noreferrer">Android</a></b> ||
                            <b><a href="https://www.apple.com/augmented-reality/#footnote-2:~:text=Find%20out%20if%20your%20iOS%20or%C2%A0iPadOS" target="_blank" rel="noreferrer"> iOS</a></b>
                          </li>
                        </ul>                    </div>
                  </div>
                </div>

              </div>

            </div>

    </div>
    </section>
    <div class='d-block d-lg-none'>
      @include('user.komponenuser.bottomnavbar')
      </div>
    @include('user.komponenuser.footer')
    @include('user.include.script')

</body>
</html>