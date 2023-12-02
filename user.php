<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

//menghubungkan ke halaman functions
require 'functions.php';
$karyawan = query("SELECT * FROM dbkaryawan ");

    //jika tombol cari ditekan
    if(isset($_POST["cari"])){
        $karyawan= cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
    <head>
        <title>Halaman User</title>
    </head>
    <body>
        
        <h1>Daftar Karyawan</h1>

        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="Ketik Nama Karyawan.." autocomplete="off">
            <button type ="submit" name="cari">Cari!</button>
        </form>
        <br>

        <table border="1" cellpading="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Nik</th>
                <th>TTL</th>
                <th>Pendidikan</th>
                <th>Status</th>
                <th>Departemen</th>
                <th>Grade</th>
                <th>Alamat</th>

            </tr>

            <?php $i=1; ?>
            <?php foreach($karyawan as $row):?>
            
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nik"]; ?></td>
                <td><?= $row["ttl"]; ?></td>
                <td><?= $row["pendidikan"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td><?= $row["departemen"]; ?></td>
                <td><?= $row["grade"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>
