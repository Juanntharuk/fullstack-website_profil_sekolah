<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model {

    public function lists() {
        $this->db->select('tbl_gallery.*, count(tbl_foto.id_gallery) as jml_foto');
        $this->db->from('tbl_gallery');
        $this->db->join('tbl_foto', 'tbl_foto.id_gallery = tbl_gallery.id_gallery', 'left');
        $this->db->group_by('tbl_gallery.id_gallery');
        $this->db->order_by('tbl_gallery.id_gallery', 'desc');
        return $this->db->get()->result();
    }

    public function lists_foto($id_gallery) {
        $this->db->select('*');
        $this->db->from('tbl_foto');
        $this->db->where('id_gallery',$id_gallery);
        $this->db->order_by('id_foto');
        return $this->db->get()->result();
    }

    public function detail($id_gallery) {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('id_gallery', $id_gallery);
        return $this->db->get()->row();
    }

    public function detail_foto($id_foto) {
        $this->db->select('*');
        $this->db->from('tbl_foto');
        $this->db->where('id_foto', $id_foto);
        return $this->db->get()->row();
    }

    public function add($data) {
        $this->db->insert('tbl_gallery', $data);
    }

    public function add_foto($data) {
        $this->db->insert('tbl_foto', $data);
    }

    public function edit($id_gallery, $data) {
        $this->db->where('id_gallery', $id_gallery);
        $this->db->update('tbl_gallery', $data);
    }

    public function delete($id_gallery) {
        $this->db->where('id_gallery', $id_gallery);
        $this->db->delete('tbl_gallery');
    }

    public function delete_foto($id_foto) {
        $this->db->where('id_foto', $id_foto);
        $this->db->delete('tbl_foto');
    }
      
}
