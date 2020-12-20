<?php

class Dashboard extends CI_Model
{
    function _pegawai()
    {
        return $this->db->query("SELECT COUNT(id_pegawai) AS jml FROM pegawai")->row_array();
    }
    function _supplier()
    {
        return $this->db->query("SELECT COUNT(id_sup) as jml FROM supplier")->row_array();
    }
    function _produk()
    {
        return $this->db->query("SELECT COUNT(kd_produk) as jml FROM produk")->row_array();
    }
    function _sell()
    {
        return $this->db->query("SELECT COUNT(kd_jual) as jml FROM penjualan")->row_array();
    }
    function _selling()
    {
        return $this->db->query("SELECT SUM(harga) AS sell FROM `penjualan` JOIN produk ON penjualan.produk=produk.kd_produk")->row_array();
    }
}
