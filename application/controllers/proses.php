<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proses extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Surat');
        $this->load->helper('nav');
    }

    public function index() {
        $data['message'] = $this->session->flashdata('message');
        $this->load->library('pagination');
        $config['base_url'] = base_url('proses/index/');
        $config['total_rows'] = $this->M_Surat->record_count();
        $config['per_page'] = 15;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['daftar_surat'] = $this->M_Surat->get_surat($config['per_page'], $start);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data['start'] = $start;
        $this->load->template('home1', $data);
    }

    public function form($id = false) {
        if ($id === false) {
            $this->load->template('form');
        } else {
            $data['daftar_surat'] = $this->M_Surat->get_surat_id($id);
            $data['status'] = true; // status edit
            $this->load->template('form', $data);
        }
    }

    public function salin($id) {
        $data['daftar_surat'] = $this->M_Surat->get_surat_id($id);
       
        $data['salin'] = true;
        $this->load->template('form', $data);
    }

    public function lihat($id) {
        $data['daftar_surat'] = $this->M_Surat->get_surat_id($id);
        $data['penandatangan'] = $this->M_Surat->get_penandatangan();
        $data['camat'] = $this->M_Surat->get_camat();
        $this->load->template('preview', $data);
    }

    public function cetak($id) {
        $data['daftar_surat'] = $this->M_Surat->get_surat_id($id);
        $penandatangan = $this->M_Surat->get_penandatangan();
        foreach($penandatangan as $daftar){ 
                    if($daftar['jabatan']!='kades'){
                        $data['penandatangan']="a.n. Kepala Desa Pladen <br><br><br><br><br>".$daftar['nama_perangkat'];
                    }else{
                        $data['penandatangan']="Kepala Desa Pladen <br><br><br><br><br>".$daftar['nama_perangkat'];
                }}
                
        $camat = $this->M_Surat->get_camat();
        foreach($camat as $daftar){
                $data['camat'] =$daftar['nama_perangkat'];
                 $data['nip_camat']=$daftar['nip'];
        }
        $this->load->view('cetak_pdf', $data);
    }

    // tambah surat baru
    public function tambah($id = false) {
        $data['error'] = 'Error, harap isi formulir dengan benar !';
        //set rules
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('agama', ' Agama', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|numeric|required');
        $this->form_validation->set_rules('rw', 'RW', 'trim|numeric|required');
        $this->form_validation->set_rules('no_ktp', 'No. KTP', 'trim|numeric|required');
        $this->form_validation->set_rules('no_kk', 'No. KK', 'trim|numeric|required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'trim|required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'trim|required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->template('form', $data);
        } else {
            if ($id === false) {
                $this->session->set_flashdata('message', 'Berhasil membuat surat baru... ');
            } else {
                $this->session->set_flashdata('message', 'Berhasil mengubah surat... ');
            }
            $this->M_Surat->add($id);
            redirect('proses/index');
        }
    }

    // Mneghapus surat
    public function hapus() {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id_surat');
            $this->M_Surat->delete($id);
            $this->session->set_flashdata('message', 'Berhasil menghapus surat... ');
            redirect('proses/index');
        }
    }
    
    public function cari() {
        $data['daftar_surat'] = $this->M_Surat->cari_surat();
        $this->load->template('home1', $data);
    }

}
