<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
        // echo 'pegawai';
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // echo 'oke';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id_pegawai)
    {
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai ")->row();
        $data['hakakses'] = [1, 2, 3];

        // echo 'oke';
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pegawai/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        // $foto = $this->input->post('foto');
        $jabatan = $this->input->post('jabatan');
        $hakakses = $this->input->post('hakakses');
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        
        $foto = $_FILES['foto']['name'];
        // $file_ket_ijin = $_FILES['file_ket_ijin']['name'];

        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $new_foto = $this->upload->data('file_name');
        }

            $data = array(
                    //utang dagang 
                    'nama'    =>  $nama,
                    'nip' =>  $nip,
                    'foto' =>  $new_foto,
                    'jabatan'    =>  $jabatan,
                    'hakakses'    =>  $hakakses,
                    'username'    =>  $username,
                    'password'    =>  $password
                );


        // $this->db->query("INSERT INTO pegawai (nama, nip, jabatan, hakakses, username, password) VALUES 
        // ($nama, $nip, $jabatan, $hakakses, $username, $password )");

        //             $sql = "INSERT INTO pegawai (nama, nip, jabatan, hakakses, username, password) 
        //         VALUES (".$nama.", ".$nip.", ".$jabatan. ", " . $hakakses . ", " . $username . ",".$password.")";
        // $this->db->query($sql);


        // $this->db->insert('pegawai'); 
        
        $this->Model_pegawai->tambah_pegawai($data, 'pegawai');
            redirect('pegawai/index');
        }

        public function aksi_edit(){


        $id_pegawai = $this->input->post('id_pegawai');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        // $foto = $this->input->post('foto');
        $jabatan = $this->input->post('jabatan');
        $hakakses = $this->input->post('hakakses');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

            $cari_foto = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai")->row();

        $foto = $_FILES['foto']['name'];
        // $file_ket_ijin = $_FILES['file_ket_ijin']['name'];




        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            unlink(FCPATH . 'uploads/' . $cari_foto->foto);
            $new_foto = $this->upload->data('file_name');
        }else{
            $new_foto = $cari_foto->foto;
        }

        $data = array(
            //utang dagang 
            'nama'    =>  $nama,
            'nip' =>  $nip,
            'foto' =>  $new_foto,
            'jabatan'    =>  $jabatan,
            'hakakses'    =>  $hakakses,
            'username'    =>  $username,
            'password'    =>  $password
        );
        $this->db->set($data);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai');
        redirect('pegawai/index');

        }

    public function hapus($id_pegawai)
    {


        
        $this->db->delete('pegawai', array('id_pegawai' => $id_pegawai));
      
        redirect('pegawai');
    }

}
