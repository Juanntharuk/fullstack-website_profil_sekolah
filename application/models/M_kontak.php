<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kontak extends CI_Model {

    public function update_kontak($id, $data) {
        $this->db->where('id_kontak', $id);
        return $this->db->update('tbl_kontak', $data);
    }

    // Ambil semua data identitas sekolah
    public function get_kontak() {
        return $this->db->get_where('tbl_kontak', ['id_kontak' => 1])->row_array();
    }

}
