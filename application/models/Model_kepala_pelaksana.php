<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kepala_pelaksana extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('kepala_pelaksana');
    }

    public function tambah_kepala_pelaksana($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tambah_kepala_pelaksanat($datat, $table)
    {
        $this->db->insert($table, $datat);
    }

    public function edit_kepala_pelaksana($where, $table)
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


    function get_kepala_pelaksana($keyword)
    {
        $query = $this->db->query("SELECT * FROM kepala_pelaksana WHERE  kode_kepala_pelaksana LIKE '%$keyword%' OR nama_kepala_pelaksana LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_kepala_pelaksana($nama_kepala_pelaksana)
    {
        $query = $this->db->query("SELECT * FROM kepala_pelaksana WHERE   nama_kepala_pelaksana LIKE '%$nama_kepala_pelaksana%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_kepala_pelaksana', $id)
            ->limit(1)
            ->get('kepala_pelaksana');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_kepala_pelaksana');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_kepala_pelaksana');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
