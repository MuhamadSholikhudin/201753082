<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_mendata extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('mendata');
    }

    public function tambah_mendata($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tambah_mendatat($datat, $table)
    {
        $this->db->insert($table, $datat);
    }

    public function edit_mendata($where, $table)
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


    function get_mendata($keyword)
    {
        $query = $this->db->query("SELECT * FROM mendata WHERE  kode_mendata LIKE '%$keyword%' OR nama_mendata LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_mendata($nama_mendata)
    {
        $query = $this->db->query("SELECT * FROM mendata WHERE   nama_mendata LIKE '%$nama_mendata%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_mendata', $id)
            ->limit(1)
            ->get('mendata');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_mendata');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_mendata');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
