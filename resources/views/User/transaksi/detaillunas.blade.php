<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-6">
                <div class="mb-3">
                    <p><b>Informasi Pemesan</b></p>
                    <span>{{ $transaction->user->name }}</span><br />
                    <span>{{ $transaction->user->email }}</span><br />
                    <span>{{ $transaction->user->customer->phone }}</span>
                </div>
                <div>
                    <p><b>Informasi Alamat Pelanggan</b></p>
                    <p>{!! $transaction->user->customer->address !!}</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-6">
                <div>
                    <p><b>No. Transaksi</b></p>
                    <p>{{ $transaction->code }}</p>
                </div>
                {{-- <div>
                    <p><b>No. Pesanan</b></p>
                    <p>AR-F/ORD-20230815-0003</p>
                </div> --}}
            </div>
            <div class="col-xs-12 col-md-4 col-6">
                <div>
                    <p><b>Waktu Pemesanan</b></p>
                    <p>{{ $transaction->created_date() }}</p>
                </div>
                <div>
                    <p><b>Status Pembayaran</b></p>
                    <h4><b><span class="badge rounded-pill bg-success text-white">Lunas/ Sudah dibayar</span></b></h4>
                    <p><b>Waktu Pembayaran</b></p>
                    <p>{{ $transaction->payment_date() }}</p>
                    <p><b>Metode Pembayaran</b></p>
                    <p>{{ $transaction->payment_type ?? '' }}</p>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="mb-4"><b>Produk Yang Anda Pesan.</b></h4>
        @php
            $totalHarga = 0;
        @endphp
        @foreach ($transaction->transactionDetail as $detail)
            @php
                $subTotal = $detail->total;
                $diskon = $detail->diskon ?? 0;
                $ongkir = $detail->ongkir ?? 0;
                $harga = $subTotal - $diskon;
                $totalOngkir = $harga + $ongkir;
                $totalHarga += $totalOngkir;
            @endphp
            <div class="mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="margin-bottom: -20px;">
                            <p class="fw-bold" style="font-size: 20px;">Rician Pesanan</p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <img src="{{ url($detail->product->thumbnail) }}" alt="Produk"
                                    style="max-width: 150px; border-radius: 10px;">
                            </div>
                            <div class="col d-flex flex-column">
                                <div>
                                    <p class="fw-bold" style="font-size: 1.2rem;">{{ $detail->product->name }}</p>
                                    <p class="text-muted">Varian : {{ $detail->varian->name }}</p>
                                    <span>Kuantitas : {{ $detail->quantity }}x</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p style="font-size: 20px;"><b>Rincian Harga</b></p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <p>Harga Satuan: </p>
                            <p>{{ formatRupiah($detail->harga) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Sub Total Produk: </p>
                            <p>{{ formatRupiah($detail->total) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Diskon: </p>
                            <p>-{{ formatRupiah($diskon) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Ongkos Kirim: </p>
                            <p>{{ formatRupiah($ongkir) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Sub Total Ongkos Kirim: </p>
                            <p>{{ formatRupiah($ongkir) }}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold">Total Pesanan: </p>
                            <p class="fw-bold">{{ formatRupiah($harga) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <hr>
        <div class="mt-4 mb-4">
            <h4 class="fw-bold" style="font-size: 1.4rem;">Penilaian & Ulasan Anda.</h4>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Tampilkan ulasan yang anda berikan.
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="d-flex justify-content-between mb-1">
                                <h5>Jhon Doe 1</h5>
                                <span class="text-muted" style="font-size: 0.85rem;">
                                  10/03/2023
                                </span>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="checked" style="font-size: 1.3rem; color: gold;">★</span>
                                  <span class="checked" style="font-size: 1.3rem; color: gold;">★</span>
                                  <span class="checked" style="font-size: 1.3rem; color: gold;">★</span>
                                  <span class="checked" style="font-size: 1.3rem; color: gold;">★</span>
                                  <span class="checked" style="font-size: 1.3rem; color: gold;">★</span>
                                </div>
                              </div>
                              <p class="mt-2 text-muted">Varian : Biru</p>
                            
                              <div class="row mt-3 d-flex flex-wrap">
                                <div class="col-xs-4 col-md-4 col-lg-2 mb-3">
                                  <div class="image-container" onclick="handleImageClick('../gambar/product-2.jpg')">
                                    <img src="../gambar/product-2.jpg" class="img-fluid rounded" />
                                  </div>
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-2 mb-3">
                                  <div class="image-container" onclick="handleImageClick('../gambar/product-5.jpg')">
                                    <img src="../gambar/product-5.jpg" class="img-fluid rounded" />
                                  </div>
                                </div>
                              </div>
                              <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac scelerisque arcu, et placerat velit.
                                Phasellus in nisl nisi. Nullam varius purus id justo posuere mollis.
                              </p>
                              <div class="d-flex justify-content-end">
                                <button onclick="toggleCollapse()" aria-controls="example-collapse-text" aria-expanded="false" class="btn btn-outline-dark">
                                 Lihat Balasan <span id="collapse-icon"></span>
                                </button>
                              </div>
                              <div id="example-collapse-text" style="display: none;">
                                <div class="card mt-3">
                                  <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <h5>
                                        AR-Furniture <span class="badge text-bg-dark" style="font-size: 0.7rem;">Penjual</span>
                                      </h5>
                                      <p class="text-muted" style="font-size: 0.85rem;">
                                        08/03/2023
                                      </p>
                                    </div>
                                    Terima kasih atas penilaian anda, semoga produknya awet.
                                  </div>
                                </div>
                              </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <hr class="mt-5">
        <div class="d-flex justify-content-between">
            <p class="fw-bold">Total Keseluruhan: </p>
            <p class="fw-bold">2 Produk </p>
            <p><b> Rp. 1.500.000</b></p>
        </div>
        <hr style="margin-top: -5px;">
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success">Beri Penilaian</button>
            <a href="/Invoicepesanan" class="btn btn-dark">
                Tampilkan Invoice
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<script>
    function handleImageClick(imageSrc) {
      // Implement the function to handle image click
    }
  
    function toggleCollapse() {
      var collapseText = document.getElementById('example-collapse-text');
      var collapseIcon = document.getElementById('collapse-icon');
      if (collapseText.style.display === 'none') {
        collapseText.style.display = 'block';
        collapseIcon.innerHTML = '▲';
      } else {
        collapseText.style.display = 'none';
        collapseIcon.innerHTML = '▼';
      }
    }
  </script>