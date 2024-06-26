
{{-- Tahap 1 wajib --}}
@extends('layouts.admin.page')


{{-- Tahap 2 untuk judul  --}}
@section('title', 'Data Akun')


{{-- jika ada css --}}
{{-- @section('css')
<style>

  </style>
@stop --}}

{{-- Tahap 3 buat @section --}}
@section('content')

<section class="section dashboard">
  <div class="row">
    <div class="col-sm-4">
      <div class="card info-card sales-card">
        <!-- Jumlah Pelanggan -->
        <div class="card-body">
          <h5 class="card-title">Akun Admin</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
              <i class="bi bi-box"></i>
            </div>
            <div class="ps-3">
              <h6>20</h6>
              <span class="text-muted small pt-1">
                Total Akun Admin
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
          <h5 class="card-title">Admin Non-Aktif</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-box-seam"></i>
            </div>
            <div class="ps-3">
              <h6>20</h6>
              <span class="text-muted small pt-1" style="font-size: 13px;">
                Total Admin Non-Aktif
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
          <h5 class="card-title">Pelanggan</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-dropbox"></i>
            </div>
            <div class="ps-3">
              <h6>25</h6>
              <span class="text-muted small pt-1">
                Total Akun Pelanggan
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
          <h5 class="card-title">Pelanggan di hapus</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-dropbox"></i>
            </div>
            <div class="ps-3">
              <h6>25</h6>
              <span class="text-muted small pt-1">
                Total Pelanggan dihapus
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="d-grid gap-2">
      <button class="btn btn-primary btn-lg" type="button">Tambah Admin</button>
    </div>
  <!-- Isi Konten Produk Dataran -->
  <div class="card mt-4">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div class="card-title">
          List Akun Yang Terdaftar<br />
          <span>Manajemen Akun</span>
        </div>
      </div>
      <div class="d-none d-md-block">

        {{-- Akun Admin --}}

        <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between">
                  <div class="card-title">Admin</div>
                  <div class="card-title">
                      <span style="font-size: 0.78rem;">2 Akun Admin</span>
                      {{-- <span style="font-size: 0.78rem;">{{ $totalAdmin }} Akun Admin</span> --}}

                  </div>
              </div>
              <div class="d-flex justify-content-end mb-4">
                  <span class="d-flex align-items-center me-2">Filter: </span>
                  <form>
                      <select class="form-control">
                          <option disabled>Filter Akun</option>
                          <option value="option1">Akun Terbaru</option>
                          <option value="option2">Akun Terlama</option>
                      </select>
                  </form>
              </div>
              <table class="table table-responsive-sm table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Terakhir Login</th>
                          <th class="text-center">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach($adminData as $admin) --}}

                      <tr>
                          <td class="text-center">
                              <a href="/Dataakunadmin" class="fw-bold">Jhon Admin 1</a>
                              <br />
                              <span class="badge rounded-pill bg-success">Aktif</span>
                          </td>
                          <td class="text-center">Admin1@gmail.com</td>
                          <td class="text-center">2023-06-03 11:05</td>
                          <td>
                              <button class="btn btn-link" style="text-decoration: none;">
                                  <a href="/Dataakunadmin">Lihat</a>
                              </button>
                          </td>
                      </tr>
                      <tr>
                          <td class="text-center">
                              <a href="/Datadetailakunadmin" class="fw-bold">Jhon Admin 2</a>
                              <br />
                              <span class="badge rounded-pill text-bg-secondary">Non-Aktif</span>
                          </td>
                          <td class="text-center">Admin2@gmail.com</td>
                          <td class="text-center">2023-06-03 11:05</td>
                          <td>
                              <button class="btn btn-link" style="text-decoration: none;">
                                  <a href="/Datadetailakunadmin">Lihat</a>
                              </button>
                              <br />
                              <button class="btn btn-link" style="text-decoration: none;">
                                  Non-Aktifkan
                              </button>
                              <br />
                              <button class="btn btn-link" style="text-decoration: none;">
                                  Hapus Akun
                              </button>
                          </td>
                      </tr>
                      
{{--  --}}
                {{-- <td class="text-center">
                  <a href="{{ route('Dataakunadmin', $admin->id) }}" class="fw-bold">{{ $admin->nama }}</a>
                  <br />
                  @if($admin->aktif)
                  <span class="badge rounded-pill bg-success">Aktif</span>
                  @else
                  <span class="badge rounded-pill text-bg-secondary">Non-Aktif</span>
                  @endif
                </td>
                <td class="text-center">{{ $admin->email }}</td>
                <td class="text-center">{{ $admin->last_login }}</td>
                <td>
                  <button class="btn btn-link" style="text-decoration: none;">
                      <a href="{{ route('Dataakunadmin', $admin->id) }}">Lihat</a>
                  </button>
                  <br />
                  @if(!$admin->aktif)
                  <button class="btn btn-link" style="text-decoration: none;">
                      Non-Aktifkan
                  </button>
                  <br />
                  @endif
                  <button class="btn btn-link" style="text-decoration: none;">
                      Hapus Akun
                  </button>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table> --}}
{{--  --}}

                  </tbody>
              </table>
              <div class="d-flex justify-content-between align-items-center">
                  <div class="form-group showperpage">
                      <label class="form-label">Show per page:</label>
                      <select class="form-control" size="sm">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                      </select>
                  </div>
                  <div class="pagination-info">1 - 2 of 2 items</div>
                  {{-- <div class="pagination-info">{{ $paginationInfo }}</div> --}}

              </div>
          </div>
      </div>
      


      <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title">Pelanggan</div>
                <div class="card-title">
                    <span style="font-size: 0.78rem;">3 Akun Aktif</span>
                    {{-- <span style="font-size: 0.78rem;">{{ $totalPelanggan }} Akun Aktif</span> --}}
                </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
                <span class="d-flex align-items-center me-2">Filter : </span>
                <form>
                    <select class="form-control">
                        <option disabled>Filter Akun</option>
                        <option value="option1">Akun Terbaru</option>
                        <option value="option2">Akun Terlama</option>
                    </select>
                </form>
            </div>
            <table class="table table-responsive-sm table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Waktu Registrasi</th>
                        <th class="text-center">Terakhir Login</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
               {{-- @foreach($pelangganData as $pelanggan) --}}
                    <tr>                      
                      {{-- <td class="text-center">
                        <a href="{{ route('Detailakunpelanggan', $pelanggan->id) }}" class="text-primary fw-bold">{{ $pelanggan->nama }}</a><br/>
                    </td>
                    <td class="text-center">{{ $pelanggan->email }}</td>
                    <td class="text-center">{{ $pelanggan->waktu_registrasi }}</td>
                    <td class="text-center">{{ $pelanggan->terakhir_login }}</td>
                    <td>
                        <button class="btn btn-link" style="text-decoration: none;">
                            <a href="{{ route('Detailakunpelanggan', $pelanggan->id) }}">Lihat</a>
                        </button>
                        <br />
                        <button class="btn btn-link" style="text-decoration: none;">
                            Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
                        <td class="text-center">
                            <a href="/Detailakunpelanggan" class="text-primary fw-bold">Jhon Doe 1</a><br/>
                        </td>
                        <td class="text-center">user@gmail.com</td>
                        <td class="text-center">2023-15-05 11:10</td>
                        <td class="text-center">2023-15-05 11:10</td>
                        <td>
                            <button class="btn btn-link" style="text-decoration: none;">
                                <a href="/Detailakunpelanggan">Lihat</a>
                            </button>
                            <br />
                            <button class="btn btn-link" style="text-decoration: none;">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="/Detailakunpelanggan" class="text-primary fw-bold">Jhon Doe 2</a><br/>
                        </td>
                        <td class="text-center">user@gmail.com</td>
                        <td class="text-center">2023-15-05 11:10</td>
                        <td class="text-center">2023-15-05 11:10</td>
                        <td>
                            <button class="btn btn-link" style="text-decoration: none;">
                                <a href="/Detailakunpelanggan">Lihat</a>
                            </button>
                            <br />
                            <button class="btn btn-link" style="text-decoration: none;">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="/Detailakunpelanggan" class="text-primary fw-bold">Jhon Doe 3</a><br/>
                        </td>
                        <td class="text-center">user@gmail.com</td>
                        <td class="text-center">2023-15-05 11:10</td>
                        <td class="text-center">2023-15-05 11:10</td>
                        <td>
                            <button class="btn btn-link" style="text-decoration: none;">
                                <a href="/Detailakunpelanggan">Lihat</a>
                            </button>
                            <br />
                            <button class="btn btn-link" style="text-decoration: none;">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-group showperpage">
                    <label class="form-label">Show per page:</label>
                    <select class="form-control" size="sm">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="pagination-info">{{ $paginationInfo }}</div>
              </div>
        </div>
    </div>
    


    <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-between">
              <div class="card-title">Pelanggan Yang Dihapus</div>
              <div class="card-title">
                  <span style="font-size: 0.78rem;">2 Akun pelanggan Dihapus</span>
                  {{-- <span style="font-size: 0.78rem;">{{ $totalPelanggan }} Akun pelanggan Dihapus</span> --}}

              </div>
          </div>
          <div class="d-flex justify-content-end mb-4">
              <span class="d-flex align-items-center me-2">Filter : </span>
              <form>
                  <select class="form-control">
                      <option disabled>Filter Akun</option>
                      <option value="option1">Akun Terbaru</option>
                      <option value="option2">Akun Terlama</option>
                  </select>
              </form>
          </div>
          <table class="table table-responsive-sm table-striped table-bordered table-hover">
              <thead>
                  <tr>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Alasan</th>
                      <th class="text-center">Dihapus Oleh</th>
                      <th class="text-center">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                {{-- @foreach($pelangganData as $pelanggan) --}}

                  <tr>

                    {{-- <td class="text-center">
                      <a href="{{ route('Detailakunpelangganyangdihapus', $pelanggan->id) }}" class="text-primary fw-bold">{{ $pelanggan->nama }}</a>
                  </td>
                  <td class="text-center">{{ $pelanggan->email }}</td>
                  <td>
                      <span class="badge rounded-pill text-bg-danger">{{ $pelanggan->alasan }}</span>
                  </td>
                  <td class="text-center">{{ $pelanggan->dihapus_oleh }}<br/>
                      <span style="font-size: 0.8rem;">{{ $pelanggan->waktu_penghapusan }}</span>
                  </td>
                  <td>
                      <button class="btn btn-link" href="{{ route('Detailakunpelangganyangdihapus', $pelanggan->id) }}" style="text-decoration: none;">
                          Lihat
                      </button>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table> --}}
                      <td class="text-center">
                          <a href="/Detailakunpelangganyangdihapus" class="text-primary fw-bold">Jhon Doe 1</a>
                      </td>
                      <td class="text-center">user@gmail.com</td>
                      <td>
                          <span class="badge rounded-pill text-bg-danger">Pengguna sudah Tidak Aktif</span>
                      </td>
                      <td class="text-center">Admin 1<br/>
                          <span style="font-size: 0.8rem;">2023-02-20 14:15</span>
                      </td>
                      <td>
                          <button class="btn btn-link" href="/Detailakunpelangganyangdihapus" style="text-decoration: none;">
                              Lihat
                          </button>
                      </td>
                  </tr>
                  <tr>
                      <td class="text-center">
                          <a href="/Detailakunpelangganyangdihapus" class="text-primary fw-bold">Jhon Doe 2</a>
                      </td>
                      <td class="text-center">user@gmail.com</td>
                      <td>
                          <span class="badge rounded-pill text-bg-danger">Tidak ada transaksi dalam 1 tahun terakhir</span>
                      </td>
                      <td class="text-center">Admin 2<br/>
                          <span style="font-size: 0.8rem;">2023-09-20 14:45</span>
                      </td>
                      <td>
                          <button class="btn btn-link" href="/Detailakunpelangganyangdihapus" style="text-decoration: none;">
                              Lihat
                          </button>
                      </td>
                  </tr>
              </tbody>
          </table>
          <div class="d-flex justify-content-between align-items-center">
              <div class="form-group showperpage">
                  <label class="form-label">Show per page:</label>
                  <select class="form-control" size="sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                  </select>
              </div>
              <div class="pagination-info">{{ $paginationInfo }}</div>
            </div>
      </div>
  </div>




      </div>
    </div>
  </div>
</section>

{{-- jangan lupa sectionnya di tutup --}}
@stop


{{-- jika kode ada js ngawe iki --}}

{{-- @push('js')
    <script>

    </script>
@endpush --}}