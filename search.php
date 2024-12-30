<?php
include 'connection.php';

if (isset($_GET['query'])) {
    $search = $_GET['query'];
    $query = "SELECT * FROM patients WHERE name LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
} else {
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <h1>Hasil Pencarian: "<?php echo htmlspecialchars($search); ?>"</h1>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Penyakit</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>$no</td>
                            <td>{$row['name']}</td>
                            <td>{$row['age']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['disease']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}'>Edit</a> |
                                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>
                            </td>
                          </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data yang ditemukan</td></tr>";
            }
            ?>
        </table>
        <a href="index.php">Kembali ke Dashboard</a>
    </div>
</body>
</html>
