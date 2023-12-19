<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit) VALUES ('$judul', 
'$pengarang', '$penerbit', '$tahun_terbit')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: read.php"); 
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
    <title>Form Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="create.php" method="POST">
        <h2>Form Tambah Buku</h2>
        <label for="judul">Judul:</label><br>
        <input type="text" name="judul"><br>
        <label for="pengarang">Pengarang:</label><br>
        <input type="text" name="pengarang"><br>
        <label for="penerbit">Penerbit:</label><br>
        <input type="text" name="penerbit"><br>
        <label for="tahun_terbit">Tahun Terbit:</label><br>
        <input type="text" name="tahun_terbit"><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
