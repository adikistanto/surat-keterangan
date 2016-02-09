<?php

require_once("assets/dompdf/dompdf_config.inc.php");
$bulan=array();
        $bulan['01']= 'Januari';$bulan['02']= 'Februari';$bulan['03']= 'Maret';$bulan['04']= 'April';$bulan['05']= 'Mei';$bulan['06']= 'Juni';
        $bulan['07']= 'Juli';$bulan['08']= 'Agustus';$bulan['09']= 'September';$bulan['10']= 'Oktober';$bulan['11']= 'November';$bulan['12']= 'Desember';
        
foreach($daftar_surat as $daftar){
            if($daftar['jenis_kelamin']=='laki_laki'){
                $jenis_kelamin='Laki - laki';
            }else if($daftar['jenis_kelamin']=='perempuan'){
                $jenis_kelamin='Perempuan';
            } 
            $nama=$daftar['nama'];
            $tempat_lahir=$daftar['tempat_lahir'];
            $tanggal_lahir=date("d M Y", strtotime($daftar['tanggal_lahir']));
            $agama=$daftar['agama'];
            $pekerjaan=$daftar['pekerjaan'];
            $rt=$daftar['rt'];
            $rw=$daftar['rw'];
            $no_ktp=$daftar['no_ktp'];
            $no_kk=$daftar['no_kk'];
            $keperluan=$daftar['keperluan'];
            $tgl_awal=date("d M Y", strtotime($daftar['tanggal_awal']));
            $tgl_akhir=date("d M Y", strtotime($daftar['tanggal_akhir']));
            $tanggal=date("d", strtotime($daftar['tanggal']));;
            $bulan=$bulan[date("m", strtotime($daftar['tanggal']))];
            $tahun=date("Y", strtotime($daftar['tanggal']));;
            $keterangan=$daftar['keterangan'];
}

$html =
  '<html>'.
        '<head></head>'.
        '<body><div id="preview" class="col-lg-10" style="background-color: #fff;padding:20px 60px 20px 60px;color:black">'.
   '<div id="kop_surat" class="row">'.
        '<center>'.
            '<h3 style="margin:0px;padding:0px">PEMERINTAH DESA PLADEN</h3>'.
            '<h4 style="margin:0px;padding:0px">KECAMATAN JEKULO</h4>'.
            '<h5 style="margin:0px;padding:0px">KABUPATEN KUDUS</h4>'.
        '</center>'.
        '<hr style="margin:5px 0px 0px 0px;padding:0px;border-top: 3px solid black">'.
        '<hr style="margin:2px 0px 0px 0px;padding:0px;border-top: 1px solid black">'.
    '</div>'.
    '<p style="margin:2px 0px 0px 0px;padding:0px"> No. Kode Desa :</p>'.
    '<div>'.
        '<table style="margin-left:auto;margin-right:auto">'.
            '<tr>'.
                '<td rowspan="3"><b><small>SURAT</small>&nbsp;&nbsp;&nbsp;</b></td>'.
                '<td><b><small>KETERANGAN</small></b></td>'.
            '</tr>'.
            '<tr>'.
                '<td><hr style="margin-bottom:3px;margin-top:3px;padding:0px;border-top: 1px solid black"></td>'.
                
            '</tr>'.
            '<tr>'.
                '<td><b style="padding-top:10px"><small>PENGANTAR</small></b></td>'.
                
            '</tr>'.
        '</table>'.
    '</div>'.
    '<center>'.
        '<hr style="margin-left:auto;margin-right:auto;margin-top:3px;margin-bottom:3px;padding:0px;border-top: 1px solid black; width:300px">'.
        '<h6 style="margin-left:auto;margin-right:auto;margin-top:3px;margin-bottom:3px;padding:0px;">Nomor ..... / ...... / ......</h6>
        <p>Yang bertanda tangan di bawah ini,menerangkan bahwa :</p>
    </center>
    <table class="row">'.
        '<tr><td>1.</td><td>Nama</td><td>:&nbsp;'.$nama.'</td></tr>
        <tr><td>2.</td><td>Jenis Kelamin</td><td>:&nbsp;'.$jenis_kelamin.'</td></tr>
        <tr><td>3.</td><td>Tempat & Tanggal Lahir</td><td>:&nbsp;'.$tempat_lahir.'&nbsp;;&nbsp; '.$tanggal_lahir.'</td></tr>
        <tr><td>4.</td><td>Kewarganegaraan & Agama </td><td>:&nbsp;Indonesia&nbsp;/&nbsp;'.$agama.'</td></tr>
        <tr><td>5.</td><td>Pekerjaan</td><td>:&nbsp;'.$pekerjaan.'</td></tr>
        <tr><td>6.</td><td>Tempat tinggal</td><td>:&nbsp;RT.&nbsp;'.$rt.'&nbsp;RW.&nbsp;'.$rw.' Desa Pladen Kec. Jekulo </td></tr>
        <tr><td></td><td></td><td>&nbsp;&nbsp;Kab. Kudus Prov. Jawa Tengah</td></tr>
        <tr><td valign="top">7.</td><td valign="top">Surat bukti diri</td><td>:&nbsp;KTP No. '.$no_ktp.';&nbsp;&nbsp;&nbsp;</tr>
         <tr><td></td><td></td><td>&nbsp;&nbsp;KK No. '.$no_kk.'</td></td></tr>
        <tr><td valign="top">8.</td><td valign="top">Keperluan</td><td>:&nbsp;'.$keperluan.'</td></tr>
        <tr><td>9.</td><td>Berlaku mulai</td><td>:&nbsp;'. $tgl_awal.' sampai ' .$tgl_akhir .'</td></tr>
        <tr><td valign="top">10.</td><td valign="top">Keterangan lain - lain *)</td><td>:&nbsp;'.$keterangan.'</td></tr>
    </table>
    <center>
        <p>Demikian untuk menjadikan maklum bagi yang berkepentingan.</p>
        <p>Nomor    : .............................</p>  
        <p>Tanggal  : .............................</p>
    </center>
    <p align="right" class="row">Kudus,'.$tanggal.' '.$bulan.' '.$tahun.'</p>'.
    '<table>
        <tr><td width="200px" align="center">
                Tanda tangan pemegang<br><br><br><br><br>
                '.$nama.'
            </td>
            <td width="200px" align="center">
                Mengetahui,<br>
                Camat Jekulo<br><br><br><br>
                '.$camat.'<br>
                '.$nip_camat.'
            </td>
            <td width="200px" align="center">
             '.$penandatangan.'
            </td>
        </tr>
    </table><br><br><br><br>
    </div><!-- akhir preview--></body></html>';
 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('Surat keterangan '.$nama.'.pdf', array("Attachment" => false));
exit(0);