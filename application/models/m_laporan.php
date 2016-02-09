<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Laporan extends CI_Model {

    public function laporan_periode($tgl_awal,$tgl_akhir) {
        $query = $this->db->query("SELECT * FROM surat WHERE tanggal > '$tgl_awal' and tanggal <= '$tgl_akhir' ORDER BY id_surat ASC");
        return $query->result_array();
    }
    
    public function laporan_gender($tgl_awal,$tgl_akhir,$jenis_kelamin) {
        $query = $this->db->query("SELECT * FROM surat WHERE jenis_kelamin='$jenis_kelamin' and tanggal > '$tgl_awal' and tanggal <= '$tgl_akhir' ORDER BY id_surat ASC");
        return $query->result_array();
    }
    
    public function laporan_rw($tgl_awal,$tgl_akhir,$rw) {
        $query = $this->db->query("SELECT * FROM surat WHERE rw='$rw' and tanggal > '$tgl_awal' and tanggal <= '$tgl_akhir' ORDER BY id_surat ASC");
        return $query->result_array();
    }
    
    public function laporan_rt($tgl_awal,$tgl_akhir,$rw,$rt) {
        $query = $this->db->query("SELECT * FROM surat WHERE rt='$rt' and rw='$rw' and tanggal > '$tgl_awal' and tanggal <= '$tgl_akhir' ORDER BY id_surat ASC");
        return $query->result_array();
    }

    public function get_data_grafik() {
        $tahun=Date('Y');
        $query = $this->db->query("SELECT month(tanggal) as bulan,count(id_surat) as total FROM `surat` WHERE year(tanggal)='$tahun' GROUP BY month(tanggal)");
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
    public function delete($id) {
        $this->db->where('id_surat', $id);
        $query = $this->db->delete('surat');
    }
    public function get_post_publised_filter($filter = FALSE, $limit = FALSE, $start = FALSE) {
        $this->db->select('*');
        $this->db->from('posting k');
        $this->db->join('kategori c', 'c.id_kategori = k.kategori');
        $this->db->where('kategori', $filter);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_post($id = FALSE, $limit = FALSE, $start = FALSE) {
        $id_user = $this->session->userdata('id_user');
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('posting k');
            $this->db->join('kategori c', 'c.id_kategori = k.kategori');
            $this->db->join('user_account u', 'u.id_user = k.author');
            $this->db->where('author', $id_user);
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('posting k');
        $this->db->join('kategori c', 'c.id_kategori = k.kategori');
        $this->db->join('user_account u', 'u.id_user = k.author');
        $this->db->where('id_posting', $id);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    

    public function get_akun($id = FALSE) {
        if ($id === FALSE) {
            $this->db->select('*');
            $this->db->from('user_account');
            $query = $this->db->get();
            return $query->result_array();
        }
        $this->db->select('*');
        $this->db->from('user_account');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_post($id) {
        $this->db->where('id_posting', $id);
        $query = $this->db->delete('posting');

        if ($query) {
            echo 'oke';
            $this->session->set_flashdata('message', 'Posting berhasil dihapus');
        }
    }
    
    public function get_kades() {
        $this->db->select('*');
        $this->db->from('perangkat');
        $this->db->where('jabatan', 'kades');
        $query = $this->db->get();
        return $query->result_array();
    }

}
