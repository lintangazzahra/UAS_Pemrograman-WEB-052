<?php
include 'connection.php';

// Ambil ID dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data pasien berdasarkan ID
    $query = "SELECT * FROM patients WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die("Data tidak ditemukan!");
    }
} else {
    header("Location:index.php");
}

// Proses update data ketika form disubmit
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $disease = $_POST['disease'];

    $updateQuery = "UPDATE patients SET 
                    name = '$name', 
                    age = $age, 
                    address = '$address', 
                    disease = '$disease' 
                    WHERE id = $id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>
                alert('Data berhasil diperbarui!');
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
    <title>Edit Data Pasien</title>
    <link rel="stylesheet" href="style_edit.css">
</head>
<body>
    <div class="content">
        <h1>Edit Data Pasien</h1>
        <form method="POST" action="">
            <label>Nama:</label><br>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br>
            <label>Umur:</label><br>
            <input type="number" name="age" value="<?php echo $data['age']; ?>" required><br>
            <label>Alamat:</label><br>
            <input type="text" name="address" value="<?php echo $data['address']; ?>" required><br>
            <label>Penyakit:</label><br>
            <input type="text" name="disease" value="<?php echo $data['disease']; ?>" required><br><br>
            <button type="submit" name="update">Perbarui Data</button>
        </form>
        <a href="index.php">Kembali ke Dashboard</a>
    </div>
</body>
</html>
