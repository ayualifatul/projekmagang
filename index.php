<?php
session_start();
require 'functions.php';

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

//menghubungkan ke halaman functions

$karyawan = query("SELECT * FROM dbkaryawan ");

    //jika tombol cari ditekan
    if(isset($_POST["cari"])){
        $karyawan= cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
    <head>
        <title>Halaman HR</title>
    </head>
    <body>
        
        <h1>Selamat Datang <?= $_SESSION["nama"]; ?></h1>
        <?php
            if($_SESSION["dept"] == "HR"){
                echo '<a href="tambah.php">Tambah Data Karyawan</a> | <a href="logout.php">Logout</a>';
            }else{
                echo '<a href="logout.php">Logout</a>';
            }
        ?>
        <br>
        <form action="" method="post">
        </form>
        <br>

        <table border="1" cellpading="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Nik</th>
                <th>TTL</th>
                <th>Pendidikan</th>
                <th>Status</th>
                <th>Departemen</th>
                <th>Grade</th>
                <th>Alamat</th>
                <th>Username</th>

            </tr>

            <?php $i=1; ?>
            <?php foreach($karyawan as $row):?>
            
            <tr>
                <td><?= $i ?></td>
                <td>
                <?php
                    if($_SESSION["dept"] == "HR"){
                        ?>
                            <a href="ubah.php?id=<?= $row["id"];?> ">ubah</a> |
                            <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('apakah anda ingin menghapus data?');">hapus</a>
                        <?php
                    }else{
                        echo 'Tidak Berhak';
                    }
                ?>
                    
                </td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["nik"]; ?></td>
                <td><?= $row["ttl"]; ?></td>
                <td><?= $row["pendidikan"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td><?= $row["departemen"]; ?></td>
                <td><?= $row["grade"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["username"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>
