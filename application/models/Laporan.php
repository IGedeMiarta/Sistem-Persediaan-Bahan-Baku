<?php

class Laporan extends CI_Model
{
    function mtrl_masuk($mulai, $sampai)
    {
        return $this->db->query("SELECT * FROM material_masuk,material,supplier WHERE material_masuk.kd_material=material.kd_material AND material_masuk.supplier=supplier.id_sup AND date(waktu) >='$mulai' AND date(waktu) <= '$sampai' AND material_masuk.detail='Gudang' ORDER BY kd_masuk ASC")->result();
    }
    function m_masuk()
    {
        return $this->db->query("SELECT * FROM material_masuk,material,supplier WHERE material_masuk.kd_material=material.kd_material AND material_masuk.supplier=supplier.id_sup AND material_masuk.detail='Gudang' ORDER BY kd_masuk ASC")->result();
    }
    function stok_gudang()
    {
        return $this->db->query("SELECT * FROM `material` WHERE detail='Gudang'")->result();
    }
    function produk()
    {
        return $this->db->query("SELECT produk.nama AS nama_produk,deskripsi,material.nama as nama_mtrl,harga FROM produk,material WHERE produk.material=material.kd_material")->result();
    }
    function penjualan()
    {
        return $this->db->query("SELECT * FROM penjualan,produk WHERE penjualan.produk=produk.kd_produk")->result();
    }
    function penjualan_str($mulai, $sampai)
    {
        return $this->db->query("SELECT * FROM penjualan,produk WHERE penjualan.produk=produk.kd_produk AND date(waktu) >='$mulai' AND date(waktu) <= '$sampai'")->result();
    }

    function user($kd)
    {
        return $this->db->query("SELECT * FROM user JOIN pegawai ON user.id_pegawai=pegawai.id_pegawai WHERE user.id_pegawai=$kd")->row_array();
    }
}
