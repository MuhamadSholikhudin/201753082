<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat_masuk extends CI_Controller
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

    public function index()
    {
        // $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();
        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk")->result();


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // echo 'oke';
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_masuk/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_suratmasuk)
    {
        // echo 'oke';
        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_masuk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $id_instansi = $this->input->post('id_instansi');
        $no_urut = $this->input->post('no_urut');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $perihal = $this->input->post('perihal');
        $sifat_surat = $this->input->post('sifat_surat');
        $isi_ringkas = $this->input->post('isi_ringkas');
        $catatan = $this->input->post('catatan');
        $no_suratmasuk = $this->input->post('no_suratmasuk');
        $index = $this->input->post('index');
        $tanggal_teruskan = $this->input->post('tanggal_teruskan');
        $klasifikasi_surat = $this->input->post('klasifikasi_surat');
        // $status = $this->input->post('status');

        $data = array(
            'id_instansi'    =>  $id_instansi,
            'no_urut' =>  $no_urut,
            'tanggal_surat' =>  $tanggal_surat,
            'perihal' =>  $perihal,
            'sifat_surat'    =>  $sifat_surat,
            'isi_ringkas' =>  $isi_ringkas,
            'catatan' =>  $catatan,
            'no_suratmasuk'    =>  $no_suratmasuk,
            'index' =>  $index,
            'tanggal_teruskan' =>  $tanggal_teruskan,
            'klasifikasi_surat' =>  $klasifikasi_surat,
            'status' =>  0
        );

        // var_dump($data);
        // $this->db->insert('surat_keluar', $data);

        $this->Model_surat_masuk->tambah_surat_masuk($data, 'surat_masuk');
        redirect('surat_masuk/index');
    }

    public function aksi_edit()
    {
        $id_suratmasuk = $this->input->post('id_suratmasuk');
        $id_instansi = $this->input->post('id_instansi');
        $no_urut = $this->input->post('no_urut');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $perihal = $this->input->post('perihal');
        $sifat_surat = $this->input->post('sifat_surat');
        $isi_ringkas = $this->input->post('isi_ringkas');
        $catatan = $this->input->post('catatan');
        $no_suratmasuk = $this->input->post('no_suratmasuk');
        $index = $this->input->post('index');
        $tanggal_teruskan = $this->input->post('tanggal_teruskan');
        $klasifikasi_surat = $this->input->post('klasifikasi_surat');
        // $status = $this->input->post('status');

        $data = array(
            'id_instansi'    =>  $id_instansi,
            'no_urut' =>  $no_urut,
            'tanggal_surat' =>  $tanggal_surat,
            'perihal' =>  $perihal,
            'sifat_surat'    =>  $sifat_surat,
            'isi_ringkas' =>  $isi_ringkas,
            'catatan' =>  $catatan,
            'no_suratmasuk'    =>  $no_suratmasuk,
            'index' =>  $index,
            'tanggal_teruskan' =>  $tanggal_teruskan,
            'klasifikasi_surat' =>  $klasifikasi_surat,
            'status' =>  0
        );

        $where = [
            'id_suratmasuk' => $id_suratmasuk
        ];

        $this->Model_surat_masuk->update_data($where, $data, 'surat_masuk');
        redirect('surat_masuk/index');
    }

    public function lampiran($id_suratmasuk)
    {

        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_suratmasuk = $id_suratmasuk")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_masuk/lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah_lampiran()
    {
        $id_suratmasuk = $this->input->post('id_suratmasuk');
        $nama_lampiran = $this->input->post('nama_lampiran');
        $file_lampiran = $_FILES['file_lampiran']['name'];
        // $file_ket_ijin = $_FILES['file_ket_ijin']['name'];

        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/lampiran/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_lampiran')) {
            $new_file_lampiran = $this->upload->data('file_name');
        }
        $data = [
            'id_suratmasuk' => $id_suratmasuk,
            'nama_lampiran' => $nama_lampiran,
            'file_lampiran' => $new_file_lampiran
        ];

        $this->Model_lampiran->tambah_lampiran($data, 'lampiran');
        redirect('surat_masuk/lampiran/'. $id_suratmasuk);

    }

    public function file_lampiran($id_lampiran){
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_masuk/lihat_lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit_lampiran()
    {
        $id_lampiran = $this->input->post('id_lampiran');
        $cari_lampiran = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $id_suratmasuk = $cari_lampiran->id_suratmasuk;

        $nama_lampiran = $this->input->post('nama_lampiran');

        unlink(FCPATH . 'uploads/lampiran/' . $cari_lampiran->file_lampiran);

        $file_lampiran = $_FILES['file_lampiran']['name'];


        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/lampiran/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_lampiran')) {
            $new_file_lampiran = $this->upload->data('file_name');
        }

        $data = [
            'id_suratmasuk' => $id_suratmasuk,
            'nama_lampiran' => $nama_lampiran,
            'file_lampiran' => $new_file_lampiran
        ];

        $where = [
            'id_lampiran' => $id_lampiran
        ];

        $this->Model_lampiran->update_data($where, $data, 'lampiran');
        redirect('surat_masuk/lampiran/'. $id_suratmasuk );
    }


    public function kirim($id_suratmasuk){
        $cari_surat = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();

        $data = [
           
            // 'status' => $cari_surat->status
            'status' => 1
        ];

        $where = [
            'id_suratmasuk' => $id_suratmasuk
        ];

        $this->Model_surat_masuk->update_data($where, $data, 'surat_masuk');
        redirect('surat_masuk/');


    }
}
