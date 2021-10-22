<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_surat_keluar extends CI_Controller
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

    public function index()
    {
        $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
        $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 3")->result();
        
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE status > 1 ORDER BY id_suratkeluar DESC")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_kepala/persetujuan_surat_keluar/index', $data);
        $this->load->view('templates/footer');
    }

        public function cek($id_suratkeluar)
    {

        $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
        $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 2")->result();
        
        $tampil_surat_keluar = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();

        if($tampil_surat_keluar->status == 4){

        } else {
            $this->db->set('status', 3);
            $this->db->where('id_suratkeluar', $id_suratkeluar);
            $this->db->update('surat_keluar');
        }        

        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();       
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_kepala/persetujuan_surat_keluar/cek', $data);
        $this->load->view('templates/footer');
    }
    public function lihat($id_suratkeluar)
    {

        $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 2")->result();
        $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 2")->result();
        
             

        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();       
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_kepala/persetujuan_surat_keluar/lihat', $data);
        $this->load->view('templates/footer');
    }



    public function aksi_persetujuan()
    {
        $id_suratkeluar = $this->input->post('id_suratkeluar');
        $id_pengguna = $this->input->post('id_pengguna');
        $cari_surat = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();
        
        $checkbox = $this->input->post("cek");
        $vekk = implode(",", $checkbox);
        // echo $vekk;
        // echo "<br>";
        $pecah = explode(",", $vekk);
        // print_r($pecah);
        // echo "<br>";
        $no = 0;
        foreach ($pecah as $ve) :
            $no += $ve;
        endforeach;
        // echo $no;

        if ($no < 3) {
            $cari_persetujuan = $this->db->query("SELECT * FROM setujui WHERE id_suratkeluar = $id_suratkeluar");
           
            if($cari_persetujuan->num_rows() > 0){
                $tampil_setujui = $cari_persetujuan->row();
                $catatan = $this->input->post('catatan_setujui');

                $data = [
                    'status' => 1
                ];

                $where = [
                    'id_suratkeluar' => $id_suratkeluar
                ];

                $datat = [
                    'id_suratkeluar' => $id_suratkeluar,
                    'id_kepala_pelaksana' => $id_pengguna,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'catatan' => $catatan,
                    'status' => 1
                ];
                $wheret = [
                    'id_setujui' => $tampil_setujui->id_setujui
                ];
                $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');
                $this->Model_setujui->update_datat($wheret, $datat, 'setujui');
                redirect('admin_kepala/persetujuan_surat_keluar/');

            }else{
                $teruskan_ke = $this->input->post('teruskan_ke');
                $catatan = $this->input->post('catatan_setujui');
                // $tanggal_persetujuan = $this->input->post('tanggal_persetujuan');

                $data = [
                    'status' => 1
                ];

                $where = [
                    'id_suratkeluar' => $id_suratkeluar
                ];

                $datat = [
                    // 'status' => $cari_surat->status
                    'id_suratkeluar' => $id_suratkeluar,
                    'id_kepala_pelaksana' => $id_pengguna,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'catatan' => $catatan,
                    'status' => 0
                    
                ];

                $this->Model_setujui->tambah_setujuit($datat, 'setujui');
                $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');
                
                redirect('admin_kepala/persetujuan_surat_keluar/');
            }           



        } elseif ($no == 3) {

            $cari_persetujuan = $this->db->query("SELECT * FROM setujui WHERE id_suratkeluar = $id_suratkeluar");

            if ($cari_persetujuan->num_rows() > 0) {
                $tampil_setujui = $cari_persetujuan->row();
                $catatan = $this->input->post('catatan_setujui');

                $data = [
                    'status' => 4
                ];

                $where = [
                    'id_suratkeluar' => $id_suratkeluar
                ];

                $datat = [
                    'id_suratkeluar' => $id_suratkeluar,
                    'id_kepala_pelaksana' => $id_pengguna,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'catatan' => $catatan,
                    'status' => 1
                ];
                $wheret = [
                    'id_setujui' => $tampil_setujui->id_setujui
                ];
                $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');
                $this->Model_setujui->update_datat($wheret, $datat, 'setujui');
                redirect('admin_kepala/persetujuan_surat_keluar/');

            } else {
                $catatan = $this->input->post('catatan_setujui');

                $data = [
                    'status' => 4
                ];

                $where = [
                    'id_suratkeluar' => $id_suratkeluar
                ];

                $datat = [
                    'id_suratkeluar' => $id_suratkeluar,
                    'id_kepala_pelaksana' => $id_pengguna,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'catatan' => $catatan,
                    'status' => 1

                ];

                $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');
                $this->Model_setujui->tambah_setujuit($datat, 'setujui');

            redirect('admin_kepala/persetujuan_surat_keluar/');
            }
        }
    }

    public function lampiran($id_suratmasuk)
    {

        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_suratmasuk = $id_suratmasuk")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin_kepala/persetujuan_surat_masuk/lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function file_lampiran($id_lampiran)
    {
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin_kepala/persetujuan_surat_masuk/lihat_lampiran', $data);
        $this->load->view('templates/footer');
    }



}
