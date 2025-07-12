<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-xl mt-5">
    <div class="shadow p-4 bg-white rounded">
        <h1 class="mb-4">Data Produk Toko</h1>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Produk Baru</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$data['nama_produk']}</td>
                        <td>Rp " . number_format($data['harga'], 0, ',', '.') . "</td>
                        <td>{$data['stok']}</td>
                        <td>
                            <a href='edit.php?id={$data['id_produk']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?id={$data['id_produk']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
