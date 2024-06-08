<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <model-viewer 
    id="dimension-demo" 
    src="https://cdn.glitch.global/6a714b05-e482-46c1-9985-88f4f05c9148/SanderLounge.glb?v=1690982403449" 
    ios-src="" 
    skybox-image="https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791" 
    ar 
    ar-modes="webxr" 
    ar-scale="fixed" 
    camera-orbit="-30deg auto auto" 
    max-camera-orbit="auto 100deg auto" 
    shadow-intensity="2" 
    ar-placement="wall" 
    camera-controls 
    touch-action="pan-y" 
    tone-mapping="neutral" 
    style="width: 100%; height: 400px; border-radius: 15px; position: relative;"
    xr-environment
    
    >

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
        <svg id="dimLines" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="dimensionLineContainer">
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
        <div class="d-flex justify-content-end" style="position: absolute; bottom: 10px; right: 10px;">
            <span id="arSupportBadge" class="badge" style="font-size: 15px;"></span>
          </div>
          <div class="d-block d-lg-none">
            <button id="arButton" onclick="activateAR()" style="background-color: white; border-radius: 4px; border: none; position: absolute; top: 16px; right: 16px; height: 30px;">
              👋 Hey, Gunakan AR
            </button>
          </div>
      </model-viewer>
      
      <script type="module">
        const modelViewer = document.querySelector('#dimension-demo');
      
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
            }
            else {
              svgLine.classList.remove('hide');
            }
          }
        }
      
        const dimLines = modelViewer.querySelectorAll('line');
      
        const renderSVG = () => {
          drawLine(dimLines[0], modelViewer.queryHotspot('hotspot-dot+X-Y+Z'), modelViewer.queryHotspot('hotspot-dot+X-Y-Z'), modelViewer.queryHotspot('hotspot-dim+X-Y'));
          drawLine(dimLines[1], modelViewer.queryHotspot('hotspot-dot+X-Y-Z'), modelViewer.queryHotspot('hotspot-dot+X+Y-Z'), modelViewer.queryHotspot('hotspot-dim+X-Z'));
          drawLine(dimLines[2], modelViewer.queryHotspot('hotspot-dot+X+Y-Z'), modelViewer.queryHotspot('hotspot-dot-X+Y-Z')); // always visible
          drawLine(dimLines[3], modelViewer.queryHotspot('hotspot-dot-X+Y-Z'), modelViewer.queryHotspot('hotspot-dot-X-Y-Z'), modelViewer.queryHotspot('hotspot-dim-X-Z'));
          drawLine(dimLines[4], modelViewer.queryHotspot('hotspot-dot-X-Y-Z'), modelViewer.queryHotspot('hotspot-dot-X-Y+Z'), modelViewer.queryHotspot('hotspot-dim-X-Y'));
        };
      
        modelViewer.addEventListener('load', () => {
          const center = modelViewer.getBoundingBoxCenter();
          const size = modelViewer.getDimensions();
          const x2 = size.x / 2;
          const y2 = size.y / 2;
          const z2 = size.z / 2;
      
          modelViewer.updateHotspot({
            name: 'hotspot-dot+X-Y+Z',
            position: `${center.x + x2} ${center.y - y2} ${center.z + z2}`
          });
      
          modelViewer.updateHotspot({
            name: 'hotspot-dim+X-Y',
            position: `${center.x + x2 * 1.2} ${center.y - y2 * 1.1} ${center.z}`
          });
          modelViewer.querySelector('button[slot="hotspot-dim+X-Y"]').textContent =
              `${(size.z * 100).toFixed(0)} cm`;
      
          modelViewer.updateHotspot({
            name: 'hotspot-dot+X-Y-Z',
            position: `${center.x + x2} ${center.y - y2} ${center.z - z2}`
          });
      
          modelViewer.updateHotspot({
            name: 'hotspot-dim+X-Z',
            position: `${center.x + x2 * 1.2} ${center.y} ${center.z - z2 * 1.2}`
          });
          modelViewer.querySelector('button[slot="hotspot-dim+X-Z"]').textContent =
              `${(size.y * 100).toFixed(0)} cm`;
      
          modelViewer.updateHotspot({
            name: 'hotspot-dot+X+Y-Z',
            position: `${center.x + x2} ${center.y + y2} ${center.z - z2}`
          });
      
          modelViewer.updateHotspot({
            name: 'hotspot-dim+Y-Z',
            position: `${center.x} ${center.y + y2 * 1.1} ${center.z - z2 * 1.1}`
          });
          modelViewer.querySelector('button[slot="hotspot-dim+Y-Z"]').textContent =
              `${(size.x * 100).toFixed(0)} cm`;
      
          modelViewer.updateHotspot({
            name: 'hotspot-dot-X+Y-Z',
            position: `${center.x - x2} ${center.y + y2} ${center.z - z2}`
          });
      
          modelViewer.updateHotspot({
            name: 'hotspot-dim-X-Z',
            position: `${center.x - x2 * 1.2} ${center.y} ${center.z - z2 * 1.2}`
          });
          modelViewer.querySelector('button[slot="hotspot-dim-X-Z"]').textContent =
              `${(size.y * 100).toFixed(0)} cm`;
      
          modelViewer.updateHotspot({
            name: 'hotspot-dot-X-Y-Z',
            position: `${center.x - x2} ${center.y - y2} ${center.z - z2}`
          });
      
          modelViewer.updateHotspot({
            name: 'hotspot-dim-X-Y',
            position: `${center.x - x2 * 1.2} ${center.y - y2 * 1.1} ${center.z}`
          });
          modelViewer.querySelector('button[slot="hotspot-dim-X-Y"]').textContent =
              `${(size.z * 100).toFixed(0)} cm`;
      
          modelViewer.updateHotspot({
            name: 'hotspot-dot-X-Y+Z',
            position: `${center.x - x2} ${center.y - y2} ${center.z + z2}`
          });
      
          renderSVG();
      
          modelViewer.addEventListener('camera-change', renderSVG);
        });
      </script>

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

      <style>
        #controls {
          position: absolute;
          bottom: 16px;
          left: 16px;
          max-width: unset;
          transform: unset;
          pointer-events: auto;
          z-index: 100;
        }
      
        .dot{
          display: none;
        }
      
        .dim{
          background: #fff;
          border-radius: 4px;
          border: none;
          box-sizing: border-box;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
          color: rgba(0, 0, 0, 0.8);
          display: block;
          font-family: Futura, Helvetica Neue, sans-serif;
          font-size: 1em;
          font-weight: 700;
          max-width: 128px;
          overflow-wrap: break-word;
          padding: 0.5em 1em;
          position: absolute;
          width: max-content;
          height: max-content;
          transform: translate3d(-50%, -50%, 0);
          pointer-events: none;
          --min-hotspot-opacity: 0;
        }
      
        @media only screen and (max-width: 800px) {
          .dim{
            font-size: 3vw;
          }
        }
      
        .dimensionLineContainer{
          pointer-events: none;
          display: block;
        }
      
        .dimensionLine{
          stroke: #16a5e6;
          stroke-width: 2;
          stroke-dasharray: 2;
        }
      
        .hide{
          display: none;
        }
        /* This keeps child nodes hidden while the element loads */
        :not(:defined) > * {
          display: none;
        }
      </style>
</body>
</html>
