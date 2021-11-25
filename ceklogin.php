<?php
	session_start();
	include "koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($konek, "SELECT * from petugas WHERE username = '$username' && password = '$password'") or die (mysqli_error($konek));
	$data = mysqli_fetch_assoc($query);

	$cek = mysqli_num_rows($query);

	if($cek > 0){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];
		header("location:index.php");
	}else{
		header("location:login.php?pesan=gagal");
	}

?>