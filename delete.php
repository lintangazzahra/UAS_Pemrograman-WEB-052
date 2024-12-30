<?php
include 'connection.php';

// Periksa apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berdasarkan ID
    $deleteQuery = "DELETE FROM patients WHERE id = $id";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location = 'index.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
}
?>
