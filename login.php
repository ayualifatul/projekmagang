<?php
session_start();
require 'functions.php';

if(isset($_POST["login"])){

    $ussername = $_POST["username"];
    $password = $_POST["password"]; 

    $result = mysqli_query($conn, "SELECT * FROM dbkaryawan WHERE username = '$ussername'");
    
    // cek username
    if( mysqli_num_rows($result) === 1 ){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $departemen = $row["departemen"];
            $nama = $row["nama"];
            
            //set session
            $_SESSION["login"] = true;
            $_SESSION["dept"] = $departemen;
            $_SESSION["nama"] = $nama;

            header("Location: index.php");
            exit;
        }
    } 
    $error = true; 
}

?>
<DOCTYPE html>
    <head>
        <title>Halaman Login</title>
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
        <h1><center>Halaman Login</center></h1>

        <?php if(isset($error)):?>
            <p style="color: red; font-style: italic;">ussername / password salah</p>
        <?php endif;?>
        
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username">    
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password">    
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </body>
<html>
