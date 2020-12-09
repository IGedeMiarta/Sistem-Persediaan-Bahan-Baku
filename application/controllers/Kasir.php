<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('kasir_model');
    }

    public function index()
    {
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/dashboard');
        $this->load->view('kasir/default/footer');
    }
    public function product()
    {
        $data['product'] = $this->kasir_model->read('produk');
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/product', $data);
        $this->load->view('kasir/default/footer');
    }
    public function product_add()
    {
        $whare = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($whare, 'material');
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/product_add', $data);
        $this->load->view('kasir/default/footer');
    }
    public function product_add_act()
    {
        $nama = $this->input->post('name', true);
        $deskripsi = $this->input->post('desk', true);
        $material = $this->input->post('material', true);
        $material_cost = $this->input->post('use', true);
        $harga = $this->input->post('harga', true);
        $data = [
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'material' => $material,
            'material_cost' => $material_cost,
            'harga' => $harga
        ];

        $this->kasir_model->insert($data, 'produk');
        redirect('kasir/product');
    }
    public function product_edt($kd_product)
    {

        $data['prod'] = $this->kasir_model->edit_product($kd_product);
        $where = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($where, 'material');

        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/product_edt', $data);
        $this->load->view('kasir/default/footer');
    }
    public function product_edt_act($kd_product)
    {
        $whare = array('kd_produk' => $kd_product);
        $nama = $this->input->post('name', true);
        $deskripsi = $this->input->post('des', true);
        $material = $this->input->post('material', true);
        $material_cost = $this->input->post('use', true);
        $harga = $this->input->post('harga', true);
        $data = [
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'material' => $material,
            'material_cost' => $material_cost,
            'harga' => $harga
        ];

        $this->kasir_model->update($whare, $data, 'produk');
        redirect('kasir/product');
    }
    public function product_del($kd_produk)
    {
        $where = array('kd_produk' => $kd_produk);
        $this->kasir_model->delete($where, 'produk');
        redirect('kasir/product');
    }
    public function material_in()
    {
        $data['material'] = $this->kasir_model->material_in();
        $data['masuk'] = $this->kasir_model->material_acc();
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/material_in', $data);
        $this->load->view('kasir/default/footer');
    }
    public function terima()
    {
        $kd_material = $this->input->get('material');
        $kd_keluar = $this->input->get('kd');
        $material = $this->kasir_model->data_material($kd_material);
        $nama = $material['nama'];

        $_kasir = $this->kasir_model->_material($nama);
        $kd = $_kasir['kd_material'];
        $waktu = date("Y-m-d H:i:s");
        $jumlah = $material['jumlah'];
        $detail = 'Kasir';

        $data = [
            'kd_material' => $kd,
            'waktu' => $waktu,
            'jumlah' => $jumlah,
            'detail' => $detail
        ];

        $this->kasir_model->insert($data, 'material_masuk');
        $whare = array('kd_keluar' => $kd_keluar);
        $data2 = [
            'status' => 2
        ];
        $this->kasir_model->update($whare, $data2, 'material_keluar');
        redirect('kasir/material_in');
    }
    public function material()
    {
        $whare = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($whare, 'material');

        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/material', $data);
        $this->load->view('kasir/default/footer');
    }
    public function sell()
    {
        // $whare = array('detail' => 'Kasir');
        // $data['material'] = $this->kasir_model->edit($whare, 'material');
        $data['produk'] = $this->kasir_model->read('produk');
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar');
        $this->load->view('kasir/sell', $data);
        $this->load->view('kasir/default/footer');
    }
}
