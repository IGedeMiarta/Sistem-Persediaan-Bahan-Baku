<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Supplier');
    }

    public function index()
    {
        $this->load->view('owner/default/header');
        $this->load->view('owner/default/sidebar');
        $this->load->view('owner/default/topbar');
        $this->load->view('owner/dashboard');
        $this->load->view('owner/default/footer');
    }

    public function supplier()
    {
        $data['supplier'] = $this->Supplier->read('supplier')->result();
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

            $this->Supplier->insert($data, 'supplier');
            redirect('owner/supplier');
        }
    }

    public function supplier_edt($id_sup)
    {
        $where = array('id_sup' => $id_sup);
        $data['supplier'] = $this->Supplier->edit($where, 'supplier')->result();
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

            $this->Supplier->update($where, $data, 'supplier');
            redirect('owner/supplier');
        }
    }
    public function supplier_del($id_sup)
    {
        $where = array('id_sup' => $id_sup);
        $this->Supplier->delete($where, 'supplier');
        redirect('owner/supplier');
    }
}