<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_ekstrakurikuler');
        $this->load->helper(['url', 'form']);
        $this->load->library(['upload', 'form_validation']);
    }

    public function index() 
    {
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Kegiatan',
            'title3'    => 'Ekstrakurikuler',
            'ekskul'     => $this->M_ekstrakurikuler->get_all(),
            'isi'       => 'admin/ekstrakurikuler/v_ekskul'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

     public function add_ekskul()
    {
        $this->form_validation->set_rules('nama_ekstrakurikuler', 'Nama Ekstrakurikuler', 'required');
        $this->form_validation->set_rules('ket_ekstrakurikuler', 'Keterangan Ekstrakurikuler', 'required');

        if ($this->form_validation->run() == FALSE) {
                $data = array(
                'title'     => 'Admin',
                'title1'    => 'SMP NEGERI ALOK',
                'title2'    => 'Kegiatan',
                'title3'    => 'Tambah Ekstrakurikuler',
                'isi'       => 'admin/ekstrakurikuler/v_add_ekskul'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE); // view form tambah
        } else {
            // Konfigurasi upload
            $config['upload_path']   = './foto_ekstrakurikuler/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = 'foto_ekskul_' . time();

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_ekstrakurikuler')) {
                $data = array(
                    'title' => 'Tambah Ekstrakurikuler',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'admin/ekstrakurikuler/v_add_ekskul'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'nama_ekstrakurikuler'  => $this->input->post('nama_ekstrakurikuler'),
                    'ket_ekstrakurikuler'   => $this->input->post('ket_ekstrakurikuler'),
                    'foto_ekstrakurikuler'           => $upload_data['file_name'],
                    'tgl_input'             => date('Y-m-d H:i:s')
                );
                $this->M_ekstrakurikuler->insert($data);
                $this->session->set_flashdata('success', 'Ekstrakurikuler berhasil ditambahkan.');
                redirect('ekstrakurikuler');
            }
        }
    }

    public function edit($id_ekstrakurikuler)
    {
        $data['ekskul'] = $this->M_ekstrakurikuler->get_by_id($id_ekstrakurikuler);

        $this->form_validation->set_rules('nama_ekstrakurikuler', 'Nama Ekstrakurikuler', 'required');
        $this->form_validation->set_rules('ket_ekstrakurikuler', 'Keterangan Ekstrakurikuler', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan form edit
            $data['title']     = 'Admin';
            $data['title1']    = 'SMP NEGERI ALOK';
            $data['title2']    = 'Kegiatan';
            $data['title3']    = 'Edit Ekstrakurikuler';
            $data['isi']       = 'admin/ekstrakurikuler/v_edit_ekskul';
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            // Proses update data
            if (!empty($_FILES['foto_ekstrakurikuler']['name'])) {
                $config['upload_path'] = './foto_ekstrakurikuler/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = 'ekskul_' . time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_ekstrakurikuler')) {
                    $upload_data = $this->upload->data();

                    // Hapus foto lama
                    if ($data['ekskul']->foto_ekstrakurikuler && file_exists('./foto_ekstrakurikuler/' . $data['ekskul']->foto_ekstrakurikuler)) {
                        unlink('./foto_ekstrakurikuler/' . $data['ekskul']->foto_ekstrakurikuler);
                    }

                    $foto = $upload_data['file_name'];
                } else {
                    $data['error_upload'] = $this->upload->display_errors();
                    $data['title']     = 'Admin';
                    $data['title1']    = 'SMP NEGERI ALOK';
                    $data['title2']    = 'Kegiatan';
                    $data['title3']    = 'Edit Ekstrakurikuler';
                    $data['isi']       = 'admin/ekstrakurikuler/v_edit_ekskul';
                    $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    return;
                }
            } else {
                // Jika tidak upload foto baru, pakai foto lama
                $foto = $data['ekskul']->foto_ekstrakurikuler;
            }

            $id = $this->input->post('id_ekstrakurikuler');

            $update_data = array(
                'nama_ekstrakurikuler' => $this->input->post('nama_ekstrakurikuler'),
                'ket_ekstrakurikuler' => $this->input->post('ket_ekstrakurikuler'),
                'foto_ekstrakurikuler' => $foto
            );

            $this->M_ekstrakurikuler->update($id_ekstrakurikuler, $update_data);

            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('ekstrakurikuler');
        }
    }

    public function delete($id) {
        $ekskul = $this->M_ekstrakurikuler->get_by_id($id);
        if ($ekskul->foto_ekstrakurikuler != "") {
            unlink('./foto_ekstrakurikuler/' . $ekskul->foto_ekstrakurikuler);
        }

        $this->M_ekstrakurikuler->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('ekstrakurikuler');
    }
}
