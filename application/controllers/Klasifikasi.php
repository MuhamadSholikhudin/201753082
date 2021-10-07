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

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('klasifikasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // echo 'oke';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('klasifikasi/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id_klasifikasi)
    {
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi WHERE id_klasifikasi = $id_klasifikasi ")->row();
        $data['hakakses'] = [1, 2, 3];

        // echo 'oke';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('klasifikasi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $nama_klasifikasi = $this->input->post('nama_klasifikasi');
        $alamat_klasifikasi = $this->input->post('alamat_klasifikasi');
        $no_telp = $this->input->post('no_telp');
      
            $data = array(
              
                    'nama_klasifikasi'    =>  $nama_klasifikasi,
            'alamat_klasifikasi' =>  $alamat_klasifikasi,
            'no_telp' =>  $no_telp
                );
        
        // $this->Model_klasifikasi->tambah_klasifikasi($data, 'klasifikasi');
            redirect('klasifikasi/index');
        }

        public function aksi_edit(){


        $id_klasifikasi = $this->input->post('id_klasifikasi');
        $nama_klasifikasi = $this->input->post('nama_klasifikasi');
        $alamat_klasifikasi = $this->input->post('alamat_klasifikasi');
        $no_telp = $this->input->post('no_telp');



        $data = array(

            'nama_klasifikasi'    =>  $nama_klasifikasi,
            'alamat_klasifikasi' =>  $alamat_klasifikasi,
            'no_telp' =>  $no_telp      
        );


        $this->db->set($data);
        $this->db->where('id_klasifikasi', $id_klasifikasi);
        $this->db->update('klasifikasi');
        redirect('klasifikasi/index');

        }

    public function hapus($id_klasifikasi)
    {


        
        $this->db->delete('klasifikasi', array('id_klasifikasi' => $id_klasifikasi));
      
        redirect('klasifikasi');
    }

}
