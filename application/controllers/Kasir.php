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
        $this->load->model('laporan');
        $this->load->model('alert');
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
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('default/footer');
    }
    public function product()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['product'] = $this->kasir_model->data_product();
        $whare = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($whare, 'material');
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/product', $data);
        $this->load->view('default/footer');
    }
    public function product_add()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $whare = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($whare, 'material');
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/product_add', $data);
        $this->load->view('default/footer');
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
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Ditambah!");</script>');

        redirect('kasir/product');
    }
    public function product_edt($kd_product)
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['prod'] = $this->kasir_model->edit_product($kd_product);
        $where = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($where, 'material');
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/product_edt', $data);
        $this->load->view('default/footer');
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
        $this->session->set_flashdata('messege', '<script>alert("Data Berhasil Diubah!");</script>');
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
        $data['alert'] = $this->alert->notif();
        $data['material'] = $this->kasir_model->material_in();
        $data['masuk'] = $this->kasir_model->material_acc();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/material_in', $data);
        $this->load->view('default/footer');
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
        $data['alert'] = $this->alert->notif();
        $whare = array('detail' => 'Kasir');
        $data['material'] = $this->kasir_model->edit($whare, 'material');
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/material', $data);
        $this->load->view('default/footer');
    }
    public function sell()
    {
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['produk'] = $this->kasir_model->read('produk');
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/sell', $data);
        $this->load->view('default/footer');
    }
    public function sell_add($kd_produk)
    {
        $whare = array('kd_produk' => $kd_produk);
        $data['produk'] = $this->kasir_model->edit($whare, 'produk');
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['status'] = $this->alert->notifikasi();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/pembelian', $data);
        $this->load->view('default/footer');
    }
    public function sell_act()
    {

        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $pembeli = $this->input->post('pembeli', true);
        $produk1 = $this->input->post('produk1', true);
        $produk3 = $this->input->post('produk3', true);
        $produk4 = $this->input->post('produk4', true);
        $jumlah1 = $this->input->post('jumlah1', true);
        $jumlah3 = $this->input->post('jumlah3', true);
        $jumlah4 = $this->input->post('jumlah4', true);
        $harga1 = $this->input->post('harga1', true);
        $harga2 = $this->input->post('harga2', true);
        $harga3 = $this->input->post('harga3', true);
        $harga4 = $this->input->post('harga4', true);
        $data['pembeli'] = $pembeli;
        $waktu = date("Y-m-d H:i:s");
        $data['jam'] = $waktu;
        if ($produk1 != 'null') {
            $produk = $this->db->query("SELECT * FROM produk WHERE nama='$produk1'")->row_array();
            $kd = $produk['material'];
            $kode = $produk['kd_produk'];
            $cost = $produk['material_cost'];
            $min = $cost * $jumlah1;
            $material = $this->db->query("SELECT * FROM material WHERE kd_material=$kd")->row_array();
            $stok = $material['stok'];
            $fin = $stok - $min;
            $data = [
                'produk' => $kode,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah1
            ];
            $this->kasir_model->insert($data, 'penjualan');

            $whare = array('kd_material' => $kd);
            $data2 = [
                'stok' => $fin
            ];
            $this->kasir_model->update($whare, $data2, 'material');
        };
        $produk2 = $this->input->post('produk2', true);
        $jumlah2 = $this->input->post('jumlah2', true);
        if ($produk2 != 'null') {
            $produk = $this->db->query("SELECT * FROM produk WHERE nama='$produk2'")->row_array();
            $kd = $produk['material'];
            $kode = $produk['kd_produk'];
            $cost = $produk['material_cost'];
            $min = $cost * $jumlah2;
            $material = $this->db->query("SELECT * FROM material WHERE kd_material=$kd")->row_array();
            $stok = $material['stok'];
            $fin = $stok - $min;
            $data = [
                'produk' => $kode,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah1
            ];
            $this->kasir_model->insert($data, 'penjualan');

            $whare = array('kd_material' => $kd);
            $data2 = [
                'stok' => $fin
            ];
            $this->kasir_model->update($whare, $data2, 'material');
        };
        if ($produk3 != 'null') {
            $produk = $this->db->query("SELECT * FROM produk WHERE nama='$produk3'")->row_array();
            $kd = $produk['material'];
            $kode = $produk['kd_produk'];
            $cost = $produk['material_cost'];
            $min = $cost * $jumlah3;
            $material = $this->db->query("SELECT * FROM material WHERE kd_material=$kd")->row_array();
            $stok = $material['stok'];
            $fin = $stok - $min;
            $data = [
                'produk' => $kode,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah3
            ];
            $this->kasir_model->insert($data, 'penjualan');

            $whare = array('kd_material' => $kd);
            $data2 = [
                'stok' => $fin
            ];
            $this->kasir_model->update($whare, $data2, 'material');
        };
        if ($produk4 != 'null') {
            $produk = $this->db->query("SELECT * FROM produk WHERE nama='$produk4'")->row_array();
            $kd = $produk['material'];
            $kode = $produk['kd_produk'];
            $cost = $produk['material_cost'];
            $min = $cost * $jumlah4;
            $material = $this->db->query("SELECT * FROM material WHERE kd_material=$kd")->row_array();
            $stok = $material['stok'];
            $fin = $stok - $min;
            $data = [
                'produk' => $kode,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah4
            ];
            $this->kasir_model->insert($data, 'penjualan');

            $whare = array('kd_material' => $kd);
            $data2 = [
                'stok' => $fin
            ];
            $this->kasir_model->update($whare, $data2, 'material');
        };

        if ($produk1 != 'null') {
            $dt1 = [
                'produk' => $produk1,
                'harga' => $harga1,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah1
            ];
            $data['sel1'] = $dt1;
        } else {
            $data['sel1'] = 'nul';
        };
        if ($produk2 != 'null') {
            $dt2 = [
                'produk' => $produk2,
                'harga' => $harga2,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah2
            ];
            $data['sel2'] = $dt2;
        } else {
            $data['sel2'] = 'nul';
        };
        if ($produk3 != 'null') {
            $data3 = [
                'produk' => $produk3,
                'harga' => $harga3,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah3
            ];
            $data['sel3'] = $data3;
        } else {
            $data['sel3'] = 'nul';
        };
        if ($produk4 != 'null') {
            $data4 = [
                'produk' => $produk4,
                'harga' => $harga4,
                'pembeli' => $pembeli,
                'waktu' => $waktu,
                'jumlah' => $jumlah4
            ];
            $data['sel4'] = $data4;
        } else {
            $data['sel4'] = 'nul';
        };
        // $data['trasaksi'] = $data;

        $this->load->view('kasir/nota', $data);
    }

    public function transaksi()
    {
        $data['status'] = $this->alert->notifikasi();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['alert'] = $this->alert->notif();
        $data['sell'] = $this->kasir_model->penjualan();
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/transaksi', $data);
        $this->load->view('default/footer');
    }

    // =========================================================================================
    // =======================================================================================

    function lap_material()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            $data['masuk'] = $this->laporan->mtrl_masuk($mulai, $sampai);
        } else {
            $data['masuk'] = $this->laporan->m_masuk();
        }
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
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
            redirect('kasir/lap_material');
        }
    }
    function lap_stok()
    {
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['stok'] = $this->laporan->stok_gudang();
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
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $data['produk'] = $this->laporan->produk();
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
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
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
            redirect('kasir/lap_material');
        }
    }
    function penjualan()
    {
        $data['status'] = $this->alert->notifikasi();
        $data['alert'] = $this->alert->notif();
        $kd = $this->session->userdata('pegawai');
        $data['user'] = $this->kasir_model->user($kd);
        $this->load->view('default/header');
        $this->load->view('default/sidebar', $data);
        $this->load->view('default/topbar', $data);
        $this->load->view('kasir/looping', $data);
        $this->load->view('default/footer');
    }

    public function cari()
    {
        $produk = $_GET['produk'];
        $cari = $this->kasir_model->cari_produk($produk);
        echo json_encode($cari);
    }
}
