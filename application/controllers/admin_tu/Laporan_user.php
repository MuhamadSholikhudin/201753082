<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hakakses') != "Admin TU") {
            $this->session->set_flashdata('pesan', "<script> alert('Username atau Password yang anda masukkan salah')</script>");
            $this->session->sess_destroy();
            redirect('auth/login');
        }
    }

    // public function index()
    // {
    //     $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
    //     $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

    //     $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE status > 1")->result();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('admin_tu/laporan_surat_masuk/index', $data);
    //     $this->load->view('templates/footer');
    // }

    public function index()
    {
        $this->form_validation->set_rules('hakakses', 'hakakses', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
            $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

            $data['user'] = $this->db->query("SELECT * FROM user ")->result();
         

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin_tu/laporan_user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $hakakses = $this->input->post('hakakses');

            if ($hakakses == 'Admin TU') {

                $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
                $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

                $user = $this->input->post('user');

                $data['cetak'] = ['tanggal'];
                // $data['tanggal'] = [$tanggal_awal,  $tanggal_akhir];
                $data['user'] = $this->db->query("SELECT * FROM user JOIN sub_umum_pegawai ON user.id_user = sub_umum_pegawai.id_user ")->result();


                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('admin_tu/laporan_user/index', $data);
                $this->load->view('templates/footer');
            } elseif ($hakakses == 'Admin Kepala') {

                $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
                $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();            

                $data['user'] = $this->db->query("SELECT * FROM user JOIN kepala_pelaksana ON user.id_user = kepala_pelaksana.id_user ")->result();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('admin_tu/laporan_user/index', $data);
                $this->load->view('templates/footer');
            } elseif ($hakakses == 'Admin Bidang') {

                $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
                $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

                $tahun = $this->input->post('tahun');
      

                $data['user'] = $this->db->query("SELECT * FROM user JOIN kepala_bidang ON user.id_user = kepala_bidang.id_user")->result();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('admin_tu/laporan_user/index', $data);
                $this->load->view('templates/footer');
            }elseif($hakakses == 'semua'){
                $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
                $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

                $user = $this->input->post('user');

                $data['cetak'] = ['tanggal'];
                // $data['tanggal'] = [$tanggal_awal,  $tanggal_akhir];
                $data['user'] = $this->db->query("SELECT * FROM user ")->result();


                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('admin_tu/laporan_user/index', $data);
                $this->load->view('templates/footer');
            }
        }
    }



    public function cetak_surat_masuk_tanggal($tanggal_awal, $tanggal_akhir)
    {
        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE tanggal_surat BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->result();
        $data['hal'] = ['pertanggal'];
        $data['tanggal'] = [$tanggal_awal, $tanggal_akhir];
        $this->load->view('admin_tu/laporan_surat_masuk/cetak_laporan_surat_masuk', $data);
    }
    public function cetak_surat_masuk_bulan($bulan, $tahun)
    {
        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE MONTH(tanggal_surat) = '$bulan' AND YEAR(tanggal_surat) = '$tahun' ")->result();
        $data['hal'] = ['bulan'];
        $data['bulan'] = [$bulan, $tahun];
        $this->load->view('admin_tu/laporan_surat_masuk/cetak_laporan_surat_masuk', $data);
    }
    public function cetak_surat_masuk_tahun($tahun)
    {
        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE  YEAR(tanggal_surat) = '$tahun' ")->result();
        $data['hal'] = ['tahun'];
        $data['tahun'] = [$tahun];
        $this->load->view('admin_tu/laporan_surat_masuk/cetak_laporan_surat_masuk', $data);
    }
}
