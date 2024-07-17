<pre>
<?php
print_r($_POST);
$kode = $_POST['kode'];
$judul = $_POST['judul'];
// $cover = $_POST['cover'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$jenis = $_POST['jenis'];

if (isset($_POST['kategorirpl'])) {
	$kategorirpl = $_POST['kategorirpl'];
} else {
	$kategorirpl = 0;
}

if (isset($_POST['kategorielektronika'])) {
	$kategorielektronika = $_POST['kategorielektronika'];
} else {
	$kategorielektronika = 0;
}

// $kategorirpl=$_POST['kategorirpl'];
// $kategorielektronika=$_POST['kategorielektronika'];
$ketersediaan = $_POST['ketersediaan'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];


print_r($_FILES);
$nameFile = $_FILES['cover']['name'];
$tmpName = $_FILES['cover']['tmp_name'];
move_uploaded_file($tmpName, 'image/' .  $nameFile);
$cover = $nameFile;
$conn = mysqli_connect("localhost", "root", "", "jwd_pelatihan");
$query = "insert into buku values ('$kode', '$judul', '$cover',  '$pengarang', '$penerbit', '$jenis', '$kategorirpl', '$kategorielektronika', 
'$ketersediaan', '$harga', '$jumlah', '$total')";
print($query);
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