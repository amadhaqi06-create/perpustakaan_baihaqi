<?php
// koneksi.php - Menghubungkan PHP dengan database MySQL (MySQLi procedural)

// PHP 8.1+ secara bawaan melempar exception bila koneksi gagal.
// Baris ini mematikannya agar kesalahan dapat diperiksa dengan if
mysqli_report(MYSQLI_REPORT_OFF);

// Parameter koneksi database
$host = "localhost";
$user = "root";
$password = ""; 
$database   = "db_perpustakaan";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa kesalahan koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . 
    htmlspecialchars(mysqli_connect_error()));
} else {
    echo "<p class='pesan-koneksi'>Koneksi berhasil ke database: " . htmlspecialchars($database) . "</p>";
}

// Mengatur karakter agar huruf dan simbol tersimpan dengan benar
mysqli_set_charset($koneksi, "utf8mb4");
?>