<!-- awal isi -->
<div id="isi" class="col-sm-10">
    <div class="row" style="margin:0px">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('pengaturan') ?>"><span class="glyphicon glyphicon-wrench" aria-hidden="true">&nbsp;</span>Pengaturan</a></li>
            <li class="active">
                Formulir <?php if(isset($status)){echo "Edit ";}else{echo "Tambah ";}?>Perangkat<br></li></ol><br>
                <?php
                if (isset($error)) {
                    echo"<div class='alert alert-warning' role='alert'>" . $error . "</div>";
                } else if(isset($message)) {
                    echo"<div class='alert alert-success' role='alert'>" . $message . "</div>";
                }
                ?>
    </div>
    
    <?php if(isset($perangkat)){
                    foreach ($perangkat as $daftar)
                    {
                        echo form_open_multipart('pengaturan/tambah/'.$daftar['id_perangkat']);
                    }                   
           }else{
                        echo form_open_multipart('pengaturan/tambah');
                    }
     ?>
    <div class="form-group row">
        <label for="nama" class="col-sm-2 control-label">Nama*</label>
        <div class="col-sm-5">
            <input type="text" name="nama_perangkat" class="form-control"  required
            <?php if(isset($perangkat)){foreach ($perangkat as $daftar){echo "value='".$daftar['nama_perangkat']."'";}}else {echo"placeholder='Masukan nama'";}?>       
            >
            <?php echo form_error('nama_perangkat'); ?>
        </div>
    </div>
   <div class="form-group row">
        <label for="agama" class="col-sm-2 control-label">Jabatan*</label>
        <div class="col-sm-2">
            <select class="form-control" name="jabatan" required>
                <option value="">pilih</option>
                <option value="camat" <?php if(isset($perangkat)){foreach ($perangkat as $daftar){if ($daftar['jabatan']=='camat'){echo 'selected';}}}?>>Camat</option>
                <option value="kades" <?php if(isset($perangkat)){foreach ($perangkat as $daftar){if ($daftar['jabatan']=='kades'){echo 'selected';}}}?>>Kepala Desa</option>
                <option value="sekdes" <?php if(isset($perangkat)){foreach ($perangkat as $daftar){if ($daftar['jabatan']=='sekdes'){echo 'selected';}}}?>>Sekretaris Desa</option>
                <option value="perangkat" <?php if(isset($perangkat)){foreach ($perangkat as $daftar){if ($daftar['jabatan']=='perangkat'){echo 'selected';}}}?>>Perangkat Desa</option>
            </select>
            <?php echo form_error('jabatan'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="pekerjaan" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-3">
            <input type="text" name="nip" class="form-control" required
            <?php if(isset($perangkat)){foreach ($perangkat as $daftar){echo "value='".$daftar['nip']."'";}}else {echo"placeholder='Masukan NIP'";}?> 
                   >
            <?php echo form_error('nip'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="keperluan" class="col-sm-2 control-label">Alamat*</label>
        <div class="col-sm-5">
            <textarea align="left" name="alamat_perangkat" width="300px" height="150px" class="form-control" required>
            <?php if(isset($perangkat)){foreach ($perangkat as $daftar){echo $daftar['alamat_perangkat'];}}?> 
            </textarea>
            <?php echo form_error('alamat_perangkat'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="pekerjaan" class="col-sm-2 control-label">Telp. Perangkat</label>
        <div class="col-sm-3">
            <input type="text" name="telp_perangkat" class="form-control" required
            <?php if(isset($perangkat)){foreach ($perangkat as $daftar){echo "value='".$daftar['telp_perangkat']."'";}}else {echo"placeholder='Masukan no telpon'";}?> 
                   >
            <?php echo form_error('telp_perangkat'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="agama" class="col-sm-2 control-label">Status Penandatangan*</label>
        <div class="col-sm-2">
            <select class="form-control" name="penanda_tangan" required>
                <option value="">pilih</option>
                <option value="Ya" <?php if(isset($perangkat)){foreach ($perangkat as $daftar){if ($daftar['penanda_tangan']=='Ya'){echo 'selected';}}}?>>Ya</option>
                <option value="Tidak" <?php if(isset($perangkat)){foreach ($perangkat as $daftar){if ($daftar['penanda_tangan']=='Tidak'){echo 'selected';}}}?>>Tidak</option>
            </select>
            <?php echo form_error('penanda_tangan'); ?>
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