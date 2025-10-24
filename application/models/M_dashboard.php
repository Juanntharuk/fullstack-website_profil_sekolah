<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    // Hitung jumlah guru
    public function total_guru() {
        return $this->db->count_all('tbl_guru');
    }

    // Hitung jumlah siswa
    public function total_siswa() {
        return $this->db->count_all('tbl_siswa');
    }

    // Hitung jumlah prestasi
    public function total_prestasi() {
        return $this->db->count_all('tbl_prestasi');
    }

    // Hitung jumlah berita
    public function total_berita() {
        return $this->db->count_all('tbl_berita');
    }

}
