<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('gudang_model');
    }

    public function index()
    {
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/dashboard');
        $this->load->view('gudang/default/footer');
    }
    public function material()
    {
        $data['material'] = $this->gudang_model->stok_gudang();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/material', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_add()
    {
        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/material_add', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_add_act()
    {
        $nama = $this->input->post('name', true);
        $varian = $this->input->post('varian', true);
        $tipe = $this->input->post('tipe', true);
        $data = [
            'nama' => $nama,
            'varian' => $varian,
            'tipe' => $tipe,
            'detail' => 'Gudang'
        ];
        $data2 = [
            'nama' => $nama,
            'varian' => $varian,
            'tipe' => $tipe,
            'detail' => 'Kasir'
        ];
        $this->gudang_model->insert($data, 'material');
        $this->gudang_model->insert($data2, 'material');
        redirect('gudang/material');
    }

    public function material_edt($kd_material)
    {
        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['edit'] = $this->gudang_model->material_edt($kd_material);

        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/material_edt', $data);
        $this->load->view('gudang/default/footer');
    }

    public function material_edt_act($kd_material)
    {
        $where = array('kd_material' => $kd_material);
        $nama = $this->input->post('name', true);
        $varian = $this->input->post('varian', true);
        $tipe = $this->input->post('tipe', true);
        $data = [
            'nama' => $nama,
            'varian' => $varian,
            'tipe' => $tipe,
            'detail' => 'Gudang'
        ];

        $this->gudang_model->update($where, $data, 'material');
        redirect('gudang/material');
    }






















    public function material_in()
    {
        $data['masuk'] = $this->gudang_model->material_msk();

        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/material_in', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_in_add()
    {
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/material_in_add', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_in_act()
    {
        $material = $this->input->post('material', true);
        $waktu = date("Y-m-d H:i:s");
        $jumlah = $this->input->post('jumlah', true);
        $supplier = $this->input->post('supplier', true);

        $data = [
            'kd_material' => $material,
            'waktu' => $waktu,
            'jumlah' => $jumlah,
            'supplier' => $supplier,
            'detail' => 'Gudang'
        ];
        $this->gudang_model->insert($data, 'material_masuk');
        redirect('gudang/material_in');
    }

    public function material_out()
    {
        $data['masuk'] = $this->gudang_model->material_out();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/material_out', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_out_add()
    {
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar');
        $this->load->view('gudang/material_out_add', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_out_act()
    {
        $material = $this->input->post('material', true);
        $waktu = date("Y-m-d H:i:s");
        $jumlah = $this->input->post('jumlah', true);

        $data = [
            'kd_material' => $material,
            'waktu' => $waktu,
            'jumlah' => $jumlah,
            'detail' => 'Gudang',
            'status' => 1
        ];
        $this->gudang_model->insert($data, 'material_keluar');
        redirect('gudang/material_out');
    }
}
