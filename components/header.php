<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= e($judul ?? 'Pendaftaran Kegiatan') ?></title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            width: 600px;
            max-width: 90%;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 4px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .success {
            color: green;
            font-weight: bold;
        }

    </style>

</head>

<body>

<header>

    <h1>Pendaftaran Kegiatan Mahasiswa</h1>

</header>

<main>