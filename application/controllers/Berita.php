<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('m_berita');
    }

    public function index()
    {
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Data Berita',
            'berita'    => $this->m_berita->lists(),
            'isi'       => 'admin/berita/v_lists'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', array('required'=>'%s Harus Di Isi'));

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar_berita/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('gambar_berita')) {
                $data = array(
                    'title'     => 'Admin',
                    'title1'    => 'SMP NEGERI ALOK',
                    'title2'    => 'Add Berita',
                    'error'     => $this->upload->display_errors(),
                    'isi'       => 'admin/berita/v_add'
                );
                $this->load->view('admin/layout/v_wrapper',$data,FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar_berita/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'judul_berita'    => $this->input->post('judul_berita'),
                    'slug_berita'     => url_title($this->input->post('judul_berita'), 'dash', TRUE),
                    'isi_berita'      => $this->input->post('isi_berita'),
                    'tgl_berita'      => date('Y-m-d'),
                    'id_admin'         => $this->session->userdata('id_admin'),
                    'gambar_berita'   => $upload_data['uploads']['file_name']
                );

                $this->m_berita->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil di Posting !!!');
                redirect('berita');
            }
        }

        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Add Berita',
            'isi'       => 'admin/berita/v_add'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function edit($id_berita)
    {
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required', array('required'=>'%s Harus Di Isi'));

        // Ambil data berita yang akan diedit
        $berita_lama = $this->m_berita->detail($id_berita);

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar_berita/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $this->upload->initialize($config);

            // Jika ada gambar yang di-upload, lakukan proses upload dan hapus gambar lama jika ada
            if (!empty($_FILES['gambar_berita']['name'])) {
                if (!$this->upload->do_upload('gambar_berita')) {
                    $data = array(
                        'title'     => 'Admin',
                        'title1'    => 'SMP NEGERI ALOK',
                        'title2'    => 'Edit Berita',
                        'error'     => $this->upload->display_errors(),
                        'berita'    => $berita_lama,
                        'isi'       => 'admin/berita/v_edit'
                    );
                    $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    return;
                } else {
                    $upload_data = array('uploads' => $this->upload->data());
                    $foto_berita = $upload_data['uploads']['file_name'];

                    // Hapus foto lama jika ada
                    $foto_lama = './gambar_berita/' . $berita_lama->gambar_berita;
                    if (file_exists($foto_lama) && !empty($berita_lama->gambar_berita)) {
                        unlink($foto_lama); // Menghapus foto lama
                    }
                }
            } else {
                // Jika tidak ada gambar yang di-upload, gunakan foto lama
                $foto_berita = $berita_lama->gambar_berita;
            }

            // Update data berita
            $data = array(
                'judul_berita'    => $this->input->post('judul_berita'),
                'slug_berita'     => url_title($this->input->post('judul_berita'), 'dash', TRUE),
                'isi_berita'      => $this->input->post('isi_berita'),
                'gambar_berita'   => $foto_berita,
                'id_admin'         => $this->session->userdata('id_admin'),
                'tgl_berita'      => $berita_lama->tgl_berita  // Tetap menggunakan tanggal posting lama
            );

            $this->m_berita->update($id_berita, $data);
            $this->session->set_flashdata('pesan', 'Berita berhasil diupdate!');
            redirect('berita');
        } else {
            $data = array(
                'title'     => 'Admin',
                'title1'    => 'SMP NEGERI ALOK',
                'title2'    => 'Edit Berita',
                'berita'    => $berita_lama,
                'isi'       => 'admin/berita/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        }
    }


    public function delete($id_berita)
    {
        $berita_lama = $this->m_berita->detail($id_berita);
        $foto_lama = './gambar_berita/' . $berita_lama->gambar_berita;

        if (file_exists($foto_lama) && !empty($berita_lama->gambar_berita)) {
            unlink($foto_lama); // Menghapus foto lama
        }

        $this->m_berita->delete($id_berita);
        $this->session->set_flashdata('pesan', 'Data Berita berhasil dihapus!');
        redirect('berita');
    }
}
