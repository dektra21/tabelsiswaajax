<?php
require 'data-siswa.php';
$kelas = isset($_GET['kelas']) ? $_GET['kelas'] : NULL

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <title>Tabel Siswa</title>
    <style>
        .uk-button-danger:hover {
            color: #f0506e;
            background-color: white;
            border-color: #f0506e;
            transition: 0.10s;
        }

        .uk-button-primary:hover {
            color: #1e87f0;
            background-color: white;
            border-color: #1e87f0;

        }

        .uk-button-default:hover {
            transition: 0.10s;
            border-color: black;
        }
    </style>
</head>

<body>


    <div class="uk-position-center">
        <div class="uk-card uk-padding">
            <h1 style="color:#1e87f0; font-family:'Poppins', sans-serif;"> <b>Data Siswa <span class="kelassiswa"></span></b> </h1>
            <div class=" uk-text-right">
                <a href="#modal-sections" class="uk-button uk-button-primary" style="font-family:'Poppins', sans-serif;"
                    uk-toggle> <b>Tambah
                        Data Siswa</b> </a>
                <div class="uk-inline uk-text-left">
                    <button class="uk-button uk-button-default" type="button"
                        style="font-family:'Poppins', sans-serif;"> <b>KELAS</b> <span
                            uk-icon="icon:  triangle-down"></span></button>
                    <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
                        <ul class="uk-nav uk-dropdown-nav">
                            <li><a href="index.php">Semua Kelas</a></li>
                            <li><a href="#" class="listkelas" data-kelas="XI RPL 1">XI RPL 1</a>
                            </li>
                            <li><a href="#" class="listkelas" data-kelas="XI RPL 2">XI RPL 2</a>
                            </li>
                            <li><a href="#" class="listkelas" data-kelas="XI MM 1">XI MM 1</a>
                            </li>
                            <li><a href="#" class="listkelas" data-kelas="XI MM 2">XI MM 2</a>
                            </li>
                            <li><a href="#" class="listkelas" data-kelas="XI TKJ 1">XI TKJ 2</a>
                            </li>
                            <li><a href="#" class="listkelas" data-kelas="XI TKJ 2">XI TKJ 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="tabelsiswa">

                <table class="uk-table uk-table-justify uk-table-divider">

                    <thead>
                        <tr>
                            <th class="uk-text-center">No</th>
                            <th class="uk-text-center uk-width-small">Nama</th>
                            <th class="uk-text-center">NIS</th>
                            <th class="uk-text-center">Kelas</th>
                            <th class="uk-text-center">No. Telp</th>
                            <th class="uk-text-center">Alamat</th>
                            <th class="uk-text-center uk-width-small"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($_SESSION['datasiswa'] as $key=>$value):
                                $namasiswa = $value['nama'];
                                $nissiswa = $value['nis'];
                                $kelassiswa = $value['kelas'];
                                $telponsiswa = $value['telpon'];
                                $alamatsiswa = $value['alamat'];
                                //jika kelas nya belum dicari
                                if ($kelas == NULL) {

                            
                        ?>
                        <tr class="uk-text-center">
                            <td><?= $i ?></td>
                            <td><?=  $namasiswa ?></td>
                            <td><?=  $nissiswa ?></td>
                            <td><?=  $kelassiswa ?></td>
                            <td><?=  $telponsiswa ?></td>
                            <td><?= $alamatsiswa ?></td>
                            <td><a href="#" class="uk-button uk-button-danger tombol-hapus" type="button"
                                    style="font-family:'Poppins', sans-serif;" data-id="<?= $key ?>"
                                    data-nama="<?= $namasiswa  ?>" data-modal="#modal-center"> <b>HAPUS</b> </a></td>
                        </tr>
                        <?php
                            } 
                        else{
                            if ($kelas == $value['kelas']) {
                        ?>
                        <tr class="uk-text-center">
                            <td><?= $i ?></td>
                            <td><?=  $namasiswa ?></td>
                            <td><?=  $nissiswa ?></td>
                            <td><?=  $kelassiswa ?></td>
                            <td><?=  $telponsiswa ?></td>
                            <td><?= $alamatsiswa ?></td>
                            <td><a href="#" class="uk-button uk-button-danger tombol-hapus" type="button"
                                    style="font-family:'Poppins', sans-serif;" data-id="<?= $key ?>"
                                    data-nama="<?= $namasiswa  ?>" data-modal="#modal-center"> <b>HAPUS</b> </a></td>
                        </tr>
                        <?php
                        }
                    }   
                        ?>
                        <?php
                        $i++;
                        endforeach;
                    ?>
                    </tbody>

                </table>
                <?php
                    require 'file-hapus.php';
                ?>
            </div>

        </div>
    </div>


    <!-- FORM TAMBAH DATA NYA -->
    <div id="modal-sections" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title" style="color:#1e87f0; font-family:'Poppins', sans-serif; margin-right:20px;"
                    align="center"> <b>Tambah Data Siswa</b> </h2>
            </div>
            <div class="uk-modal-body">
                <form id="formsiswa" action="prosestambahdatasiswa.php" method="post">
                    <div class="uk-margin">
                        Nama Siswa
                        <input class="uk-input" name="namasiswa" type="text" placeholder="Masukkan Nama Siswa...."
                            required>
                    </div>
                    <div class="uk-margin">
                        NIS
                        <input class="uk-input" name="nissiswa" type="text" placeholder="Masukkan NIS Siswa...."
                            required>
                    </div>
                    <div class="uk-margin">
                        Kelas
                        <select class="uk-input" name="kelassiswa" id="" required>
                            <option value="">Pilih Kelas</option>
                            <option value="XI RPL 1">XI RPL 1</option>
                            <option value="XI RPL 2">XI RPL 2</option>
                            <option value="XI MM 1">XI MM 1</option>
                            <option value="XI MM 2">XI MM 2</option>
                            <option value="XI TKJ 1">XI TKJ 1</option>
                            <option value="XI TKJ 2">XI TKJ 2</option>
                        </select>
                    </div>
                    <div class="uk-margin">
                        No. Telp
                        <input class="uk-input" name="telponsiswa" type="text" placeholder="Masukkan No. Telp Siswa...."
                            required>
                    </div>
                    <div class="uk-margin">
                        Alamat
                        <input class="uk-input" name="alamatsiswa" type="text" placeholder="Masukkan Alamat Siswa...."
                            required>
                    </div>

            </div>
            <div class="uk-modal-footer uk-text-right">
                <button id="submitform" class="uk-button uk-button-primary" type="submit"> <b> Tambah Data</b></button>
            </div>
            </form>
        </div>
    </div>
    <!-- PENUTUP FORM TAMBAH DATA NYA -->

    <script>
        $(document).ready(function () {
            $(".listkelas").on("click", function () {
                // action list kelas nya
                var btn = $(this),
                    kelas = btn.data('kelas');

                $("#tabelsiswa").html('<br><br><br><center><div uk-spinner="ratio: 2"></div></center>');

                setTimeout(() => {
                    $("#tabelsiswa").load("load-tabel.php", {kelas: kelas});
                    $(".kelassiswa").html(kelas);
                }, 800);

                return false;
            })

            var form;
            $('#formsiswa').submit(function (event) {
                if (form) {
                    form.abort();
                }

                form = $.ajax({
                    url: 'prosestambahdatasiswa.php',
                    type: "POST",
                    beforeSend: function () {
                        $('#submitform').html('Loading...');
                    },
                    data: $('#formsiswa').serialize(),

                    cache: false,

                });

                console.log($('#formsiswa').serialize());

                form.done(function (data) {
                    console.log(data);

                    // untuk load data
                    if (data == "berhasil") {
                        setTimeout(function () {
                            $('#submitform').html('Yes');
                            $('#tabelsiswa').load("load-tabel.php");

                            UIkit.modal("#modal-sections").hide();
                        }, 800);
                    } else {
                        alert("gagal BOSS!1!1");
                    }


                    // untuk refresh halaman
                    // window.location = 'index.php';
                });

                form.always(function () {
                    $("#formsiswa").find('input').val("");
                    $("#formsiswa").find('select').val("");
                    $("#formsiswa").find('textarea').val("");
                });

                event.preventDefault();
            })
        })
    </script>
</body>

</html>