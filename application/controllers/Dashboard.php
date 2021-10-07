<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $cari_user = $this->db->query("SELECT * FROM user WHERE id_user = $id_user")->row();

        if ($cari_user->hakakses == 'Admin TU') {
            $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.teruskan_ke = $id_user ")->result();
        } elseif ($cari_user->hakakses == 'Admin Kepala') {
            $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 1")->result();
            $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 1")->result();
        
        } elseif ($cari_user->hakakses == 'Admin Bidang') {
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/index', $data );
        $this->load->view('templates/footer');
    }
}