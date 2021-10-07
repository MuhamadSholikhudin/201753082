<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Validasi_surat_masuk extends CI_Controller
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
        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE status > 0")->result();
        $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 1")->result();
        $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 1")->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('validasi_surat_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function lihat($id_suratmasuk)
    {
        $tampil_surat_masuk = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();

        if($tampil_surat_masuk->status == 4){
        } else {
            $this->db->set('status', 2);
            $this->db->where('id_suratmasuk', $id_suratmasuk);
            $this->db->update('surat_masuk');
        }        

        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 1")->result();
        $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 1")->result();
        
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $data['terus'] = $this->db->query("SELECT * FROM user WHERE hakakses != 'Admin Kepala'")->result();


        $data['sifat_surat'] = ['Penting', 'Biasa'];
        $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('validasi_surat_masuk/lihat', $data);
        $this->load->view('templates/footer');
    }



    public function aksi_validasi()
    {
        $id_suratmasuk = $this->input->post('id_suratmasuk');
        $cari_surat = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();

        $checkbox = $this->input->post("cek");

        $vekk = implode(",", $checkbox);

        echo $vekk;
        echo "<br>";

        $pecah = explode(",", $vekk);

        print_r($pecah);
        echo "<br>";

        $no = 0;
        foreach ($pecah as $ve) :
            $no += $ve;
        endforeach;
        echo $no;

        if ($no < 4) {
            $cari_validasi = $this->db->query("SEELCT * FROM disposisi WHERE id_suratmasuk = $id_suratmasuk");

            
            if($cari_validasi->num_rows() > 0){
                $tampil_disposisi = $cari_validasi->row();
                $teruskan_ke = $this->input->post('teruskan_ke');
                // $tanggal_validasi = $this->input->post('tanggal_validasi');
                $catatan = $this->input->post('catatan_disposisi');
                $datat = [
                    // 'status' => $cari_surat->status
                    'id_suratmasuk' => $id_suratmasuk,
                    'teruskan_ke' => $teruskan_ke,
                    'tanggal_validasi' => date('Y-m-d H:i:s'),
                    'catatan' => $catatan,
                    'status' => 1
                ];

                $data = [
                    'status' => 0
                ];

                $where = [
                    'id_suratmasuk' => $id_suratmasuk
                ];
                $wheret = [
                    'id_disposisi' => $tampil_disposisi->id_disposisi
                ];
                $this->Model_surat_masuk->update_data($where, $data, 'surat_masuk');
                $this->Model_disposisi->update_datat($wheret, $datat, 'disposisi');

            }else{
                $teruskan_ke = $this->input->post('teruskan_ke');
                // $tanggal_validasi = $this->input->post('tanggal_validasi');
                $catatan = $this->input->post('catatan_disposisi');
                $datat = [
                    // 'status' => $cari_surat->status
                    'id_suratmasuk' => $id_suratmasuk,
                    'teruskan_ke' => $teruskan_ke,
                    'tanggal_validasi' => date('Y-m-d H:i:s'),
                    'catatan' => $catatan,
                    'status' => 1
                ];

                $data = [
                    'status' => 0
                ];

                $where = [
                    'id_suratmasuk' => $id_suratmasuk
                ];

                $this->Model_lampiran->tambah_lampiran($datat, 'disposisi');
                $this->Model_surat_masuk->update_data($where, $data, 'surat_masuk');

            }

            

            redirect('validasi_surat_masuk/');


        } elseif ($no == 4) {

            $teruskan_ke = $this->input->post('teruskan_ke');
            // $tanggal_validasi = $this->input->post('tanggal_validasi');
            $catatan = $this->input->post('catatan_disposisi');


            $datat = [
                // 'status' => $cari_surat->status
                'id_suratmasuk' => $id_suratmasuk,
                'teruskan_ke' => $teruskan_ke,
                'tanggal_validasi' => date('Y-m-d H:i:s'),
                'catatan' => $catatan,
                'status' => 1
            ];


            $data = [
                // 'status' => $cari_surat->status
                'status' => 4
            ];

            $where = [
                'id_suratmasuk' => $id_suratmasuk
            ];

            $this->Model_lampiran->tambah_lampiran($datat, 'disposisi');
            $this->Model_surat_masuk->update_data($where, $data, 'surat_masuk');


            redirect('validasi_surat_masuk/');
        }
    }

    public function lampiran($id_suratmasuk)
    {
        $data['surat_kirim'] = $this->db->query("SELECT * FROM surat_masuk WHERE status = 1")->result();
        $data['surat_keluar_baru'] = $this->db->query("SELECT * FROM surat_keluar WHERE status = 1")->result();
        

        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_suratmasuk = $id_suratmasuk")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('validasi_surat_masuk/lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function file_lampiran($id_lampiran)
    {
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('validasi_surat_masuk/lihat_lampiran', $data);
        $this->load->view('templates/footer');
    }



}
