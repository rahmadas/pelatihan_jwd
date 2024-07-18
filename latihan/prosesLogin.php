<?php
session_start();

// Pastikan form login disubmit dengan method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai username dan password dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Lakukan koneksi ke database (sesuaikan dengan informasi database Anda)
    $conn = new mysqli("localhost", "root", "", "jwd_pelatihan");

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Lakukan query untuk memasukkan user baru ke dalam tabel users
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if prepare() succeeded
    if (!$stmt) {
        die('Query preparation failed: ' . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ss", $username, $password);

    // Execute query
    if ($stmt->execute()) {
        // Jika query berhasil dijalankan
        echo "<script>
                alert('Login Anda berhasil!');
                window.location.href = 'index.php';
              </script>";
    } else {
        // Jika query tidak berhasil dijalankan
        die('Query execution failed: ' . $stmt->error);
    }

    // Tutup statement dan koneksi database
    $stmt->close();
    $conn->close();
}
?>