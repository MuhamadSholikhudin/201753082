<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_masuk extends CI_Controller
{
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

        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk ORDER BY id_suratmasuk DESC")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/surat_masuk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // echo 'oke';
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();

        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/surat_masuk/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_suratmasuk)
    {
        // echo 'oke';
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();
        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/surat_masuk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function lihat($id_suratmasuk)
    {
        $id_user = $this->session->userdata('id_user');
        $data['surat_valid'] = $this->db->query("SELECT * FROM surat_masuk JOIN disposisi WHERE surat_masuk.status = 4 AND disposisi.id_user = $id_user ")->result();

        $tampil_surat_masuk = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();


        if ($tampil_surat_masuk->status == 4) {

            $this->db->set('status', 5);
            $this->db->where('id_suratmasuk', $id_suratmasuk);
            $this->db->update('surat_masuk');
        } else {
        }

        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['instansi'] = $this->db->query("SELECT * FROM instansi")->result();
        $data['klasifikasi'] = $this->db->query("SELECT * FROM klasifikasi")->result();
        $data['terus'] = $this->db->query("SELECT * FROM user WHERE hakakses != 'Admin Kepala'")->result();

        $data['sifat_surat'] = ['Penting', 'Biasa'];
        $data['klasifikasi_surat'] = ['Umum', 'Pemerintahan'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/surat_masuk/lihat', $data);
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
        $no_suratmasuk = $this->input->post('no_suratmasuk');
        $tanggal_teruskan = $this->input->post('tanggal_teruskan');
        $id_klasifikasi = $this->input->post('id_klasifikasi');
        $id_pengguna = $this->input->post('id_pengguna');
        //        $index = $this->input->post('index');
        // $status = $this->input->post('status');

        $file = $_FILES['file']['name'];

        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        //            $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/surat_masuk/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $new_file = $this->upload->data('file_name');
        }

        $data = array(
            'id_instansi'    =>  $id_instansi,
            'no_urut' =>  $no_urut,
            'tanggal_surat' =>  $tanggal_surat,
            'perihal' =>  $perihal,
            'sifat_surat'    =>  $sifat_surat,
            'isi_ringkas' =>  $isi_ringkas,
            'catatan' =>  $catatan,
            'no_suratmasuk'    =>  $no_suratmasuk,
            'file' =>  $new_file,
            'tanggal_teruskan' =>  $tanggal_teruskan,
            'id_klasifikasi' =>  $id_klasifikasi,
            'status' =>  0
        );

        // var_dump($data);
        // $this->db->insert('surat_keluar', $data);
        $this->Model_surat_masuk->tambah_surat_masuk($data, 'surat_masuk');


        $cari_suratmasuk = $this->db->query("SELECT * FROM surat_masuk ORDER BY id_suratmasuk DESC LIMIT 1")->row();

        $datat = [
            'id_suratmasuk' => $cari_suratmasuk->id_suratmasuk,
            'id_sub_umum_pegawai' => $id_pengguna,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        $this->Model_mendata->tambah_mendatat($datat, 'mendata');

        $this->session->set_flashdata('pesan', "<script> alert('Data Surat Masuk Berhasil ditambahkan')</script>");
        redirect('admin_tu/surat_masuk/index');
    }

    public function aksi_edit()
    {
        $id_suratmasuk = $this->input->post('id_suratmasuk');
        $id_instansi = $this->input->post('id_instansi');
        $no_urut = $this->input->post('no_urut');
        $tanggal_surat = $this->input->post('tanggal_surat');
        $perihal = $this->input->post('perihal');
        $sifat_surat = $this->input->post('sifat_surat');
        $isi_ringkas = $this->input->post('isi_ringkas');
        $catatan = $this->input->post('catatan');
        $no_suratmasuk = $this->input->post('no_suratmasuk');

        $tanggal_teruskan = $this->input->post('tanggal_teruskan');
        $id_klasifikasi = $this->input->post('id_klasifikasi');

        $file = $_FILES['file']['name'];

        $cari_file = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk ")->row();
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        //            $config['max_size']      = '2048';
        $config['upload_path'] = './uploads/surat_masuk/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            unlink(FCPATH . 'uploads/surat_masuk/' . $cari_file->file);
            $new_file = $this->upload->data('file_name');
        }

        $id_pengguna = $this->input->post('id_pengguna');

        $data = array(
            'id_instansi'    =>  $id_instansi,
            'no_urut' =>  $no_urut,
            'tanggal_surat' =>  $tanggal_surat,
            'perihal' =>  $perihal,
            'sifat_surat'    =>  $sifat_surat,
            'isi_ringkas' =>  $isi_ringkas,
            'catatan' =>  $catatan,
            'no_suratmasuk'    =>  $no_suratmasuk,
            'file' =>  $new_file,
            'tanggal_teruskan' =>  $tanggal_teruskan,
            'id_klasifikasi' =>  $id_klasifikasi
        );

        $where = [
            'id_suratmasuk' => $id_suratmasuk
        ];

        $datat = [
            'id_sub_umum_pegawai' => $id_pengguna,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        $wheret = [
            'id_suratmasuk' => $id_suratmasuk
        ];

        $this->Model_surat_masuk->update_data($where, $data, 'surat_masuk');
        $this->Model_mendata->update_datat($wheret, $datat, 'mendata');
        $this->session->set_flashdata('pesan', "<script> alert('Data Surat Masuk Berhasil ditambahkan')</script>");
        redirect('admin_tu/surat_masuk/index');
    }

    public function lampiran($id_suratmasuk)
    {

        $data['surat_masuk'] = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_suratmasuk = $id_suratmasuk")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/surat_masuk/lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_tambah_lampiran()
    {
        $id_suratmasuk = $this->input->post('id_suratmasuk');
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
            'id_suratmasuk' => $id_suratmasuk,
            'nama_lampiran' => $nama_lampiran,
            'file_lampiran' => $new_file_lampiran
        ];

        $this->Model_lampiran->tambah_lampiran($data, 'lampiran');
        redirect('admin_tu/surat_masuk/lampiran/' . $id_suratmasuk);
    }

    public function file_lampiran($id_lampiran)
    {
        $data['lampiran'] = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin_tu/surat_masuk/lihat_lampiran', $data);
        $this->load->view('templates/footer');
    }

    public function aksi_edit_lampiran()
    {
        $id_lampiran = $this->input->post('id_lampiran');
        $cari_lampiran = $this->db->query("SELECT * FROM lampiran WHERE id_lampiran = $id_lampiran")->row();

        $id_suratmasuk = $cari_lampiran->id_suratmasuk;

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
            'id_suratmasuk' => $id_suratmasuk,
            'nama_lampiran' => $nama_lampiran,
            'file_lampiran' => $new_file_lampiran
        ];

        $where = [
            'id_lampiran' => $id_lampiran
        ];

        $this->Model_lampiran->update_data($where, $data, 'lampiran');
        redirect('admin_tu/surat_masuk/lampiran/' . $id_suratmasuk);
    }


    public function kirim($id_suratmasuk)
    {
        $cari_surat = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();
        
        $cari_kepala = $this->db->query("SELECT * FROM user WHERE hakakses = 'Admin Kepala'AND  status = 1 LIMIT 1")->row();        
        
        $cari_instansi = $this->db->query("SELECT * FROM instansi WHERE id_instansi = $cari_surat->id_instansi")->row();

        //emailp
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'bpbdpati3@gmail.com',
            'smtp_pass' => 'passbpbd12',
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        
        $this->load->library('email', $config);
        
        $this->email->initialize($config);
        
        $this->email->from('bpbdpati3@gmail.com', 'BPBD PATI');
        $this->email->to($cari_kepala->email);
        $this->email->subject("SURAT MASUK - " . $cari_surat->sifat_surat);
        $this->email->message("
        <!DOCTYPE html>
        <html>
        <head>
        </head>
        <body>
        <h1>".$cari_instansi->nama_instansi ." - ". $cari_surat->sifat_surat ."</h1>
        <p>Untuk melihat surat masuk bpbd pati bisa klik link di bawah ini : </p>
        <a href='" . base_url('notifikasi/surat_masuk/'). $id_suratmasuk. "/". $cari_kepala->id_user . "' style='border: none; color: white; padding: 15px 32px;  text-align: center; text-decoration: none;  display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; background-color: #008CBA;' 
        class='button button2'>Lihat</a>
        </body>
        </html>");
        $this->email->send();

/*
        <!DOCTYPE html>
        <html>
        <head>
        </head>
        <body>
        <h1 >The button element - Styled with CSS</h1>
        <p>Change the background color of a button with the background-color property:</p>
        <a href='<?= base_url('admin_kepala/validasi_surat_masuk') ?>' style='border: none; color: white; padding: 15px 32px;  text-align: center; text-decoration: none;  display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; background-color: #008CBA;' 
        class='button button2'>Lihat</a>
        </body>
        </html>
*/
       
        $data = [
            'status' => 2,
            'tanggal_teruskan' => date('Y-m-d')
        ];

        $where = [
            'id_suratmasuk' => $id_suratmasuk
        ];

        $this->Model_surat_masuk->update_data($where, $data, 'surat_masuk');
        $this->session->set_flashdata('pesan', "<script> alert('Data Surat Masuk Berhasil dikirim ke kepala pelaksana')</script>");
        redirect('admin_tu/surat_masuk/');
        
    }


    public function hapus($id_suratmasuk)
    {
        //cek disposisi
        $cek_disposisi = $this->db->query("SELECT * FROM disposisi WHERE id_suratmasuk = $id_suratmasuk")->num_rows();
        if ($cek_disposisi < 1) {
            //cek mendata dan hapus
            $cek_mendata = $this->db->query("SELECT * FROM mendata WHERE id_suratmasuk = $id_suratmasuk")->num_rows();
            $where = [
                'id_suratmasuk' => $id_suratmasuk
            ];
            $this->Model_mendata->hapus_data($where, 'mendata');
            //hapus surat masuk
            $this->Model_surat_masuk->hapus_data($where, 'surat_masuk');
            $this->session->set_flashdata('pesan', "<script> alert('Data Surat Masuk Berhasik di hapus')</script>");

            redirect('admin_tu/surat_masuk/');
        } else {
            $this->session->set_flashdata('pesan', "<script> alert('Data Surat Masuk tidak dapat di hapus')</script>");
            redirect('admin_tu/surat_masuk/');
        }
    }
}
