<?php

$kodebuku = $_GET['kodebuku'];

$conn = mysqli_connect("localhost", "root", "", "jwd_pelatihan");
$query = "SELECT * FROM buku WHERE kode='$kodebuku'";
print($query);
// menampilkan semua data
$result = mysqli_query($conn, $query);
$buku = mysqli_fetch_array($result);
print_r($buku);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ubah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.css" />
</head>

<body>
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mx-4 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <i class="bi bi-house" style="font-size: 2rem; color: rgb(54, 90, 156)"></i>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Book</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">
                Login
            </button>
            <button type="button" class="btn btn-primary">Sign-up</button>
        </div>
    </header>

    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-12">
                <h3>Form Tambah Buku</h3>
                <form method="post" action="menampilkanUbah.php" name="formBuku" onsubmit="return cekPengarang()">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="inputEmail4" class="form-label">*Kode Buku</label>
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="kode buku"
                                required value="<?= $buku['kode'] ?>" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputPassword4" class="form-label">*Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul buku"
                                value="<?= $buku['judul'] ?>" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputPassword4" class="form-label">*Cover</label>
                            <input type="text" class="form-control" id="cover" name="cover" placeholder="cover"
                                value="<?= $buku['cover'] ?>" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputEmail4" class="form-label">*Pengarang</label>
                            <input type="text" class="form-control" id="Pengarang" name="pengarang"
                                placeholder="Pengarang" value="<?= $buku['pengarang'] ?>" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputPassword4" class="form-label">*penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="penerbit"
                                value="<?= $buku['penerbit'] ?>" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputState" class="form-label">*Jenis Buku</label>
                            <select id="inputState" name="jenis" class="form-select">
                                <option selected>Pilih...</option>
                                <option <?php if ($buku['jenis'] == 'Java Scrip') {
                          print 'selected';
                        } ?>>Java Scrip</option>
                                <option <?php if ($buku['jenis'] == 'Php') {
                          print 'selected';
                        } ?>>Php</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputPassword4" class="form-label">*Kategori Buku</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck2" name="kategori_rpl"
                                    value="1" <?php if ($buku['kategori_rpl'] == '1') {
                                                                                                                  print 'checked';
                                                                                                                } ?> />
                                <label class="form-check-label" for="customCheck2">Rekayasa Perangkat Lunak
                                </label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="kategori_elektronika"
                                    name="kategori_elektronika" value="1"
                                    <?php if ($buku['kategori_elektronika'] == '1') {
                                                                                                                                  print 'checked';
                                                                                                                                } ?> />
                                <label class="custom-control-label" for="customCheck1">Elektronika</label>
                            </div>
                        </div>
                        <!-- ketersediaan -->
                        <div class="col-md-6">
                            <label class="inputKetersediaan" class="form-label">Ketersediaan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ketersediaan" id="flexRadioDefault1"
                                    value="1" <?php if ($buku['ketersediaan'] == '1') {
                                                                                                                    print 'checked';
                                                                                                                  } ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Tersedia
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ketersediaan" id="flexRadioDefault2"
                                    value="0" <?php if ($buku['ketersediaan'] == '0') {
                                                                                                                    print 'checked';
                                                                                                                  } ?>>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Tidak Tersedia
                                </label>
                            </div>
                                  
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputPassword4" class="form-label">*Harga</label>
                            <input type="text" class="form-control" placeholder="harga Buku" name="harga" id="harga"
                                value="<?= $buku['harga'] ?>" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputPassword4" class="form-label">*Jumlah</label>
                            <input type="text" class="form-control" placeholder="jumlah" name="jumlah" id="jumlah"
                                value="<?= $buku['jumlah'] ?>" oninput="updateTotal()" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputPassword4" class="form-label">*Total</label>
                            <input type="text" class="form-control" placeholder="total" name="total" id="total"
                                value="<?= $buku['total'] ?>" oninput="updateTotal()" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-end">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center px-1 py-3 my-4 mx-4 border-top mb-4">
            <p class="col-md-4 mb-0 text-body-secondary">© 2024 Company, Inc</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <i class="bi bi-house" style="font-size: 2rem; color: rgb(54, 90, 156)"></i>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Pricing</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">FAQs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">About</a>
                </li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="/latihan/assest/app.js"></script>
</body>

</html>