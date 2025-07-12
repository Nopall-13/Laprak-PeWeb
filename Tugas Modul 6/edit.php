<?php include 'koneksi.php'; ?>
<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk=$id");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-lg mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 shadow p-4 bg-white rounded">
            <h2 class="mb-4 text-center">Edit Produk</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="<?= $data['nama_produk'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama_produk'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];

                mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");
                header("Location: index.php");
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>