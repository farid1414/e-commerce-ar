{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')

<section class="section dashboard">
  <div class="row d-flex flex-wrap justify-content-between">
      <div class="col-12 mb-0">
          <div class="card large-card">
              <div class="card-body">
                  <h5 class="card-title">Tambah Admin</h5>
                  <form id="adminForm">
                      <div class="mb-3">
                          <label for="namaAdmin" class="form-label">Nama Admin</label>
                          <input type="text" class="form-control" id="namaAdmin" placeholder="Masukkan nama admin">
                      </div>
                      <div class="mb-3">
                          <label for="emailAdmin" class="form-label">Email</label>
                          <input type="email" class="form-control" id="emailAdmin" placeholder="Masukkan email">
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <div class="position-relative">
                              <input type="password" class="form-control" id="password" placeholder="Masukkan kata sandi Anda" required>
                              <div class="input-group-append" style="cursor: pointer; font-size: 15px; border-radius: 0px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);" onclick="togglePasswordVisibility('password')">
                                  <i class="bi bi-eye-fill" id="togglePasswordIcon"></i>
                              </div>
                          </div>
                      </div>
                      <div class="mb-5">
                          <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                          <div class="position-relative">
                              <input type="password" class="form-control" id="confirmPassword" placeholder="Masukkan kata sandi Anda" required>
                              <div class="input-group-append" style="cursor: pointer; font-size: 15px; border-radius: 0px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);" onclick="togglePasswordVisibility('confirmPassword')">
                                  <i class="bi bi-eye-fill" id="toggleConfirmPasswordIcon"></i>
                              </div>
                          </div>
                      </div>
                      <hr>
                      <div class="d-flex justify-content-between mb-3">
                          <button type="button" class="btn btn-secondary" onclick="handleBatal()">Batal</button>
                          <button type="button" class="btn btn-primary" onclick="handleSimpanData()">Simpan</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
</section>

@stop


@push('js')
   
<script>
  function handleBatal() {
      Swal.fire({
          icon: 'warning',
          title: 'Anda yakin ingin membatalkan?',
          showCancelButton: true,
          confirmButtonText: 'Ya, batalkan!',
          cancelButtonText: 'Tidak'
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire({
                  icon: 'info',
                  title: 'Penambahan Admin dibatalkan!',
                  showConfirmButton: false,
                  timer: 1500
              }).then(() => {
                  window.location.href = '/Dataakunpelanggan'; // Mengarahkan ke halaman yang dimaksud
              });
          }
      });
  }
  
  function handleSimpanData() {
      const namaAdmin = document.getElementById('namaAdmin').value;
      const emailAdmin = document.getElementById('emailAdmin').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
  
      const fieldsToCheck = [
          { value: namaAdmin, label: 'Nama Admin' },
          { value: emailAdmin, label: 'Email' },
          { value: password, label: 'Password' },
          { value: confirmPassword, label: 'Konfirmasi Password' }
      ];
  
      const emptyFields = fieldsToCheck.filter(field => !field.value);
  
      if (emptyFields.length > 0) {
          const emptyFieldsLabels = emptyFields.map(field => field.label).join(', ');
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: `Harap isi semua data sebelum menyimpan. Bidang yang belum diisi: ${emptyFieldsLabels}`
          });
          return;
      }
  
      if (password !== confirmPassword) {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Password dan konfirmasi password tidak cocok.'
          });
          return;
      }
  
      const emailPattern = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
      if (!emailPattern.test(emailAdmin)) {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Email tidak valid. Harap masukkan email yang valid.'
          });
          return;
      }
  
      Swal.fire({
          icon: 'question',
          title: 'Apakah Anda yakin ingin menyimpan data?',
          showCancelButton: true,
          confirmButtonText: 'Ya, simpan data',
          cancelButtonText: 'Tidak'
      }).then((result) => {
          if (result.isConfirmed) {
              Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil disimpan!',
                  showConfirmButton: false,
                  timer: 1500
              }).then(() => {
                  window.location.href = '/Dataakunpelanggan'; // Mengarahkan ke halaman yang dimaksud
              });
          }
      });
  }
  
  function togglePasswordVisibility(inputId) {
      const input = document.getElementById(inputId);
      const icon = document.getElementById(`toggle${inputId.replace(/^./, inputId[0].toUpperCase())}Icon`);
      if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('bi-eye-fill');
          icon.classList.add('bi-eye-slash-fill');
      } else {
          input.type = 'password';
          icon.classList.remove('bi-eye-slash-fill');
          icon.classList.add('bi-eye-fill');
      }
  }
  </script>



@endpush