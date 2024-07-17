<pre>
<?php
$kode = $_GET['kodebuku'];
//connect for databes
$conn = mysqli_connect("localhost", "root", "", "jwd_pelatihan");
$query = "DELETE FROM `buku` WHERE kode='$kode'";
// $query = "insert into buku values('$kode', '$judul', '$cover', '$pengarang', '$penerbit', '$jenis', '$kategori_rpl', '$kategori_elektronika', 
//         '$ketersediaan', '$harga', '$jumlah', '$total')";
mysqli_query($conn, $query);
$jumlahBerhasil = mysqli_affected_rows($conn);
if ($jumlahBerhasil > 0) {
	echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
}
?>
</pre>