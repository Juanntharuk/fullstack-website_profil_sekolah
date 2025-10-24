<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_prestasi');
        $this->load->helper(['url', 'form']);
        $this->load->library(['upload', 'form_validation']);
    }

    public function index() 
    {
        $data = array(
            'title'     => 'Admin',
            'title1'    => 'SMP NEGERI ALOK',
            'title2'    => 'Kegiatan',
            'title3'    => 'Prestasi',
            'prestasi'     => $this->M_prestasi->get_all(),
            'isi'       => 'admin/prestasi/v_prestasi'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

     public function add_prestasi()
    {
        $this->form_validation->set_rules('nama_prestasi', 'Nama Prestasi', 'required');
        $this->form_validation->set_rules('ket_prestasi', 'Keterangan Prestasi', 'required');

        if ($this->form_validation->run() == FALSE) {
                $data = array(
                'title'     => 'Admin',
                'title1'    => 'SMP NEGERI ALOK',
                'title2'    => 'Kegiatan',
                'title3'    => 'Tambah Prestasi',
                'isi'       => 'admin/prestasi/v_add_prestasi'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE); // view form tambah
        } else {
            // Konfigurasi upload
            $config['upload_path']   = './foto_prestasi/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048; // 2MB
            $config['file_name']     = 'foto_prestasi_' . time();

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto_prestasi')) {
                $data = array(
                    'title' => 'Tambah Prestasi',
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'admin/prestasi/v_add_prestasi'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'nama_prestasi' => $this->input->post('nama_prestasi'),
                    'ket_prestasi' => $this->input->post('ket_prestasi'),
                    'foto_prestasi' => $upload_data['file_name'],
                    'tgl_input' => date('Y-m-d H:i:s')
                );
                $this->M_prestasi->insert($data);
                $this->session->set_flashdata('success', 'Prestasi berhasil ditambahkan.');
                redirect('prestasi');
            }
        }
    }

    public function edit($id_prestasi)
    {
        $data['prestasi'] = $this->M_prestasi->get_by_id($id_prestasi);

        $this->form_validation->set_rules('nama_prestasi', 'Nama Prestasi', 'required');
        $this->form_validation->set_rules('ket_prestasi', 'Keterangan Prestasi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan form edit
            $data['title']     = 'Admin';
            $data['title1']    = 'SMP NEGERI ALOK';
            $data['title2']    = 'Kegiatan';
            $data['title3']    = 'Edit Prestasi';
            $data['isi']       = 'admin/prestasi/v_edit_prestasi';
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            // Proses update data
            if (!empty($_FILES['foto_prestasi']['name'])) {
                $config['upload_path'] = './foto_prestasi/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048;
                $config['file_name'] = 'prestasi_' . time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_prestasi')) {
                    $upload_data = $this->upload->data();

                    // Hapus foto lama
                    if ($data['prestasi']->foto_prestasi && file_exists('./foto_prestasi/' . $data['prestasi']->foto_prestasi)) {
                        unlink('./foto_prestasi/' . $data['prestasi']->foto_prestasi);
                    }

                    $foto = $upload_data['file_name'];
                } else {
                    $data['error_upload'] = $this->upload->display_errors();
                    $data['title']     = 'Admin';
                    $data['title1']    = 'SMP NEGERI ALOK';
                    $data['title2']    = 'Kegiatan';
                    $data['title3']    = 'Edit Prestasi';
                    $data['isi']       = 'admin/prestasi/v_edit_prestasi';
                    $this->load->view('admin/layout/v_wrapper', $data, FALSE);
                    return;
                }
            } else {
                // Jika tidak upload foto baru, pakai foto lama
                $foto = $data['prestasi']->foto_prestasi;
            }

            $id = $this->input->post('id_prestasi');

            $update_data = array(
                'nama_prestasi' => $this->input->post('nama_prestasi'),
                'ket_prestasi' => $this->input->post('ket_prestasi'),
                'foto_prestasi' => $foto
            );

            $this->M_prestasi->update($id_prestasi, $update_data);

            $this->session->set_flashdata('success', 'Data berhasil diperbarui.');
            redirect('prestasi');
        }
    }

    public function delete($id) {
        $prestasi = $this->M_prestasi->get_by_id($id);
        if ($prestasi->foto_prestasi != "") {
            unlink('./foto_prestasi/' . $prestasi->foto_prestasi);
        }

        $this->M_prestasi->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('prestasi');
    }
}
