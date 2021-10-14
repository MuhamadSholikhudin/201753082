<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

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
        // echo 'instansi';
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/instansi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/instansi/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id_instansi)
    {
        $data['instansi'] = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $id_instansi ")->row();
        $data['hakakses'] = [1, 2, 3];

        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/instansi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $nama_instansi = $this->input->post('nama_instansi');
        $alamat_instansi = $this->input->post('alamat_instansi');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $kota = $this->input->post('kota');
            
            $data = array(
              
            'nama_instansi'    =>  $nama_instansi,
            'alamat_instansi' =>  $alamat_instansi,
            'no_telp' =>  $no_telp,
            'email' =>  $email,
            'kota' =>  $kota
                );
        
        $this->Model_instansi->tambah_instansi($data, 'instansi');
        $this->session->set_flashdata('pesan', "<script> alert('Data Instansi Berhasil ditambahkan')</script>");
            redirect('admin_tu/instansi/index');
        }

    public function aksi_edit(){

        $id_instansi = $this->input->post('id_instansi');
        $nama_instansi = $this->input->post('nama_instansi');
        $alamat_instansi = $this->input->post('alamat_instansi');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $kota = $this->input->post('kota');
            
        $data = array(
            'nama_instansi'    =>  $nama_instansi,
            'alamat_instansi' =>  $alamat_instansi,
            'no_telp' =>  $no_telp,
            'email' =>  $email,
            'kota' =>  $kota   
        );

        $this->db->set($data);
        $this->db->where('id_instansi', $id_instansi);
        $this->db->update('instansi');
        $this->session->set_flashdata('pesan', "<script> alert('Data Instansi Berhasil Di Ubah')</script>");        
        redirect('admin_tu/instansi/index');
    }

    public function hapus($id_instansi)
    {
                // $this->db->delete('instansi', array('id_instansi' => $id_instansi));
                // redirect('admin_tu/instansi');
        $cari_masuk = $this->db->query("SELECT * FROM surat_masuk WHERE id_instansi = $id_instansi ")->num_rows();
        if($cari_masuk < 1){
            $cari_keluar = $this->db->query("SELECT * FROM surat_keluar WHERE id_instansi = $id_instansi ")->num_rows();
            if ($cari_keluar < 1) {
                $this->db->delete('instansi', array('id_instansi' => $id_instansi));
                // echo "<script>alert('Data instansi berhasil di hapus ')</script>";
                $this->session->set_flashdata('pesan', "<script> alert('Data instansi berhasil di hapus. 
                                   ')</script>");
                redirect('admin_tu/instansi');
            } else {
                // echo "<script>alert('Data instansi tidak dapat di hapus masih di pakai oleh surat keluar !')</script>";
                $this->session->set_flashdata('pesan', "<script> alert('Data instansi tidak dapat di hapus masih di pakai oleh surat keluar. 
                                    ')</script>");
                redirect('admin_tu/instansi');
            }
        } else {
            // echo "<script>alert('Data instansi tidak dapat di hapus masih di pakai oleh surat masuk !')</script>";
            $this->session->set_flashdata('pesan', "<script> alert('Data instansi tidak dapat di hapus masih di pakai oleh surat masuk !. 
                                    ')</script>");
            redirect('admin_tu/instansi');
        }
      
    }

}
