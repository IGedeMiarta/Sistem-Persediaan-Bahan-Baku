<?php

class Kasir_model extends CI_Model
{
    function read($table)
    {
        return $this->db->get($table)->result();
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit($where, $table)
    {
        return $this->db->get_where($table, $where)->result();
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    function data_product()
    {
        return $this->db->query("SELECT produk.kd_produk,produk.nama AS nama_produk,material.nama AS nama_material,deskripsi,material_cost,harga,material.varian,material.tipe,material.stok FROM produk JOIN material ON produk.material=material.kd_material")->result();
    }
    function edit_product($kd_product)
    {
        return $this->db->query("SELECT kd_produk,gambar,produk.nama AS nama_produk, deskripsi,material.kd_material, material_cost, harga,material.nama AS nama_material,material.varian, tipe FROM produk LEFT JOIN material ON produk.material=material.kd_material WHERE kd_produk=$kd_product")->result();
    }
    function material_in()
    {
        return $this->db->query("SELECT * FROM material_keluar JOIN material ON material_keluar.kd_material=material.kd_material WHERE status=1")->result();
    }
    function data_material($kd_material)
    {
        return $this->db->query("SELECT * FROM material_keluar JOIN material ON material_keluar.kd_material=material.kd_material WHERE material_keluar.kd_material=$kd_material")->row_array();
    }
    function material_acc()
    {
        return $this->db->query("SELECT * FROM material_masuk JOIN material ON material_masuk.kd_material=material.kd_material WHERE material_masuk.detail='Kasir' ORDER BY kd_masuk DESC")->result();
    }
    function _material($nama)
    {
        return $this->db->query("SELECT * FROM material WHERE material.nama LIKE '$nama' AND material.detail='Kasir'")->row_array();
    }
    function penjualan()
    {
        return $this->db->query("SELECT *,(penjualan.jumlah * produk.harga)AS total FROM penjualan JOIN produk ON penjualan.produk=produk.kd_produk")->result();
    }
    function user($kd)
    {
        return $this->db->query("SELECT * FROM user JOIN pegawai ON user.id_pegawai=pegawai.id_pegawai WHERE user.id_pegawai=$kd")->row_array();
    }
    function cari_produk($produk)
    {
        return $this->db->query("SELECT * FROM produk WHERE nama='$produk'")->result();
    }
}
