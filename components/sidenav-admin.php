<!-- Sidebar -->
<nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-dark active " href="/application/dashboard.php">
                    <i class="bi bi-house-door"></i> Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark " href="#" data-bs-toggle="collapse" data-bs-target="#datamaster-collapse">
                    <i class="bi bi-folder"></i> Data Master
                </a>
                <div class="collapse" id="datamaster-collapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/application/admin/anggota/data-anggota.php">Data Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/application/admin/buku/data-buku.php">Data Buku</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#" data-bs-toggle="collapse" data-bs-target="#transaksi-collapse">
                    <i class="bi bi-credit-card"></i> Transaksi
                </a>
                <div class="collapse" id="transaksi-collapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/application/admin/transaksi/data-pinjaman.php">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/application/admin/transaksi/data-pengembalian.php">Pengembalian</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-file-text"></i> Laporan Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>