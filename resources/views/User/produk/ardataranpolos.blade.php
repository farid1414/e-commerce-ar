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


    @php
        $skybox =
            'https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791';
        $mode = 'scene-viewer webxr quick-look';
        if ($product->link_skybox) {
            $skybox = $product->link_skybox;
        }
        if ($product->varians->count()) {
            $mode = 'webxr scene-viewer quick-look';
        }
        $place = 'floor';
        if ($product->m_categories == 2) {
            $place = 'wall';
        }
    @endphp
    <model-viewer id="color" src="{{ $product->link_ar }}" ios-src="{{ $product->link_src }}"
        skybox-image="{{ $skybox }}" ar-placement="{{ $place }}" ar-modes="{{ $mode }}"
        shadow-intensity="1" ar xr-environment ar-scale="auto" skybox-height="1.8m" camera-controls touch-action="pan-y"
        style="width: 100%; height: 400px; border-radius: 15px; position: relative;">
        <div class="d-flex justify-content-end" style="position: absolute; bottom: 10px; right: 10px;">
            <span id="arSupportBadge" class="badge" style="font-size: 15px;"></span>
        </div>
        @if ($product->varians->count())
            <div class="controls" id="color-controls" style="position: absolute; left: 10px; top: 10px;">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span id="selectedColor">Pilih Warna :</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><button class="dropdown-item" data-color="Original">Original</button></li>
                        @foreach ($product->varians as $varian)
                            <li><button class="dropdown-item"
                                    data-color="{{ $varian->warna }}">{{ $varian->name }}</button></li>
                            <li>
                        @endforeach
                        {{-- <button class="dropdown-item" data-color="[1, 1, 0, 1]"> Test Kuning</button></li>
                        <li><button class="dropdown-item" data-color="[1, 0, 0, 1]">Test Merah</button></li>
                        <li><button class="dropdown-item" data-color="[0, 0, 1, 1]">Test Biru</button></li> --}}
                    </ul>
                </div>
            </div>
        @endif

        <button slot="hotspot-dot+X-Y+Z" class="dot" data-position="1 -1 1" data-normal="1 0 0"></button>
        <button slot="hotspot-dim+X-Y" class="dim" data-position="1 -1 0" data-normal="1 0 0"></button>
        <button slot="hotspot-dot+X-Y-Z" class="dot" data-position="1 -1 -1" data-normal="1 0 0"></button>
        <button slot="hotspot-dim+X-Z" class="dim" data-position="1 0 -1" data-normal="1 0 0"></button>
        <button slot="hotspot-dot+X+Y-Z" class="dot" data-position="1 1 -1" data-normal="0 1 0"></button>
        <button slot="hotspot-dim+Y-Z" class="dim" data-position="0 -1 -1" data-normal="0 1 0"></button>
        <button slot="hotspot-dot-X+Y-Z" class="dot" data-position="-1 1 -1" data-normal="0 1 0"></button>
        <button slot="hotspot-dim-X-Z" class="dim" data-position="-1 0 -1" data-normal="-1 0 0"></button>
        <button slot="hotspot-dot-X-Y-Z" class="dot" data-position="-1 -1 -1" data-normal="-1 0 0"></button>
        <button slot="hotspot-dim-X-Y" class="dim" data-position="-1 -1 0" data-normal="-1 0 0"></button>
        <button slot="hotspot-dot-X-Y+Z" class="dot" data-position="-1 -1 1" data-normal="-1 0 0"></button>
        <svg id="dimLines" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            class="dimensionLineContainer">
            <line class="dimensionLine"></line>
            <line class="dimensionLine"></line>
            <line class="dimensionLine"></line>
            <line class="dimensionLine"></line>
            <line class="dimensionLine"></line>
        </svg>

        <div id="controls" class="dim" style="height: 40px">
            <label for="show-dimensions">Tampilkan Dimensi:</label>
            <input id="show-dimensions" class="ml-2" type="checkbox" checked="true">
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
        const modelViewerColor = document.querySelector("model-viewer#color");
        const colorControls = document.getElementById('color-controls');
        const dimButtons = document.querySelectorAll('button[slot^="hotspot-dim"]');

        // const customDimensions = {
        //     "[1, 1, 0, 1]": { // Kuning
        //         Panjang: "4001 cm",
        //         'Tinggi 1': "4400 cm",
        //         'Tinggi 2': "4400 cm",
        //         Lebar: "14400 cm",
        //         'Lebar 2': "14400 cm",
        //     },
        //     "[1, 0, 0, 1]": { // Merah
        //         Panjang: "1001 cm",
        //         'Tinggi 1': "1100 cm",
        //         'Tinggi 2': "1100 cm",
        //         Lebar: "13100 cm",
        //         'Lebar 2': "13100 cm",
        //     },
        //     "[0, 0, 1, 1]": { // Biru
        //         Panjang: "3001 cm",
        //         'Tinggi 1': "3300 cm",
        //         'Tinggi 2': "3300 cm",
        //         Lebar: "13300 cm",
        //         'Lebar 2': "13300 cm",
        //     },
        // };
        let customDimensions = {};

        // Loop melalui varians untuk membangun objek
        @foreach ($product->varians as $varian)
            customDimensions["{{ $varian->warna }}"] = {
                Panjang: "{{ $varian->panjang ?? 0 }} cm",
                'Tinggi 1': "{{ $varian->tinggi ?? 0 }} cm",
                'Tinggi 2': "{{ $varian->tinggi ?? 0 }} cm",
                Lebar: "{{ $varian->lebar ?? 0 }} cm",
                'Lebar 2': "{{ $varian->lebar ?? 0 }} cm",
            };
        @endforeach

        console.log("cus", customDimensions);

        function updateDimensions(colorString) {
            const [material] = modelViewerColor.model.materials;

            if (colorString === "Original") {
                dimButtons[2].textContent =
                    `${(modelViewerColor.getDimensions()['Panjang'] * 100).toFixed(0)} cm`;
                dimButtons[0].textContent =
                    `${(modelViewerColor.getDimensions()['Lebar'] * 100).toFixed(0)} cm`;
                dimButtons[1].textContent =
                    `${(modelViewerColor.getDimensions()['Tinggi 1'] * 100).toFixed(0)} cm`;
                dimButtons[3].textContent =
                    `${(modelViewerColor.getDimensions()['Tinggi 2'] * 100).toFixed(0)} cm`;
                dimButtons[4].textContent =
                    `${(modelViewerColor.getDimensions()['Lebar 2'] * 100).toFixed(0)} cm`;
            } else {
                const dimensions = customDimensions[colorString];


                if (dimensions) {
                    dimButtons[2].textContent = dimensions.Panjang;
                    dimButtons[0].textContent = dimensions.Lebar;
                    dimButtons[1].textContent = dimensions['Tinggi 1'];
                    dimButtons[3].textContent = dimensions['Tinggi 2'];
                    dimButtons[4].textContent = dimensions['Lebar 2'];

                    let colorPalet = 'original'
                    try {
                        colorPalet = JSON.parse(colorString)
                    } catch (err) {
                        colorPalet = colorString
                    }
                    // material.pbrMetallicRoughness.baseColorFactor = JSON.parse(colorString);
                    material.pbrMetallicRoughness.baseColorFactor = colorPalet;
                } else {
                    console.log(`Dimensi kustom untuk warna ${colorString} tidak ditemukan.`);
                }
            }
        }

        colorControls.addEventListener('click', (event) => {
            if (event.target.tagName === 'BUTTON') {
                const colorString = event.target.dataset.color;
                updateDimensions(colorString);
            }
        });
    });


    const modelViewer = document.querySelector('#color');

    const checkbox = modelViewer.querySelector('#show-dimensions');

    const dimElements = [...modelViewer.querySelectorAll('button'), modelViewer.querySelector('#dimLines')];

    function setVisibility(visible) {
        dimElements.forEach((element) => {
            if (visible) {
                element.classList.remove('hide');
            } else {
                element.classList.add('hide');
            }
        });
    }

    checkbox.addEventListener('change', () => {
        setVisibility(checkbox.checked);
    });

    modelViewer.addEventListener('ar-status', (event) => {
        setVisibility(checkbox.checked && event.detail.status !== 'session-started');
    });

    // update svg
    function drawLine(svgLine, dotHotspot1, dotHotspot2, dimensionHotspot) {
        if (dotHotspot1 && dotHotspot2) {
            svgLine.setAttribute('x1', dotHotspot1.canvasPosition.x);
            svgLine.setAttribute('y1', dotHotspot1.canvasPosition.y);
            svgLine.setAttribute('x2', dotHotspot2.canvasPosition.x);
            svgLine.setAttribute('y2', dotHotspot2.canvasPosition.y);

            // use provided optional hotspot to tie visibility of this svg line to
            if (dimensionHotspot && !dimensionHotspot.facingCamera) {
                svgLine.classList.add('hide');
            } else {
                svgLine.classList.remove('hide');
            }
        }
    }

    const dimLines = modelViewer.querySelectorAll('line');

    const renderSVG = () => {
        drawLine(dimLines[0],
            modelViewer.queryHotspot('hotspot-dot+X-Y+Z'),
            modelViewer.queryHotspot('hotspot-dot+X-Y-Z'),
            modelViewer.queryHotspot('hotspot-dim+X-Y'));

        drawLine(dimLines[1],
            modelViewer.queryHotspot('hotspot-dot+X-Y-Z'),
            modelViewer.queryHotspot('hotspot-dot+X+Y-Z'),
            modelViewer.queryHotspot('hotspot-dim+X-Z'));

        drawLine(dimLines[2],
            modelViewer.queryHotspot('hotspot-dot+X+Y-Z'),
            modelViewer.queryHotspot('hotspot-dot-X+Y-Z')); // always visible
        drawLine(dimLines[3],

            modelViewer.queryHotspot('hotspot-dot-X+Y-Z'),
            modelViewer.queryHotspot('hotspot-dot-X-Y-Z'),
            modelViewer.queryHotspot('hotspot-dim-X-Z'));
        drawLine(dimLines[4],

            modelViewer.queryHotspot('hotspot-dot-X-Y-Z'),
            modelViewer.queryHotspot('hotspot-dot-X-Y+Z'),
            modelViewer.queryHotspot('hotspot-dim-X-Y'));
    };

    modelViewer.addEventListener('load', () => {
        const center = modelViewer.getBoundingBoxCenter();
        const size = modelViewer.getDimensions();
        const x2 = size.x / 2;
        const y2 = size.y / 2;
        const z2 = size.z / 2;

        modelViewer.updateHotspot({
            name: 'hotspot-dot+X-Y+Z',
            position: `${center.x + x2}
                     ${center.y - y2}
                        ${center.z + z2}`
        });

        modelViewer.updateHotspot({
            name: 'hotspot-dim+X-Y',
            position: `${center.x + x2 * 1.2}
                        ${center.y - y2 * 1.1}
                            ${center.z}`
        });
        modelViewer.querySelector('button[slot="hotspot-dim+X-Y"]').textContent =
            `${(size.z * 100).toFixed(0)} cm`;

        modelViewer.updateHotspot({
            name: 'hotspot-dot+X-Y-Z',
            position: `${center.x + x2}
                    ${center.y - y2}
                        ${center.z - z2}`
        });

        modelViewer.updateHotspot({
            name: 'hotspot-dim+X-Z',
            position: `${center.x + x2 * 1.2}
                    ${center.y}
                        ${center.z - z2 * 1.2}`
        });
        modelViewer.querySelector('button[slot="hotspot-dim+X-Z"]').textContent =
            `${(size.y * 100).toFixed(0)} cm`;

        modelViewer.updateHotspot({
            name: 'hotspot-dot+X+Y-Z',
            position: `${center.x + x2}
                    ${center.y + y2}
                        ${center.z - z2}`
        });

        modelViewer.updateHotspot({
            name: 'hotspot-dim+Y-Z',
            position: `${center.x}
                    ${center.y + y2 * 1.1}
                        ${center.z - z2 * 1.1}`
        });
        modelViewer.querySelector('button[slot="hotspot-dim+Y-Z"]').textContent =
            `${(size.x * 100).toFixed(0)} cm`;

        modelViewer.updateHotspot({
            name: 'hotspot-dot-X+Y-Z',
            position: `${center.x - x2}
                    ${center.y + y2}
                        ${center.z - z2}`
        });

        modelViewer.updateHotspot({
            name: 'hotspot-dim-X-Z',
            position: `${center.x - x2 * 1.2}
                     ${center.y}
                        ${center.z - z2 * 1.2}`
        });
        modelViewer.querySelector('button[slot="hotspot-dim-X-Z"]').textContent =
            `${(size.y * 100).toFixed(0)} cm`;

        modelViewer.updateHotspot({
            name: 'hotspot-dot-X-Y-Z',
            position: `${center.x - x2}
                        ${center.y - y2}
                                ${center.z - z2}`
        });

        modelViewer.updateHotspot({
            name: 'hotspot-dim-X-Y',
            position: `${center.x - x2 * 1.2}
                            ${center.y - y2 * 1.1}
                                    ${center.z}`
        });
        modelViewer.querySelector('button[slot="hotspot-dim-X-Y"]').textContent =
            `${(size.z * 100).toFixed(0)} cm`;

        modelViewer.updateHotspot({
            name: 'hotspot-dot-X-Y+Z',
            position: `${center.x - x2}
                            ${center.y - y2}
                                ${center.z + z2}`
        });

        renderSVG();

        modelViewer.addEventListener('camera-change', renderSVG);
    });

    // document.querySelector('#color-controls').addEventListener('click', (event) => {

    document.addEventListener("DOMContentLoaded", function() {
        hideDefaultARButton();
        updateARSupportBadge();
    });
</script>
