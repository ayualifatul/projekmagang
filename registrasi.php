<?php
require 'functions.php';

if (isset($_POST["register"])){

    if(registrasi($_POST)>0){
        echo"<script>
            alert('user baru berhasil ditambahkan!');
            document.location.href = 'login.php';
            </script>";
    }else {
        echo mysqli_error($conn);
    }
} 
if(isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
?>
<DOCTYPE html>
    <head>
        <title>Halaman Registrasi</title>
        <style>
                                 * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            /* Gaya dasar untuk form input */
            form {
            max-width: 400px;
            margin: 20px auto;
            }

            label {
            display: block;
            margin-bottom: 8px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            }

            /* Gaya untuk tombol submit */
            input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            input[type="submit"]:hover {
            background-color: white;
            }

            /* Gaya untuk pesan error */
            .error {
            color: red;
            margin-top: 5px;
            }      
        </style>
    </head>
    <body>
        <h1><center>Halaman Registrasi</center></h1>
        <form action="" method="post">
            <p><center>sudah punya akun?</center></p>
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">    
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">    
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2">    
            </li>
            <br>
            <li>
                <button type="submit" name="register">Register!</button>
                <button type="submit" name="login">Login!</button>
            </li>
        </ul>
        </form>
    </body>
<html>
