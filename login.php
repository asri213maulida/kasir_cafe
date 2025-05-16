<?php
include("koneksikasir.php");
$username = "";
$password = "";
$err ="";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username ==  '' or $password == ''){
        $err .="<li>Silahkan masukkan username dan passwod</li>";
    }
    if(empty($err)){
        $sql1 = "select * from user where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if($r1['password'] !=md5($password)){
            $err .= "<li>Akun tidak di temukan</li>"

        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Kasir</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }
        body {
            background-color: #d3dce6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background-color: #a0b6d4;
            padding: 40px;
            border-radius: 20px;
            width: 320px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .login-box h2 {
            margin-bottom: 30px;
            letter-spacing: 5px;
            color: white;
        }
        .login-box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 16px;
        }
        .login-box button {
            width: 100%;
            padding: 12px;
            background-color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        .login-box button:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <form class="login-box" action="proses_login.php" method="POST">
        <h2>LOGIN</h2>
        <input type="text" name="username" placeholder="User Name :" required>
        <input type="password" name="password" placeholder="Password :" required>
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>
