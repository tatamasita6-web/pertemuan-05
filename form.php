<?php

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$jumlah = filter_input(INPUT_POST, 'jumlah', FILTER_VALIDATE_INT);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($nama === '') {
        $errors['nama'] = 'Nama wajib diisi.';
    } elseif (mb_strlen($nama) < 3) {
        $errors['nama'] = 'Nama minimal 3 karakter.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format email tidak valid.';
    }

    if (
        $jumlah === false ||
        $jumlah === null ||
        $jumlah < 1 ||
        $jumlah > 5
    ) {
        $errors['jumlah'] = 'Jumlah peserta harus 1 sampai 5.';
    }

    if ($errors === []) {
        header(
            'Location: sukses.php?nama=' .
            urlencode($nama)
        );
        exit;
    }
}

function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran</title>
</head>

<body>

<h1>Form Pendaftaran</h1>

<form method="post" novalidate>

    <label>
        Nama:
        <input
            type="text"
            name="nama"
            value="<?= e($nama) ?>"
        >
    </label>

    <br>

    <?php if (isset($errors['nama'])): ?>
        <small>
            <?= e($errors['nama']) ?>
        </small>
    <?php endif; ?>

    <br><br>

    <label>
        Email:
        <input
            type="email"
            name="email"
            value="<?= e($email) ?>"
        >
    </label>

    <br>

    <?php if (isset($errors['email'])): ?>
        <small>
            <?= e($errors['email']) ?>
        </small>
    <?php endif; ?>

    <br><br>

    <label>
        Jumlah peserta:
        <input
            type="number"
            name="jumlah"
            min="1"
            max="5"
            value="<?= e($_POST['jumlah'] ?? '1') ?>"
        >
    </label>

    <br>

    <?php if (isset($errors['jumlah'])): ?>
        <small>
            <?= e($errors['jumlah']) ?>
        </small>
    <?php endif; ?>

    <br><br>

    <button type="submit">
        Daftar
    </button>

</form>

</body>
</html>