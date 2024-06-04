<section class="section dashboard">
    <div class="row d-flex flex-wrap justify-content-between">
        <div class="col-12 mb-0">
            <div class="card large-card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Kategori</h5>
                    <form onsubmit="handleSubmit(event)">
                        <div class="form-group" id="gambarKategori">
                            <label>Gambar Kategori</label>
                            <input type="file" accept="image/*" onchange="handleGambarChange(event)" class="form-control mb-3" required/>
                            <figcaption class="blockquote-footer mt-2">
                                Sisa gambar Kategori yang dapat diunggah (<span id="sisaGambarCount">1</span>)
                            </figcaption>
                            
                            <div style="position: relative; max-width: 30%; cursor: pointer; border-radius: 10px; overflow: hidden;">
                                <img id="previewGambar" src="" alt="Preview" style="width: 100%; height: auto;" onclick="handleImageClick(event)"/>
                                <button class="btn btn-danger btn-sm" style="position: absolute; top: 5px; right: 5px; z-index: 1;" onclick="handleRemoveImage(event)">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group mt-3" id="namaKategori">
                            <label>Nama Kategori</label>
                            <input type="text" value="" onchange="handleNamaKategoriChange(event)" placeholder="Masukkan nama kategori" class="form-control mb-3" required/>
                        </div>
                        <div class="d-flex justify-content-between mb-2 mt-5">
                            <button type="button" class="btn btn-outline-dark" onclick="handleBatal(event)">Batal</button>
                            <button class="btn btn-primary" onclick="handleSimpanData()">Tampilkan Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


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

    function handleRemoveImage() {
        document.getElementById("gambarKategori").innerHTML = `
            <label>Gambar Kategori</label>
            <input type="file" accept="image/*" onchange="handleGambarChange(event)" class="form-control mb-3" required/>
            <figcaption class="blockquote-footer mt-2">
                Sisa gambar Kategori yang dapat diunggah (<span id="sisaGambarCount">${maxGambarKategoriCount}</span>)
            </figcaption>`;
        gambarKategori = null;
        document.getElementById("previewGambar").src = "";
    }

    function handleGambarChange(event) {
        const file = event.target.files[0];
        if (!file) return; // Handle jika tidak ada file yang dipilih
        if (file.type.split('/')[0] !== 'image') {
            showErrorAlert("Galat", "Anda hanya dapat mengunggah file gambar.");
            return;
        }
        gambarKategori = file;
        document.getElementById("previewGambar").src = URL.createObjectURL(gambarKategori);
        document.getElementById("sisaGambarCount").innerText = maxGambarKategoriCount - 1;
    }

    function handleNamaKategoriChange(event) {
        namaKategori = event.target.value;
    }

    function handleSubmit(event) {
        event.preventDefault();

        if (!gambarKategori || !namaKategori) {
            const emptyFields = [];
            if (!gambarKategori) emptyFields.push("Gambar Kategori");
            if (!namaKategori) emptyFields.push("Nama Kategori");

            showErrorAlert(
                "Isian Tidak Lengkap",
                `Harap lengkapi ${emptyFields.join(", ")} sebelum menyimpan data.`,
            );
            return;
        }

        const existingCategories = ["Kursi", "Meja", "Lemari", "kursi"]; // Ganti dengan nama-nama kategori yang ada

        const existingCategory = existingCategories.find(
            (existingCategory) =>
                existingCategory.toLowerCase() === namaKategori.toLowerCase(),
        );

        if (existingCategory) {
            showErrorAlert(
                "Nama Kategori Sudah Ada",
                `Maaf, nama kategori ("${existingCategory}") sudah ada. Mohon gunakan nama kategori lain.`,
            );
            return;
        }

        // Simulasi pengiriman data
        resetStateAndShowSuccessAlert("Data berhasil disimpan!");
    }

    function handleSimpanData() {
        if (!gambarKategori || !namaKategori) {
            const emptyFields = [];
            if (!gambarKategori) emptyFields.push("Gambar Kategori");
            if (!namaKategori) emptyFields.push("Nama Kategori");

            showErrorAlert(
                "Isian Tidak Lengkap",
                `Harap lengkapi ${emptyFields.join(", ")} sebelum menyimpan data.`,
            );
            return;
        }

        const existingCategories = ["Kursi", "Meja", "Lemari", "kursi"]; // Ganti dengan nama-nama kategori yang ada

        const existingCategory = existingCategories.find(
            (existingCategory) =>
                existingCategory.toLowerCase() === namaKategori.toLowerCase(),
        );

        if (existingCategory) {
            showErrorAlert(
                "Nama Kategori Sudah Ada",
                `Maaf, nama kategori ("${existingCategory}") sudah ada. Mohon gunakan nama kategori lain.`,
            );
            return;
        }

        Swal.fire({
            icon: "question",
            title: "Apakah Anda yakin ingin menyimpan data?",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan data",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.isConfirmed) {
                resetStateAndShowSuccessAlert("Data berhasil disimpan!");
            }
        });
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
                    title: "Penambahan produk dataran dibatalkan!",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    window.location.href = "/Kategoridataranadmin"; // Mengarahkan ke halaman yang dimaksud
                });
            }
        });
    }
</script>