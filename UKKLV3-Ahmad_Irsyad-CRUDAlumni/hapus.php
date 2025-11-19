<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Hapus data
    mysqli_query($conn, "DELETE FROM alumni WHERE Id_Alumni = $id");

    // Menyusun ulang ID 
    mysqli_query($conn, "SET @num := 0");
    mysqli_query($conn, "UPDATE alumni SET Id_Alumni = @num := @num + 1 ORDER BY id_Alumni");
    
    // Reset auto increment
    mysqli_query($conn, "ALTER TABLE alumni AUTO_INCREMENT = 1");
}

// Kembali ke halaman utama
header("Location: index.php");
exit;