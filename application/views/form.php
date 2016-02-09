<!-- awal isi -->
<div id="isi" class="col-sm-10">
    <div class="row" style="margin:0px">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('proses') ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;</span>Surat</a></li>
            <li class="active">
                Formulir <?php if(isset($status)){echo "Edit ";}?>Surat Keterangan<br></li></ol><br>
                <?php
                if (isset($error)) {
                    echo"<div class='alert alert-warning' role='alert'>" . $error . "</div>";
                } else if(isset($message)) {
                    echo"<div class='alert alert-success' role='alert'>" . $message . "</div>";
                }
                ?>
    </div>
    
    <?php if(isset($daftar_surat)){
                    foreach ($daftar_surat as $daftar)
                    if(isset($salin)){
                        echo form_open_multipart('proses/tambah');
                    }else{
                        echo form_open_multipart('proses/tambah/'.$daftar['id_surat']);
                    }                   
           }else{
                    echo form_open_multipart('proses/tambah');
                    }
     ?>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 control-label">Nama*</label>
        <div class="col-sm-5">
            <input type="text" name="nama" class="form-control"  required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='".$daftar['nama']."'";}}else {echo"placeholder='Masukan nama'";}?>       
            >
            <?php echo form_error('nama'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin*</label>
        <div class="col-sm-10">
            <input type="radio" name="jenis_kelamin" value="laki_laki" required <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['jenis_kelamin']=='laki_laki'){echo 'checked';}}}?>       >&nbsp;Laki - laki
            <input type="radio" name="jenis_kelamin" value="perempuan" required <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['jenis_kelamin']=='perempuan'){echo 'checked';}}}?> >&nbsp;Perempuan
            <?php echo form_error('jenis_kelamin'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="tempat_lahir" class="col-sm-2 control-label">Tempat, Tgl Lahir*</label>
        <div class="col-sm-3">
            <input type="text" name="tempat_lahir" class="form-control" required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='".$daftar['tempat_lahir']."'";}}else {echo"placeholder='Masukan tempat lahir'";}?>       
            >
            <?php echo form_error('tempat_lahir'); ?>
        </div>
        <div class="col-sm-2">
            <input type="date" name="tanggal_lahir" data-date-viewMode="2" data-date-format="dd-mm-yyyy" class="form-control datepicker" placeholder="Masukan tanggal lahir" required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='". date("d-m-Y", strtotime($daftar['tanggal_lahir'])) ."'";}}else {echo"placeholder='Masukan tempat lahir'";}?>       
            >
            <?php echo form_error('tanggal_lahir'); ?>
        </div>
   </div>
   <div class="form-group row">
        <label for="agama" class="col-sm-2 control-label">Agama*</label>
        <div class="col-sm-2">
            <select class="form-control" name="agama" required>
                <option value="">pilih</option>
                <option value="islam" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['agama']=='islam'){echo 'selected';}}}?>>Islam</option>
                <option value="kristen" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['agama']=='kristen'){echo 'selected';}}}?>>Kristen</option>
                <option value="hindu" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['agama']=='hindu'){echo 'selected';}}}?>>Hindu</option>
                <option value="budha" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['agama']=='budha'){echo 'selected';}}}?>>Budha</option>
                <option value="konghucu" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['agama']=='konghucu'){echo 'selected';}}}?>>Konghucu</option>
            </select>
            <?php echo form_error('agama'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan*</label>
        <div class="col-sm-3">
            <input type="text" name="pekerjaan" class="form-control" required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='".$daftar['pekerjaan']."'";}}else {echo"placeholder='Masukan pekerjaan'";}?> 
                   >
            <?php echo form_error('pekerjaan'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="rw" class="col-sm-2 control-label">RW , RT*</label>
        <div class="col-sm-2">
            <select class="form-control" name="rw" required>
                <option value="">pilih RW</option>
                <option value="1" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rw']=='1'){echo 'selected';}}}?>>1</option>
                <option value="2" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rw']=='2'){echo 'selected';}}}?>>2</option>
                <option value="3" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rw']=='3'){echo 'selected';}}}?>>3</option>
                <option value="4" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rw']=='4'){echo 'selected';}}}?>>4</option>
                <option value="5" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rw']=='5'){echo 'selected';}}}?>>5</option>
            </select>
           <?php echo form_error('rw'); ?>
        </div>
        <div class="col-sm-2">
            <select class="form-control" name="rt" required>
                <option value="">pilih RT</option>
                <option value="1" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rt']=='1'){echo 'selected';}}}?>>1</option>
                <option value="2" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rt']=='2'){echo 'selected';}}}?>>2</option>
                <option value="3" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rt']=='3'){echo 'selected';}}}?>>3</option>
                <option value="4" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rt']=='4'){echo 'selected';}}}?>>4</option>
                <option value="5" <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){if ($daftar['rt']=='5'){echo 'selected';}}}?>>5</option>
            </select>
            <?php echo form_error('rt'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="no_ktp" class="col-sm-2 control-label">No. KTP*</label>
        <div class="col-sm-3">
            <input type="number" name="no_ktp" class="form-control" required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='".$daftar['no_ktp']."'";}}else {echo"placeholder='Masukan nomor KTP'";}?> 
                   >
            <?php echo form_error('no_ktp'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="no_kk" class="col-sm-2 control-label">No. KK*</label>
        <div class="col-sm-3">
            <input type="number" name="no_kk" class="form-control" required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='".$daftar['no_kk']."'";}}else {echo"placeholder='Masukan nomor KK'";}?> 
            >
            <?php echo form_error('no_kk'); ?>
        </div>
    </div>
     <div class="form-group row">
        <label for="keperluan" class="col-sm-2 control-label">Keperluan*</label>
        <div class="col-sm-5">
            <textarea align="left" name="keperluan" width="300px" height="150px" class="form-control" required>
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo $daftar['keperluan'];}}?> 
            </textarea>
            <?php echo form_error('keperluan'); ?>
        </div>
     </div>
    <div class="form-group row">
        <label for="berlaku" class="col-sm-2 control-label">Berlaku Mulai*</label>
        <div class="col-sm-2">
            <input type="date" name="tanggal_awal" class="form-control datepicker" data-date-format="dd-mm-yyyy" required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='". date("d-m-Y", strtotime($daftar['tanggal_awal'])) ."'";}}else {echo"placeholder='Masukan tanggal awal'";}?>
            >
            <?php echo form_error('tanggal_awal'); ?>
        </div>
        <label for="berlaku" class="col-sm-1 control-label">sampai*</label>
        <div class="col-sm-2">
            <input type="date" name="tanggal_akhir" class="form-control datepicker" data-date-format="dd-mm-yyyy" required
            <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo "value='". date("d-m-Y", strtotime($daftar['tanggal_akhir'])) ."'";}}else {echo"placeholder='Masukan tanggal akhir'";}?>     
            >
            <?php echo form_error('tanggal_akhir'); ?>
        </div>
   </div>
   <div class="form-group row">
        <label for="keterangan" class="col-sm-2 control-label">Keterangan lain - lain **)</label>
        <div class="col-sm-5">
            <textarea align="left" name="keterangan" width="300px" height="150px" class="form-control">
                <?php if(isset($daftar_surat)){foreach ($daftar_surat as $daftar){echo $daftar['keterangan'];}}?> 
            </textarea>
        </div>
     </div>
   <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <p>* wajib diisi</p>
            <button type="submit" class="btn btn-default">Simpan</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="button" class="btn btn-default" onclick="javascript:history.go(-1)">Batal</button>
        </div>
    </div><br><br><br>

    <?php echo form_close(); ?>
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