<?php

class Alert extends CI_Model
{
    function notif()
    {
        return $this->db->query("SELECT COUNT(IF(status=1 ,1,null))AS alert FROM material_keluar")->row_array();
    }
}
