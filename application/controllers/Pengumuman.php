<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('m_pengumuman');
        $this->load->model('m_siswa');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Admin',
            'title1'        => 'SMP NEGERI ALOK',
            'title2'        => 'Pengumuman',
            'pengumuman'    => $this->m_pengumuman->lists(),
            'isi'           => 'admin/pengumuman/v_lists'
        );
        $this->load->view('admin/layout/v_wrapper',$data,FALSE);
    }

    public function add() 
    {
        $this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');
        $this->form_validation->set_rules('isi_pengumuman', 'Isi Pengumuman', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'  => 'Admin',
                'title1' => 'SMP NEGERI ALOK',
                'title2' => 'Add Pengumuman',
                'isi'    => 'admin/pengumuman/v_add'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);

        } else {
            // 1. Simpan ke DB
            $judul   = $this->input->post('judul_pengumuman');
            $isi     = $this->input->post('isi_pengumuman');
            $tanggal = date('Y-m-d');

            $data = array(
                'judul_pengumuman' => $judul,
                'isi_pengumuman'   => $isi,
                'tgl_pengumuman'   => $tanggal
            );
            $this->m_pengumuman->add($data);

            // 2. Ambil nomor siswa murid aktif
            $siswa = $this->m_siswa->getNomorWaliMuridAktif();

            // 3. Format pesan WA
           

            // 4. Kirim pesan WA via Fonnte
           foreach ($siswa as $siswa) {
                $no_wa = preg_replace('/^0/', '62', $siswa->no_wa);

                // Sesuaikan format pesan di dalam loop
                $pesan = "📢 [INFO SMP NEGERI ALOK] 📢\n\n"
                    . "Kepada orangtua/wali murid atas nama: {$siswa->nama_siswa}\n\n"
                    . "Judul   : {$judul}\n"
                    . "Isi     : {$isi}\n"
                    . "Tanggal : {$tanggal}\n\n"
                    . "Terima Kasih Atas Perhatian Bapak/Ibu.\n\n"
                    . "Salam hangat, SMP NEGERI ALOK.";

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => array(
                        'target' => $no_wa,
                        'message' => $pesan
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: '.$this->config->item('fonnte_token')
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);

                // 🔎 Tambahkan log & flashdata untuk debugging
                log_message('error', "Fonnte -> {$no_wa}: {$response}");
                $this->session->set_flashdata('fonnte_response_'.$no_wa, $response);
            }
            // 5. Redirect setelah semua pesan dikirim
            $this->session->set_flashdata('pesan', 'Pengumuman berhasil ditambahkan & pesan WA dikirim!');
            redirect('pengumuman');
        }
    }


    public function edit($id_pengumuman) 
    {
        $this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');
        $this->form_validation->set_rules('isi_pengumuman', 'Isi Pengumuman', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'         => 'Admin',
                'title1'        => 'SMP NEGERI ALOK',
                'title2'        => 'Edit Pengumuman',
                'pengumuman'    =>  $this->m_pengumuman->detail($id_pengumuman),
                'isi'           => 'admin/pengumuman/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper',$data,FALSE);

        } else {
            // 1. Update data di DB
            $judul   = $this->input->post('judul_pengumuman');
            $isi     = $this->input->post('isi_pengumuman');
            $tanggal = date('Y-m-d');

            $data = array(
                'judul_pengumuman' => $judul,
                'isi_pengumuman'   => $isi,
                'tgl_pengumuman'   => $tanggal
            );
            $this->m_pengumuman->update($id_pengumuman, $data);

            // 2. Ambil semua siswa murid aktif
            $siswa = $this->m_siswa->getNomorWaliMuridAktif();

            // 3. Kirim pesan WA dengan format baru
            foreach ($siswa as $siswa) {
                $no_wa = preg_replace('/^0/', '62', $siswa->no_wa);

                $pesan = "📢 [INFO SMP NEGERI ALOK] 📢\n\n"
                    . "Kepada orangtua/wali murid atas nama: {$siswa->nama_siswa}\n\n"
                    . "Judul   : {$judul}\n"
                    . "Isi     : {$isi}\n"
                    . "Tanggal : {$tanggal}\n\n"
                    . "💡 MOHON MAAF BAPAK/IBU ADA PEMBARUAN ISI PENGUMUMAN.\n"
                    . "Terima kasih atas perhatian Bapak/Ibu.\n\n"
                    . "Salam hangat, SMP NEGERI ALOK.";

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => array(
                        'target' => $no_wa,
                        'message' => $pesan
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: '.$this->config->item('fonnte_token')
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);

                log_message('error', "Fonnte -> {$no_wa}: {$response}");
                $this->session->set_flashdata('fonnte_response_'.$no_wa, $response);
            }

            $this->session->set_flashdata('pesan', 'Pengumuman berhasil diperbarui & pesan WA dikirim!');
            redirect('pengumuman');
        }
    }


    public function delete($id_pengumuman) 
    {
        $data = array(
            'id_pengumuman' => $id_pengumuman,
        );
        $this->m_pengumuman->delete($id_pengumuman, $data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        redirect('pengumuman');
    }

}