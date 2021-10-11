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
        $data['status'] = ['Aktif', 'Tidak Aktif'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/user/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_user)
    {
        $id_userr = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_userr ")->result();
        
        $user = $this->db->query("SELECT * FROM user WHERE id_user = $id_user ")->row();
        $data['t_user'] = $this->db->query("SELECT * FROM user WHERE id_user = $id_user ")->row();

        if($user->hakakses == 'Admin TU'){
            $data['user'] = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE id_user = $id_user ")->row();
        }elseif($user->hakakses == 'Admin Kepala'){
            $data['user'] = $this->db->query("SELECT * FROM kepala_pelaksana WHERE id_user = $id_user ")->row();
        }elseif($user->hakakses == 'Admin Bidang'){
            $data['user'] = $this->db->query("SELECT * FROM kepala_bidang WHERE id_user = $id_user ")->row();
        }
        
        $data['pegawai'] = [1, 2, 3];
        $data['status'] = ['Aktif', 'Tidak Aktif'];

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
        $status = $this->input->post('status');
        $cari_user = $this->db->query("SELECT * FROM user WHERE username = '$username' ");

        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $jabatan = $this->input->post('jabatan');
        
        if ($cari_user->num_rows() < 1) {
            $datat = array(
                'hakakses'    =>  $hakakses,
                'username'    =>  $username,
                'password'    =>  $password,
                'status'      =>  $status
            );
            $this->Model_user->tambah_usert($datat, 'user');

            $cari_user_id = $this->db->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1")->row();

            $id_user = $cari_user_id->id_user;

            $foto = $_FILES['foto']['name'];

            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
            // $config['max_size']      = '2048';
            $config['upload_path'] = './uploads/foto/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $new_foto = $this->upload->data('file_name');
            }

            $data = array(
                'id_user' => $cari_user_id->id_user,
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
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hakakses = $this->input->post('hakakses');
        $status = $this->input->post('status');
        
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $jabatan = $this->input->post('jabatan');
        // $id_user = $this->input->post('id_user');
        
        $cari_foto = $this->db->query("SELECT * FROM user WHERE id_user = $id_user")->row();

        $foto = $_FILES['foto']['name'];
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/foto/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            unlink(FCPATH . 'uploads/' . $cari_foto->foto);
            $new_foto = $this->upload->data('file_name');
        }else{
            $new_foto = $cari_foto->foto;
        }

        $data = array(
            'username'    =>  $username,
            'password'    =>  $password,
            'status' => $status
        );
        $where = [
            'id_user' => $id_user
        ];

        $datat = array(
            'nama'    =>  $nama,
            'nip' =>  $nip,
            'foto' =>  $new_foto,
            'jabatan'    =>  $jabatan
        );
        $wheret = [
            'id_user' => $id_user
        ];

        $this->Model_user->update_data($where, $data, 'user');
        if ($hakakses == 'Admin TU') {
            $this->Model_sub_umum_pegawai->update_datat($wheret, $datat, 'sub_umum_pegawai');
        } elseif ($hakakses == 'Admin Kepala') {
            $this->Model_kepala_pelaksana->update_datat($wheret, $datat, 'kepala_pelaksana');
        } elseif ($hakakses == 'Admin Bidang') {
            $this->Model_kepala_bidang->update_datat($wheret, $datat, 'kepala_bidang');
        }

        redirect('admin_tu/user/index');

        }

    public function hapus($id_user)
    {


        
        $this->db->delete('user', array('id_user' => $id_user));
      
        redirect('admin_tu/user');
    }

}
