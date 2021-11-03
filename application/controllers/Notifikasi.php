<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{

    public function surat_masuk($id_suratmasuk, $id_user){

        $cari_kepala = $this->db->query("SELECT * FROM user WHERE id_user = $id_user AND hakakses = 'Admin Kepala'AND status = 1 LIMIT 1")->row();        

        if($cari_kepala->status == 1){
            $this->session->set_userdata('username', $cari_kepala->username);
            $this->session->set_userdata('hakakses', $cari_kepala->hakakses);
            $this->session->set_userdata('id_user', $cari_kepala->id_user);

            $cari_surat = $this->db->query("SELECT * FROM surat_masuk WHERE id_suratmasuk = $id_suratmasuk")->row();

            if($cari_surat < 4){ //surat belum di validasi
                
                redirect('admin_kepala/validasi_surat_masuk/cek/'. $id_suratmasuk);
            }else{ //surat sudah di validasi
                redirect('admin_kepala/validasi_surat_masuk/lihat/'. $id_suratmasuk);
            }
        }else{
            redirect('auth/login');
        }
    }

    public function surat_keluar($id_suratkeluar, $id_user){

        $cari_kepala = $this->db->query("SELECT * FROM user WHERE id_user = $id_user AND hakakses = 'Admin Kepala'AND status = 1 LIMIT 1")->row();        

        if($cari_kepala->status == 1){
            $this->session->set_userdata('username', $cari_kepala->username);
            $this->session->set_userdata('hakakses', $cari_kepala->hakakses);
            $this->session->set_userdata('id_user', $cari_kepala->id_user);

            $cari_surat = $this->db->query("SELECT * FROM surat_keluar WHERE id_suratkeluar = $id_suratkeluar")->row();

            if($cari_surat < 4){ //surat belum di validasi
                
                redirect('admin_kepala/persetujuan_surat_keluar/cek/'. $id_suratkeluar);
            }else{ //surat sudah di validasi
                redirect('admin_kepala/persetujuan_surat_keluar/lihat/'. $id_suratkeluar);
            }
        }else{
            redirect('auth/login');
        }
    }

}