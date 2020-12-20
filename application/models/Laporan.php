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
}
