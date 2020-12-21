<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login_admin") {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Belum Login!, Silahkan Login Terlebih dahulu</div>');
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->model('Pemilik');
        $this->load->model('dashboard');
        $this->load->model('laporan');
    }

    public function index()
    {
        $data['pegawai'] = $this->dashboard->_pegawai();
        $data['supplier'] = $this->dashboard->_supplier();
        $data['produk'] = $this->dashboard->_produk();
        $data['jual'] = $this->dashboard->_selling();
        $data['terjual'] = $this->dashboard->_sell();
        $data['teks'] = "Halaman Administrator Sistem Persedian Bahan Baku Kedai Kopi Gayo, admin dapat menambah pegawai dengan menginputkan data pegawai, mendaftarkan pegawai sebagai user untuk dapat login ke sistem sebagai Bag. kasir atau Bag. Gudang, dan dapat menambah data supplier";
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('dashboard', $data);
        $this->load->view('owner/default/footer');
    }

    public function supplier()
    {
        $data['supplier'] = $this->Pemilik->read('supplier')->result();
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/supplier', $data);
        $this->load->view('owner/default/footer');
    }

    public function supplier_add()
    {
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/supplier_add');
        $this->load->view('owner/default/footer');
    }

    public function supplier_add_act()
    {
        $this->form_validation->set_rules('sup_name', 'Sup_name', 'trim|required');
        $this->form_validation->set_rules('owner', 'Owner', 'trim|required');
        $this->form_validation->set_rules('hp', 'Hp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('owner/default/header');
            $this->load->view('owner/default/sidebar');
            $this->load->view('owner/default/topbar');
            $this->load->view('owner/supplier_add');
            $this->load->view('owner/default/footer');
        } else {
            //validasi sukses
            $nama_sup = $this->input->post('sup_name', true);
            $owner = $this->input->post('owner', true);
            $no_hp = $this->input->post('hp', true);
            $alamat = $this->input->post('alamat', true);
            $data = [
                'nama_sup' => $nama_sup,
                'owner' => $owner,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            ];

            $this->Pemilik->insert($data, 'supplier');
            redirect('owner/supplier');
        }
    }

    public function supplier_edt($id_sup)
    {
        $where = array('id_sup' => $id_sup);
        $data['supplier'] = $this->Pemilik->edit($where, 'supplier')->result();
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/supplier_edt', $data);
        $this->load->view('owner/default/footer');
    }
    public function supplier_edt_act($id_sup)
    {
        $where = array('id_sup' => $id_sup);
        $this->form_validation->set_rules('sup_name', 'Sup_name', 'trim|required');
        $this->form_validation->set_rules('owner', 'Owner', 'trim|required');
        $this->form_validation->set_rules('hp', 'Hp', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('owner/default/header');
            $this->load->view('owner/default/sidebar');
            $this->load->view('owner/default/topbar');
            $this->load->view('owner/supplier_add');
            $this->load->view('owner/default/footer');
        } else {
            //validasi sukses
            $nama_sup = $this->input->post('sup_name', true);
            $owner = $this->input->post('owner', true);
            $no_hp = $this->input->post('hp', true);
            $alamat = $this->input->post('alamat', true);
            $data = [
                'nama_sup' => $nama_sup,
                'owner' => $owner,
                'no_hp' => $no_hp,
                'alamat' => $alamat
            ];

            $this->Pemilik->update($where, $data, 'supplier');
            redirect('owner/supplier');
        }
    }
    public function supplier_del($id_sup)
    {
        $where = array('id_sup' => $id_sup);
        $this->Pemilik->delete($where, 'supplier');
        redirect('owner/supplier');
    }
    // =====================================  end supplier =========================================================

    public function pegawai()
    {
        $data['pegawai'] = $this->Pemilik->_pegawai();

        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/pegawai', $data);
        $this->load->view('owner/default/footer');
    }
    public function pegawai_add()
    {
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/pegawai_add');
        $this->load->view('owner/default/footer');
    }
    public function pegawai_add_act()
    {
        $nama = $this->input->post('name', true);
        $jenkel = $this->input->post('jenkel', true);
        $tgl_lahir = $this->input->post('tgl', true);
        $no_hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);
        $desk = $this->input->post('desk', true);
        $data = [
            'nama' => $nama,
            'jenkel' => $jenkel,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'role' => $desk
        ];

        $this->Pemilik->insert($data, 'pegawai');
        redirect('owner/pegawai');
    }
    public function pegawai_edt($id_pegawai)
    {
        $where = array('id_pegawai' => $id_pegawai);
        $data['pegawai'] = $this->Pemilik->edit($where, 'pegawai');

        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/pegawai_edt', $data);
        $this->load->view('owner/default/footer');
    }

    public function pegawai_edt_act($id_pegawai)
    {

        $where = array('id_pegawai' => $id_pegawai);
        $nama = $this->input->post('name', true);
        $jenkel = $this->input->post('jenkel', true);
        $tgl_lahir = $this->input->post('tgl', true);
        $no_hp = $this->input->post('hp', true);
        $alamat = $this->input->post('alamat', true);
        $desk = $this->input->post('desk', true);
        $data = [
            'nama' => $nama,
            'jenkel' => $jenkel,
            'tgl_lahir' => $tgl_lahir,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'role' => $desk
        ];

        $this->Pemilik->update($where, $data, 'pegawai');
        redirect('owner/pegawai');
    }

    public function pegawai_del($id_pegawai)
    {
        $where = array('id_pegawai' => $id_pegawai);
        $this->Pemilik->delete($where, 'pegawai');
        redirect('owner/pegawai');
    }

    public function regist($id_pegawai)
    {
        $where = array('id_pegawai' => $id_pegawai);
        $data['pegawai'] = $this->Pemilik->edit($where, 'pegawai');

        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/regist', $data);
        $this->load->view('owner/default/footer');
    }
    public function regist_act($id_pegawai)
    {
        $pegawai = $id_pegawai;
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdatar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $where = array('id_pegawai' => $id_pegawai);
            $data['pegawai'] = $this->Pemilik->edit($where, 'pegawai');

            $this->load->view('owner/default/header');
            $this->load->view('owner/default/sidebar');
            $this->load->view('owner/default/topbar');
            $this->load->view('owner/regist', $data);
            $this->load->view('owner/default/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_pegawai' => $pegawai,
                'role' => htmlspecialchars($this->input->post('role', true))
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Selamat Akun Anda Sudah dibuat!</div>');
            redirect('owner/pegawai');
        }
    }
    public function produk()
    {
        $data['product'] = $this->Pemilik->data_product();
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/produk', $data);
        $this->load->view('owner/default/footer');
    }
    // =======================================================================================
    // ==================================== LAPORAN ==========================================
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

        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('laporan/lap_mtrl_masuk', $data);
        $this->load->view('owner/default/footer');
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
            redirect('owner/lap_material');
        }
    }
    function lap_stok()
    {
        $data['stok'] = $this->laporan->stok_gudang();
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('laporan/lap_stok', $data);
        $this->load->view('owner/default/footer');
    }
    function lap_stok_cetak()
    {
        $data['stok'] = $this->laporan->stok_gudang();
        $this->load->view('laporan/cetak/lap_stok', $data);
    }

    function lap_produk()
    {
        $data['produk'] = $this->laporan->produk();
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('laporan/lap_produk', $data);
        $this->load->view('owner/default/footer');
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

        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('laporan/lap_penjualan', $data);
        $this->load->view('owner/default/footer');
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
            redirect('owner/lap_material');
        }
    }
}
