<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login_kasir") {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('kasir_model');
        $this->load->model('dashboard');
    }

    public function index()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        $data['produk'] = $this->dashboard->_produk();
        $data['jual'] = $this->dashboard->_selling();
        $data['terjual'] = $this->dashboard->_sell();
        $data['teks'] = "Halaman Kasir, Sistem Persedian Bahan Baku Kedai Kopi Gayo, Kasir dapat menambahkan data produk, menginputkan data material masuk dari gudang dan dapat menambahakan data penjualan serta melakukan transaksi penjualan";
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('kasir/default/footer');
    }
    public function product()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $data['product'] = $this->kasir_model->read('produk');
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
        $this->load->view('kasir/product', $data);
        $this->load->view('kasir/default/footer');
    }
    public function product_add()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $whare = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($whare, 'material');
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
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
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $data['prod'] = $this->kasir_model->edit_product($kd_product);
        $where = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($where, 'material');

        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
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
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $data['material'] = $this->kasir_model->material_in();
        $data['masuk'] = $this->kasir_model->material_acc();
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
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
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $whare = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($whare, 'material');

        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
        $this->load->view('kasir/material', $data);
        $this->load->view('kasir/default/footer');
    }
    public function sell()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $data['produk'] = $this->kasir_model->read('produk');
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
        $this->load->view('kasir/sell', $data);
        $this->load->view('kasir/default/footer');
    }
    public function sell_add($kd_produk)
    {
        $whare = array('kd_produk' => $kd_produk);
        $data['produk'] = $this->kasir_model->edit($whare, 'produk');
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
        $this->load->view('kasir/pembelian', $data);
        $this->load->view('kasir/default/footer');
    }
    public function sell_act()
    {
        $pembeli = $this->input->post('pembeli', true);
        $produk = $this->input->post('name', true);
        $bayar = $this->input->post('bayar', true);
        $waktu = date("Y-m-d H:i:s");
        $data = [
            'produk' => $produk,
            'pembeli' => $pembeli,
            'waktu' => $waktu,
            'bayar' => $bayar
        ];

        $this->kasir_model->insert($data, 'penjualan');
        redirect('kasir/transaksi');
    }

    public function transaksi()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);

        $data['sell'] = $this->kasir_model->penjualan();
        $this->load->view('kasir/default/header');
        $this->load->view('kasir/default/sidebar');
        $this->load->view('kasir/default/topbar', $data);
        $this->load->view('kasir/transaksi', $data);
        $this->load->view('kasir/default/footer');
    }
}
