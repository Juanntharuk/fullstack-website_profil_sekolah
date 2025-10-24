<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('m_siswa');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Data Siswa',
            'siswa'     =>$this->m_siswa->lists(),
            'isi'       => 'admin/siswa/v_list'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add() 
    {

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_wa', 'Nomor WA', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        //$this->form_validation->set_rules('foto_siswa', 'Foto Siswa', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_siswa/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('foto_siswa'))
                    {

                        $data = array(
                            'title'     => 'Admin',
                            'title1'    => 'SMP NEGERI ALOK',
                            'title2'    => 'Add Data Siswa',
                            'error'     => $this->upload->display_errors(),
                            'isi'       => 'admin/siswa/v_add'
                        );
                        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
                    } else {

                        $upload_data                = array('uploads' => $this->upload->data());
                        $config['image_library']    =  'gd2';
                        $config['source_image']     = './foto_siswa/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);

                        $data = array(
                            'nis'           => $this->input->post('nip'),
                            'nama_siswa'    => $this->input->post('nama_siswa'),
                            'tempat_lahir'  => $this->input->post('tempat_lahir'),
                            'tgl_lahir'     => $this->input->post('tgl_lahir'),
                            'no_wa'         => $this->input->post('no_wa'),
                            'status'        => $this->input->post('status'),
                            'foto_siswa'    => $upload_data['uploads']['file_name']
                        );
                        
                            $this->m_siswa->add($data);
                            $this->session->set_flashdata('pesan', 'Data Berhasil ditambahkan !!!');
                            redirect('siswa');
                    }
        }

        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Add Data Siswa',
            'isi'       => 'admin/siswa/v_add'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);

    }

    public function edit($id_siswa) 
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('no_wa', 'Nomor WA', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        //$this->form_validation->set_rules('foto_siswa', 'Foto siswa', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_siswa/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $this->upload->initialize($config);

            if (!empty($_FILES['foto_siswa']['name'])) {
                if (!$this->upload->do_upload('foto_siswa')) 
                {
                    $data = array(
                        'title'     => 'Admin',
                        'title1'    => 'SMP NEGERI ALOK',
                        'title2'    => 'Edit Data Siswa',
                        'error'     => $this->upload->display_errors(),
                        'siswa'      => $this->m_siswa->detail($id_siswa),
                        'isi'       => 'admin/siswa/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                } else {
                    // Upload Foto Siswa
                    $upload_data = array('uploads' => $this->upload->data());
                    $foto_siswa = $upload_data['uploads']['file_name'];

                    // Hapus foto lama jika ada
                    $siswa_lama = $this->m_siswa->detail($id_siswa);
                    $foto_lama = './foto_siswa/' . $siswa_lama->foto_siswa;

                    if (file_exists($foto_lama) && !empty($siswa_lama->foto_siswa)) {
                        unlink($foto_lama); // Menghapus foto lama
                    }
                }
            } else {
                // Tidak ada foto baru, gunakan foto lama
                $foto_siswa = $this->input->post('foto_siswa_lama');
            }

            $data = array(
                'id_siswa'      => $id_siswa,
                'nis'           => $this->input->post('nis'),
                'nama_siswa'    => $this->input->post('nama_siswa'),
                'tempat_lahir'  => $this->input->post('tempat_lahir'),
                'tgl_lahir'     => $this->input->post('tgl_lahir'),
                'no_wa'         => $this->input->post('no_wa'),
                'status'        => $this->input->post('status'),
                'foto_siswa'    => $foto_siswa
            );

            $this->m_siswa->update($id_siswa, $data);
            $this->session->set_flashdata('pesan', 'Data Siswa berhasil diupdate!');
            redirect('siswa');
        } else {
            // Menampilkan form edit jika validasi gagal
            $data = array(
                'title'     => 'Admin',
                'title1'    => 'SMP NEGERI ALOK',
                'title2'    => 'Edit Data Siswa',
                'siswa'      => $this->m_siswa->detail($id_siswa),
                'isi'       => 'admin/siswa/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
    }

    public function delete($id_siswa) 
    {
        // Hapus foto lama jika ada
        $siswa_lama = $this->m_siswa->detail($id_siswa);
        $foto_lama = './foto_siswa/' . $siswa_lama->foto_siswa;

        if (file_exists($foto_lama) && !empty($siswa_lama->foto_siswa)) {
            unlink($foto_lama); // Menghapus foto lama
        }

        $data = array('id_siswa'=>$id_siswa);
        $this->m_siswa->delete($id_siswa, $data);
            $this->session->set_flashdata('pesan', 'Data Siswa berhasil dihapus!');
            redirect('siswa');
    }
}