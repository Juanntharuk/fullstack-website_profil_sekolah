<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

    public function lists() {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->join('tbl_admin', 'tbl_admin.id_admin = tbl_berita.id_admin','left');
        $this->db->order_by('id_berita', 'desc');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    public function detail($id_berita) 
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->where('id_berita', $id_berita);
        return $this->db->get()->row();
    }

    public function add($data) {
        $this->db->insert('tbl_berita', $data);
    }

    public function update($id_berita, $data) {
        $this->db->where('id_berita', $id_berita);
        $this->db->update('tbl_berita', $data);
    }
    

    public function delete($id_berita) {
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('tbl_berita');
    }
}