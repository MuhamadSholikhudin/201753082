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

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('instansi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // echo 'oke';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('instansi/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id_instansi)
    {
        $data['instansi'] = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $id_instansi ")->row();
        $data['hakakses'] = [1, 2, 3];

        // echo 'oke';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('instansi/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $nama_instansi = $this->input->post('nama_instansi');
        $alamat_instansi = $this->input->post('alamat_instansi');
        $no_telp = $this->input->post('no_telp');
      
            $data = array(
              
                    'nama_instansi'    =>  $nama_instansi,
            'alamat_instansi' =>  $alamat_instansi,
            'no_telp' =>  $no_telp
                );
        
        $this->Model_instansi->tambah_instansi($data, 'instansi');
            redirect('instansi/index');
        }

        public function aksi_edit(){


        $id_instansi = $this->input->post('id_instansi');
        $nama_instansi = $this->input->post('nama_instansi');
        $alamat_instansi = $this->input->post('alamat_instansi');
        $no_telp = $this->input->post('no_telp');



        $data = array(

            'nama_instansi'    =>  $nama_instansi,
            'alamat_instansi' =>  $alamat_instansi,
            'no_telp' =>  $no_telp      
        );


        $this->db->set($data);
        $this->db->where('id_instansi', $id_instansi);
        $this->db->update('instansi');
        redirect('instansi/index');

        }

    public function hapus($id_instansi)
    {


        
        $this->db->delete('instansi', array('id_instansi' => $id_instansi));
      
        redirect('instansi');
    }

}
