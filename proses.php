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

$errors['nama'] = validasiNama($nama);

$errors['nim'] = validasiNim($nim);

$errors['email'] = validasiEmail($email);

$errors['program_studi'] = validasiPilihan(
    $programStudi,
    $programStudiValid,
    'Program studi'
);

$errors['kegiatan'] = validasiPilihan(
    $kegiatan,
    $kegiatanValid,
    'Kegiatan'
);

$errors['jumlah_peserta'] = validasiJumlah($jumlahPeserta);

$errors['persetujuan'] = validasiPersetujuan($persetujuan);

$errors = array_filter($errors);

if ($errors !== []) {

    $judul = 'Form Pendaftaran';

    require 'components/header.php';

    ?>

    <h2>Form Pendaftaran</h2>

    <p class="error">
        Terdapat kesalahan pada data yang dimasukkan.
    </p>

    <?php

    require 'components/footer.php';

    exit;
}

$nama = urlencode($nama);
$nim = urlencode($nim);
$programStudi = urlencode($programStudi);
$kegiatan = urlencode($kegiatan);
$jumlahPeserta = urlencode($jumlahPeserta);

header(
    'Location: sukses.php?' .
    'nama=' . $nama .
    '&nim=' . $nim .
    '&program_studi=' . $programStudi .
    '&kegiatan=' . $kegiatan .
    '&jumlah=' . $jumlahPeserta
);

exit;