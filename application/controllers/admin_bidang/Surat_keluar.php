<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hakakses') != "Admin Bidang") {
            $this->session->set_flashdata('pesan', "<script> alert('Username atau Password yang anda masukkan salah')</script>");
            $this->session->sess_destroy();
            redirect('auth/login');
        }
    }


    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $cari_kepala_bidang = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $id_user")->row();
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar JOIN membuat ON surat_keluar.id_suratkeluar = membuat.id_suratkeluar AND membuat.id_kepala_bidang = $cari_kepala_bidang->id_kepala_bidang ORDER BY surat_keluar.id_suratkeluar DESC")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_bidang/surat_keluar/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_bidang/surat_keluar/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_suratkeluar)
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        // $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_bidang/surat_keluar/edit', $data);
        $this->load->view('templates/footer');
    }

    public function lihat($id_suratkeluar)
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        // $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_bidang/surat_keluar/lihat', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $id_instansi = $this->input->post('id_instansi');
        // $no_urut = $this->input->post('no_urut');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $perihal = $this->input->post('perihal');
        $sifat_surat = $this->input->post('sifat_surat');
        $isi_ringkas = $this->input->post('isi_ringkas');
        $catatan = $this->input->post('catatan');
        $id_klasifikasi = $this->input->post('id_klasifikasi');

        $id_pengguna = $this->input->post('id_pengguna');
        // $index = $this->input->post('index');
        // $tanggal_teruskan = $this->input->post('tanggal_teruskan');
        // $status = $this->input->post('status');

        $data = array(
            'id_instansi'    =>  $id_instansi,
            // 'no_urut' =>  $no_urut,
            'tanggal_surat' =>  $tanggal_surat,
            'perihal' =>  $perihal,
            'sifat_surat'    =>  $sifat_surat,
            'isi_ringkas' =>  $isi_ringkas,
            'catatan' =>  $catatan,
            'id_klasifikasi' =>  $id_klasifikasi,
            'status' =>  0
            // 'no_suratkeluar'    =>  $no_suratkeluar,
            // 'index' =>  $index,
            // 'tanggal_teruskan' =>  $tanggal_teruskan,
        );
        $this->Model_surat_keluar->tambah_surat_keluar($data, 'surat_keluar');

        $cari_suratkeluar = $this->db->query("SELECT * FROM surat_keluar ORDER BY id_suratkeluar DESC LIMIT 1")->row();

        $datat = [
            'id_suratkeluar' => $cari_suratkeluar->id_suratkeluar,
            'id_kepala_bidang' => $id_pengguna,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        $this->Model_membuat->tambah_membuatt($datat, 'membuat');
        redirect('admin_bidang/surat_keluar/index');
    }

    public function aksi_edit()
    {
        $id_suratkeluar = $this->input->post('id_suratkeluar');
        $id_instansi = $this->input->post('id_instansi');
        // $no_urut = $this->input->post('no_urut');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $perihal = $this->input->post('perihal');
        $sifat_surat = $this->input->post('sifat_surat');
        $isi_ringkas = $this->input->post('isi_ringkas');
        $catatan = $this->input->post('catatan');
        $id_klasifikasi = $this->input->post('id_klasifikasi');

        $id_pengguna = $this->input->post('id_pengguna');
        // $status = $this->input->post('status');

        $data = array(
            'id_instansi'    =>  $id_instansi,
            // 'no_urut' =>  $no_urut,
            'tanggal_surat' =>  $tanggal_surat,
            'perihal' =>  $perihal,
            'sifat_surat'    =>  $sifat_surat,
            'isi_ringkas' =>  $isi_ringkas,
            'catatan' =>  $catatan,
            'id_klasifikasi' =>  $id_klasifikasi,
            'status' =>  0
        );
        $where = [
            'id_suratkeluar' => $id_suratkeluar
        ];
        $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');

        $datat = [
            'id_kepala_bidang' => $id_pengguna,
            'created_at' => date("Y-m-d H:i:s")
        ];
        $wheret = [
            'id_suratkeluar' => $id_suratkeluar
        ];
        $this->Model_membuat->update_datat($wheret, $datat, 'membuat');
        redirect('admin_bidang/surat_keluar/index');
    }

    public function lampiran($id_suratkeluar)
    {

        $data['surat_keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_suratkeluar = $id_suratkeluar")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin_bidang/surat_keluar/lampiran', $data);
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
        redirect('admin_bidang/surat_keluar/lampiran/' . $id_suratkeluar);
    }

    public function file_lampiran($id_lampiran)
    {
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin_bidang/surat_keluar/lihat_lampiran', $data);
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
        redirect('admin_bidang/surat_keluar/lampiran/' . $id_suratkeluar);
    }


    public function kirim($id_suratkeluar)
    {
        $cari_surat = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();

        $data = [
            'status' => 2,
            'tanggal_teruskan' => date('Y-m-d')
        ];

        $where = [
            'id_suratkeluar' => $id_suratkeluar
        ];

        $this->Model_surat_keluar->update_data($where, $data, 'surat_keluar');
        redirect('admin_bidang/surat_keluar/');
    }

public function hapus($id_suratkeluar){
        //cek setujui
        $cek_setujui = $this->db->query("SELECT * FROM setujui WHERE id_suratkeluar = $id_suratkeluar")->num_rows();
if($cek_setujui < 1){
            //cek penomoran 


            $cek_ = $this->db->query("SELECT * FROM penomoran WHERE id_suratkeluar = $id_suratkeluar")->num_rows();
           $where = [
                'id_suratkeluar' => $id_suratkeluar
           ];

//            $this->Model_mendata->hapus_data($where, 'mendata');
            $this->Model_membuat->hapus_data($where, 'membuat');
            //hapus surat masuk
            $this->Model_surat_keluar->hapus_data($where, 'surat_keluar');
            echo "<script> alert('Data Surat Masuk Berhasik di hapus')</script>";

            redirect('admin_tu/surat_masuk/');


}else{
            echo "<script> alert('Data Surat Masuk Berhasik di hapus')</script>";
            redirect('admin_tu/surat_masuk/');

}


    }

}
