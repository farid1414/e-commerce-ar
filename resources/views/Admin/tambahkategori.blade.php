{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')
@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item">
        Kategori Furnitur
    </li>
    <li class="breadcrumb-item active">Form</li>
@stop

{{-- tahap section jangan lupa di tutup --}}
@section('content')
    <section class="section dashboard">
        <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-12 mb-0">
                <div class="card large-card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Kategori</h5>
                        <form method="POST" id="form-kategori">
                            @if ($edit && $categories)
                                <input type="hidden" name="id" id="id" value="{{ $categories->id }}">
                            @endif
                            {{-- <input type="hidden" readonly name="m_categories" id="m_categories"
                                value="{{ $m_cat->id }}"> --}}
                            <div class="form-group" id="gambarKategori">
                                <label>Gambar Kategori</label>
                                <input type="file" name="image" accept="image/*" onchange="handleGambarChange(event)"
                                    class="form-control mb-3"@if (!$edit) required @endif />
                                <figcaption class="blockquote-footer mt-2">
                                    Sisa gambar Kategori yang dapat diunggah (<span id="sisaGambarCount">1</span>)
                                </figcaption>

                                <div
                                    style="position: relative; max-width: 30%; cursor: pointer; border-radius: 10px; overflow: hidden;">
                                    <img id="previewGambar"
                                        class="@if ($edit && $categories) d-block @else d-none @endif"
                                        src="@if ($edit && $categories) {{ url($categories->image) }} @endif"
                                        alt="Preview" style="width: 100%; height: auto;"
                                        onclick="handleImageClick(event)" />
                                    <button class="btn btn-danger btn-sm"
                                        style="position: absolute; top: 5px; right: 5px; z-index: 1;"
                                        onclick="handleRemoveImage(event)">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group mt-3" id="namaKategori">
                                <label>Nama Kategori</label>
                                <input type="text"
                                    value="@if ($edit && $categories) {{ $categories->name }} @endif" name="name"
                                    placeholder="Masukkan nama kategori" class="form-control mb-3" required />
                            </div>
                            <div class="d-flex justify-content-between mb-2 mt-5 align-items-center">
                                <button type="button" class="btn btn-outline-dark"
                                    onclick="handleBatal(event)">Batal</button>
                                <button class="btn btn-primary" id="btn-save" type="submit"><i class="fas fa-save"></i>
                                    Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@push('js')
    <script>
        const maxGambarKategoriCount = 1;
        let gambarKategori = null;
        let namaKategori = "";

        function showErrorAlert(title, text) {
            Swal.fire({
                icon: "error",
                title: title,
                text: text,
            });
        }

        function showSuccessAlert(title) {
            Swal.fire({
                icon: "success",
                title: title,
                showConfirmButton: false,
                timer: 1500,
            }).then(() => {
                setTimeout(() => {
                    window.location.href = "/Kategoridataranadmin";
                }, 1000);
            });
        }

        function resetStateAndShowSuccessAlert(message) {
            gambarKategori = null;
            namaKategori = "";
            showSuccessAlert(message);
        }

        function handleImageClick() {
            setShowModal(true);
        }

        function handleRemoveImage(event) {
            event.preventDefault();
            document.getElementById("previewGambar").classList.add("d-none");
            document.querySelector("input[name='image']").value = "";
            document.getElementById("sisaGambarCount").innerText = maxGambarKategoriCount;
        }

        function handleGambarChange(event) {
            const file = event.target.files[0];
            if (!file) return; // Handle jika tidak ada file yang dipilih
            if (file.type.split('/')[0] !== 'image') {
                showErrorAlert("Galat", "Anda hanya dapat mengunggah file gambar.");
                return;
            }
            gambarKategori = file;
            document.getElementById("previewGambar").classList.remove("d-none");
            document.getElementById("previewGambar").src = URL.createObjectURL(gambarKategori);
            document.getElementById("sisaGambarCount").innerText = maxGambarKategoriCount - 1;
        }

        function handleNamaKategoriChange(event) {
            namaKategori = event.target.value;
        }

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
                        title: "Penambahan Kategori dataran dibatalkan!",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(() => {
                        window.history.back();
                    });
                }
            });
        }

        $('body').on('submit', '#form-kategori', function(e) {
            e.preventDefault();

            const action = "{{ route($this_helper . 'store') }}";
            const ajax = new AjaxRequest(action);
            ajax.onBefore = () => {
                addLoader2El($('#btn-save'), "Saving...");
                $('#btn-save').attr('disabled', true);
            };

            ajax.onfail = () => {
                removeLoader($('#btn-save'));
            };

            let data = new FormData(this);
            ajax.submit(data, (resp) => {
                if (resp.success) {
                    swal('redirect', '', resp.message ?? "Success set pricelist", resp.url);
                    removeLoader($('#btn-save'));
                }
            });
        });
    </script>
@endpush
