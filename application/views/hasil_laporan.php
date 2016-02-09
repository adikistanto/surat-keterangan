<!-- awal isi -->
<div id="isi" class="col-sm-10">
    <div class="row" style="margin:0px">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('laporan') ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;</span>Laporan</a></li>
        </ol>
    </div>
    <div id="message" class="row col-md-12">
        <?php
        if (isset($error)) {
             echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }else{
             echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
        }
        ?>
    </div>
    <div class="row" style="margin:0px">
        <table class="table table-hover" style="background-color: white;">
            <tr style="background-color: #3B668E;"><th>No</th><th>Nama</th><th>Jenis Kelamin</th><th>Tempat Lahir</th><th>Tanggal Lahir</th><th>No. KTP</th><th>No. KK</th><th>RW</th><th>RT</th><th>Keperluan</th><th>Tanggal</th></tr>
            <?php
            if (isset($start)) {
                $i = $start + 1;
            } else {
                $i = 1;
            }
            foreach ($laporan as $daftar) {
                echo'<tr><td>' . $i . '</td>'
                        . '<td>' . $daftar['nama'] . '</td>'
                        . '<td>' . $daftar['jenis_kelamin'] . '</td>'
                        . '<td>' . $daftar['tempat_lahir'] . '</td>'
                        . '<td>' . date("d M Y", strtotime($daftar['tanggal_lahir'])) . '</td>'
                        . '<td>' . $daftar['no_ktp'] . '</td>'
                        . '<td>' . $daftar['no_kk'] . '</td>'
                        . '<td>' . $daftar['rw'] . '</td>'
                        . '<td>' . $daftar['rt'] . '</td>'
                        . '<td>' . $daftar['keperluan'] . '</td>'
                        . '<td>' . date("d M Y", strtotime($daftar['tanggal'])) . '</td>'
                . '</tr>';
                $i++;
            }
            ?>

        </table>
        <?php
            if($jenis_laporan==1){
                echo"<a class='btn btn-default' type='button' href='".base_url()."laporan/cetak_laporan_periode/".$tanggal_awal."/".$tanggal_akhir."'>Cetak</a>";
            }else if($jenis_laporan==2){
                echo"<a class='btn btn-default' type='button' href='".base_url()."laporan/cetak_laporan_gender/".$tanggal_awal."/".$tanggal_akhir."/".$jenis_kelamin."'>Cetak</a>";
            }else if($jenis_laporan==3){
                echo"<a class='btn btn-default' type='button' href='".base_url()."laporan/cetak_laporan_rw/".$tanggal_awal."/".$tanggal_akhir."/".$rw."'>Cetak</a>";
            }else if($jenis_laporan==4){
                echo"<a class='btn btn-default' type='button' href='".base_url()."laporan/cetak_laporan_rt/".$tanggal_awal."/".$tanggal_akhir."/".$rw."/".$rt."'>Cetak</a>";
            }
        ?>
        <a class='btn btn-default' href="<?php echo base_url('laporan') ?>">Kembali</a>
    </div>
</div>
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
</script>
</body>
</html>