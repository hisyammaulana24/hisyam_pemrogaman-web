<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepone = $_POST['telepon'];

    $stmt = $mysqli->prepare("UPDATE buku SET judul=?, pengarang=?, penerbit=?, tahun_terbit=? WHERE buku_id=?");
    $stmt->bind_param("ssssi", $judul, $pengarang, $penerbit, $tahun_terbit, $id);
    
    if ($stmt->execute()) {
        header("Location: anggota.php");
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