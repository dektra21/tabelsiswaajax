<?php
require 'data-siswa.php';

$namasiswa = isset($_POST['namasiswa'])? $_POST['namasiswa']:NULL;
$nissiswa = isset($_POST['nissiswa'])? $_POST['nissiswa']:NULL;
$kelassiswa = isset($_POST['kelassiswa'])? $_POST['kelassiswa']:NULL;
$telponsiswa = isset($_POST['telponsiswa'])? $_POST['telponsiswa']:NULL;
$alamatsiswa = isset($_POST['alamatsiswa'])? $_POST['alamatsiswa']:NULL;

$totaldatasiswa =array_keys($_SESSION['datasiswa']);

$keybarusiswa = end($totaldatasiswa) + 1;

$_SESSION['datasiswa'][$keybarusiswa] = [

        'nama' => $namasiswa,
        'nis' => $nissiswa,
        'kelas' => $kelassiswa,
        'telpon'=> $telponsiswa,
        'alamat' => $alamatsiswa

];

// $keys = array_keys($array); 
// $x = $array[$keys[count($keys)-1]];

echo "berhasil";

?>