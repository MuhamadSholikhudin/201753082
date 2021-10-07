<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hakakses') == "") {
            $this->session->set_flashdata('pesan', "<script> alert('Username atau Password yang anda masukkan salah')</script>");
            $this->session->sess_destroy();
            redirect('auth/login');
        }
    }


    public function index()
    {
        // $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar")->result();


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // echo 'oke';
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_keluar/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_suratkeluar)
    {
        // echo 'oke';
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_keluar/edit', $data);
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
        $no_suratkeluar = $this->input->post('no_suratkeluar');
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
            'no_suratkeluar'    =>  $no_suratkeluar,
            'index' =>  $index,
            'tanggal_teruskan' =>  $tanggal_teruskan,
            'klasifikasi_surat' =>  $klasifikasi_surat,
            'status' =>  0
        );

        // var_dump($data);
        // $this->db->insert('surat_keluar', $data);

        $this->Model_surat_keluar->tambah_surat_keluar($data, 'surat_keluar');
        redirect('surat_keluar/index');
    }

    public function aksi_edit()
    {
        $id_suratkeluar = $this->input->post('id_suratkeluar');
        $id_instansi = $this->input->post('id_instansi');
        $no_urut = $this->input->post('no_urut');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $perihal = $this->input->post('perihal');
        $sifat_surat = $this->input->post('sifat_surat');
        $isi_ringkas = $this->input->post('isi_ringkas');
        $catatan = $this->input->post('catatan');
        $no_suratkeluar = $this->input->post('no_suratkeluar');
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
            'no_suratkeluar'    =>  $no_suratkeluar,
            'index' =>  $index,
            'tanggal_teruskan' =>  $tanggal_teruskan,
            'klasifikasi_surat' =>  $klasifikasi_surat,
            'status' =>  0
        );

        $where = [
            'id_suratkeluar' => $id_suratkeluar
        ];

        $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');
        redirect('surat_keluar/index');
    }

    public function lampiran($id_suratkeluar)
    {

        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_suratkeluar = $id_suratkeluar")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_keluar/lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah_lampiran()
    {
        $id_suratkeluar = $this->input->post('id_suratkeluar');
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
            'id_suratkeluar' => $id_suratkeluar,
            'nama_lampiran' => $nama_lampiran,
            'file_lampiran' => $new_file_lampiran
        ];

        $this->Model_lampiran->tambah_lampiran($data, 'lampiran');
        redirect('surat_keluar/lampiran/' . $id_suratkeluar);
    }

    public function file_lampiran($id_lampiran)
    {
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('surat_keluar/lihat_lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit_lampiran()
    {
        $id_lampiran = $this->input->post('id_lampiran');
        $cari_lampiran = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $id_suratkeluar = $cari_lampiran->id_suratkeluar;

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
            'id_suratkeluar' => $id_suratkeluar,
            'nama_lampiran' => $nama_lampiran,
            'file_lampiran' => $new_file_lampiran
        ];

        $where = [
            'id_lampiran' => $id_lampiran
        ];

        $this->Model_lampiran->update_data($where, $data, 'lampiran');
        redirect('surat_keluar/lampiran/' . $id_suratkeluar);
    }


    public function kirim($id_suratkeluar)
    {
        $cari_surat = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();

        $data = [

            // 'status' => $cari_surat->status
            'status' => 1
        ];

        $where = [
            'id_suratkeluar' => $id_suratkeluar
        ];

        $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');
        redirect('surat_keluar/');
    }
}
