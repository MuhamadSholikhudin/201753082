<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sub_umum_pegawai extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('sub_umum_pegawai');
    }

    public function tambah_sub_umum_pegawai($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tambah_sub_umum_pegawait($datat, $table)
    {
        $this->db->insert($table, $datat);
    }

    public function edit_sub_umum_pegawai($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function update_datat($wheret, $datat, $table)
    {
        $this->db->where($wheret);
        $this->db->update($table, $datat);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    function get_sub_umum_pegawai($keyword)
    {
        $query = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE  kode_sub_umum_pegawai LIKE '%$keyword%' OR nama_sub_umum_pegawai LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_sub_umum_pegawai($nama_sub_umum_pegawai)
    {
        $query = $this->db->query("SELECT * FROM sub_umum_pegawai WHERE   nama_sub_umum_pegawai LIKE '%$nama_sub_umum_pegawai%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_sub_umum_pegawai', $id)
            ->limit(1)
            ->get('sub_umum_pegawai');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_sub_umum_pegawai');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_sub_umum_pegawai');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
