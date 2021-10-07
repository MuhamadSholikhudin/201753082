<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function index()
    {
        echo 'oke1';
        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        // $this->load->view('templates/content');
        // $this->load->view('templates/footer');
    }

    public function ind()
    {
        $this->load->view('templates_olshop/header');
        $this->load->view('templates_olshop/navbar');
        $this->load->view('templates_olshop/isi');
        $this->load->view('templates_olshop/footer');
    }
    
	// public function index()
	// {
	// 	// $this->load->Model('Model_barang');
	// 	// $data['barang'] = $this->Model_barang->tampil_data()->result();
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/sidebar');
	// 	$this->load->view('dashboard');
	// 	$this->load->view('templates/footer');
	// }

    //  public function search()
    // {
    //     $keyword = $this->input->post('keyword');
    //     $data['barang'] = $this->Model_barang->get_keyword($keyword);
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('dashboard', $data);
    //     $this->load->view('templates/footer');
    // }
}
