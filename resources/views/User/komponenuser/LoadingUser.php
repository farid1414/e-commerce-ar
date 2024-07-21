<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loader Overlay</title>
  <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/grid.js"></script>
  <style>
    /* Style for the loader container */
    .loader-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: rgba(255, 255, 255, 0.8);
      z-index: 9999; 
      pointer-events: all; 
    }

    /* Prevent scrolling */
    body.loading {
      overflow: hidden;
    }
  </style>
</head>
<body class="loading">
  
  <!-- Loader container -->
  <div class="loader-overlay" id="loader">

  
  <l-grid
  size="86"
  speed="1.5"
  color="black" 
></l-grid>


  </div>
  







  <script>
    
    setTimeout(function() {
      const loader = document.getElementById('loader');
      if (loader) {
        loader.style.display = 'none';
        document.body.classList.remove('loading'); 
      }
    }, 1900);

  
    document.getElementById('loader').addEventListener('click', function(e) {
      e.stopPropagation();
      e.preventDefault();
    });
  </script>
  
</body>
</html>
