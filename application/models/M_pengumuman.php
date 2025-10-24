<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengumuman extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua data pengumuman (urutkan terbaru dulu)
    public function lists()
    {
        $this->db->order_by('id_pengumuman', 'DESC');
        return $this->db->get('tbl_pengumuman')->result();
    }

    // Tambah pengumuman baru
    public function add($data)
    {
        return $this->db->insert('tbl_pengumuman', $data);
    }

    // Detail pengumuman berdasarkan ID
    public function detail($id_pengumuman)
    {
        return $this->db->get_where('tbl_pengumuman', ['id_pengumuman' => $id_pengumuman])->row();
    }

    // Update pengumuman
    public function update($id_pengumuman, $data)
    {
        $this->db->where('id_pengumuman', $id_pengumuman);
        return $this->db->update('tbl_pengumuman', $data);
    }

    // Hapus pengumuman
    public function delete($id_pengumuman)
    {
        $this->db->where('id_pengumuman', $id_pengumuman);
        return $this->db->delete('tbl_pengumuman');
    }
}
