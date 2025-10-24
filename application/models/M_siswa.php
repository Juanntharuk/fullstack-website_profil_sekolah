<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua nomor WA siswa aktif
    public function getNomorWaliMuridAktif()
    {
        $this->db->select('id_siswa, nama_siswa, no_wa, status');
        $this->db->from('tbl_siswa');
        $this->db->where('status', 'aktif'); // pastikan ada field status di tabel siswa
        return $this->db->get()->result();
    }

    // Ambil semua siswa
    public function lists()
    {
        $this->db->order_by('id_siswa', 'ASC');
        return $this->db->get('tbl_siswa')->result();
    }

    // Detail siswa berdasarkan ID
    public function detail($id_siswa)
    {
        return $this->db->get_where('tbl_siswa', ['id_siswa' => $id_siswa])->row();
    }

    // Tambah siswa
    public function add($data)
    {
        return $this->db->insert('tbl_siswa', $data);
    }

    // Update data siswa
    public function update($id_siswa, $data)
    {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->update('tbl_siswa', $data);
    }

    // Hapus siswa
    public function delete($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->delete('tbl_siswa');
    }
}
