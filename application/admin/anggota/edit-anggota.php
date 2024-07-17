<?php
require_once 'C:\laragon\www\vsga\helper\path-helper.php';
require_once $anggotaControlerPath;

$id = $_GET['id'];
if (isset($id)) {
    $data = $controller->getAnggotaById();
    
} else {
    header('Location: \application\admin\anggota\data-anggota.php'); // Redirect to
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = $controller->updateAnggota($id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota <?= htmlspecialchars($data['nama']) ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
        }
    </style>

</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/header-admin.php' ?>

    <!-- hi admin -->
    <div class="container-fluid">
        <div class="row">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/sidenav-admin.php' ?>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tambah Edit</h1>
                </div>
                <form class="row g-3" id="mahasiswaForm" action="" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anggota" value="<?= htmlspecialchars($data['nama']) ?> ">
                    </div>
                    <div class="col-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jl kH Wahid Hasyim" value="<?= htmlspecialchars($data['alamat']) ?> ">
                    </div>
                    <div class="col-12">
                        <label for="Foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>

                    <div class="col-12">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                            <option value="1" <?= isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 1 ? 'selected' : '' ?>>Laki Laki</option>
                            <option value="0" <?= isset($data['jenis_kelamin']) && $data['jenis_kelamin'] == 0 ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-12">
                    <img src="../../../public/images/<?= htmlspecialchars($data['foto']) ?>" width="200" height="auto" alt="<?= htmlspecialchars($data['foto']) ?>" class="me-2">
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>