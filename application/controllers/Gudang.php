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
        $this->load->model('laporan');
        $this->load->model('alert');
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
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('default/footer');
    }
    public function material()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['kasir'] = $this->gudang_model->stok_kasir();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/material', $data);
        $this->load->view('default/footer');
    }
    public function material_add()
    {
        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['status'] = $this->alert->notifikasi();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();

        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/material_add', $data);
        $this->load->view('default/footer');
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
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        if ($this->form_validation->run() == false) {
            $this->load->view('default/header');
            $this->load->view('default/sidebar', $data);
            $this->load->view('default/topbar', $data);
            $this->load->view('gudang/material_add', $data);
            $this->load->view('default/footer');
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
        $data['alert'] = $this->alert->notif();
        $data['material'] = $this->gudang_model->read('material')->result();
        $data['varian'] = $this->gudang_model->material_enum('material', 'varian');
        $data['tipe'] = $this->gudang_model->material_enum('material', 'tipe');
        $data['detail'] = $this->gudang_model->material_enum('material', 'detail');
        $data['edit'] = $this->gudang_model->material_edt($kd_material);
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/material_edt', $data);
        $this->load->view('default/footer');
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
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['masuk'] = $this->gudang_model->material_msk();
        $kd = $this->session->userdata('pegawai');
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/material_in', $data);
        $this->load->view('default/footer');
    }
    public function material_in_add()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/material_in_add', $data);
        $this->load->view('default/footer');
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
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['masuk'] = $this->gudang_model->material_out();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/material_out', $data);
        $this->load->view('default/footer');
    }

    public function material_out_add()
    {
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['supplier'] = $this->gudang_model->read('supplier')->result();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/material_out_add', $data);
        $this->load->view('default/footer');
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
    // =============================================================================================


    function lap_material()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['masuk'] = $this->laporan->mtrl_masuk($mulai, $sampai);
        } else {
            $data['masuk'] = $this->laporan->m_masuk();
        }
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_mtrl_masuk', $data);
        $this->load->view('default/footer');
    }

    function mtrl_print()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['masuk'] = $this->laporan->mtrl_masuk($mulai, $sampai);

            $this->load->view('laporan/cetak/mtrl_masuk_cetak', $data);
        } else {
            redirect('gudang/lap_material');
        }
    }
    function lap_stok()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['stok'] = $this->laporan->stok_gudang();
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_stok', $data);
        $this->load->view('default/footer');
    }
    function lap_stok_cetak()
    {
        $data['stok'] = $this->laporan->stok_gudang();
        $this->load->view('laporan/cetak/lap_stok', $data);
    }

    function lap_produk()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['produk'] = $this->laporan->produk();
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_produk', $data);
        $this->load->view('default/footer');
    }
    function lap_produk_cetak()
    {
        $data['produk'] = $this->laporan->produk();
        $this->load->view('laporan/cetak/lap_produk_cetak', $data);
    }

    function lap_penjualan()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['penjualan'] = $this->laporan->penjualan_str($mulai, $sampai);
        } else {
            $data['penjualan'] = $this->laporan->penjualan();
        }
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('laporan/lap_penjualan', $data);
        $this->load->view('default/footer');
    }

    function penjualan_print()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['penjualan'] = $this->laporan->penjualan_str($mulai, $sampai);

            $this->load->view('laporan/cetak/penjualan_cetak', $data);
        } else {
            redirect('gudang/lap_material');
        }
    }

    function material_kasir($kd)
    {
        $data['status'] = $this->alert->notifikasi();
        $kd = $kd - 1;
        $data['alert'] = $this->alert->notif();
        $kd2 = $this->session->userdata('pegawai');
        $data['user'] = $this->gudang_model->user($kd2);
        $data['material'] = $this->gudang_model->stok_gudang();
        $data['out'] = $this->db->query("SELECT * FROM material WHERE material.kd_material=$kd")->row_array();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('gudang/matrial_kasir', $data);
        $this->load->view('default/footer');
    }
    function material_kasir_act()
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
