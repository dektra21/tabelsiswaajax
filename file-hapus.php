<!-- MODAL HAPUS NYA -->
<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <h2 class="uk-modal-title" style="font-family:'Poppins', sans-serif; color: #f0506e;"> <b>Hapus
                Data</b>
        </h2>
        <p style="font-size:18px;">Yakin Mau Hapus Si <span class="nama"></span>?</p>
        <div class=" uk-text-right">
            <form action="hapus.php" method="post" id="hapusdata">
                <input type="hidden" name="id" value="" class="id">
                <button class="uk-button uk-button-primary uk-button-small uk-modal-close"
                    style="font-family:'Poppins', sans-serif; border-radius:50px;">Eh, Jangan Deh</button>

                <button type="submit" class="uk-button uk-button-danger uk-button-small"
                    style="font-family:'Poppins', sans-serif; border-radius:50px;" id="submithapus">Iya,
                    Aku Yakin</button>
            </form>
        </div>
    </div>
</div>
<!-- PENUTUP MODAL HAPUS NYA -->


<script>
    $(document).ready(function () {
        $(".tombol-hapus").on("click", function () {
            var btn = $(this),
                id = btn.data('id'),
                nama = btn.data('nama'),
                modal = btn.data('modal');


            // Kalau nama mau dimasukan ke input form
            $(modal).find('.id').val(id);

            // Kalau nama mau dimasukkan ke text
            $(modal).find('.nama').html(nama);

            // Untuk munculin atau close modal ada di dokumentasi UIKit
            UIkit.modal(modal).show();
            return false;

        })

        var deletedata;
        $('#hapusdata').submit(function (event) {
            if (deletedata) {
                deletedata.abort();
            }

            deletedata = $.ajax({
                url: 'hapus.php',
                type: "POST",
                beforeSend: function () {
                    $('#submithapus').html('Loading...');
                },
                data: $('#hapusdata').serialize(),

                cache: false,

            });

            console.log($('#hapusdata').serialize());

            deletedata.done(function (data) {
                console.log(data);
                UIkit.modal("#modal-center").hide();
                $('body').find('#modal-center').remove();
                // untuk load data
                if (data == "berhasil") {
                    $("#tabelsiswa").html(
                        '<br><br><br><center><div uk-spinner="ratio: 2"></div></center>');
                    setTimeout(function () {

                        $('#submithapus').html('Terhapus');
                        window.location = 'index.php';


                    }, 800);
                } else {
                    alert("gagal ngapus BOSS!1!1");
                }


                // untuk refresh halaman
                // window.location = 'index.php';
            });

            deletedata.always(function () {
                $("#hapusdata").find('input').val("");
                $("#hapusdata").find('select').val("");
                $("#hapusdata").find('textarea').val("");
            });

            event.preventDefault();
        })
    })
</script>