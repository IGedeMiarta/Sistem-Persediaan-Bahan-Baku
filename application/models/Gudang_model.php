<?php

class Gudang_model extends CI_Model
{

    function stok_gudang()
    {
        $query = $this->db->query("SELECT * FROM material WHERE detail='Gudang'");
        return $query->result();
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
        $query = $this->db->query("SELECT * FROM material JOIN material_keluar ON material.kd_material=material_keluar.kd_material WHERE material.detail='Gudang'");
        return $query->result();
    }

    function material_edt($where)
    {

        $query = $this->db->query("SELECT * FROM material where kd_material=$where");
        return $query->result();
    }
}
