<!-- awal isi -->
<div id="isi" class="col-sm-10">
    <div class="row" style="margin:0px">
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;</span>Surat</li>
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
    <div class="col-md-12" style="margin:0px">
        <div class="col-lg-6">
            <a href="<?php echo base_url() ?>proses/form"><button type="button" class="btn btn-primary">Buat Surat</button></a>
        </div>
        <div class="col-lg-6">
            <?php echo form_open_multipart('proses/cari'); ?>
            <div class="input-group">
              <input type="text" name="cari" class="form-control" placeholder="Masukan nama yang dicari....">
              <span class="input-group-btn">
                  <input class="btn btn-default" type="submit"value="Cari">
              </span>
            </div><br>
            <?php echo form_close(); ?>
        </div>
    </div>
    <div class="row" style="margin:0px">
        <table class="table table-hover" style="background-color: white;">
            <tr style="background-color: #3B668E;"><th width="3%">No</th><th width="15%">Nama</th><th width="15%">No. KTP</th><th width="15%">No. KK</th><th width="15%">Keperluan</th><th width="15%">Tanggal</th><th width="22%">Aksi</th></tr>
            <?php
            if (isset($start)) {
                $i = $start + 1;
            } else {
                $i = 1;
            }
            if(!empty($daftar_surat)){
            foreach ($daftar_surat as $daftar) {
                echo'<tr><td>' . $i . '</td><td>' . $daftar['nama'] . '</td><td>' . $daftar['no_ktp'] . '</td><td>' . $daftar['no_kk'] . '</td><td>' . $daftar['keperluan'] . '</td><td>' . $daftar['tanggal'] . '</td>'
                . '<td><a class="btn btn-default" href="' . base_url() . 'proses/lihat/' . $daftar["id_surat"] . '">'
                . '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>&nbsp'
                . '<a class="btn btn-default" href="' . base_url() . 'proses/salin/' . $daftar["id_surat"] . '">'
                . '<span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a>&nbsp'
                . '<a class="btn btn-default" href="' . base_url() . 'proses/cetak/' . $daftar["id_surat"] . '">'
                . '<span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>&nbsp'
                . '<a class="btn btn-default" href="' . base_url() . 'proses/form/' . $daftar["id_surat"] . '">'
                . '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>&nbsp'
                . '<button data-toggle="modal" data-target="#hapus_alert" data-title="Hapus" data-id_surat=' . $daftar['id_surat'] . ' class="btn btn-default">'
                . '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>'
                . '</tr>';
                $i++;
            }}else{
                $message='Hasil tidak ditemukan !';
                echo '<tr><td colspan="7" class="alert alert-danger" role="alert">' . $message . '</td></tr>';
            }
            ?>

        </table>
    </div>
    <div id="pagination" class="col-md-12">
        <nav>
            <ul>
                <?php
                if(isset($links)){
                    foreach ($links as $link) {
                        echo '<li>' . $link . '</li>';
                    }
                }
                ?>
            </ul>
        </nav><br><br><br><br><br><br>
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
                <p>Anda yakin akan menghapus surat ini ? </p>
            </div>
            <div class="modal-footer">
                <form name="alert_hapus" method="POST" action="<?php echo base_url('proses/hapus') ?>">
                    <input type="hidden" name="id_surat"/>
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
                    var id_surat = button.data('id_surat');
                    document.alert_hapus.id_surat.value = id_surat;
                    $(this).find('.modal-title').text(titleData + ' Surat');
                });
</script>
</body>
</html>