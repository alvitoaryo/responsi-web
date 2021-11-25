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
         <button class="btn btn-sm text-white" style="background-color:  #d63384;">Logout</button>
        </a>
      </div>
    </nav>

    <!-- CONTENT --><br><br><br>
    <div class="container" style="width: 65%;">
    <div style="background-color: #6610f2;">
      <p class="text-center text-white" style="font-size: 15pt;">Ubah Data Inventaris</p>
    </div>

    <?php
      include "koneksi.php";
    
      $kode_barang=$_GET['kode_barang'];
      
      $query=mysqli_query($konek, "SELECT * from inventaris where kode_barang='$kode_barang'");
      $data=mysqli_fetch_array($query);
    ?>

    <form method="POST" action="update.php">

      <div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="kode">Kode Barang</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="kode_barang" class="form-control" value="<?php echo $data['kode_barang']; ?>" placeholder="Kode Barang" id="kode">
            </div>
          </div>
        </div>

        <br><div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="nama">Nama Barang</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang']; ?>" placeholder="Nama Barang" id="nama">
            </div>
          </div>
        </div>

        <br><div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="jumlah">Jumlah</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" placeholder="Jumlah" id="jumlah">
            </div>
          </div>
        </div>

        <br><div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="satuan">Satuan</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="satuan" class="form-control" value="<?php echo $data['satuan']; ?>" placeholder="Satuan" id="satuan">
            </div>
          </div>
        </div>

        <br><div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="tgl">Tanggal Datang</label>
            </div>
            <div class="col-md-4">
              <input type="date" name="tgl_datang" class="form-control" value="<?php echo $data['tgl_datang']; ?>" id="tgl">
            </div>
          </div>
        </div>

        <br><div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label>Kategori</label>
            </div>
            <div class="col-md-4">
              <select name="kategori" class="form-select">
                <option value="Bangunan" <?php if ($data['kategori']=="Bangunan") echo "selected";?>>Bangunan</option>
                <option value="Kendaraan" <?php if ($data['kategori']=="Kendaraan") echo "selected";?>>Kendaraan</option>
                <option value="Alat Tulis Kantor" <?php if ($data['kategori']=="Alat Tulis Kantor") echo "selected";?>>Alat Tulis Kantor</option>
                <option value="Elektronik" <?php if ($data['kategori']=="Elektronik") echo "selected";?>>Elektronik</option>
              </select>
            </div>
          </div>
        </div>

        <br><div class="form-group">
          <div class="row">
                <div class="col-md-2">
                    <label>Status</label>
                </div>
                <div class="col-md-10">
                  <div class="form-check-inline">
                     <input type="radio" class="form-check-input" name="status_barang" value="Baik" <?php if ($data['status_barang']=="Baik") echo "checked";?>>
                       <label>Baik</label>
                  </div>
                  <div class="form-check-inline">
                     <input type="radio" class="form-check-input" name="status_barang" value="Perawatan" <?php if ($data['status_barang']=="Perawatan") echo "checked";?>>
                        <label>Perawatan</label>
                  </div>
                  <div class="form-check-inline">
                     <input type="radio" class="form-check-input" name="status_barang" value="Rusak" <?php if ($data['status_barang']=="Rusak") echo "checked";?>>
                        <label>Rusak</label>
                  </div>
                </div>
            </div>
        </div>

        <br><div class="form-group">
          <div class="row">
            <div class="col-md-2">
              <label for="harga">Harga Satuan</label>
            </div>
            <div class="col-md-10">
              <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" placeholder="Harga Satuan" id="harga">
            </div>
          </div>
        </div>

        <br><div class="form-group">
          <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
              <button type="submit" class="btn text-white" style="background-color: #d63384; width: 90px;">UBAH</button>
              <button type="reset" class="btn text-white" style="background-color: #d63384; width: 90px;">BATAL</button>
            </div>
          </div>
        </div>

    </form>
    </div>


    <!-- FOOTER -->
    <br><br>
    <div class="text-center text-white" style="background-color: #6610f2;">
      <p>Inventaris 2016</p>
    </div>

  </body>


</html>