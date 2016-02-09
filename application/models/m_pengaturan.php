<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_Pengaturan extends CI_Model {

    public function add($id) {
        $data = array(
            'nama_perangkat' => $this->input->post('nama_perangkat'),
            'jabatan' => $this->input->post('jabatan'),
            'nip' => $this->input->post('nip'),
            'alamat_perangkat' =>$this->input->post('alamat_perangkat'),
            'telp_perangkat' => $this->input->post('telp_perangkat'),
            'penanda_tangan' => $this->input->post('penanda_tangan'),
        );
        if ($id === false) {
            $this->db->insert('perangkat', $data);
        } else {
            $this->db->where('id_perangkat', $id);
            $this->db->update('perangkat', $data);
        }
    }

    public function get_perangkat() {
        $this->db->select('*');
        $this->db->from('perangkat');
        $this->db->order_by('id_perangkat', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_perangkat_id($id) {
        $this->db->select('*');
        $this->db->from('perangkat');
        $this->db->where('id_perangkat', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function delete($id) {
        $this->db->where('id_perangkat', $id);
        $query = $this->db->delete('perangkat');
    }
}
