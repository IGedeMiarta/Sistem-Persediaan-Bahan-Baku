<?php

class Gudang_model extends CI_Model
{

    public function read($table)
    {
        return $this->db->get($table);
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
}
