<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3</title>
    <link rel="icon" href="img/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<style>
     .search-container {
            display: flex;
            align-items: center;
            margin-left: auto;
        }
        .search-box {
            padding: 6px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 8px;
        }
        .carousel-container {
            margin: 20px 0;
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .article-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 40px 0;
        }
        .article-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .article-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .article-content {
            padding: 15px;
        }
        .contact-footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 40px;
        }
        .hero, #gallery {
            background-color: #FFE4E1;
            padding: 50px 0;
        }
        .boz {
            background-color: #FFE4E1;
            padding: 50px 0;
        }
        .footer-contact {
                background-color: #868e96;
                color: white;
                padding: 15px 20px;
            }
            
        .footer-contact h2 {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
            
        .footer-content {
            background-color: #f8f9fa;
            padding: 20px;
        }
            
        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
            color: #6c757d;
        }
            
        .contact-item i {
            font-size: 1.2em;
        }
            
        .gear-icon {
            width: 20px;
            height: 20px;
            margin-left: 10px;
        }

        /* Tambahan style untuk carousel */
        .carousel-inner {
            max-height: 600px;
            width: 100%;
        }

        .carousel-inner img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        #carouselExampleIndicators {
            max-width: 1000px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        body.dark-mode .card {
            background-color: #1e1e1e;
            color: #ffffff;
        }
        body.dark-mode .hero, 
        body.dark-mode #gallery {
            background-color: #333;
            color: #ffffff;
        }
        body.dark-mode .footer-contact {
            background-color: #1f1f1f;
        }
        body.dark-mode .footer-content {
            background-color: #2c2c2c;
            color: #ffffff;
        }
        body.dark-mode .contact-item {
            color: #ffffff;
        }
</style>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">My Daily Waifus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto text-dark">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#article">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                </li>
    
        
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
        <div class="navbar-nav">
                <button id="darkModeBtn" class="btn btn-secondary me-2">Dark</button>
                <button id="lightModeBtn" class="btn btn-light">Light</button>
            </div>
            <div class="search-container">
                <input type="text" class="search-box" placeholder="Search...">
                <button class="btn btn-secondary"><i class="bi bi-search"></i></button>
            </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="hero text-sm-start">
        <div class="container">
          <div class="d-sm-flex flex-sm-row-reverse align-items-center">

          <img src="img/dandadan.jpg" alt="hero " class="img-fluid" width="300">
          <div>
                      <h1 class="fw-bold display-4">"What makes life meaningful is not the length, but the depth of the traces we leave behind."</h1>
                      <h4 class="lead display-6">Memiliki kebebasan untuk memilih</h4>
                      <h6>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                      </h6>
                  </div>
              </div>
          </div>
      </section>

    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->

    <!-- Gallery Section -->
    <section id="gallery" class="py-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3 text-center">Gallery</h1>
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/gedung.jpg" class="d-block w-100" alt="Gallery Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/kedokteran.jpg" class="d-block w-100" alt="Gallery Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/kelompok.jpg" class="d-block w-100" alt="Gallery Image 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <div class="footer-section">
        <div class="footer-contact">
            <h2>
                Contact
            </h2>
        </div>
        <div class="footer-content">
            <div class="contact-item">
                <i class="bi bi-house-door"></i>
                <span>Address</span>
            </div>
            <div class="contact-item">
                <i class="bi bi-telephone"></i>
                <span>Phone Number</span>
            </div>
            <div class="contact-item">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>Website</span>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const darkModeBtn = document.getElementById('darkModeBtn');
            const lightModeBtn = document.getElementById('lightModeBtn');
            
            darkModeBtn.addEventListener('click', function() {
                document.body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            });
            
            lightModeBtn.addEventListener('click', function() {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
            });
            
            // Check for saved theme preference
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
            }
        });
    </script>
    <script type="text/javascript">
        window.setTimeout("tampilWaktu()",1000);

        function tampilWaktu(){
            var waktu = new Date ();
            var bulan = waktu.getMonth () + 1;

            setTimeout("tampilWaktu()",1000);
            document.getElementById("tanggal").innerHTML =
            waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML =
            waktu.getHours() +
            ":" +
            waktu.getMinutes() +
            ":" +
            waktu.getSeconds();
        }
    </script>
</body>
</html>
