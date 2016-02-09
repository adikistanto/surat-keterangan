<!-- awal isi -->
<div id="isi" class="col-sm-10">
    <ol class="breadcrumb">
           <li><a href="<?php echo base_url('proses') ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;</span>Surat</a></li>
            <li class="active">Preview Surat Keterangan</li>
    </ol>
    <h3>[PREVIEW]</h3><br>
    <div id="preview" class="col-lg-10" style="background-color: #fff;padding:20px 60px 20px 60px;color:black">
    <div id="kop_surat" class="row">
        <center>
            <h2>PEMERINTAH DESA PLADEN</h2>
            <h3>KECAMATAN JEKULO</h3>
            <h3>KABUPATEN KUDUS</h3>
        </center>
        <hr style="margin:5px 0px 0px 0px;padding:0px;border-top: 3px solid black">
        <hr style="margin:2px 0px 0px 0px;padding:0px;border-top: 1px solid black">
    </div>
        <?php
        $bulan=array();
        $bulan['01']= 'Januari';$bulan['02']= 'Februari';$bulan['03']= 'Maret';$bulan['04']= 'April';$bulan['05']= 'Mei';$bulan['06']= 'Juni';
        $bulan['07']= 'Juli';$bulan['08']= 'Agustus';$bulan['09']= 'September';$bulan['10']= 'Oktober';$bulan['11']= 'November';$bulan['12']= 'Desember';
    ?>
    <p class="row"> No. Kode Desa :</p>
    <div class="row">
        <table style="margin-left:auto;margin-right:auto">
            <tr>
                <td rowspan="3"><b>SURAT&nbsp;&nbsp;&nbsp;</b></td>
                <td><b>KETERANGAN</b></td>
            </tr>
            <tr>
                <td><hr style="margin:0px;padding:0px;border-top: 1px solid black"></td>
                
            </tr>
            <tr>
                <td><b>PENGANTAR</b></td>
                
            </tr>
        </table>
    </div>
    <center class="row">
        <hr style="margin:5px 0px 5px 0px;padding:0px;border-top: 1px solid black; width:300px">
        <h4>Nomor ..... / ...... / ......</h4><br><br>
        <p>Yang bertanda tangan di bawah ini,menerangkan bahwa :</p>
    </center>
    <table class="row">
        <tr><td width="30px"></td><td width="200px"></td><td width="650px"></td></tr>
        <?php foreach($daftar_surat as $daftar){
            if($daftar['jenis_kelamin']=='laki_laki'){
                $jenis_kelamin='Laki - laki';
            }else if($daftar['jenis_kelamin']=='perempuan'){
                $jenis_kelamin='Perempuan';
            }
            echo"<tr><td>1.</td><td>Nama</td><td>:&nbsp;".$daftar['nama']."</td></tr>
        <tr><td>2.</td><td>Jenis Kelamin</td><td>:&nbsp;".$jenis_kelamin."</td></tr>
        <tr><td>3.</td><td>Tempat & Tanggal Lahir</td><td>:&nbsp;".$daftar['tempat_lahir']."&nbsp;;&nbsp; ". date("d", strtotime($daftar['tanggal_lahir'])).' '.$bulan[date("m", strtotime($daftar['tanggal_lahir']))] .' '.date("Y", strtotime($daftar['tanggal_lahir']))."</td></tr>
        <tr><td>4.</td><td>Kewarganegaraan & Agama </td><td>:&nbsp;Indonesia&nbsp;/&nbsp;".$daftar['agama']."</td></tr>
        <tr><td>5.</td><td>Pekerjaan</td><td>:&nbsp;".$daftar['pekerjaan']."</td></tr>
        <tr><td>6.</td><td>Tempat tinggal</td><td>:&nbsp;RT.&nbsp;".$daftar['rt']."&nbsp;RW.&nbsp;".$daftar['rw']." Desa Pladen Kec. Jekulo Kab. Kudus Prov. Jawa Tengah</td></tr>
        <tr><td valign='top'>7.</td><td valign='top'>Surat bukti diri</td><td>:&nbsp;KTP No. ".$daftar['no_ktp'].";&nbsp;&nbsp;&nbsp;KK No. ".$daftar['no_kk']."</td></tr>
        <tr><td valign='top'>8.</td><td valign='top'>Keperluan</td><td>:&nbsp;".$daftar['keperluan']."</td></tr>
        <tr><td>9.</td><td>Berlaku mulai</td><td>:&nbsp;". date("d", strtotime($daftar['tanggal_awal'])).' '.$bulan[date("m", strtotime($daftar['tanggal_awal']))] .' '.date("Y", strtotime($daftar['tanggal_awal']))." sampai " .date("d", strtotime($daftar['tanggal_akhir'])).' '.$bulan[date("m", strtotime($daftar['tanggal_akhir']))] .' '.date("Y", strtotime($daftar['tanggal_akhir']))."</td></tr>
        <tr><td valign='top'>10.</td><td valign='top'>Keterangan lain - lain *)</td><td>:&nbsp;".$daftar['keterangan']."</td></tr>";
        }?>
        
    </table>
    <center>
        <br><br><p>Demikian untuk menjadikan maklum bagi yang berkepentingan.</p>
        <p>Nomor    : .............................</p>  
        <p>Tanggal  : .............................</p>
    </center>
    
    <p align="right" class="row">Kudus,<?php foreach($daftar_surat as $daftar){ echo date("d", strtotime($daftar['tanggal'])).'  '.$bulan[date("m", strtotime($daftar['tanggal']))].'  '.date("Y", strtotime($daftar['tanggal']));}?></p>
    <table width="100%">
        <tr><td width="30%" align="center">
                Tanda tangan pemegang<br><br><br><br><br>
                <?php foreach($daftar_surat as $daftar){ echo $daftar['nama'];}?>
            </td>
            <td width="30%" align="center">
                Mengetahui,<br>
                Camat Jekulo<br><br><br><br>
                <?php foreach($camat as $daftar){ echo $daftar['nama_perangkat']."<br>".$daftar['nip'];}?>
            </td>
            <td width="30%" align="center">
                <?php foreach($penandatangan as $daftar){ 
                    if($daftar['jabatan']!='kades'){
                        echo"a.n. Kepala Desa Pladen <br><br><br>".$daftar['nama_perangkat'];
                    }else{
                        echo"Kepala Desa Pladen <br><br><br>".$daftar['nama_perangkat'];
                }}
                ?>
            </td>
        </tr>
    </table><br><br><br><br>
    </div><!-- akhir preview-->
    <div class="row col-lg-10">
        <br>
        <a href="<?php  foreach($daftar_surat as $daftar){echo base_url().'proses/cetak/'.$daftar['id_surat'];}  ?>" class="btn btn-default">Cetak</a>
        <button type="button" class="btn btn-default" onclick="javascript:history.go(-1)">Batal</button>
        <br><br>
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
<script>
    $('.datepicker').datepicker();
    $(' .datepicker').on('changeDate', function (ev) {
        //close when viewMode='0' (days)
        if (ev.viewMode === 'days') {
            $('.datepicker').datepicker('hide');
        }
    });
</script>
</body>
</html>