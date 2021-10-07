<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_surat_keluar extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('surat_keluar');
    }

    public function tambah_surat_keluar($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_surat_keluar($where, $table)
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


    function get_surat_keluar($keyword)
    {
        $query = $this->db->query("SELECT * FROM surat_keluar WHERE  kode_surat_keluar LIKE '%$keyword%' OR nama_surat_keluar LIKE '%$keyword%' ");
        return $query->result();
    }

    function cari_surat_keluar($nama_surat_keluar)
    {
        $query = $this->db->query("SELECT * FROM surat_keluar WHERE   nama_surat_keluar LIKE '%$nama_surat_keluar%' ");
        return $query->result();
    }

    public function find($id)
    {
        $result = $this->db->where('id_surat_keluar', $id)
            ->limit(1)
            ->get('surat_keluar');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_surat_keluar');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_surat_keluar');
        $this->db->like('nama_brg', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('keterangan', $keyword);


        return $this->db->get()->result();
    }
}
