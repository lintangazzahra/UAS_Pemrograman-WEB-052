<?php 
include 'connection.php'; // Koneksi ke database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Rumah Sakit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Menu Rumah Sakit</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Data Pasien Rumah Sakit</h1>

        <!-- Form Pencarian -->
        <form method="GET" action="search.php">
            <input type="text" name="query" placeholder="Cari pasien..." required>
            <button type="submit">Cari</button>
        </form>
        
        <!-- Tombol Tambah Data -->
        <a href="add.php" style="text-decoration: none; background-color: #2ecc71; color: white; padding: 10px; border-radius: 5px; display: inline-block; margin: 10px 0;">Tambah Data Pasien</a>

        <!-- Tabel Data Pasien -->
        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Penyakit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM patients ORDER BY created_at DESC"; // Ambil semua data pasien
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['age']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['disease']}</td>
                                <td>
                                    <a href='edit.php?id={$row['id']}' style='color: blue;'>Edit</a> | 
                                    <a href='delete.php?id={$row['id']}' style='color: red;' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align: center;'>Tidak ada data pasien</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
