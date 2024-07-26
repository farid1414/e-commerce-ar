<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model dengan Varian Warna</title>
</head>

<body>
    <div class="container">
        <p class="mt-4" style="font-size: 1.2rem;"><b>Hey, Lihat Visualisasi 3D Produk dan AR. </b></p>
        <p>Tombol Augmented Reality Akan Muncul Pada Ponsel atau Tablet Android dan iOS yang kompatibel.</p>
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle me-3"></i>
            <div>
                Saat menggunakan AR, arahkan smartphone Anda <b>PADA DATARAN / LANTAI</b> untuk produk ini.
            </div>
        </div>
        <hr>

        <model-viewer id="color"
            src="https://cdn.glitch.global/6a714b05-e482-46c1-9985-88f4f05c9148/SanderLounge.glb?v=1690982403449"
            ios-src=""
            skybox-image="https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791"
            ar ar-modes="webxr scene-viewer quick-look" xr-environment ar-scale="auto" skybox-height="1.8m"
            shadow-intensity="1" camera-controls touch-action="pan-y" ar-placement="wall" auto-rotate
            tone-mapping="neutral" style="width: 100%; height: 400px; border-radius: 15px; position: relative;">
            <div class="d-flex justify-content-end" style="position: absolute; bottom: 10px; right: 10px;">
                <span id="arSupportBadge" class="badge" style="font-size: 15px;"></span>
            </div>
            <div class="controls" id="color-controls" style="position: absolute; left: 10px; top: 10px;">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span id="selectedColor">Pilih Warna :</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-color="Original">Original</button></li>
                        <li><button class="dropdown-item" data-color="[1, 0, 0, 1]">Merah</button></li>
                        <li><button class="dropdown-item" data-color="[0, 1, 0, 1]">Hijau</button></li>
                        <li><button class="dropdown-item" data-color="[0, 0, 1, 1]">Biru</button></li>
                        <li><button class="dropdown-item" data-color="[1, 1, 0, 1]">Kuning</button></li>
                        <li><button class="dropdown-item" data-color="[0, 0, 0, 1]">Hitam</button></li>
                    </ul>
                </div>
            </div>


            <div class="d-block d-lg-none">
                <button id="arButton" onclick="activateAR()"
                    style="background-color: white; border-radius: 4px; border: none; position: absolute; top: 16px; right: 16px; height: 30px;">
                    👋 Hey, Gunakan AR
                </button>
            </div>
        </model-viewer>
    </div>

    <script>
        function activateAR() {
            const modelViewer = document.querySelector("model-viewer");
            if (modelViewer) {
                modelViewer.activateAR();
            }
        }

        function hideDefaultARButton() {
            const modelViewer = document.querySelector("model-viewer");
            if (modelViewer) {
                modelViewer.style.setProperty("--ar-button-display", "none");
            }
        }

        function updateARSupportBadge() {
            const isARworks = /mobile|android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator
                .userAgent.toLowerCase());
            const arSupportBadge = document.getElementById("arSupportBadge");
            if (arSupportBadge) {
                if (isARworks) {
                    arSupportBadge.textContent = "Perangkat Ini Mendukung AR";
                    arSupportBadge.classList.add("bg-success");
                    arSupportBadge.classList.remove("bg-danger");
                } else {
                    arSupportBadge.textContent = "Perangkat Ini Tidak Mendukung AR";
                    arSupportBadge.classList.add("bg-danger");
                    arSupportBadge.classList.remove("bg-success");
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            hideDefaultARButton();
            updateARSupportBadge();
        });
    </script>

    <script>
        const modelViewerColor = document.querySelector("model-viewer#color");

        document.querySelector('#color-controls').addEventListener('click', (event) => {
            const colorString = event.target.dataset.color;
            const [material] = modelViewerColor.model.materials;
            if (colorString === "Original") {
                // Jika memilih Original, gunakan warna bawaan
                material.pbrMetallicRoughness.setBaseColorFactor(null);

                // Perbarui teks dropdown menjadi "Original"
                document.getElementById('selectedColor').textContent = 'Original';
            } else {
                material.pbrMetallicRoughness.setBaseColorFactor(JSON.parse(colorString));

                // Perbarui teks dropdown dengan warna yang dipilih
                const selectedColorText = `${event.target.textContent}`;
                document.getElementById('selectedColor').textContent = selectedColorText;
            }
        });
    </script>
</body>

</html>



{{-- Kode test opsi II --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Model dengan Varian Warna</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <p class="mt-4" style="font-size: 1.2rem;"><b>Hey, Lihat Visualisasi 3D Produk dan AR. </b></p>
        <p>Tombol Augmented Reality Akan Muncul Pada Ponsel atau Tablet Android dan iOS yang kompatibel.</p>
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle me-3"></i>
            <div>
                Saat menggunakan AR, arahkan smartphone Anda <b>PADA DATARAN / LANTAI</b> untuk produk ini.
            </div>
        </div>
        <hr>

        <model-viewer
            id="color"
            src="https://cdn.glitch.global/6a714b05-e482-46c1-9985-88f4f05c9148/SanderLounge.glb?v=1690982403449"
            ios-src="https://cdn.glitch.global/483eed9c-fdd2-44f9-bc4b-a9d47fa50b8b/Arm_chair__Furniture.usdz?v=1701711222687"
            skybox-image="https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791"
            ar
            ar-modes="webxr scene-viewer quick-look"
            xr-environment
            ar-scale="auto"
            skybox-height="1.8m"
            shadow-intensity="1"
            camera-controls
            touch-action="pan-y"
            ar-placement="floor"
            auto-rotate
            style="width: 100%; height: 400px; border-radius: 15px; position: relative;">
            <div class="d-flex justify-content-end" style="position: absolute; bottom: 10px; right: 10px;">
                <span id="arSupportBadge" class="badge" style="font-size: 15px;"></span>
            </div>
            <div class="controls" id="color-controls" style="position: absolute; left: 10px; top: 10px;">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <span id="selectedColor">Pilih Warna :</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-color="">Original</button></li>
                        <li><button class="dropdown-item" data-color="[1, 0, 0, 1]">Merah</button></li>
                        <li><button class="dropdown-item" data-color="[0, 1, 0, 1]">Hijau</button></li>
                        <li><button class="dropdown-item" data-color="[0, 0, 1, 1]">Biru</button></li>
                        <li><button class="dropdown-item" data-color="[1, 1, 0, 1]">Kuning</button></li>
                        <li><button class="dropdown-item" data-color="[0, 0, 0, 1]">Hitam</button></li>
                    </ul>
                </div>
            </div>


            <div class="d-block d-lg-none">
                <button id="arButton" onclick="activateAR()" style="background-color: white; border-radius: 4px; border: none; position: absolute; top: 16px; right: 16px; height: 30px;">
                    👋 Hey, Gunakan AR
                </button>
            </div>
        </model-viewer>
    </div>

    <script>
        function activateAR() {
            const modelViewer = document.querySelector("model-viewer");
            if (modelViewer) {
                modelViewer.activateAR();
            }
        }

        function hideDefaultARButton() {
            const modelViewer = document.querySelector("model-viewer");
            if (modelViewer) {
                modelViewer.style.setProperty("--ar-button-display", "none");
            }
        }

        function updateARSupportBadge() {
            const isARworks = /mobile|android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase());
            const arSupportBadge = document.getElementById("arSupportBadge");
            if (arSupportBadge) {
                if (isARworks) {
                    arSupportBadge.textContent = "Perangkat Ini Mendukung AR";
                    arSupportBadge.classList.add("bg-success");
                    arSupportBadge.classList.remove("bg-danger");
                } else {
                    arSupportBadge.textContent = "Perangkat Ini Tidak Mendukung AR";
                    arSupportBadge.classList.add("bg-danger");
                    arSupportBadge.classList.remove("bg-success");
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            hideDefaultARButton();
            updateARSupportBadge();
        });
    </script>

<script>
    const modelViewerColor = document.querySelector("model-viewer#color");

    document.querySelector('#color-controls').addEventListener('click', (event) => {
        let colorString = event.target.dataset.color;
        const [material] = modelViewerColor.model.materials;
        if (colorString.toLowerCase() === "original") {
            colorString = "";
        }
        if (colorString === "") {
            // Jika memilih Original, gunakan warna bawaan
            material.pbrMetallicRoughness.setBaseColorFactor(null);

            // Perbarui teks dropdown menjadi "Original"
            document.getElementById('selectedColor').textContent = 'Original';
        } else {
            material.pbrMetallicRoughness.setBaseColorFactor(JSON.parse(colorString));

            // Perbarui teks dropdown dengan warna yang dipilih
            const selectedColorText = `( "${event.target.textContent}" )`;
            document.getElementById('selectedColor').textContent = selectedColorText;
        }
    });
</script>
</body>
</html> --}}
