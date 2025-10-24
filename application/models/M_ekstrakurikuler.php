<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ekstrakurikuler extends CI_Model {

    public function get_all() {
        return $this->db->get('tbl_ekstrakurikuler')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('tbl_ekstrakurikuler', ['id_ekstrakurikuler' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('tbl_ekstrakurikuler', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_ekstrakurikuler', $id);
        return $this->db->update('tbl_ekstrakurikuler', $data);
    }

    public function delete($id) {
        return $this->db->where('id_ekstrakurikuler', $id)->delete('tbl_ekstrakurikuler');
    }
}
