<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
//cek tobol submit sudah ditekan?
if(isset($_POST["submit"])){
    


    //cek data berhasil ditambahkan?
    if(tambah($_POST)>0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }

}
?>  
<DOCTYPE html>
    <head>
        <title>Tambah Data Mahasiswa</title>
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
        <h1><center>Tambah Data Karyawan<center></h1>  
        <form action="" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="nama" >Nama : </label>
                    <input type="text" name="nama" id="nama" required>
                </li>
                <li>
                    <label for="nik" >NIK : </label>
                    <input type="text" name="nik" id="nik" required>
                </li>
                <li>
                    <label for="ttl" >TTL : </label>
                    <input type="text" name="ttl" id="ttl" required>
                </li>
                <li>
                    <label for="pendidikan" >Pendidikan : </label>
                    <input type="text" name="pendidikan" id="pendidikan" required>
                </li>
                <li>
                    <label for="status" >Status : </label>
                    <input type="text" name="status" id="status" required>
                </li>
                <li>
                    <label for="departemen" >Departemen : </label>
                    <input type="text" name="departemen" id="departemen" required>
                </li>
                <li>
                    <label for="grade" >Grade : </label>
                    <input type="text" name="grade" id="grade" required>
                </li>
                <li>
                    <label for="alamat" >Alamat : </label>
                    <input type="text" name="alamat" id="alamat" required>
                </li>
                <li>
                    <label for="username" >Username : </label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li>
                    <label for="password" >Password : </label>
                    <input type="text" name="password" id="password" required>
                </li>
                <li>
                    <button type="submit" name="submit">Tambah Data</button>
                </li>
            </ul>
        </form> 
    </body>
</html>
