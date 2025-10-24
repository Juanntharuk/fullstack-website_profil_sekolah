<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->user_login->cek_login();
        $this->load->model('M_dashboard');
    }

    public function index()
    {
        $data = array(
            'title'          => 'Admin',
            'title1'         => 'SMP NEGERI ALOK',
            'title2'         => 'Dashboard',
            'total_guru'     => $this->M_dashboard->total_guru(),
            'total_siswa'    => $this->M_dashboard->total_siswa(),
            'total_prestasi' => $this->M_dashboard->total_prestasi(),
            'total_berita'   => $this->M_dashboard->total_berita(),
            'isi'            => 'admin/v_dashboard'
        );

        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
}
