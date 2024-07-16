<pre>
<?php
print_r($_POST);
$kode = $_POST['kode'];
$judul = $_POST['judul'];
$cover = $_POST['cover'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$jenis = $_POST['jenis'];
if (isset($_POST['kategori_rpl'])) {
	$kategori_rpl = $_POST['kategori_rpl'];
} else {
	$kategori_rpl = 0;
}
if (isset($_POST['kategori_elektronika'])) {
	$kategori_elektronika = $_POST['kategori_elektronika'];
} else {
	$kategori_elektronika = 0;
}
$ketersediaan = $_POST['ketersediaan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
//connect for databes
$conn = mysqli_connect("localhost", "root", "", "jwd_pelatihan");
$query = "insert into buku values('$kode', '$judul', '$cover', '$pengarang', '$penerbit', '$jenis', '$kategori_rpl', '$kategori_elektronika', 
        '$ketersediaan', '$harga', '$jumlah', '$total')";
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