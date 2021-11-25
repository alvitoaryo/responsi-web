<?php
		include "koneksi.php";

		$kode_barang=$_GET['kode_barang'];
		$query=mysqli_query($konek, "DELETE FROM inventaris where kode_barang='$kode_barang'");

		if($query)
		{
			header("location:daftar_inventaris.php");
		}
		else
		{
			echo "Proses hapus gagal";
		}
?>