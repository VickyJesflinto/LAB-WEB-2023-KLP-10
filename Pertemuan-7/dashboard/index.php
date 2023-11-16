<?php
include("../config/Connection.php");

$nama = "";
$nim = "";
$prodi = "";

session_start();
$nama = $_SESSION['nama'];
$nim = $_SESSION['username'];
$prodi = $_SESSION['prodi'];

if ($_SESSION['status'] != 'login') {
    header("location:../index.php?message=Silahkan Login Terlebih Dahulu!");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location:../index.php?message=Sampai Jumpa");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 900px;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mx-auto">
        <h1 class="text-center mb-4">Dashboard Mahasiswa</h1>
        <h4 class="text-center mb-5"><?= "Selamat Datang $nama" ?></h4>

        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info' role='alert'>$_GET[message]</div>";
        }
        ?>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <img src="../images/foto-profi.jpg" class="card-img-top w-25" alt="Foto Profil" style="width: 200px;">
                </div>
                <div class="mt-5 w-75 mx-auto">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $prodi ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="POST" class="position-fixed top-0 end-0 m-2">
        <button type="submit" name="logout" class="btn btn-lg btn-danger">Logout</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>