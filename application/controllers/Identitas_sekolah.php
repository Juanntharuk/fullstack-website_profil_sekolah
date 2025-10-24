<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_sekolah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_identitas');
        $this->load->library('form_validation');
        $this->load->library('upload');
        // Upload library akan di-load ulang di fungsi update_kepala_sekolah supaya config bisa dinamis
    }

    // Fungsi menampilkan data kepala sekolah (sudah ada)
    public function kepala_sekolah() {
        $data = [
            'title1' => 'Identitas Sekolah',
            'title2' => 'Kepala Sekolah',
            'kepala' => $this->m_identitas->get_kepsek(),
            'isi' => 'admin/identitas_sekolah/v_kepsek'
        ];
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    // Fungsi form edit kepala sekolah (sudah ada)
    public function edit_kepsek() {
        $data = [
            'title1' => 'Identitas Sekolah',
            'title2' => 'Edit Kepala Sekolah',
            'kepala' => $this->m_identitas->get_kepsek(),
            'isi' => 'admin/identitas_sekolah/v_edit_kepsek'
        ];
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    // Fungsi update data kepala sekolah sekaligus upload foto
    public function update_kepala_sekolah() {
        $id = $this->input->post('id_identitas_sekolah', TRUE);
        $kepala = $this->m_identitas->get_kepsek();
        $foto_lama = $kepala['foto_kepsek'];

        // Validasi input text
        $this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required|trim');
        $this->form_validation->set_rules('sambutan_kepsek', 'Sambutan Kepala Sekolah', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form edit
            $this->edit_kepsek();
            return;
        }

        // Siapkan data update
        $data = [
            'nama_kepsek' => $this->input->post('nama_kepsek', TRUE),
            'sambutan_kepsek' => $this->input->post('sambutan_kepsek', TRUE)
        ];

        // Cek apakah ada file foto diupload
        if (!empty($_FILES['foto']['name'])) {
            // Konfigurasi upload
            $config['upload_path'] = './foto_kepsek/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = TRUE;
            $config['max_size'] = 2048; // Maksimal 2MB

            // Load library upload dengan konfigurasi ini
            $this->upload->initialize($config);

            if (!is_dir($config['upload_path'])) {
                die('Folder upload tidak ditemukan: ' . $config['upload_path']);
            }


            if ($this->upload->do_upload('foto')) {
                // Jika upload berhasil, hapus file lama (jika ada)
                if (!empty($foto_lama) && file_exists(FCPATH . 'foto_kepsek/' . $foto_lama)) {
                    unlink(FCPATH . 'foto_kepsek/' . $foto_lama);
                }

                $upload_data = $this->upload->data();
                $data['foto_kepsek'] = $upload_data['file_name'];
            } else {
                // Jika upload gagal, tampilkan pesan error dan kembali ke form edit
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('identitas_sekolah/edit_kepsek');
                return;
            }
        }

        // Update data di database lewat model
        $this->m_identitas->update_kepsek($id, $data);

        // Set pesan sukses
        $this->session->set_flashdata('pesan', 'Data Kepala Sekolah berhasil diperbarui');

        // Redirect ke halaman data kepala sekolah
        redirect('identitas_sekolah/kepala_sekolah');
    }

    // Menampilkan halaman sejarah sekolah
    public function sejarah_sekolah() {
        $data = [
            'title1' => 'Identitas Sekolah',
            'title2' => 'Sejarah Sekolah',
            'identitas' => $this->m_identitas->get_identitas(),
            'isi'    => 'admin/identitas_sekolah/v_sejarah'
        ];
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit_sejarah() {
        $data = [
            'title1' => 'Identitas Sekolah',
            'title2' => 'Edit Sejarah Sekolah',
            'identitas' => $this->m_identitas->get_identitas(),
            'isi'    => 'admin/identitas_sekolah/v_edit_sejarah'
        ];
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function update_sejarah() {
        $id = $this->input->post('id_identitas_sekolah', TRUE);
        $identitas = $this->m_identitas->get_identitas();
        $foto_lama = $identitas['foto_sekolah'];

        // Validasi input text
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'required|trim');
        $this->form_validation->set_rules('sejarah', 'Sejarah', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_sejarah();
            return;
        }

        // Data default
        $data = [
            'nama_sekolah' => $this->input->post('nama_sekolah', TRUE),
            'sejarah'      => $this->input->post('sejarah', TRUE),
        ];

        // Cek apakah ada file foto baru diupload
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './foto_sekolah/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite']     = TRUE;
            $config['max_size']      = 2048; // 2MB

            $this->upload->initialize($config);

            if (!is_dir($config['upload_path'])) {
                die('Folder upload tidak ditemukan: ' . $config['upload_path']);
            }

            if ($this->upload->do_upload('foto')) {
                // Jika upload berhasil, hapus foto lama (jika ada)
                if (!empty($foto_lama) && file_exists(FCPATH . 'foto_sekolah/' . $foto_lama)) {
                    unlink(FCPATH . 'foto_sekolah/' . $foto_lama);
                }

                $upload_data = $this->upload->data();
                $data['foto_sekolah'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
                redirect('identitas_sekolah/edit_sejarah');
                return;
            }
        }

        // Update data ke database lewat model
        $this->m_identitas->update_sejarah($id, $data);

        // Set pesan sukses
        $this->session->set_flashdata('pesan', 'Sejarah sekolah berhasil diperbarui');

        // Redirect ke halaman lihat sejarah
        redirect('identitas_sekolah/sejarah_sekolah');
    }

    // Visi
    public function visi_misi() {
        $data = [
            'title1' => 'Identitas Sekolah',
            'title2' => 'Visi & Misi Sekolah',
            'identitas' => $this->m_identitas->get_identitas(),
            'isi'    => 'admin/identitas_sekolah/v_visi_misi'
        ];
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function edit_visi_misi() {
        $data = [
            'title1' => 'Identitas Sekolah',
            'title2' => 'Edit Visi & Misi',
            'identitas' => $this->m_identitas->get_identitas(),
            'isi'    => 'admin/identitas_sekolah/v_edit_visi_misi'
        ];
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function update_visi_misi() {
        $id = $this->input->post('id_identitas_sekolah', TRUE);

        $this->form_validation->set_rules('visi', 'Visi Sekolah', 'required|trim');
        $this->form_validation->set_rules('misi', 'Misi Sekolah', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_visi_misi();
            return;
        }

        $data = [
            'visi' => $this->input->post('visi', TRUE),
            'misi' => $this->input->post('misi', TRUE)
        ];

        $this->m_identitas->update_visi_misi($id, $data);
        $this->session->set_flashdata('pesan', 'Visi & Misi sekolah berhasil diperbarui');
        redirect('identitas_sekolah/visi_misi');
    }

}
