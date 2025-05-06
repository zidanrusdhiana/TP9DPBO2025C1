<?php

include("presenter/ProsesMahasiswa.php");

$pm = new ProsesMahasiswa();

// Inisialisasi variabel
$id = "";
$nim = "";
$nama = "";
$tempat = "";
$tl = "";
$gender = "";
$email = "";
$telepon = "";
$title = "Tambah";
$action = "tambah";
$gender_l = "";
$gender_p = "";

// Jika mode edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = "Edit";
    $action = "update";
    
    // Ambil data mahasiswa berdasarkan id
    $data = $pm->getMahasiswaById($id);
    if (!empty($data)) {
        $nim = $data[0]->getNim();
        $nama = $data[0]->getNama();
        $tempat = $data[0]->getTempat();
        $tl = $data[0]->getTl();
        $gender = $data[0]->getGender();
        $email = $data[0]->getEmail();
        $telepon = $data[0]->getTelepon();
        
        // Set selected untuk dropdown gender
        if ($gender == 'L') {
            $gender_l = "selected";
        } else if ($gender == 'P') {
            $gender_p = "selected";
        }
    }
}

// Proses form submission
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    
    if ($_POST['action'] == 'tambah') {
        // Tambah data baru
        $pm->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telepon);
    } else if ($_POST['action'] == 'update') {
        // Update data
        $id = $_POST['id'];
        $pm->updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telepon);
    }
    
    // Redirect ke halaman utama
    header("location: index.php");
    exit; // Pastikan script berhenti setelah redirect
}

// Menggunakan template untuk form
$tpl = new Template("templates/form.html");

// Mengganti kode template dengan data
$tpl->replace("DATA_TITLE", $title);
$tpl->replace("DATA_ACTION", $action);
$tpl->replace("DATA_ID", $id);
$tpl->replace("DATA_NIM", $nim);
$tpl->replace("DATA_NAMA", $nama);
$tpl->replace("DATA_TEMPAT", $tempat);
$tpl->replace("DATA_TL", $tl);
$tpl->replace("DATA_GENDER_L", $gender_l);
$tpl->replace("DATA_GENDER_P", $gender_p);
$tpl->replace("DATA_EMAIL", $email);
$tpl->replace("DATA_TELEPON", $telepon);

// Menampilkan template
$tpl->write();

?>
