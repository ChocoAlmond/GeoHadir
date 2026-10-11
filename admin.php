<?php
// Konfigurasi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pkl_db";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Logika Ekspor ke Excel
if (isset($_GET['export']) && $_GET['export'] == 'excel') {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Rekap_Kehadiran_PKL.xls");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin PKL</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .btn-excel { background-color: #008CBA; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;}
    </style>
</head>
<body>
    <h2>Rekapitulasi Kehadiran Siswa PKL</h2>
    
    <!-- Tombol ini akan disembunyikan saat file diekspor ke Excel -->
    <?php if (!isset($_GET['export'])) { ?>
        <a href="admin.php?export=excel" class="btn-excel">📥 Unduh ke Excel</a>
    <?php } ?>

    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Koordinat GPS (Lat, Long)</th>
            <th>Waktu Absen</th>
        </tr>
        <?php
        // Mengambil data dari database, diurutkan dari yang terbaru
        $sql = "SELECT * FROM data_kehadiran ORDER BY waktu_absen DESC";
        $result = $conn->query($sql);
        $no = 1;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['nis'] . "</td>";
                echo "<td>" . $row['nama_siswa'] . "</td>";
                
                // Membuat link Google Maps dari koordinat agar informatif
                if (!isset($_GET['export'])) {
                    echo "<td><a href='https://www.google.com/maps/search/?api=1&query=" . $row['koordinat_gps'] . "' target='_blank'>" . $row['koordinat_gps'] . "</a></td>";
                } else {
                    echo "<td>" . $row['koordinat_gps'] . "</td>";
                }

                echo "<td>" . $row['waktu_absen'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align:center;'>Belum ada data kehadiran</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>