<?php

include("./config/Connection.php");

class RegisterController extends Connection
{
    public function __construct($data)
    {
        parent::__construct();

        $nama = $data['nama'];
        $nim = $data['nim'];
        $prodi = $data['prodi'];
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];

        $query = "SELECT * FROM users WHERE username = '$nim'";

        $result = mysqli_query($this->connect, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('NIM sudah terdaftar!')</script>";
            return;
        }

        if ($password == $confirmPassword) {
            $query = "INSERT INTO users VALUES ('', '$nim', '$nama', '$prodi', 'mahasiswa', '$password')";
            $result = mysqli_query($this->connect, $query);

            header("Location: index.php?message=Berhasil mendaftar!");
            // return $result;

            // while ($data = mysqli_fetch_assoc($result)) {
            //     session_start();
            //     $_SESSION['id'] = $data['id'];
            //     $_SESSION['username'] = $data['username'];
            //     $_SESSION['nama'] = $data['nama'];
            //     $_SESSION['prodi'] = $data['prodi'];
            //     $_SESSION['role'] = $data['role'];

            //     if ($_SESSION['role'] == 'admin') {
            //         header("Location: dashboard/index-admin.php?message=Selamat Datang Admin");
            //     } else {
            //         header("Location: dashboard/index.php?message=Selamat Datang");
            //     }
            // }
        } else {
            echo "<script>alert('Konfirmasi password tidak sesuai!')</script>";
            return;
        }
    }
}
