<!-- awal isi -->
<div id="isi" class="col-sm-10">
    <div class="row" style="margin:0px">
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-wrench" aria-hidden="true">&nbsp;</span>Pengaturan</li>
        </ol>
    </div>
    <div id="message" class="row col-md-12">
        <?php
        if (isset($message)) {
            //cek apakah message sudah di assign
            if ($message != '') {
                if ($message) {
                    echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
                }
            }
        }
        ?>
    </div>
    <div class="row" style="margin:0px">
        <div class="col-lg-6">
            <a href="<?php echo base_url() ?>pengaturan/form"><button type="button" class="btn btn-primary">Tambah Perangkat</button></a>
        </div>
    </div><br>
    <div class="row" style="margin:0px">
        <table class="table table-hover" style="background-color: white;">
            <tr style="background-color: #3B668E;"><th>No</th><th>Nama</th><th>Jabatan</th><th>NIP</th><th>Alamat</th><th>Telpon</th><th>Penandatangan</th><th>Aksi</th></tr>
            <?php
            if (isset($start)) {
                $i = $start + 1;
            } else {
                $i = 1;
            }
            foreach ($perangkat as $daftar) {
                echo'<tr><td>' . $i . '</td><td>' . $daftar['nama_perangkat'] . '</td><td>' . $daftar['jabatan'] . '</td><td>' . $daftar['nip'] . '</td><td>' . $daftar['alamat_perangkat'] . '</td><td>' . $daftar['telp_perangkat'] . '</td><td>' . $daftar['penanda_tangan'] . '</td>'
                . '<td><a class="btn btn-default" href="' . base_url() . 'pengaturan/form/' . $daftar["id_perangkat"] . '">'
                . '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp'
                . '<button data-toggle="modal" data-target="#hapus_alert" data-title="Hapus" data-id_perangkat=' . $daftar['id_perangkat'] . ' class="btn btn-default">'
                . '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>'
                . '</tr>';
                $i++;
            }
            ?>

        </table>
    </div>
</div>
<!-- Hapus alert modal -->
<div id="hapus_alert" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus data ini ? </p>
            </div>
            <div class="modal-footer">
                <form name="alert_hapus" method="POST" action="<?php echo base_url('pengaturan/hapus') ?>">
                    <input type="hidden" name="id_perangkat"/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Hapus"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--akhir alert hapus penerimaan-->
<!-- akhir isi-->
</div>
<!-- akhir content-->
<div style="clear: both"></div>
<div class="footer"><!-- Footer-->
    <center><small>&copy;Pladen 2016<br> Developed by Tim 1 KKN Undip 2016</small>
    </center>
</div>
</div>
<script>
    $("#hapus_alert").on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget);  // Button that triggered the modal
                    var titleData = button.data('title');
                    var id_perangkat = button.data('id_perangkat');
                    document.alert_hapus.id_perangkat.value = id_perangkat;
                    $(this).find('.modal-title').text(titleData + ' Perangkat');
                });
</script>
</body>
</html>