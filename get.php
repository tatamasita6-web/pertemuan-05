<?php

$kataKunci = trim($_GET['q'] ?? '');
$kategori = $_GET['kategori'] ?? 'semua';

$kategoriValid = [
    'semua',
    'minuman',
    'makanan',
    'alat-tulis'
];

if (!in_array($kategori, $kategoriValid, true)) {
    $kategori = 'semua';
}

?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencarian Produk</title>
</head>

<body>

    <h1>Pencarian Produk dengan GET</h1>

    <p>
        Halaman ini menggunakan metode GET untuk menerima
        kata kunci dan kategori.
    </p>

    <form method="get">

        <label>
            Kata kunci:
            <input
                type="text"
                name="q"
                value="<?= htmlspecialchars($kataKunci, ENT_QUOTES, 'UTF-8') ?>"
            >
        </label>

        <br><br>

        <label>
            Kategori:
            <select name="kategori">

                <?php foreach ($kategoriValid as $item): ?>

                    <option
                        value="<?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?>"
                        <?= $kategori === $item ? 'selected' : '' ?>
                    >
                        <?= htmlspecialchars(
                            ucwords(str_replace('-', ' ', $item)),
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </option>

                <?php endforeach; ?>

            </select>
        </label>

        <br><br>

        <button type="submit">Cari</button>

    </form>

    <?php if ($kataKunci !== ''): ?>

        <p>
            Mencari:
            <strong>
                <?= htmlspecialchars(
                    $kataKunci,
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </strong>
        </p>

        <p>
            Kategori:
            <?= htmlspecialchars(
                ucwords(str_replace('-', ' ', $kategori)),
                ENT_QUOTES,
                'UTF-8'
            ) ?>
        </p>

    <?php endif; ?>

</body>
</html>