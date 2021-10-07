<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_disposisi extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('disposisi');
    }

    public function tambah_disposisi($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function tambah_disposisit($datat, $table)
    {
        $this->db->insert($table, $datat);
    }

    public function edit_disposisi($where, $table)
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


    function get_disposisi($keyword)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE  kode_disposisi LIKE '%$keyword%' OR nama_disposisi LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_disposisi($nama_disposisi)
    {
        $query = $this->db->query("SELECT * FROM disposisi WHERE   nama_disposisi LIKE '%$nama_disposisi%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_disposisi', $id)
            ->limit(1)
            ->get('disposisi');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_disposisi');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_disposisi');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
