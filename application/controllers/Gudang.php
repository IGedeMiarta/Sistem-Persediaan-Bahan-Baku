<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login_gudang") {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('gudang_model');
        $this->load->model('dashboard');
    }

    public function index()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        $data['produk'] = $this->dashboard->_produk();
        $data['jual'] = $this->dashboard->_selling();
        $data['terjual'] = $this->dashboard->_sell();
        $data['teks'] = "Halaman Gudang, Sistem Persedian Bahan Baku Kedai Kopi Gayo, Bag. Gudang dapat menambahkan data material bahan baku, menginputkan data bahan masuk dan keluar dan manajeman stok bahan baku produksi di kedai kopi umah kopi gayo";
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $data['material'] = $this->gudang_model->stok_gudang();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
        $this->load->view('gudang/material', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_add()
    {
        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);


        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
        $this->load->view('gudang/material_add', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_add_act()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required|is_unique[material.nama]', [
            'is_unique' => 'Material Sudah Terdaftar'
        ]);
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');

        if ($this->form_validation->run() == false) {
            $this->load->view('gudang/default/header');
            $this->load->view('gudang/default/sidebar');
            $this->load->view('gudang/default/topbar', $data);
            $this->load->view('gudang/material_add', $data);
            $this->load->view('gudang/default/footer');
        } else {
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
    }

    public function material_edt($kd_material)
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['edit'] = $this->gudang_model->material_edt($kd_material);

        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
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

    public function cari()
    {
        $material = $_GET['material'];
        $cari = $this->gudang_model->stok($material);
        echo json_encode($cari);
    }

    public function material_in()
    {
        $data['masuk'] = $this->gudang_model->material_msk();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
        $this->load->view('gudang/material_in', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_in_add()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $data['material'] = $this->gudang_model->stok_gudang();
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
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
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $data['masuk'] = $this->gudang_model->material_out();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
        $this->load->view('gudang/material_out', $data);
        $this->load->view('gudang/default/footer');
    }
    public function material_out_add()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);

        $data['material'] = $this->gudang_model->stok_gudang();
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $this->load->view('gudang/default/header');
        $this->load->view('gudang/default/sidebar');
        $this->load->view('gudang/default/topbar', $data);
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
