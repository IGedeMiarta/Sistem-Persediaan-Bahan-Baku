<?php

class Gudang_model extends CI_Model
{

    function stok_gudang()
    {
        $query = $this->db->query("SELECT * FROM material WHERE detail='Gudang' ORDER BY kd_material DESC");
        return $query->result();
    }
    function stok_gudang_edt($kd_material)
    {
        $query = $this->db->query("SELECT * FROM material JOIN material_masuk JOIN supplier ON material_masuk.kd_material=material.kd_material AND material_masuk.supplier=supplier.id_sup WHERE material.detail='Gudang' AND material_masuk.kd_material=$kd_material");
        return $query->row_array();
    }
    function stok_kasir()
    {
        $query = $this->db->query("SELECT * FROM material WHERE detail='Kasir'  ORDER BY kd_material DESC");
        return $query->result();
    }
    function stok($material)
    {
        return $this->db->query("SELECT * FROM material WHERE kd_material=$material")->result();
    }
    function read($table)
    {
        return $this->db->get($table);
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
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
    function material_enum($table, $field)
    {
        $row =  $this->db->query("SHOW COLUMNS FROM " . $table . " WHERE field LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all($regex, $row, $enum_array);
        $enum_field = $enum_array[1];
        foreach ($enum_field as $key => $value) {
            $enums[$value] = $value;
        }
        return $enums;
    }

    function material_msk()
    {
        $query = $this->db->query("SELECT * FROM material JOIN material_masuk JOIN supplier ON material.kd_material=material_masuk.kd_material AND material_masuk.supplier=supplier.id_sup WHERE material.detail='Gudang'");
        return $query->result();
    }

    function material_out()
    {
        $query = $this->db->query("SELECT * FROM material JOIN material_keluar ON material.kd_material=material_keluar.kd_material WHERE material.detail='Gudang' ORDER BY kd_keluar DESC");
        return $query->result();
    }

    function material_edt($where)
    {
        $query = $this->db->query("SELECT * FROM material where kd_material=$where");
        return $query->result();
    }
    function notif()
    {
        return $this->db->query("SELECT COUNT(IF(status=1,1,null))AS status FROM material_keluar")->row_array();
    }

    function user($kd)
    {
        return $this->db->query("SELECT * FROM user JOIN pegawai ON user.id_pegawai=pegawai.id_pegawai WHERE user.id_pegawai=$kd")->row_array();
    }
}
