<?php
include 'connection.php';

// Proses tambah data ketika form disubmit
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $disease = $_POST['disease'];

    $query = "INSERT INTO patients (name, age, address, disease) VALUES ('$name', $age, '$address', '$disease')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location = 'index.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pasien</title>
    <link rel="stylesheet" href="style_add.css">
</head>
<body>
    <div class="content">
        <h1>Tambah Data Pasien</h1>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="name" required><br>
            <label>Umur:</label><br>
            <input type="number" name="age" required><br>
            <label>Alamat:</label><br>
            <input type="text" name="address" required><br>
            <label>Penyakit:</label><br>
            <input type="text" name="disease" required><br><br>
            <button type="submit" name="submit">Tambah Data</button>
        </form>
        <a href="index.php">Kembali ke Dashboard</a>
    </div>
</body>
</html>
