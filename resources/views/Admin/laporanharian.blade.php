{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pilih Jangka Waktu Hari</h5>
                    <form>
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="date" id="startDateInput" onchange="handleStartDateChange(event)" class="form-control" />
                        </div>
                        <div class="form-group mt-3">
                            <label>Tanggal Akhir <span class="text-muted">(Opsional)</span></label>
                            <input type="date" id="endDateInput" onchange="handleEndDateChange(event)" min=""
                                max="" disabled class="form-control" />
                        </div>
                    </form>
                </div>
            </div>
            <div style="margin-top: 20px;" class="d-flex justify-content-between">
                <button id="resetButton" onclick="handleResetClick()" class="btn btn-outline-danger" disabled>Reset Waktu</button>
                <button onclick="handleSearchClick()" class="btn btn-primary">Tampilkan Data</button>
            </div>
            
            <div id="dashboard" style="display: none;">
                <h5 class="card-title">Menampilkan Hasil Laporan</h5>
                <div class="d-flex justify-content-between">
                    <p>Tanggal Awal :</p>
                    <p class="text-muted" id="startDate">-</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Tanggal Akhir :</p>
                    <p class="text-muted" id="endDate">-</p>
                </div>
                <hr />
            </div>
            
            <h5 class="card-title" id="overviewTitle">Over View tanggal 29 - 30 Agustus 2023.</h5>

        <div class="row">
            <div class="col-sm-4">
                <div class="card info-card sales-card">
                    <!-- Jumlah Pelanggan -->
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Total Pelanggan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12 <span style="font-size: 1rem;">Pelanggan</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card revenue-card">
                    <!-- Jumlah Terjual -->
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Total Produk Terjual</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bag"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12 <span style="font-size: 1rem;">Terjual</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="card info-card customers-card">
                    <!-- Jumlah Total Terjual -->

                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Total Ulasan</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bar-chart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12 <span style="font-size: 1rem;">Ulasan</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card info-card customers-card">
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Sudah Di Bayar</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: rgb(192, 252, 230);">
                                    <i class="bi bi-cart-check" style="color: rgb(68, 166, 130);"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12 <span style="font-size: 1rem;">Transaksi</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card info-card customers-card">
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Total Invoice</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: rgb(255, 252, 189);">
                                    <i class="bi bi-envelope-paper" style="color: rgb(255, 237, 43);"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12 <span style="font-size: 1rem;">Invoice</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card info-card customers-card">
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Total Produk</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: rgb(192, 252, 230);">
                                    <i class="bi bi-cart-check" style="color: rgb(68, 166, 130);"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12 <span style="font-size: 1rem;">Produk</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card info-card customers-card">
                    <div>
                        <div class="card-body">
                            <h5 class="card-title">Total Kategori</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="background-color: rgb(255, 252, 189);">
                                    <i class="bi bi-envelope-paper" style="color: rgb(255, 237, 43);"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>12 <span style="font-size: 1rem;">kategori</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="card-title">Pendapatan tanggal 29 - 30 Agustus 2023.</h5>
        <div class="card info-card customers-card">
            <div>
                <div class="card-body">
                    {{-- Pendapatan Aplikasi --}}
                    <h5 class="card-title">Total Pendapatan</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                            style="background-color: rgb(255, 252, 189);">
                            <i class="bi bi-envelope-paper" style="color: rgb(255, 237, 43);"></i>
                        </div>
                        <div class="ps-3">
                            <h6>Rp 100.000.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <h5 class="card-title">5 Produk Terlaris tanggal 29 - 30 Agustus 2023.</h5>
        <div class="card top-selling overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Produk Dataran Terlaris (terjual lebih dari 5)</h5>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Terjual</th>
                            <th class="text-center">Dilihat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                    alt="" />
                            </td>
                            <td class="text-center">Meja Gaming</td>
                            <td class="text-center fw-bold">Meja<br /><small>Dataran</small></td>
                            <td class="text-center">Rp 1.100.000</td>
                            <td class="text-center fw-bold">13x</td>
                            <td class="text-center">100x</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <img src="../assets/assets/img/product-2.jpg" alt="" class="img-thumbnail" />
                            </td>
                            <td class="text-center">Meja Rias Aesthetic</td>
                            <td class="text-center fw-bold">Meja<br /><small>Dataran</small></td>
                            <td class="text-center">Rp 1.800.000</td>
                            <td class="text-center fw-bold">8x</td>
                            <td class="text-center">100x</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <img src="../assets/assets/img/product-4.jpg" alt="" class="img-thumbnail" />
                            </td>
                            <td class="text-center">Kabinet Dinding</td>
                            <td class="text-center fw-bold">Kabinet<br /><small>Dinding</small></td>
                            <td class="text-center">Rp 1.500.000</td>
                            <td class="text-center fw-bold">6x</td>
                            <td class="text-center">100x</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card top-selling overflow-auto">
            <div class="card-body">
                <h5 class="card-title">Produk Dinding Terlaris (terjual lebih dari 5)</h5>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Terjual</th>
                            <th class="text-center">Dilihat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                    alt="" class="img-thumbnail" />
                            </td>
                            <td class="text-center">Meja Gaming</td>
                            <td class="text-center fw-bold">Meja<br /><small>Dataran</small></td>
                            <td class="text-center">Rp 1.100.000</td>
                            <td class="text-center fw-bold">13x</td>
                            <td class="text-center">100x</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <img src="assets/assets/img/product-2.jpg" alt="" class="img-thumbnail" />
                            </td>
                            <td class="text-center">Meja Rias Aesthetic</td>
                            <td class="text-center fw-bold">Meja<br /><small>Dataran</small></td>
                            <td class="text-center">Rp 1.800.000</td>
                            <td class="text-center fw-bold">8x</td>
                            <td class="text-center">100x</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <img src="assets/assets/img/product-4.jpg" alt="" class="img-thumbnail" />
                            </td>
                            <td class="text-center">Kabinet Dinding</td>
                            <td class="text-center fw-bold">Kabinet<br /><small>Dinding</small></td>
                            <td class="text-center">Rp 1.500.000</td>
                            <td class="text-center fw-bold">6x</td>
                            <td class="text-center">100x</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <h5 class="card-title">Kategori Terlaris tanggal 29 - 30 Agustus 2023.</h5>

        <div class="card top-selling overflow-auto">
            <div class="card-body pb-0">
                <h5 class="card-title">Kategori Dataran</h5>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Nama Kategori</th>
                            <th class="text-center">Total Produk</th>
                            <th class="text-center">Total Produk Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <a href="#">
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                        alt="Meja" />
                                </a>
                            </td>
                            <td class="text-center">
                                <p class="fw-bold">Meja</p>
                            </td>
                            <td class="text-center">12 Produk</td>
                            <td class="text-center fw-bold">10x Terjual</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="#">
                                    <img src="assets/assets/img/product-1.jpg" alt="Sofa" />
                                </a>
                            </td>
                            <td class="text-center">
                                <p class="fw-bold">Sofa</p>
                            </td>
                            <td class="text-center">8 Produk</td>
                            <td class="text-center fw-bold">8x Terjual</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <a href="#">
                                    <img src="assets/assets/img/product-3.jpg" alt="Kursi" />
                                </a>
                            </td>
                            <td class="text-center">
                                <p class="fw-bold">Kursi</p>
                            </td>
                            <td class="text-center">6 Produk</td>
                            <td class="text-center fw-bold">5x Terjual</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div>
            <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                    <h5 class="card-title">Kategori Dinding</h5>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Kategori</th>
                                <th style="text-align: center;">Nama Kategori</th>
                                <th style="text-align: center;">Total Produk</th>
                                <th style="text-align: center;">Total Produk Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: center;">
                                    <a href="#">
                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                            alt="Kabinet Dinding" />
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <p class="fw-bold">Kabinet Dinding</p>
                                </td>
                                <td style="text-align: center;">12 Produk</td>
                                <td style="text-align: center;" class="fw-bold">10x Terjual</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <a href="#">
                                        <img src="assets/assets/img/product-2.jpg" alt="Sofa Dinding" />
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <p class="fw-bold">Sofa Dinding</p>
                                </td>
                                <td style="text-align: center;">8 Produk</td>
                                <td style="text-align: center;" class="fw-bold">8x Terjual</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <a href="#">
                                        <img src="assets/assets/img/product-5.jpg" alt="Kursi Dinding" />
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <p class="fw-bold">Kursi Dinding</p>
                                </td>
                                <td style="text-align: center;">6 Produk</td>
                                <td style="text-align: center;" class="fw-bold">5x Terjual</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h5 class="card-title">Rating & Ulasan pelanggan tanggal 29 - 30 Agustus 2023.</h5>
            <table class="table table-bordered table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Rating Pelanggan</th>
                        <th>Ulasan Pelanggan</th>
                        <th>Waktu Memberi Ulasan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>5</td>
                        <td>Pelayanan sangat memuaskan!</td>
                        <td>2024-07-01</td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>4</td>
                        <td>Barang sesuai dengan deskripsi.</td>
                        <td>2024-06-30</td>
                    </tr>
                    <tr>
                        <td>Michael Johnson</td>
                        <td>3</td>
                        <td>Pengiriman agak lambat.</td>
                        <td>2024-06-29</td>
                    </tr>
                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                </tbody>
            </table>
    


        <h5 class="card-title">Data Lengkap Penjualan tanggal 29 - 30 Agustus 2023.</h5>
        <div class="table-responsive mb-5">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th colspan="10" class="text-center" style="font-size: 20px;">AR-Furniture</th>
                    </tr>
                    <tr>
                        <th colspan="10" class="text-center">Laporan Penjualan Tanggal 2023-08-29 hingga
                            2023-08-29</th>
                    </tr>
                    <tr>
                        <th>No.</th>
                        <th>Pelanggan</th>
                        <th>Alamat</th>
                        <th>Barang</th>
                        <th>Pembayaran</th>
                        <th>Waktu Pembayaran</th> <!-- Penambahan -->
                        <th>Sub Total</th>
                        <th>Diskon</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data penjualan -->
                    <tr>
                        <td>1</td>
                        <td>Sumiasih</td>
                        <td>Banyumas</td>
                        <td class="fw-bold">Kursi Klasik Eropa<br /><span><small>-Biru</small></span></td>
                        <td>Bank Transfer</td>
                        <td>...</td>
                        <td>Rp 2.000.000</td>
                        <td class="fw-bold">5%</td>
                        <td>Rp 1.900.000</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Keisha</td>
                        <td>Kediri</td>
                        <td class="fw-bold">Sofa USA</td>
                        <td>Bank_Transfer</td>
                        <td>...</td>
                        <td>Rp 5.000.000</td>
                        <td>-</td>
                        <td>Rp 5.000.000</td>
                    </tr>
                    <!-- Data lainnya -->
                    <!-- ... -->
                    <!-- Total -->
                    <tr>
                        <th colspan="6">Total</th>
                        <td>Rp 7.000.000</td>
                        <td>0.05</td> <!-- Placeholder for diskon -->
                        <td>Rp 6.900.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <a href="/Outputhasilprintlaporanharian">
                <button class="btn btn-primary">Kirim Ke Email</button>
            </a>
        </div>
    </section>

@stop

@push('js')
    {{-- Untuk format hari --}}

    <script>
        function handleStartDateChange(event) {
            const startDate = event.target.value;
            const endDateInput = document.getElementById('endDateInput');
            endDateInput.disabled = false;
            endDateInput.min = startDate;
    
            document.getElementById('startDate').innerText = formatDate(startDate) || '-';
    
            // Enable the reset button
            document.getElementById('resetButton').disabled = false;
        }
    
        function handleEndDateChange(event) {
            const endDate = event.target.value;
            document.getElementById('endDate').innerText = formatDate(endDate) || '-';
    
            // Enable the reset button
            document.getElementById('resetButton').disabled = false;
        }
    
        function handleResetClick() {
            document.getElementById('startDateInput').value = '';
            document.getElementById('endDateInput').value = '';
            document.getElementById('endDateInput').disabled = true;
            document.getElementById('startDate').innerText = '-';
            document.getElementById('endDate').innerText = '-';
    
            // Hide the dashboard
            document.getElementById('dashboard').style.display = 'none';
    
            // Disable the reset button
            document.getElementById('resetButton').disabled = true;
    
            // Reset the overview title
            document.getElementById('overviewTitle').innerText = 'Over View tanggal -';
        }
    
        function handleSearchClick() {
            const startDate = document.getElementById('startDateInput').value;
            const endDate = document.getElementById('endDateInput').value || startDate; // Use startDate if endDate is not set
    
            document.getElementById('dashboard').style.display = 'block';
            document.getElementById('overviewTitle').innerText = generateOverviewTitle(startDate, endDate);
        }
    
        function generateOverviewTitle(startDate, endDate) {
            const formattedStartDate = formatDate(startDate);
            const formattedEndDate = formatDate(endDate);
    
            const start = new Date(startDate);
            const end = new Date(endDate);
    
            if (startDate === endDate) {
                return `Over View tanggal ${formattedStartDate}`;
            } else if (start.getMonth() === end.getMonth() && start.getFullYear() === end.getFullYear()) {
                return `Over View tanggal ${start.getDate()} - ${end.getDate()} ${formattedEndDate.split(' ')[1]}`;
            } else {
                return `Over View tanggal ${formattedStartDate.split(' ')[0]} ${formattedStartDate.split(' ')[1]} - ${formattedEndDate}`;
            }
        }
    
        function formatDate(dateString) {
            if (!dateString) return '';
    
            const months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];
    
            const date = new Date(dateString);
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();
    
            return `${day} ${month} ${year}`;
        }
    </script>

    {{-- <script>
        const [startDate, setStartDate] = useState(null);
        const [endDate, setEndDate] = useState(null);
        const [showDashboard, setShowDashboard] = useState(false);
        const [searchClicked, setSearchClicked] = useState(false);
        const [showLoading, setShowLoading] = useState(false);
        const [error, setError] = useState("");

        const handleStartDateChange = (event) => {
            const newStartDate = event.target.value;
            setStartDate(newStartDate);
            setEndDate(null);
            setError("");
        };

        const handleEndDateChange = (event) => {
            const selectedStartDate = new Date(startDate);
            const selectedEndDate = new Date(event.target.value);
            const oneWeekBefore = new Date(selectedStartDate);
            oneWeekBefore.setDate(oneWeekBefore.getDate() - 7);

            if (selectedEndDate < oneWeekBefore) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Hanya dapat memilih rentang waktu satu minggu dari tanggal awal',
                });
                setEndDate(null);
            } else {
                setEndDate(event.target.value);
                setError("");
            }
        };

        const handleSearchClick = () => {
            if (!startDate) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Harap pilih tanggal awal terlebih dahulu',
                });
                return;
            }

            if (startDate === endDate) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tanggal akhir tidak dapat lebih awal dari tanggal awal',
                });
                return;
            }

            setShowLoading(true);

            const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
            const effectiveType = connection.effectiveType;

            let loadingTime = 1500;
            if (effectiveType === 'slow-2g' || effectiveType === '2g') {
                loadingTime = 3000;
            }

            setTimeout(() => {
                setShowDashboard(true);
                setSearchClicked(true);
                setShowLoading(false);
            }, loadingTime);
        };

        const handleResetClick = () => {
            if (startDate) {
                setStartDate(null);
                setEndDate(null);
                setShowDashboard(false);
                setSearchClicked(false);
                setError("");
            }
        }

        function getOneWeekLater(dateString) {
            const selectedStartDate = new Date(dateString);
            const oneWeekLater = new Date(selectedStartDate);
            oneWeekLater.setDate(oneWeekLater.getDate() + 7);
            return oneWeekLater.toISOString().split("T")[0];
        }

        function formatDate(dateString) {
            if (!dateString) return '-';

            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const formattedDate = new Date(dateString).toLocaleDateString('id-ID', options);

            return formattedDate;
        }
    </script> --}}


    {{-- Untuk Pendapatan --}}
    <script>
        // Fungsi untuk format Rupiah
        const formatRupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(number);
        };

        // Total Pendapatan dan Jumlah Penjualan
        const totalPendapatan = 69000000; // Ganti angka sesuai dengan pendapatan yang sesungguhnya
        const jumlahPenjualan = 30; // Ganti dengan jumlah penjualan yang sesungguhnya

        // Isi nilai pada elemen HTML
        document.getElementById("totalPendapatan").innerText = formatRupiah(totalPendapatan);
        document.getElementById("totalPendapatanFooter").innerText = formatRupiah(totalPendapatan);
        document.getElementById("jumlahPenjualan").innerText = jumlahPenjualan + " Penjualan";

        // Rincian Pendapatan dan Penjualan
        document.getElementById("pendapatanNonFlash").innerText = formatRupiah(5000000);
        document.getElementById("penjualanNonFlash").innerText = "10 Penjualan.";

        // Jika tidak ada flash sale maka kosongi saja
        document.getElementById("pendapatanFlashSale1.1").innerText = formatRupiah(5000000);
        document.getElementById("penjualanFlashSale1.1").innerText = "10 Penjualan.";
        document.getElementById("pendapatanFlashSale2.2").innerText = formatRupiah(5000000);
        document.getElementById("penjualanFlashSale2.2").innerText = "10 Penjualan.";
    </script>


    {{-- Untuk grafik penilaian --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chartRef = document.getElementById('chart').getContext('2d');
            const chartData = [10, 20, 30, 40, 50]; // Data chart Anda
            const chartLabels = ['1 Bintang', '2 Bintang', '3 Bintang', '4 Bintang', '5 Bintang']; // Label sumbu X
            const chart = new Chart(chartRef, {
                type: 'bar',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Jumlah Rating',
                        data: chartData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush
