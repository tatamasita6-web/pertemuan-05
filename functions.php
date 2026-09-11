<?php

function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

function validasiNama(string $nama): string
{
    if ($nama === '') {
        return 'Nama wajib diisi.';
    }

    if (mb_strlen($nama) < 3) {
        return 'Nama minimal 3 karakter.';
    }

    return '';
}

function validasiNim(string $nim): string
{
    if ($nim === '') {
        return 'NIM wajib diisi.';
    }

    if (!preg_match('/^[0-9]{8,15}$/', $nim)) {
        return 'NIM harus berupa 8 sampai 15 digit.';
    }

    return '';
}

function validasiEmail(string $email): string
{
    if ($email === '') {
        return 'Email wajib diisi.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Format email tidak valid.';
    }

    return '';
}

function validasiPilihan(
    string $nilai,
    array $daftar,
    string $namaField
): string {
    if ($nilai === '') {
        return $namaField . ' wajib dipilih.';
    }

    if (!in_array($nilai, $daftar, true)) {
        return $namaField . ' tidak valid.';
    }

    return '';
}

function validasiJumlah(string $jumlah): string
{
    if ($jumlah === '') {
        return 'Jumlah peserta wajib diisi.';
    }

    if (!preg_match('/^[0-9]+$/', $jumlah)) {
        return 'Jumlah peserta harus berupa angka.';
    }

    $jumlahInt = (int) $jumlah;

    if ($jumlahInt < 1 || $jumlahInt > 3) {
        return 'Jumlah peserta harus 1 sampai 3.';
    }

    return '';
}

function validasiPersetujuan(bool $persetujuan): string
{
    if (!$persetujuan) {
        return 'Persetujuan wajib dicentang.';
    }

    return '';
}