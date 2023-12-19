<?php
include 'koneksi.php';

$sql = "SELECT * FROM buku";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .action-links a {
            text-decoration: none;
            padding: 3px 6px;
            border: 1px solid #ddd;
            border-radius: 3px;
            margin-right: 5px;
        }
        .action-links a:hover {
            background-color: #f2f2f2;
        }
        .logout-link {
            display: block;
            margin-top: 20px;
            text-align: right;
        }
        .logout-link a {
            text-decoration: none;
            padding: 6px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
        }
        .logout-link a:hover {
            background-color: #45a049;
        }
        h1 {
            .centered-text
            text-alaign: center;
            margin-bottom: 20px; 
            color: #333;
            
        }
    </style>
</head>
<body>
    <h1>PERPUSTAKAAN</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun Terbit</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["buku_id"]."</td>";
            echo "<td>".$row["judul"]."</td>";
            echo "<td>".$row["pengarang"]."</td>";
            echo "<td>".$row["penerbit"]."</td>";
            echo "<td>".$row["tahun_terbit"]."</td>";
            echo "<td class='action-links'><a href='update.php?id=".$row["buku_id"]."'>Edit</a> <a href='delete.php?id=".$row["buku_id"]."'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data buku.";
    }
    $mysqli->close();
    ?>

    <div class="logout-link">
        <a href="anggota.php">tambah anggota</a>
        
    <a href="create.php">tambah buku</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
