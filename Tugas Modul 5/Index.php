<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #0077cc;
        }

        form label {
            display: block;
            margin-top: 15px;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #0077cc;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #005fa3;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .success {
            background-color: #e7f9e7;
            border: 1px solid #b2d8b2;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Buku Tamu Digital STITEK Bontang</h1>

    <?php
    // Inisialisasi variabel
    $nama = $email = $pesan = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["pesan"])) {
            $error = "Semua kolom wajib diisi!";
        } else {
            $nama = htmlspecialchars($_POST["nama"]);
            $email = htmlspecialchars($_POST["email"]);
            $pesan = htmlspecialchars($_POST["pesan"]);
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">

        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

        <label for="pesan">Pesan / Komentar:</label>
        <textarea id="pesan" name="pesan" rows="4"><?php echo isset($_POST['pesan']) ? htmlspecialchars($_POST['pesan']) : ''; ?></textarea>

        <input type="submit" value="Kirim Pesan">
    </form>

    <?php
    if (!empty($error)) {
        echo "<div class='error'>$error</div>";
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='success'>";
        echo "<strong>Terima kasih atas pesan Anda!</strong><br><br>";
        echo "<b>Nama:</b> $nama<br>";
        echo "<b>Email:</b> $email<br>";
        echo "<b>Pesan:</b><br>" . nl2br($pesan);
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
