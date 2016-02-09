<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Laporan');
        $this->load->helper('nav');
    }

    public function index() {
        $data['value']=$this->M_Laporan->get_data_grafik();
        //$label['label']=$this->M_Laporan->get_label_grafik();
        $this->load->template('laporan',$data);
    }
    
    // laporan periode
    public function periode() {
        if ((!$this->input->post('tanggal_awal'))&& (!$this->input->post('tanggal_akhir'))) {
            $data['error'] = 'Error, harap isi formulir dengan benar !';
            $this->load->template('laporan', $data);
        } else {
            $tgl_awal = $this->input->post('tanggal_awal');
            $tgl_akhir = $this->input->post('tanggal_akhir');
            $data['laporan']=$this->M_Laporan->laporan_periode($tgl_awal,$tgl_akhir);
            $data['success']= 'Berhasil menampilkan laporan periode <b>'.date("d M Y", strtotime($tgl_awal)) .'</b> sampai <b>'.date("d M Y", strtotime($tgl_akhir)) .'</b>';
            $data['jenis_laporan']=1;
            $data['tanggal_awal']=$tgl_awal;
            $data['tanggal_akhir']=$tgl_akhir;
            $this->load->template('hasil_laporan',$data);
        }
    }
    
    public function qw($tgl_awal,$tgl_akhir) {
            $data['laporan']=$this->M_Laporan->laporan_periode($tgl_awal,$tgl_akhir);
            $this->load->view('cetak_laporan',$data);
    }
    function cetak_laporan_periode($tgl_awal,$tgl_akhir){
       $data['laporan']=$this->M_Laporan->laporan_periode($tgl_awal,$tgl_akhir);
       $data['tanggal_awal']=$tgl_awal;
       $data['tanggal_akhir']=$tgl_akhir;
       $kades = $this->M_Laporan->get_kades();
       foreach($kades as $kad){
           $data['kades']=$kad['nama_perangkat'];
       }
       $this->load->library('pdf');
       $html= $this->load->view('cetak_laporan_periode', $data, true);
       $namafile='laporan';
       $this->pdf->pdf_create($html, $namafile);
   }
    // laporan gender
    public function gender() {
        if ((!$this->input->post('tanggal_awal'))&& (!$this->input->post('tanggal_akhir'))&&(!$jenis_kelamin = $this->input->post('jenis_kelamin'))) {
            $data['error'] = 'Error, harap isi formulir dengan benar !';
            $this->load->template('laporan', $data);
        } else {
            $tgl_awal = $this->input->post('tanggal_awal');
            $tgl_akhir = $this->input->post('tanggal_akhir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $data['laporan']=$this->M_Laporan->laporan_gender($tgl_awal,$tgl_akhir,$jenis_kelamin);
            if($jenis_kelamin =='laki_laki'){
                $jenis_kelamin_ = 'Laki - laki';
            }else if($jenis_kelamin =='perempuan'){
                $jenis_kelamin_ = 'Perempuan';
            }
            $data['success']= 'Berhasil menampilkan laporan periode <b>'.date("d M Y", strtotime($tgl_awal)) .'</b> sampai <b>'.date("d M Y", strtotime($tgl_akhir)) .'  [ jenis kelamin '.$jenis_kelamin_.' ]</b>';
            $data['jenis_laporan']=2;
            $data['tanggal_awal']=$tgl_awal;
            $data['tanggal_akhir']=$tgl_akhir;
            $data['jenis_kelamin']=$jenis_kelamin;
            $this->load->template('hasil_laporan',$data);
        }
    }
    
    function cetak_laporan_gender($tgl_awal,$tgl_akhir,$jenis_kelamin){
       $data['laporan']=$this->M_Laporan->laporan_gender($tgl_awal,$tgl_akhir,$jenis_kelamin);
       $data['tanggal_awal']=$tgl_awal;
       $data['tanggal_akhir']=$tgl_akhir;
       if($jenis_kelamin=='laki_laki'){
           $data['jenis_kelamin']= 'LAKI - LAKI';
       }else if($jenis_kelamin=='perempuan'){
           $data['jenis_kelamin']= 'PEREMPUAN';
       }
       $kades = $this->M_Laporan->get_kades();
       foreach($kades as $kad){
           $data['kades']=$kad['nama_perangkat'];
       }
       $this->load->library('pdf');
       $html= $this->load->view('cetak_laporan_gender', $data, true);
       $namafile='laporan';
       $this->pdf->pdf_create($html, $namafile);
   }
    
    // laporan RW
    public function rw() {
        if ((!$this->input->post('tanggal_awal'))&& (!$this->input->post('tanggal_akhir'))&&(!$this->input->post('rw'))) {
            $data['error'] = 'Error, harap isi formulir dengan benar !';
            $this->load->template('laporan', $data);
        } else {
            $tgl_awal = $this->input->post('tanggal_awal');
            $tgl_akhir = $this->input->post('tanggal_akhir');
            $rw = $this->input->post('rw');
            $data['laporan']=$this->M_Laporan->laporan_rw($tgl_awal,$tgl_akhir,$rw);
            $data['success']= 'Berhasil menampilkan laporan periode <b>'.date("d M Y", strtotime($tgl_awal)) .'</b> sampai <b>'.date("d M Y", strtotime($tgl_akhir)) .'  [ untuk RW '.$rw.' ]</b>';
            $data['jenis_laporan']=3;
            $data['tanggal_awal']=$tgl_awal;
            $data['tanggal_akhir']=$tgl_akhir;
            $data['rw']=$rw;
            $this->load->template('hasil_laporan',$data);
        }
    }
    function cetak_laporan_rw($tgl_awal,$tgl_akhir,$rw){
       $data['laporan']=$this->M_Laporan->laporan_rw($tgl_awal,$tgl_akhir,$rw);
       $kades = $this->M_Laporan->get_kades();
       foreach($kades as $kad){
           $data['kades']=$kad['nama_perangkat'];
       }
       $data['tanggal_awal']=$tgl_awal;
       $data['tanggal_akhir']=$tgl_akhir;
       $data['rw']=$rw;
       $this->load->library('pdf');
       $html= $this->load->view('cetak_laporan_rw', $data, true);
       $namafile='laporan';
       $this->pdf->pdf_create($html, $namafile);
   }
    
    public function rt() {
        if ((!$this->input->post('tanggal_awal'))&& (!$this->input->post('tanggal_akhir'))&&(!$this->input->post('rw'))&&(!$this->input->post('rt'))) {
            $data['error'] = 'Error, harap isi formulir dengan benar !';
            $this->load->template('laporan', $data);
        } else {
            $tgl_awal = $this->input->post('tanggal_awal');
            $tgl_akhir = $this->input->post('tanggal_akhir');
            $rw = $this->input->post('rw');
            $rt = $this->input->post('rt');
            $data['laporan']=$this->M_Laporan->laporan_rt($tgl_awal,$tgl_akhir,$rw,$rt);
            $data['success']= 'Berhasil menampilkan laporan periode <b>'.date("d M Y", strtotime($tgl_awal)) .'</b> sampai <b>'.date("d M Y", strtotime($tgl_akhir)) .'  [ untuk RW '.$rw.' dan RT '.$rt.' ]</b>';
            $data['jenis_laporan']=4;
            $data['tanggal_awal']=$tgl_awal;
            $data['tanggal_akhir']=$tgl_akhir;
            $data['rw']=$rw;
            $data['rt']=$rt;
            $this->load->template('hasil_laporan',$data);
        }
    }
    
    function cetak_laporan_rt($tgl_awal,$tgl_akhir,$rw, $rt){
       $data['laporan']=$this->M_Laporan->laporan_rt($tgl_awal,$tgl_akhir,$rw,$rt);
       $kades = $this->M_Laporan->get_kades();
       foreach($kades as $kad){
           $data['kades']=$kad['nama_perangkat'];
       }
       $data['tanggal_awal']=$tgl_awal;
       $data['tanggal_akhir']=$tgl_akhir;
       $data['rw']=$rw;
       $data['rt']=$rt;
       $this->load->library('pdf');
       $html= $this->load->view('cetak_laporan_rw', $data, true);
       $namafile='laporan';
       $this->pdf->pdf_create($html, $namafile);
   }
}
