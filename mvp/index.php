<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

// Proses hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $tp = new ProsesMahasiswa();
    $tp->deleteMahasiswa($id);
    header("location: index.php");
    exit;
}

$tp = new TampilMahasiswa();
$data = $tp->tampil();
