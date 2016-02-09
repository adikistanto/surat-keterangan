<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Surat extends CI_Model {

    public function add($id) {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => date("Y-m-d", strtotime($this->input->post('tanggal_lahir'))),
            'agama' => $this->input->post('agama'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'rw' => $this->input->post('rw'),
            'rt' => $this->input->post('rt'),
            'no_ktp' => $this->input->post('no_ktp'),
            'no_kk' => $this->input->post('no_kk'),
            'keperluan' => $this->input->post('keperluan'),
            'tanggal_awal' => date("Y-m-d", strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date("Y-m-d", strtotime($this->input->post('tanggal_akhir'))),
            'keterangan' => $this->input->post('keterangan'),
        );
        if ($id === false) {
            $this->db->insert('surat', $data);
        } else {
            $this->db->where('id_surat', $id);
            $this->db->update('surat', $data);
        }
    }

    public function get_surat($limit = FALSE, $start = FALSE) {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->limit($limit, $start);
        $this->db->order_by('id_surat', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function record_count() {
        $this->db->select('*');
        $this->db->from('surat');
        return $this->db->count_all_results();
    }
    
    public function get_surat_id($id) {
        $this->db->select('*');
        $this->db->from('surat');
        $this->db->where('id_surat', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_penandatangan() {
        $query = $this->db->query("SELECT * FROM perangkat WHERE jabatan!= 'camat' and penanda_tangan='Ya'");
        return $query->result_array();
    }
    public function get_camat() {
        $this->db->select('*');
        $this->db->from('perangkat');
        $this->db->where('jabatan', 'camat');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function delete($id) {
        $this->db->where('id_surat', $id);
        $query = $this->db->delete('surat');
    }
    
    public function cari_surat() {
        $kunci=$this->input->post('cari');
        $query = $this->db->query("SELECT * FROM surat WHERE nama like '%$kunci%'");
        return $query->result_array();
    }
}
