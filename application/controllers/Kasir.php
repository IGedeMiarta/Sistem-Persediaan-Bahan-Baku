<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{


    public function index()
    {
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/dashboard');
        $this->load->view('kasir/default/footer');
    }
}
