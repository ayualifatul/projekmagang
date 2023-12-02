<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");    

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    function tambah($data){
        global $conn;
        //ambil data tiap elemen dalam form
        $nama = htmlspecialchars($data["nama"]);
        $nik = htmlspecialchars($data["nik"]);
        $ttl = htmlspecialchars($data["ttl"]);
        $pendidikan = htmlspecialchars($data["pendidikan"]);
        $status = htmlspecialchars($data["status"]);
        $departemen = htmlspecialchars($data["departemen"]);
        $grade = htmlspecialchars($data["grade"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $username = htmlspecialchars($data["username"]);

        //query insert data
        $query = "INSERT INTO dbkaryawan VALUES 
        ('', '$nama', '$nik', '$ttl', '$pendidikan', '$status', '$departemen', '$grade', '$alamat','$username', '$password')
        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    };
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM dbkaryawan WHERE id=$id");
    
        return mysqli_affected_rows($conn);
    };
    function ubah($data){
        global $conn;
        //ambil data tiap elemen dalam form
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nik = htmlspecialchars($data["nik"]);
        $ttl = htmlspecialchars($data["ttl"]);
        $pendidikan = htmlspecialchars($data["pendidikan"]);
        $status = htmlspecialchars($data["status"]);
        $departemen = htmlspecialchars($data["departemen"]);
        $grade = htmlspecialchars($data["grade"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $username = htmlspecialchars($data["username"]);

        //query insert data
        $query = "UPDATE dbkaryawan SET
                    nama = '$nama',
                    nik ='$nik',
                    ttl = '$ttl',
                    pendidikan = '$pendidikan',
                    status = '$status',
                    departemen = '$departemen',
                    grade = '$grade',
                    alamat = '$alamat',
                    username = '$username'
                WHERE id = $id
                    ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
        }
        function cari($keyword){
            $query ="SELECT * FROM dbkaryawan WHERE
                    nama LIKE '$keyword' OR
                    ";
            return query($query);
        }
    function registrasi($data)  {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        
        //cek username ganda
        $result = mysqli_query($conn, "SELECT username FROM dbkaryawan WHERE username ='$username'");
        
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                        alert('username sudah terdaftar! pilih username lain')
                    </script>";
            return false;
        }

        //cek konfirmasi pasword
        if($password !== $password2){
            echo "<script>
                    alert('konfirmasi password salah!');
                </script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //tambahkan user baru
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);

    } 

    

?>
