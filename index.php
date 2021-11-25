<?php
  session_start();
  $username = $_SESSION['username'];
  $nama_lengkap = $_SESSION['nama_lengkap'];
  if(empty($_SESSION['username'])){
    header("location:login.php?pesan=belum_login");
  }
?>
<html> 
  <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RESPONSI</title> 
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/js/bootstrap.js">
    <script src="assets/js/jquery.js"></script> 
    <script src="assets/js/propper.js"></script> 
    <script src="assets/js/bootstrap.js"></script>
  </head> 

  <body>
    <!-- HEADER -->
    <div class="text-center text-white fw-bold" style="background-color: #6610f2; font-size: 20pt; font-family: sans-serif; margin-bottom: -16px;">
      <p>DAFTAR INVENTARIS BARANG<br>KANTOR SERBA ADA</p>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary pt-0 pb-0" >
      <div class="container-fluid ms-auto">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="daftar_inventaris.php">Daftar Inventaris</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                List per Kategori
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink" >
                <li><a class="dropdown-item" href="kategori.php?kategori=bangunan">Bangunan</a></li>
                <li><a class="dropdown-item" href="kategori.php?kategori=kendaraan">Kendaraan</a></li>
                <li><a class="dropdown-item" href="kategori.php?kategori=alattuliskantor">Alat Tulis Kantor</a></li>
                <li><a class="dropdown-item" href="kategori.php?kategori=elektronik">Elektronik</a></li>
              </ul>
            </li>
          </ul>              
        </div>
        <a href="logout.php">
          <button class="btn btn-sm text-white" style="background-color:   #d63384;">Logout</button>
        </a>
      </div>
    </nav>

    <!-- CONTENT -->
    <div class="text-center">
      <br><br><br><br><br>
      <h3>Selamat datang</h3><br> 
      <h1 style="color: #6610f2;"><?php echo $nama_lengkap ?></h1>

    </div>

    <!-- FOOTER -->
    <br><br><br><br><br><br><br><br>
    <div class="text-center text-white" style="background-color: #6610f2;">
      <p>Inventaris 2016</p>
    </div>

  </body>


</html>