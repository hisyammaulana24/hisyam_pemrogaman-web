<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepone = $_POST['telepon'];

    $sql = "INSERT INTO anggota (nama, alamat, email, telepon) VALUES ('$nama', 
'$alamat', '$email', '$telepon')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: readanggota.php"); 
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota Baru</title>
    <!-- CSS atau styling lainnya -->
</head>
<body>
    <h2>Form Tambah Anggota</h2>
    <form action="" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama"><br>
        
        <label for="email">alamat:</label><br>
        <input type="text" name="email"><br>

        <label for="nama">email:</label><br>
        <input type="text" name="nama"><br>

        <label for="nama">telepon:</label><br>
        <input type="text" name="nama"><br>

        <!-- ... (Tambahkan field-form lainnya) -->

        <input type="submit" value="Tambah Anggota">
    </form>
</body>
</html>
