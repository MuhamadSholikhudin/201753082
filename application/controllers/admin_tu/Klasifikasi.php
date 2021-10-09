<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {
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
        // echo 'klasifikasi';
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $this->load->view('templates/header' , $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/klasifikasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        // echo 'oke';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/klasifikasi/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_klasifikasi)
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi WHERE id_klasifikasi = $id_klasifikasi ")->row();
        $data['hakakses'] = [1, 2, 3];

        // echo 'oke';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/klasifikasi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $no_klasifikasi = $this->input->post('no_klasifikasi');
        $klasifikasi = $this->input->post('klasifikasi');
        // $no_telp = $this->input->post('no_telp');

        $data = array(

            'no_klasifikasi'    =>  $no_klasifikasi,
            'klasifikasi' =>  $klasifikasi
        );

        $this->Model_klasifikasi->tambah_klasifikasi($data, 'klasifikasi');
        redirect('admin_tu/klasifikasi/index');
    }

        public function aksi_edit(){

        $id_klasifikasi = $this->input->post('id_klasifikasi');
        $no_klasifikasi = $this->input->post('no_klasifikasi');
        $klasifikasi = $this->input->post('klasifikasi');

        $data = array(

            'no_klasifikasi'    =>  $no_klasifikasi,
            'klasifikasi' =>  $klasifikasi    
        );

        $this->db->set($data);
        $this->db->where('id_klasifikasi', $id_klasifikasi);
        $this->db->update('klasifikasi');
        redirect('admin_tu/klasifikasi/index');

        }

    public function hapus($id_klasifikasi)
    {
        // $this->db->delete('instansi', array('id_instansi' => $id_instansi));
        // redirect('instansi');
        $cari_masuk = $this->db->query("SELECT * FROM surat_masuk WHERE id_klasifikasi = $id_klasifikasi ")->num_rows();
        if ($cari_masuk < 1) {
            $cari_keluar = $this->db->query("SELECT * FROM surat_keluar WHERE id_klasifikasi = $id_klasifikasi ")->num_rows();
            if ($cari_keluar < 1) {
                $this->db->delete('klasifikasi', array('id_klasifikasi' => $id_klasifikasi));
                // echo "<script>alert('Data instansi berhasil di hapus ')</script>";
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Data klasifikasi berhasil di hapus. 
                                    </div>');
                redirect('admin_tu/klasifikasi');
            } else {
                // echo "<script>alert('Data instansi tidak dapat di hapus masih di pakai oleh surat keluar !')</script>";
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Data klasifikasi tidak dapat di hapus masih di pakai oleh surat keluar. 
                                    </div>');
                redirect('admin_tu/klasifikasi');
            }
        } else {
            // echo "<script>alert('Data instansi tidak dapat di hapus masih di pakai oleh surat masuk !')</script>";
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Data klasifikasi tidak dapat di hapus masih di pakai oleh surat masuk !. 
                                    </div>');
            redirect('admin_tu/klasifikasi');
        }
    }

}
