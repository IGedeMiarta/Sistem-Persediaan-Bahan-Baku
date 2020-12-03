<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Gudang_model');
    }

    public function index()
    {
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/dashboard');
        $this->load->view('gudang/default/footer');
    }
}
