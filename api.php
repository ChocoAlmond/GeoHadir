<?php
// Konfigurasi Database bawaan Laragon
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika password default Laragon tidak diubah
$db   = "pkl_db";

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengecek apakah ada data yang dikirim dari App Inventor (metode POST)
if (isset($_POST['nis']) && isset($_POST['nama_siswa']) && isset($_POST['koordinat_gps'])) {
    
    // Menangkap data
    $nis = $_POST['nis'];
    $nama = $_POST['nama_siswa'];
    $koordinat = $_POST['koordinat_gps'];

    // Membersihkan data untuk mencegah error SQL
    $nis = $conn->real_escape_string($nis);
    $nama = $conn->real_escape_string($nama);
    $koordinat = $conn->real_escape_string($koordinat);

    // Perintah memasukkan data ke tabel
    $sql = "INSERT INTO data_kehadiran (nis, nama_siswa, koordinat_gps) VALUES ('$nis', '$nama', '$koordinat')";

    if ($conn->query($sql) === TRUE) {
        // Pesan ini akan ditangkap oleh MIT App Inventor jika berhasil
        echo "Sukses: Data kehadiran berhasil dicatat!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Gagal: Data tidak lengkap.";
}

$conn->close();
?>