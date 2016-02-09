<!-- awal isi -->
<div id="isi" class="col-sm-10">
    <div class="row" style="margin:0px">
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-envelope" aria-hidden="true">&nbsp;</span>Laporan</li>
        </ol>
    </div>
    <div id="grafik" class="row" style="margin:0px">
        <h4>Grafik Layanan</h4>
        <hr>
        <center>
        <div id="grafik" class="row" style="margin-left:auto;margin-right:auto;padding:10px;background-color: #fff">
            <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
        </div>
        </center>
        <h3><?php echo 'Tahun '. Date('Y')?></h3>
        <hr>
    </div>
    <div id="cetak laporan" class="row" style="margin:30px; border:1px solid beige;padding: 20px">
        <h4>Cetak Laporan</h4>
        <div>
            <button  data-toggle="modal" data-target="#laporan_periode" data-title="Laporan Periode" href="#" class="col-sm-2"style="margin:35px; background: #4E6CAD;padding:50px;font-size: 20px;color: #fff">PERIODE</button>
            <button  data-toggle="modal" data-target="#laporan_gender" data-title="Laporan Gender" href="#" class="col-sm-2"style="margin:35px; background: #A3DB24;padding:50px;font-size: 20px;color: #fff">GENDER</button>
            <button  data-toggle="modal" data-target="#laporan_rw" data-title="Laporan RW" href="#" class="col-sm-2"style="margin:35px; background: #8C5D4E;padding:50px;font-size: 20px;color: #fff">RW</button>
            <button  data-toggle="modal" data-target="#laporan_rt" data-title="Laporan RT" href="#" class="col-sm-2"style="margin:35px; background: #309C7A;padding:50px;font-size: 20px;color: #fff">RT</button>
        </div>
    </div>
</div>
<!-- akhir isi-->
<!-- Laporan periode modal -->
<div id="laporan_periode" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('laporan/periode');?>
                <div class="form-group row">
                    <label for="berlaku" class="col-sm-2 control-label">Mulai*</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_awal" class="datepicker form-control" data-date-format="yyyy-mm-dd" required    placeholder="Masukan tanggal awal">
                        <?php echo form_error('tanggal_awal'); ?>
                    </div>
                    <label for="berlaku" class="col-sm-2 control-label">sampai*</label>
                    <div class="col-sm-4">
                         <input type="date" name="tanggal_akhir" class="datepicker form-control" data-date-format="yyyy-mm-dd" required    placeholder="Masukan tanggal akhir">
                         <?php echo form_error('tanggal_akhir'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <p>* wajib diisi!</p>
                    <input type="submit" name="submit" class="btn btn-primary" value="Proses"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Laporan gender modal -->
<div id="laporan_gender" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('laporan/gender');?>
                <div class="form-group row">
                    <label for="berlaku" class="col-sm-4 control-label">Mulai*</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_awal" class="datepicker form-control" data-date-format="yyyy-mm-dd" required    placeholder="Masukan tanggal awal">
                        <?php echo form_error('tanggal_awal'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berlaku" class="col-sm-4 control-label">sampai*</label>
                    <div class="col-sm-4">
                         <input type="date" name="tanggal_akhir" class="datepicker form-control" data-date-format="yyyy-mm-dd" required    placeholder="Masukan tanggal akhir">
                         <?php echo form_error('tanggal_akhir'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-4 control-label">Jenis Kelamin*</label>
                    <div class="col-sm-5">
                        <input type="radio" name="jenis_kelamin" value="laki_laki" required >&nbsp;Laki - laki
                        <input type="radio" name="jenis_kelamin" value="perempuan" required >&nbsp;Perempuan
                        <?php echo form_error('jenis_kelamin'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <p>* wajib diisi!</p>
                    <input type="submit" name="submit" class="btn btn-primary" value="Proses"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                 <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Laporan rw modal -->
<div id="laporan_rw" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                 <?php echo form_open_multipart('laporan/rw');?>
                <div class="form-group row">
                    <label for="berlaku" class="col-sm-4 control-label">Mulai*</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_awal" class="datepicker form-control" data-date-format="yyyy-mm-dd" required    placeholder="Masukan tanggal awal">
                        <?php echo form_error('tanggal_awal'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berlaku" class="col-sm-4 control-label">sampai*</label>
                    <div class="col-sm-4">
                         <input type="date" name="tanggal_akhir" class="datepicker form-control" data-date-format="yyyy-mm-dd" required    placeholder="Masukan tanggal akhir">
                         <?php echo form_error('tanggal_akhir'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rw" class="col-sm-4 control-label">RW*</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="rw" required>
                            <option value="">pilih RW</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                       <?php echo form_error('rw'); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <p>* wajib diisi!</p>
                    <input type="submit" name="submit" class="btn btn-primary" value="Proses"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
               <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Laporan rt modal -->
<div id="laporan_rt" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('laporan/rt');?>
                <div class="form-group row">
                    <label for="berlaku" class="col-sm-4 control-label">Mulai*</label>
                    <div class="col-sm-4">
                        <input type="date" name="tanggal_awal" class="datepicker form-control" data-date-format="yyyy-mm-dd" required placeholder="Masukan tanggal awal">
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berlaku" class="col-sm-4 control-label">sampai*</label>
                    <div class="col-sm-4">
                         <input type="date" name="tanggal_akhir" class="datepicker form-control" data-date-format="yyyy-mm-dd" required placeholder="Masukan tanggal akhir">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rw" class="col-sm-4 control-label">RW*</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="rw" required>
                            <option value="">pilih RW</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                       <?php echo form_error('rw'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rt" class="col-sm-4 control-label">RT*</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="rt" required>
                            <option value="">pilih RT</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                      
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               
                    <p>* wajib diisi!</p>
                    <input type="submit" name="submit" class="btn btn-primary" value="Proses"/>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
               <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
</div>
<!-- akhir content-->
<div style="clear: both"></div>
<div class="footer"><!-- Footer-->
    <center><small>&copy;Pladen 2016<br> Developed by Tim 1 KKN Undip 2016</small>
    </center>
</div>
<script>
    $('.datepicker').datepicker({
    //comment the beforeShow handler if you want to see the ugly overlay
    beforeShow: function() {
        setTimeout(function(){
            $('.datepicker').css('z-index', 2000);
        }, 0);
    }
    });
    
    $("#laporan_periode").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title');
        $(this).find('.modal-title').text(titleData);
    });
    
    $("#laporan_gender").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title');
        $(this).find('.modal-title').text(titleData);
    });
    $("#laporan_rw").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title');
        $(this).find('.modal-title').text(titleData);
    });
    $("#laporan_rt").on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var titleData = button.data('title');
        $(this).find('.modal-title').text(titleData);
    });
    
    google.load("visualization", "1.1", {packages: ["bar"]});
            google.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['BULAN', 'JUMLAH'],
                    <?php
                    $bulan=array();
                    $bulan['1']= 'Januari';$bulan['2']= 'Februari';$bulan['3']= 'Maret';$bulan['4']= 'April';$bulan['5']= 'Mei';$bulan['6']= 'Juni';
                    $bulan['7']= 'Juli';$bulan['8']= 'Agustus';$bulan['09']= 'September';$bulan['10']= 'Oktober';$bulan['11']= 'November';$bulan['12']= 'Desember';
                    foreach ($value as $data) {
                        echo '['  .$data['bulan']. ','. $data['total'] . '],';
                    }
                    ?>
                ]);
 
                var options = {                    
                    chart: {
                        title: 'Grafik Layanan Pembuatan Surat',
                    }
                };
 
                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
 
                chart.draw(data, options);
            }
            

</script>
</body>
</html>