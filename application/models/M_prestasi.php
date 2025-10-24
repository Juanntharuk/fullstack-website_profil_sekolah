<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Prestasi extends CI_Model {

    public function get_all() {
        return $this->db->get('tbl_prestasi')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('tbl_prestasi', ['id_prestasi' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('tbl_prestasi', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_prestasi', $id);
        return $this->db->update('tbl_prestasi', $data);
    }

    public function delete($id) {
        return $this->db->where('id_prestasi', $id)->delete('tbl_prestasi');
    }
}
