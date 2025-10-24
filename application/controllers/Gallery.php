<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_gallery');
    }

    public function index() {
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Gallery Foto',
            'gallery'   => $this->m_gallery->lists(),
            'isi'       => 'admin/gallery/v_lists'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './sampul/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2000;
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('sampul')) {
                $data = array(
                    'title'     => 'Admin',
                    'title1'    => 'SMP NEGERI ALOK',
                    'title2'    => 'Add Gallery',
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/gallery/v_add'
                );
                $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './sampul/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_gallery'    => $this->input->post('nama_gallery'),
                    'sampul'   => $upload_data['uploads']['file_name']
                );

                $this->m_gallery->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil di Simpan !!!');
                redirect('gallery');
            }
        }

        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Add Gallery',
            'isi'       => 'admin/gallery/v_add'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function edit($id_gallery) {
        $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']   = './sampul/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);

            // Ambil data gallery yang sedang diedit
            $gallery = $this->m_gallery->detail($id_gallery);

            if (!empty($_FILES['sampul']['name'])) {
                if ($this->upload->do_upload('sampul')) {
                    // Hapus file lama jika ada
                    if ($gallery->sampul != "") {
                        unlink('./sampul/' . $gallery->sampul);
                    }

                    $upload_data = array('uploads' => $this->upload->data());
                    $data = array(
                        'nama_gallery' => $this->input->post('nama_gallery'),
                        'sampul'       => $upload_data['uploads']['file_name']
                    );
                } else {
                    $data = array(
                        'title'     => 'Admin',
                        'title1'    => 'SMP NEGERI ALOK',
                        'title2'    => 'Edit Gallery',
                        'error'     => $this->upload->display_errors(),
                        'gallery'   => $gallery,
                        'isi'       => 'admin/gallery/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    return;
                }
            } else {
                $data = array(
                    'nama_gallery' => $this->input->post('nama_gallery')
                );
            }

            $this->m_gallery->edit($id_gallery, $data);
            $this->session->set_flashdata('pesan', 'Gallery Berhasil di Edit !!!');
            redirect('gallery');
        }

        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Edit Gallery',
            'gallery'   => $this->m_gallery->detail($id_gallery),
            'isi'       => 'admin/gallery/v_edit'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function delete($id_gallery) 
    {
        // Hapus foto lama jika ada
        $gallery = $this->m_gallery->detail($id_gallery);

        if ($gallery->sampul != "") {
            unlink('./sampul/' . $gallery->sampul);
        }

        $data = array('id_gallery'=>$id_gallery);
        $this->m_gallery->delete($id_gallery, $data);
            $this->session->set_flashdata('pesan', 'Data Gallery berhasil dihapus!');
            redirect('gallery');
    }

    public function add_foto($id_gallery) {
        $this->form_validation->set_rules('ket_foto', 'Keterangan Foto', 'required');
    
        // Ambil data gallery yang sedang diedit
        $gallery = $this->m_gallery->detail($id_gallery);
    
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']   = './foto/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
    
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $upload_data = array('uploads' => $this->upload->data());
    
                    // Pastikan id_gallery juga ikut disimpan
                    $data = array(
                        'id_gallery' => $id_gallery,
                        'ket_foto'   => $this->input->post('ket_foto'),
                        'foto'       => $upload_data['uploads']['file_name']
                    );
    
                    // Kirim data ke model
                    $this->m_gallery->add_foto($data);
    
                    $this->session->set_flashdata('pesan', 'Foto Berhasil di Tambahkan !!!');
                    redirect('gallery/add_foto/'.$id_gallery);
                } else {
                    // Jika upload gagal
                    $data = array(
                        'title'     => 'Admin',
                        'title1'    => 'SMP NEGERI ALOK',
                        'title2'    => 'Add Foto Gallery : '.$gallery->nama_gallery,
                        'error'     => $this->upload->display_errors(),
                        'gallery'   => $gallery,
                        'foto'      => $this->m_gallery->lists_foto($id_gallery),
                        'isi'       => 'admin/gallery/v_add_foto'
                    );
                    $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    return;
                }
            } else {
                // Jika tidak ada file dipilih
                $data = array(
                    'title'     => 'Admin',
                    'title1'    => 'SMP NEGERI ALOK',
                    'title2'    => 'Add Foto Gallery : '.$gallery->nama_gallery,
                    'error'     => 'File foto belum dipilih!',
                    'gallery'   => $gallery,
                    'foto'      => $this->m_gallery->lists_foto($id_gallery),
                    'isi'       => 'admin/gallery/v_add_foto'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                return;
            }
        }
    
        // Jika validasi belum jalan atau halaman pertama kali diakses
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Add Foto Gallery : '.$gallery->nama_gallery,
            'gallery'   => $gallery,
            'foto'      => $this->m_gallery->lists_foto($id_gallery),
            'isi'       => 'admin/gallery/v_add_foto'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
    
    public function delete_foto($id_gallery, $id_foto) 
    {
        // Ambil data foto berdasarkan id_foto
        $foto = $this->m_gallery->detail_foto($id_foto);

        // Hapus file foto dari folder jika ada
        if ($foto && $foto->foto != "") {
            if (file_exists('./foto/' . $foto->foto)) {
                unlink('./foto/' . $foto->foto);
            }
        }

        // Hapus data dari database
        $this->m_gallery->delete_foto($id_foto); // hanya kirim $id_foto saja

        // Set flashdata
        $this->session->set_flashdata('pesan', 'Foto berhasil dihapus!');

        // Redirect ke halaman tambah foto
        redirect('gallery/add_foto/' . $id_gallery);
    }

}
