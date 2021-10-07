<?php
class Auth extends CI_Controller{

    public function login(){
        
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib di Isi !']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib di Isi !']);

        if ($this->form_validation->run() == FALSE){
            $this->load->view('form_login');
           }else {
            $auth = $this->Model_auth->cek_login();
            if($auth == FALSE){
                $this->session->set_flashdata('pesan', "<script> alert('Username atau Password yang anda masukkan salah')</script>");

                    redirect('auth/login');
            }else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('hakakses', $auth->hakakses);
                $this->session->set_userdata('id_pegawai', $auth->id_pegawai);

                switch($auth->hakakses){
                    case "Admin TU" : redirect('dashboard');
                        break;
                    case "Admin Kepala":
                        redirect('dashboard');
                        break;
                    case "Admin Bidang":
                        redirect('dashboard');
                        break;
                    default: break;
                }
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }


    public function login_pemilik()
    {
        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib di Isi !']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib di Isi !']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/login_pemilik');
        } else {
            $auth = $this->Model_auth->cek_login_pemilik();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username Atau Password Anda Salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');

                redirect('auth/login_pemilik');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('nama_lengkap', $auth->nama_lengkap);
                $this->session->set_userdata('bagian', $auth->bagian);
                $this->session->set_userdata('id_user', $auth->id_user);

                switch ($auth->bagian) {
                    case 'pemilik':
                        redirect('pemilik/dashboard/');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logou_pemilik()
    {
        $this->session->sess_destroy();
        redirect('auth/login_pemilik');
    }
}