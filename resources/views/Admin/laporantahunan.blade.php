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
        <h1>Laporan Tahunan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Laporan Tahunan
            </li>
          </ol>
        </nav>
      </div>
    <section class="section dashboard">
      <div class="row">
        
          <!-- Card Informasi Atas -->
          <section class="section dashboard">
           <!-- Isi Konten Produk Dataran -->
           <div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pilih Jangka Waktu Tahun</h5>
                <form>
                  <div class="form-group">
                    <label>Tahun Awal</label>
                    <input
                      type="date"
                      value=""
                      onchange="handleStartDateChange(event)"
                      class="form-control"
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label>Tahun Akhir <span class="text-muted">(Opsional)</span></label>
                    <input
                      type="date"
                      value=""
                      onchange="handleEndDateChange(event)"
                      min=""
                      max=""
                      disabled
                      class="form-control"
                    />
                  </div>
                </form>
                <div class="text-danger" id="error"></div>
                <footer class="blockquote-footer mt-3">Rentang waktu Tanggal Akhir maksimal 1 minggu dari Tanggal awal.</footer>
              </div>
            </div>
            <div style=" margin-top: 20px;" class="d-flex justify-content-between">
              <button onclick="handleResetClick()" class="btn btn-outline-danger" disabled>Reset Waktu</button>
              <button onclick="handleSearchClick()" class="btn btn-primary">Tampilkan Data</button>
            </div>
          
            <div id="dashboard" style="display: none;">
              <h5 class="card-title">Menampilkan Hasil Laporan Harian</h5>
              <div class="d-flex justify-content-between">
                <p>Tanggal Awal :</p>
                <p class="text-muted" id="startDate">-</p>
              </div>
              <div class="d-flex justify-content-between">
                <p>Tanggal Akhir :</p>
                <p class="text-muted" id="endDate">-</p>
              </div>
              <hr />
              <div id="hasilLaporan"></div>
            </div>
          </div>
          
          <script>
            function handleStartDateChange(event) {
              const newStartDate = event.target.value;
              document.querySelector("#startDate").textContent = newStartDate;
              const endDateInput = document.querySelector("input[type='date'][max]");
              endDateInput.min = newStartDate;
              document.querySelector("#error").textContent = "";
            }
          
            function handleEndDateChange(event) {
              const selectedStartDate = new Date(document.querySelector("input[type='date'][min]").value);
              const selectedEndDate = new Date(event.target.value);
              const oneWeekBefore = new Date(selectedStartDate);
              oneWeekBefore.setDate(oneWeekBefore.getDate() - 7);
          
              if (selectedEndDate < oneWeekBefore) {
                document.querySelector("#error").textContent = "Hanya dapat memilih rentang waktu satu minggu dari tanggal awal";
                event.target.value = "";
              } else {
                document.querySelector("#endDate").textContent = event.target.value;
                document.querySelector("#error").textContent = "";
              }
            }
          
            function handleSearchClick() {
              const startDate = document.querySelector("#startDate").textContent;
              if (!startDate) {
                document.querySelector("#error").textContent = "Harap pilih tanggal awal terlebih dahulu";
                return;
              }
          
              const endDate = document.querySelector("#endDate").textContent;
              if (startDate === endDate) {
                document.querySelector("#error").textContent = "Tanggal akhir tidak dapat lebih awal dari tanggal awal";
                return;
              }
          
              const loading = document.querySelector("#loading");
              loading.innerHTML = "<div>Loading...</div>";
          
              setTimeout(() => {
                document.querySelector("#dashboard").style.display = "block";
                loading.innerHTML = "";
              }, 1500);
            }
          
            function handleResetClick() {
              const startDateInput = document.querySelector("input[type='date'][min]");
              startDateInput.value = "";
              const endDateInput = document.querySelector("input[type='date'][max]");
              endDateInput.value = "";
              document.querySelector("#dashboard").style.display = "none";
              document.querySelector("#error").textContent = "";
            }

            function getOneWeekLater(dateString) {
    const selectedStartDate = new Date(dateString);
    const oneWeekLater = new Date(selectedStartDate);
    oneWeekLater.setDate(oneWeekLater.getDate() + 7);
    return oneWeekLater.toISOString().split("T")[0];
  }

  // Fungsi untuk mengonversi tanggal ke format yang diinginkan
  function formatDate(dateString) {
    if (!dateString) return '-';

    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = new Date(dateString).toLocaleDateString('id-ID', options);

    return formattedDate;
  }

          </script>
          
            
          </section>
        </div>
  </main><!-- End #main -->

                @include('admin.komponenadmin.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.include.script')



</body>

</html>