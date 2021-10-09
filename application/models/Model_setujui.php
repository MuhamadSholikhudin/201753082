<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_setujui extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('setujui');
    }

    public function tambah_setujui($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tambah_setujuit($datat, $table)
    {
        $this->db->insert($table, $datat);
    }

    public function edit_setujui($where, $table)
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


    function get_setujui($keyword)
    {
        $query = $this->db->query("SELECT * FROM setujui WHERE  kode_setujui LIKE '%$keyword%' OR nama_setujui LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_setujui($nama_setujui)
    {
        $query = $this->db->query("SELECT * FROM setujui WHERE   nama_setujui LIKE '%$nama_setujui%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_setujui', $id)
            ->limit(1)
            ->get('setujui');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_setujui');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_setujui');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
