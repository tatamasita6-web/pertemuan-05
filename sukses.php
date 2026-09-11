<?php

require_once 'functions.php';

$nama = trim($_GET['nama'] ?? 'Peserta');
$nim = trim($_GET['nim'] ?? '');
$programStudi = trim($_GET['program_studi'] ?? '');
$kegiatan = trim($_GET['kegiatan'] ?? '');
$jumlah = trim($_GET['jumlah'] ?? '');

$judul = 'Pendaftaran Berhasil';

require 'components/header.php';

?>

<h2 class="success">
    Pendaftaran Berhasil
</h2>

<p>
    Terima kasih, <?= e($nama) ?>.
</p>

<h3>Ringkasan Pendaftaran</h3>

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

<p>
    Data pendaftaran berhasil diproses.
</p>

<a href="form.php">
    Kembali ke Form
</a>

<?php

require 'components/footer.php';

?>