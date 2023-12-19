<!DOCTYPE html>
<html>
<head>
    <title>Update Buku</title>
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
        input[type="text"], input[type="submit"] {
            width: calc(100% - 40px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        input[type="text"] {
            width: calc(100% - 40px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>


<?php
include 'koneksi.php';

$id = $_GET['id']; 

$stmt = $mysqli->prepare("SELECT * FROM buku WHERE buku_id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <form action="update_process.php" method="POST">
        Judul: <input type="text" name="judul" value="<?php echo htmlspecialchars($row['judul']); ?>"><br>
        Pengarang: <input type="text" name="pengarang" value="<?php echo htmlspecialchars($row['pengarang']); ?>"><br>
        Penerbit: <input type="text" name="penerbit" value="<?php echo htmlspecialchars($row['penerbit']); ?>"><br>
        Tahun Terbit: <input type="text" name="tahun_terbit" value="<?php echo htmlspecialchars($row['tahun_terbit']); ?>"><br>
        <input type="hidden" name="id" value="<?php echo $row['buku_id']; ?>">
        <input type="submit" value="Update">
    </form>
<?php
} else {
    echo "Data tidak ditemukan.";
}

$stmt->close();
$mysqli->close();
?>

</body>
</html>
