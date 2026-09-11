<?php

require_once 'functions.php';

$nama = trim($_GET['nama'] ?? 'Peserta');
$nim = trim($_GET['nim'] ?? '');
$programStudi = trim($_GET['program_studi'] ?? '');
$kegiatan = trim($_GET['kegiatan'] ?? '');
$jumlah = trim($_GET['jumlah'] ?? '');

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pendaftaran Berhasil</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 600px;
            max-width: 90%;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .success {
            text-align: center;
            font-weight: bold;
        }

        .data {
            margin-top: 20px;
        }

        .data p {
            margin: 10px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Pendaftaran Berhasil</h1>

    <p class="success">
        Terima kasih, <?= e($nama) ?>.
    </p>

    <h3>Ringkasan Pendaftaran</h3>

    <div class="data">

        <p>
            <strong>Nama:</strong>
            <?= e($nama) ?>
        </p>

        <p>
            <strong>NIM:</strong>
            <?= e($nim) ?>
        </p>

        <p>
            <strong>Program Studi:</strong>
            <?= e($programStudi) ?>
        </p>

        <p>
            <strong>Kegiatan:</strong>
            <?= e($kegiatan) ?>
        </p>

        <p>
            <strong>Jumlah Peserta:</strong>
            <?= e($jumlah) ?>
        </p>

    </div>

    <p>
        Data pendaftaran berhasil diproses.
    </p>

    <a href="form.php">
        Kembali ke Form
    </a>

</div>

</body>

</html>