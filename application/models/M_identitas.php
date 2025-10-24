<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_identitas extends CI_Model {

    public function get_kepsek() {
        return $this->db->get_where('tbl_identitas_sekolah', ['id_identitas_sekolah' => 1])->row_array();
    }

    public function update_kepsek($id, $data) {
        $this->db->where('id_identitas_sekolah', $id);
        return $this->db->update('tbl_identitas_sekolah', $data);
    }

    public function get_sejarah() {
        return $this->db->get('tbl_identitas_sekolah')->row_array();
    }

    public function update_sejarah($id, $data) {
        $this->db->where('id_identitas_sekolah', $id);
        return $this->db->update('tbl_identitas_sekolah', $data);
    }

    // Ambil semua data identitas sekolah
    public function get_identitas() {
        return $this->db->get_where('tbl_identitas_sekolah', ['id_identitas_sekolah' => 1])->row_array();
    }

    // Update visi & misi
    public function update_visi_misi($id, $data) {
        $this->db->where('id_identitas_sekolah', $id);
        return $this->db->update('tbl_identitas_sekolah', $data);
    }

}
