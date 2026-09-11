<?php

require_once 'functions.php';

$nama = trim($_POST['nama'] ?? '');
$nim = trim($_POST['nim'] ?? '');
$email = trim($_POST['email'] ?? '');
$programStudi = trim($_POST['program_studi'] ?? '');
$kegiatan = trim($_POST['kegiatan'] ?? '');
$jumlahPeserta = trim($_POST['jumlah_peserta'] ?? '');
$persetujuan = isset($_POST['persetujuan']);

$programStudiValid = [
    'Manajemen Informatika',
    'Sistem Informasi',
    'Teknik Informatika'
];

$kegiatanValid = [
    'Seminar',
    'Workshop',
    'Pelatihan'
];

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $error = validasiNama($nama);

    if ($error !== '') {
        $errors['nama'] = $error;
    }

    $error = validasiNim($nim);

    if ($error !== '') {
        $errors['nim'] = $error;
    }

    $error = validasiEmail($email);

    if ($error !== '') {
        $errors['email'] = $error;
    }

    $error = validasiPilihan(
        $programStudi,
        $programStudiValid,
        'Program studi'
    );

    if ($error !== '') {
        $errors['program_studi'] = $error;
    }

    $error = validasiPilihan(
        $kegiatan,
        $kegiatanValid,
        'Kegiatan'
    );

    if ($error !== '') {
        $errors['kegiatan'] = $error;
    }

    $error = validasiJumlah($jumlahPeserta);

    if ($error !== '') {
        $errors['jumlah_peserta'] = $error;
    }

    $error = validasiPersetujuan($persetujuan);

    if ($error !== '') {
        $errors['persetujuan'] = $error;
    }

    if ($errors === []) {

        header(
            'Location: sukses.php?' .
            'nama=' . urlencode($nama) .
            '&nim=' . urlencode($nim) .
            '&program_studi=' . urlencode($programStudi) .
            '&kegiatan=' . urlencode($kegiatan) .
            '&jumlah=' . urlencode($jumlahPeserta)
        );

        exit;
    }
}

$judul = 'Pendaftaran Kegiatan';

require 'components/header.php';

?>

<h2>Form Pendaftaran Kegiatan</h2>

<form method="post" novalidate>

    <label>Nama</label>

    <input
        type="text"
        name="nama"
        value="<?= e($nama) ?>"
    >

    <?php if (isset($errors['nama'])): ?>

        <div class="error">
            <?= e($errors['nama']) ?>
        </div>

    <?php endif; ?>


    <label>NIM</label>

    <input
        type="text"
        name="nim"
        value="<?= e($nim) ?>"
    >

    <?php if (isset($errors['nim'])): ?>

        <div class="error">
            <?= e($errors['nim']) ?>
        </div>

    <?php endif; ?>


    <label>Email</label>

    <input
        type="email"
        name="email"
        value="<?= e($email) ?>"
    >

    <?php if (isset($errors['email'])): ?>

        <div class="error">
            <?= e($errors['email']) ?>
        </div>

    <?php endif; ?>


    <label>Program Studi</label>

    <select name="program_studi">

        <option value="">-- Pilih Program Studi --</option>

        <?php foreach ($programStudiValid as $item): ?>

            <option
                value="<?= e($item) ?>"
                <?= $programStudi === $item ? 'selected' : '' ?>
            >
                <?= e($item) ?>
            </option>

        <?php endforeach; ?>

    </select>

    <?php if (isset($errors['program_studi'])): ?>

        <div class="error">
            <?= e($errors['program_studi']) ?>
        </div>

    <?php endif; ?>


    <label>Kegiatan</label>

    <select name="kegiatan">

        <option value="">-- Pilih Kegiatan --</option>

        <?php foreach ($kegiatanValid as $item): ?>

            <option
                value="<?= e($item) ?>"
                <?= $kegiatan === $item ? 'selected' : '' ?>
            >
                <?= e($item) ?>
            </option>

        <?php endforeach; ?>

    </select>

    <?php if (isset($errors['kegiatan'])): ?>

        <div class="error">
            <?= e($errors['kegiatan']) ?>
        </div>

    <?php endif; ?>


    <label>Jumlah Peserta</label>

    <input
        type="number"
        name="jumlah_peserta"
        min="1"
        max="3"
        value="<?= e($jumlahPeserta) ?>"
    >

    <?php if (isset($errors['jumlah_peserta'])): ?>

        <div class="error">
            <?= e($errors['jumlah_peserta']) ?>
        </div>

    <?php endif; ?>


    <label>

        <input
            type="checkbox"
            name="persetujuan"
            value="1"
            <?= $persetujuan ? 'checked' : '' ?>
        >

        Saya menyetujui pendaftaran kegiatan ini.

    </label>

    <?php if (isset($errors['persetujuan'])): ?>

        <div class="error">
            <?= e($errors['persetujuan']) ?>
        </div>

    <?php endif; ?>


    <button type="submit">
        Daftar
    </button>

</form>

<?php

require 'components/footer.php';

?>