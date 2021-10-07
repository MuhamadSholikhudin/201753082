<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_lampiran extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('lampiran');
    }

    public function tambah_lampiran($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_lampiran($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    function get_lampiran($keyword)
    {
        $query = $this->db->query("SELECT * FROM lampiran WHERE  kode_lampiran LIKE '%$keyword%' OR nama_lampiran LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_lampiran($nama_lampiran)
    {
        $query = $this->db->query("SELECT * FROM lampiran WHERE   nama_lampiran LIKE '%$nama_lampiran%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_lampiran', $id)
            ->limit(1)
            ->get('lampiran');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_lampiran');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_lampiran');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
