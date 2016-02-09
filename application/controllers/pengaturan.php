<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('M_Pengaturan');
        $this->load->helper('nav');
    }

    public function index() {
        $data['message'] = $this->session->flashdata('message');
        $data['perangkat']=$this->M_Pengaturan->get_perangkat();
        $this->load->template('pengaturan',$data);
    }

    public function form($id = false) {
        if ($id === false) {
            $this->load->template('form_perangkat');
        } else {
            $data['perangkat'] = $this->M_Pengaturan->get_perangkat_id($id);
            $data['status'] = true; // status edit
            $this->load->template('form_perangkat', $data);
        }
    }


    // tambah surat baru
    public function tambah($id = false) {
        $data['error'] = 'Error, harap isi formulir dengan benar !';
        //set rules
        $this->form_validation->set_rules('nama_perangkat', 'Nama Perangkat', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('alamat_perangkat', 'Alamat Perangkat', 'trim|required');
        $this->form_validation->set_rules('telp_perangkat', ' Telp. Perangkat', 'trim|required');
        $this->form_validation->set_rules('penanda_tangan', 'Penandatangan', 'trim|required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->template('form_perangkat', $data);
        } else {
            if ($id === false) {
                $this->session->set_flashdata('message', 'Berhasil menambah perangkat baru... ');
            } else {
                $this->session->set_flashdata('message', 'Berhasil mengubah perangkat... ');
            }
            $this->M_Pengaturan->add($id);
            redirect('pengaturan/index');
        }
    }

    // Mneghapus surat
    public function hapus() {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id_perangkat');
            $this->M_Pengaturan->delete($id);
            $this->session->set_flashdata('message', 'Berhasil menghapus data ... ');
            redirect('pengaturan/index');
        }
    }

}
