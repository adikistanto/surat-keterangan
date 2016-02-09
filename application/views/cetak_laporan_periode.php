<div id="isi" class="col-sm-10">
    <div class="row" style="margin:0px">
        <div class="col-lg-11">
            <h3 style="padding:0px;margin:0px">Pemerintah Desa Pladen</h3>
            <h4 style="padding:0px;margin:0px">Kecamatan Jekulo</h4>
            <h5 style="padding:0px;margin:0px">Kabupaten Kudus</h5><br>
        </div>
    </div>
    <div class="row" style="margin:0px">
        <h6 style="padding:0px;margin:0px 0px 10px 5px">Laporan Pembuatan Surat Keterangan / Pengantar periode :
            <?php echo date("d-m-Y", strtotime($tanggal_awal))  ." sampai ".date("d-m-Y", strtotime($tanggal_akhir))  ;?>
        </h6>
        <table class="table table-striped" style="background-color: white;font-size: 12px">
            <tr style="background-color: #3B668E;"><th align="center" width="25px">No</th><th width="150px">Nama</th><th width="50px" align="center">Jenis<br> Kelamin</th><th width="70px">Tempat<br> Lahir</th><th width="70px">Tanggal<br> Lahir</th><th width="25px">RW</th><th width="25px">RT</th><th width="200px">Keperluan</th><th width="70px">Tanggal</th></tr>
            <?php
            if (isset($start)) {
                $i = $start + 1;
            } else {
                $i = 1;
            }
            foreach ($laporan as $daftar) {
                if($daftar['jenis_kelamin']=='laki_laki'){
                    $jenis_kelamin = 'L';
                }else if($daftar['jenis_kelamin']=='perempuan'){
                    $jenis_kelamin = 'P';
                }
                echo'<tr><td align="center">' . $i . '</td>'
                        . '<td>&nbsp;' . $daftar['nama'] . '</td>'
                        . '<td align="center">' . $jenis_kelamin . '</td>'
                        . '<td>&nbsp;' . $daftar['tempat_lahir'] . '</td>'
                        . '<td>&nbsp;' . date("d-m-Y", strtotime($daftar['tanggal_lahir'])) . '</td>'
                        . '<td align="center">' . $daftar['rw'] . '</td>'
                        . '<td align="center">' . $daftar['rt'] . '</td>'
                        . '<td>&nbsp;' . $daftar['keperluan'] . '</td>'
                        . '<td>&nbsp;' . date("d M Y", strtotime($daftar['tanggal'])) . '</td>'
                . '</tr>';
                $i++;
            }
            ?>

        </table>
    </div
    <center><br>
        <h6><small>Kepala Desa Pladen</small></h6><br>
        <h6><small><?php if(isset($kades)){echo $kades;}?></small></h6>
    </center>
</div>