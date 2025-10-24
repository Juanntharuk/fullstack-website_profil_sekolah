<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_identitas');
        $this->load->model('m_ekstrakurikuler');
        $this->load->model('m_prestasi');
        $this->load->model('m_pengumuman');
        $this->load->model('m_kontak');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Home',
            'kepala'        => $this->m_identitas->get_kepsek(), // 🔹 ambil data kepala sekolah
            'berita_home'   => $this->m_home->get_berita_home(5),
            'latest_berita' => $this->m_home->get_latest_berita(),
            'isi'           => 'v_home'
        );
        $this->load->view('layout/v_wrapperhome', $data, FALSE);
    }

    public function download()
    {
        $data = array(
            'title'         => 'Download',
            'download'      => $this->m_home->download(),
            'isi'           => 'v_download'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function guru()
    {
        $data = array(
            'title'         => 'Guru',
            'guru'      => $this->m_home->guru(),
            'isi'           => 'v_guru'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function berita()
    {
        $this->load->library('pagination');
        $config['base_url'] = base_url('home/berita');
        $config['total_rows'] = count($this->m_home->total_berita());
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;

        // start dan limit
        $limit= $config['per_page'];
        $start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0 ;
        // *******
        
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text_center"><ul class="pagination_list">';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a>';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';
        $config['full_tag_close']   = '</ul></div>';
        // ***********
        $this->pagination->initialize($config);

        $data = array(
            'paginasi'      => $this->pagination->create_links(),
            'latest_berita' => $this->m_home->latest_berita(),
            'berita'        => $this->m_home->berita($limit,$start),
            'title'         => 'Berita',
            'isi'           => 'v_berita'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function detail_berita($slug_berita) 
    {
        $data = array(
            'title'         => 'Detail berita',
            'latest_berita' => $this->m_home->get_latest_berita(),
            'berita'        => $this->m_home->get_detail_berita($slug_berita),
            'isi'           => 'v_detail_berita'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function gallery() 
    {
        $data = array(
            'title'         => 'Gallery Foto',
            'gallery'       => $this->m_home->gallery(),
            'isi'           => 'v_gallery'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function detail_gallery($id_gallery) 
    {
        $data = array(
            'title'         => 'Detail Gallery Foto',
            'gallery'       => $this->m_home->detail_gallery($id_gallery),
            'nama_gallery'  => $this->m_home->nama_gallery($id_gallery),
            'isi'           => 'v_detail_gallery'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function siswa() 
    {
        $data = array(
            'title'         => 'Siswa',
            'siswa'       => $this->m_home->siswa(),
            'isi'           => 'v_siswa'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function kepsek() 
    {
        $data = array(
            'title'         => 'Kepala Sekolah',
            'kepala'        => $this->m_identitas->get_kepsek(),
            'isi'           => 'v_kepsek'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function sejarah_sekolah() 
    {
        $data = array(
            'title'         => 'Sejarah Sekolah',
            'sejarah'        => $this->m_identitas->get_sejarah(),
            'isi'           => 'v_sejarah'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function visi_misi() {
        $data = [
            'title'     => 'Visi & Misi Sekolah',
            'identitas' => $this->m_identitas->get_identitas(), // ambil visi & misi dari DB
            'isi'       => 'v_visi_misi'
        ];
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function ekstrakurikuler() 
    {
        $data = array(
            'title'             => 'Ekstrakurikuler Sekolah',
            'ekskul'   => $this->m_ekstrakurikuler->get_all(),
            'isi'               => 'v_eskul'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function prestasi() 
    {
        $data = array(
            'title'     => 'Prestasi Sekolah',
            'prestasi'  => $this->m_prestasi->get_all(),
            'isi'       => 'v_prestasi'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function pengumuman() 
    {
        $data = array(
            'title'     => 'Pengumuman Sekolah',
            'pengumuman'  => $this->m_pengumuman->lists(),
            'isi'       => 'v_pengumuman'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }

    public function kontak() 
    {
        $data = array(
            'title'     => 'Kontak Sekolah',
            'kontak'  => $this->m_kontak->get_kontak(),
            'isi'       => 'v_kontak'
        );
        $this->load->view('layout/v_wrapper',$data,FALSE);
    }
}