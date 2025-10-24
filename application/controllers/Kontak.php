<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_guru');
        $this->load->model('m_mapel');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Hubungi Kami',
            'kontak'     => $this->m_kontak->get_kontak(),
            'isi'       => 'admin/kontak/v_kontak'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

}