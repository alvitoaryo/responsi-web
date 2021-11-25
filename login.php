<!DOCTYPE html>
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
	    <style>
	      h4{
	      	text-align: center;
	      	margin-bottom: 30px;
	      }

	    </style>
	</head>

	<body>
		<br><br><br><br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card" style="width: 400px; background-color: #6610f2;">
		            <div class="card-body">
		              <h4 class="text-center text-white mb-2">LOGIN</h4>
		              <h6 class="text-center mb-3" style="color: #fff;">Web Inventaris Barang</h6>
		              <hr>
		              <form method="POST" action="ceklogin.php" class="form-group" >
		              	<label class="mb-2 text-white">Username</label>
		                <input type="text" name="username" id="nama" placeholder="Username" class="form-control mb-3">
		                <label class="mb-2 text-white">Password</label>
		                <input type="password" name="password" id="email_contact" placeholder="*********" class="form-control mb-3">
		                <center><button type="submit" name="submit" class="btn text-white" style="background-color: #212529;">LOGIN</button></center>
		              </form>
		            </div>
		         </div>
			</div>
			<div class="col-md-4"></div>
		</div>
		
          <br><br>
		<?php
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan'] == "gagal") {
					echo "<h4>Login gagal! Username dan Password salah!</h4>";
				}else if($_GET['pesan'] == "logout") {
					echo "<h4>Anda telah berhasil logout</h4>";
				}else if($_GET['pesan'] == "belum_login"){
					echo "<h4>Anda harus login untuk mengakses halaman form data buku</h4>";
				}
			}
		?>
	</body>
</html>