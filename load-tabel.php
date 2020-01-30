<?php
require 'data-siswa.php';

$kelas = isset($_REQUEST['kelas']) ? $_REQUEST['kelas'] : NULL


?>
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
                        style="font-family:'Poppins', sans-serif;" data-id="<?= $key ?>" data-nama="<?= $namasiswa  ?>"
                        data-modal="#modal-center"> <b>HAPUS</b> </a></td>
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
                        style="font-family:'Poppins', sans-serif;" data-id="<?= $key ?>" data-nama="<?= $namasiswa  ?>"
                        data-modal="#modal-center"> <b>HAPUS</b> </a></td>
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

</div>

<?php
    require 'file-hapus.php';
?>