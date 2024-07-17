<?php

$data = [
    [
        "nama_buku" => 'Mark',
        "nama_peminjam" => 'Otto',
        "tanggal_dipinjam" => '@mdo',
        "jatuh_tempo" => 'L',


    ],
    [
        "nama_buku" => 'Jacob',
        "nama_peminjam" => 'Thornton',
        "tanggal_dipinjam" => '@fat',
        "jatuh_tempo" => 'L',


    ],
    [
        "nama_buku" => 'Larry',
        "nama_peminjam" => 'the Bird',
        "tanggal_dipinjam" => '@twitter',
        "jatuh_tempo" => 'L',


    ],
    [
        "nama_buku" => 'Steve',
        "nama_peminjam" => 'Jobs',
        "tanggal_dipinjam" => '@apple',
        "jatuh_tempo" => 'L',


    ],
    [
        "nama_buku" => 'Bill',
        "nama_peminjam" => 'Gates',
        "tanggal_dipinjam" => '@microsoft',
        "jatuh_tempo" => 'L',


    ],
];
// var_dump();   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Data Pinjaman</title>
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
                        <h1 class="h2">Dashboard Pinjaman</h1>
                    </div>
                    <div class="row ">
                        <form action="" class="col-10" method="POST">
                            <div class="input-group my-3">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                            </div>
                        </form>
                        <div class="col-2" style="display: flex;justify-content: center;align-items: center;">
                            <a href="/application/admin/buku/tambah-buku.php">
                                <button type="button" class="btn btn-primary add-new"><i class="bi bi-plus"></i> Add New</button>
                            </a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Buku</th>
                                <th scope="col">Nama Peminjam</th>
                                <th scope="col">Tanggal Dipinjam</th>
                                <th scope="col">Jatuh Tempo</th>
                         
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $id => $value) {
                            ?>
                                <tr>
                                    <th scope='row' class="align-middle"><?= $id + 1 ?></th>
                                    <td class="align-middle"><?= htmlspecialchars($value['nama_buku']) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($value['nama_peminjam']) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($value['tanggal_dipinjam']) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($value['jatuh_tempo']) ?></td>
                                    
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-success btn-sm" data-mdb-ripple-init>Selesai</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-mdb-ripple-init>Hapus</button>
                                  
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