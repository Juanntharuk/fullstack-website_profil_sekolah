<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_guru');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Data Guru',
            'guru'     => $this->m_guru->lists(),
            'isi'       => 'admin/guru/v_list'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add() 
    {

        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        //$this->form_validation->set_rules('foto_guru', 'Foto Guru', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_guru/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('foto_guru'))
                    {

                        $data = array(
                            'title'     => 'Admin',
                            'title1'    => 'SMP NEGERI ALOK',
                            'title2'    => 'Add Data Guru',
                            'error'     => $this->upload->display_errors(),
                            'isi'       => 'admin/guru/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                    } else {

                        $upload_data                = array('uploads' => $this->upload->data());
                        $config['image_library']    =  'gd2';
                        $config['source_image']     = './foto_guru/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);

                        $data = array(
                            'nip'           => $this->input->post('nip'),
                            'nama_guru'     => $this->input->post('nama_guru'),
                            'tempat_lahir'  => $this->input->post('tempat_lahir'),
                            'tgl_lahir'     => $this->input->post('tgl_lahir'),
                            'pendidikan'    => $this->input->post('pendidikan'),
                            'foto_guru'     => $upload_data['uploads']['file_name']

                        );
                        
                            $this->m_guru->add($data);
                            $this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan !!!');
                            redirect('guru');
                    }
        }

        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Add Data Guru',
            'isi'       => 'admin/guru/v_add'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);

    }

    public function edit($id_guru) 
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_guru/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $this->upload->initialize($config);

            if (!empty($_FILES['foto_guru']['name'])) {
                if (!$this->upload->do_upload('foto_guru')) {
                    $data = array(
                        'title'     => 'Admin',
                        'title1'    => 'SMP NEGERI ALOK',
                        'title2'    => 'Edit Data Guru',
                        'error'     => $this->upload->display_errors(),
                        'guru'      => $this->m_guru->detail($id_guru),
                        'isi'       => 'admin/guru/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                } else {
                    // Upload Foto Guru
                    $upload_data = array('uploads' => $this->upload->data());
                    $foto_guru = $upload_data['uploads']['file_name'];

                    // Hapus foto lama jika ada
                    $guru_lama = $this->m_guru->detail($id_guru);
                    $foto_lama = './foto_guru/' . $guru_lama->foto_guru;

                    if (file_exists($foto_lama) && !empty($guru_lama->foto_guru)) {
                        unlink($foto_lama); // Menghapus foto lama
                    }
                }
            } else {
                // Tidak ada foto baru, gunakan foto lama
                $foto_guru = $this->input->post('foto_guru_lama');
            }

            $data = array(
                'nip'           => $this->input->post('nip'),
                'nama_guru'     => $this->input->post('nama_guru'),
                'tempat_lahir'  => $this->input->post('tempat_lahir'),
                'tgl_lahir'     => $this->input->post('tgl_lahir'),
                'pendidikan'    => $this->input->post('pendidikan'),
                'foto_guru'     => $foto_guru
            );

            $this->m_guru->update($id_guru, $data);
            $this->session->set_flashdata('pesan', 'Data Guru berhasil diupdate!');
            redirect('guru');
        } else {
            // Menampilkan form edit jika validasi gagal
            $data = array(
                'title'     => 'Admin',
                'title1'    => 'SMP NEGERI ALOK',
                'title2'    => 'Edit Data Guru',
                'guru'      => $this->m_guru->detail($id_guru),
                'isi'       => 'admin/guru/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
    }

    public function delete($id_guru) 
    {
        // Hapus foto lama jika ada
        $guru_lama = $this->m_guru->detail($id_guru);
        $foto_lama = './foto_guru/' . $guru_lama->foto_guru;

        if (file_exists($foto_lama) && !empty($guru_lama->foto_guru)) {
            unlink($foto_lama); // Menghapus foto lama
        }

        $data = array('id_guru'=>$id_guru);
        $this->m_guru->delete($id_guru, $data);
            $this->session->set_flashdata('pesan', 'Data Guru berhasil dihapus!');
            redirect('guru');
    }

}