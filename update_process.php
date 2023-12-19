<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $stmt = $mysqli->prepare("UPDATE buku SET judul=?, pengarang=?, penerbit=?, tahun_terbit=? WHERE buku_id=?");
    $stmt->bind_param("ssssi", $judul, $pengarang, $penerbit, $tahun_terbit, $id);
    
    if ($stmt->execute()) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Data tidak ditemukan.";
}
?>
