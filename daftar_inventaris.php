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

    <!-- CONTENT -->
    <a href="form_tambah.php" class="btn btn-sm text-white ms-2 mt-2" style="background-color:  #d63384;">+ Tambah</a>
    
    <div class="container mr-4"><br>
    <table class="table table-bordered">
          <thead>
            <tr class="text-white" align="center" style="background-color: #6610f2;">
              <th scope="col" width="3%">No</th>
              <th scope="col" width="8%">Kode</th>
              <th scope="col" width="11%">Nama Barang</th>
              <th scope="col" width="6%">Jumlah</th>
              <th scope="col" width="6%">Satuan</th>
              <th scope="col" width="10%">Tanggal Datang</th>
              <th scope="col" width="8%">Kategori</th>
              <th scope="col" width="8%">Status</th>
              <th scope="col" width="13%">Harga Satuan</th>
              <th scope="col" width="13%">Total Harga</th>
              <th colspan="2" scope="col" width="14%">Aksi</th>
            </tr>
          </thead>
          <?php  
            include 'koneksi.php';

            $no = 1;
            $totalinv=0;
            $query= mysqli_query($konek,"SELECT * from inventaris order by kategori asc"); 
            while($data=mysqli_fetch_array($query))  
              {  
          ?>
            
          <tbody>
            <tr  align="center">
              <th scope="row"> <?php echo $no;$no++; ?> </th>
              <td><?php echo $data['kode_barang']; ?></td>
              <td><?php echo $data['nama_barang']; ?></td>
              <td><?php echo $data['jumlah']; ?></td>
              <td><?php echo $data['satuan']; ?></td>
              <td><?php echo $data['tgl_datang']; ?></td>
              <td><?php echo $data['kategori']; ?></td>
              <td><?php echo $data['status_barang']; ?></td>
              <td><?php echo "Rp. " . number_format($data['harga'],2,',','.'); ?></td>
              <?php $total=$data['harga']*$data['jumlah'];?>
              <td><?php echo "Rp. " .number_format($total,2,',','.'); ?></td>
              <?php $totalinv=$totalinv+$total; ?>

              <td>
                <a class="btn btn-sm" style="background-color: #d63384; width: 60px;" href=form_edit.php?kode_barang=<?php echo $data['kode_barang'];?>>Edit</a>
                <a class="btn btn-sm" style="background-color: #d63384; width: 60px;" href=konfir_hapus.php?kode_barang=<?php echo $data['kode_barang'];?>>Hapus</a>
              </td>
            <?php }
            ?>
              
            </tr>
          </tbody>  
        </table>
          <p class="text-center">Total Inventaris = Rp. <?php echo number_format($totalinv,2,',','.'); ?></p>
        </div>

    <!-- FOOTER -->
    <br>
    <div class="text-center text-white" style="background-color: #6610f2;">
      <p>Inventaris 2016</p>
    </div>

  </body>


</html>