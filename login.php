<!DOCTYPE html>
<html>
<?php
include "koneksi.php";
session_start();

if (isset($_POST['submit'])){
  $user = ($_POST['username']);
  $pass = md5($_POST['password']);

  $query_cek = $mysqli->query("SELECT * FROM penggunas where username= '$user' AND password='$pass'");
  if($query_cek->num_rows > 0) {
    $row = mysqli_fetch_assoc($query_cek);
    $_SESSION['username'] = $row['username'];
    echo $_SESSION['username'];
  } else {
    echo "salah";
  }
}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-image: url('pexels-ir-solyanaya-634548.jpg'); 
      background-size: cover;
      background-position: center;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.8); 
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
    }

    .input-group input {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .input-group button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 3px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    .input-group button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form id="login-form" action="read.php" method="post">
      <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
