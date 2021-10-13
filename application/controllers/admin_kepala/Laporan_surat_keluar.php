<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_surat_keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hakakses') != "Admin Kepala") {
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
    //     $this->load->view('admin_kepala/laporan_surat_masuk/index', $data);
    //     $this->load->view('templates/footer');
    // }

    public function index()
    {
        $this->form_validation->set_rules('pilihan', 'pilihan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
            $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

            $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar ")->result();
            $data['cetak'] = ['normal'];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin_kepala/laporan_surat_keluar/index', $data);
            $this->load->view('templates/footer');
        } else {
            $pilihan = $this->input->post('pilihan');

            if ($pilihan == 'tanggal') {

                $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
                $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

                $tanggal_awal = $this->input->post('tanggal_awal');
                $tanggal_akhir = $this->input->post('tanggal_akhir');

                $data['cetak'] = ['tanggal'];
                $data['tanggal'] = [$tanggal_awal,  $tanggal_akhir];
                $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE tanggal_surat BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->result();


                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('admin_kepala/laporan_surat_keluar/index', $data);
                $this->load->view('templates/footer');
            } elseif ($pilihan == 'bulan') {

                $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
                $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $data['cetak'] = ['bulan'];
                $data['bulan'] = [$bulan,  $tahun];

                $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE MONTH(tanggal_surat) = '$bulan' AND YEAR(tanggal_surat) = '$tahun' ")->result();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('admin_kepala/laporan_surat_keluar/index', $data);
                $this->load->view('templates/footer');
            } elseif ($pilihan == 'tahun') {

                $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
                $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();

                $tahun = $this->input->post('tahun');
                $data['cetak'] = ['tahun'];
                $data['tahun'] = [$tahun];

                $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE YEAR(tanggal_surat) = '$tahun' ")->result();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar');
                $this->load->view('admin_kepala/laporan_surat_keluar/index', $data);
                $this->load->view('templates/footer');
            }
        }
    }


    public function cetak_surat_keluar_tanggal($tanggal_awal, $tanggal_akhir)
    {
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE tanggal_surat BETWEEN '$tanggal_awal' AND '$tanggal_akhir'")->result();
        $data['hal'] = ['pertanggal'];
        $data['tanggal'] = [$tanggal_awal, $tanggal_akhir];
        $this->load->view('admin_kepala/laporan_surat_keluar/cetak_laporan_surat_keluar', $data);
    }
    public function cetak_surat_keluar_bulan($bulan, $tahun)
    {
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE MONTH(tanggal_surat) = '$bulan' AND YEAR(tanggal_surat) = '$tahun' ")->result();
        $data['hal'] = ['bulan'];
        $data['bulan'] = [$bulan, $tahun];
        $this->load->view('admin_kepala/laporan_surat_keluar/cetak_laporan_surat_keluar', $data);
    }
    public function cetak_surat_keluar_tahun($tahun)
    {
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE  YEAR(tanggal_surat) = '$tahun' ")->result();
        $data['hal'] = ['tahun'];
        $data['tahun'] = [$tahun];
        $this->load->view('admin_kepala/laporan_surat_keluar/cetak_laporan_surat_keluar', $data);
    }

}
