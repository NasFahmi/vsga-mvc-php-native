<?php
require_once 'C:\laragon\www\vsga\helper\path-helper.php';
require_once $anggotaControlerPath;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = $controller->deleteAnggota();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['search'])) {
        $keyword = $_GET['search'];
        $data = $controller->searchAnggota($keyword);
    } else {
        $data = $controller->showAllAnggota();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
        }

        .flex-parent {
            display: flex;
        }

        .flex-center {
            justify-content: center;
            align-items: center;
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
                <!-- <h1>Data Mahasiswa</h1> -->
                <div class="container">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard Anggota</h1>
                    </div>
                    <div class="row ">
                        <form action="" class="col-10" method="GET">
                            <div class="input-group my-3">
                                <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
                            </div>
                        </form>
                        <div class="col-2" style="display: flex;justify-content: center;align-items: center;">
                            <a href="/application/admin/anggota/tambah-anggota.php">
                                <button type="button" class="btn btn-primary add-new"><i class="bi bi-plus"></i> Add New</button>
                            </a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $id => $value) {
                            ?>
                                <tr>
                                    <th scope='row' class="align-middle"><?= $id + 1 ?></th>
                                    <td class="align-middle"><?= htmlspecialchars($value['nama']) ?></td>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <img src="../../../public/images/<?= htmlspecialchars($value['foto']) ?>" width="50" height="auto" alt="<?= htmlspecialchars($value['foto']) ?>" class="me-2">
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <?= htmlspecialchars($value['jenis_kelamin']) == 1 ? 'Laki Laki' : 'Perempuan' ?>
                                    </td>
                                    <td class="align-middle"><?= htmlspecialchars($value['alamat']) ?></td>
                                    <td class="align-middle ">
                                        <a href="./edit-anggota.php?id=<?= htmlspecialchars($value['id']) ?>" type="button" class=" mb-2 col-auto btn btn-success btn-sm" data-mdb-ripple-init>Edit</a>
                                        <form action="" method="POST" class="mb-2">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($value['id']) ?>"> 
                                            <button type="submit" onclick="return confirm('Apakah Anda Yakin Menhapus Data Ini?')" class="btn btn-danger btn-sm" data-mdb-ripple-init>Hapus</button>
                                        </form>
                                        <a type="button" class="btn btn-info btn-sm mb-2" data-mdb-ripple-init>Cetak Kartu</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
