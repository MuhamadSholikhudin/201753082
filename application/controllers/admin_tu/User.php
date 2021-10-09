<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $data['user'] = $this->db->query("SELECT * FROM user")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/user/tambah');
        $this->load->view('templates/footer');
    }

    public function edit($id_user)
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        
        $user = $this->db->query("SELECT * FROM user WHERE id_user = $id_user ")->row();

        if($user->hakakses == 'Admin TU'){
            $data['user'] = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE id_user = $id_user ")->row();
        }elseif($user->hakakses == 'Admin Kepala'){
            $data['user'] = $this->db->query("SELECT * FROM kepala_pelaksana WHERE id_user = $id_user ")->row();
        }elseif($user->hakakses == 'Admin Bidang'){
            $data['user'] = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $id_user ")->row();
        }
        
        $data['pegawai'] = [1, 2, 3];

        // echo 'oke';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/user/edit', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah()
    {

        $hakakses = $this->input->post('hakakses');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cari_user = $this->db->query("SELECT * FROM user WHERE username = ");

        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $jabatan = $this->input->post('jabatan');
        
        if ($cari_user->num_rows() < 1) {
            $datat = array(

                'hakakses'    =>  $hakakses,
                'username'    =>  $username,
                'password'    =>  $password
            );
            $this->Model_user->tambah_usert($datat, 'user');

            $user_row = $cari_user->row();
            $id_user = $user_row->id_user;

            $foto = $_FILES['foto']['name'];

            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/foto/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $new_foto = $this->upload->data('file_name');
            }

            $data = array(
                'id_user' => $id_user,
                'nama'    =>  $nama,
                'nip' =>  $nip,
                'foto' =>  $new_foto,
                'jabatan'    =>  $jabatan
            );
            if ($hakakses == 'Admin TU') {
                $this->Model_sub_umum_pegawai->tambah_sub_umum_pegawai($data, 'sub_umum_pegawai');
            } elseif ($hakakses == 'Admin Kepala') {
                $this->Model_kepala_pelaksana->tambah_kepala_pelaksana($data, 'kepala_pelaksana');
            } elseif ($hakakses == 'Admin Bidang') {
                $this->Model_kepala_bidang->tambah_kepala_bidang($data, 'kepala_bidang');
            }
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Data User Berhasil di simpan . 
                                    </div>');
            redirect('admin_tu/user/index');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        Username Sudah terdaftar pada sistem. 
                                    </div>');
            redirect('admin_tu/user/index');
        }
    }

        public function aksi_edit(){


        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        // $foto = $this->input->post('foto');
        $jabatan = $this->input->post('jabatan');
        $hakakses = $this->input->post('hakakses');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

            $cari_foto = $this->db->query("SELECT * FROM user WHERE id_user = $id_user")->row();

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
        $this->db->where('id_user', $id_user);
        $this->db->update('user');
        redirect('admin_tu/user/index');

        }

    public function hapus($id_user)
    {


        
        $this->db->delete('user', array('id_user' => $id_user));
      
        redirect('admin_tu/user');
    }

}
