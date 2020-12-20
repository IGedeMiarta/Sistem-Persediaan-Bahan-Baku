<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/header');
            $this->load->view('login/login');
            $this->load->view('login/footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika user ada
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                if ($user['role'] == 1) {
                    $data = [

                        'username' => $user['username'],
                        'role' => $user['role'],
                        'pegawai' => $user['id_pegawai'],
                        'status' => 'login_admin'
                    ];
                    $this->session->set_userdata($data);
                    redirect('owner');
                } else if ($user['role'] == 2) {
                    $data = [

                        'username' => $user['username'],
                        'role' => $user['role'],
                        'pegawai' => $user['id_pegawai'],
                        'status' => 'login_kasir'
                    ];
                    $this->session->set_userdata($data);
                    redirect('kasir');
                } else {
                    $data = [

                        'username' => $user['username'],
                        'role' => $user['role'],
                        'pegawai' => $user['id_pegawai'],
                        'status' => 'login_gudang'
                    ];
                    $this->session->set_userdata($data);
                    redirect('gudang');
                }
            } else {
                $this->session->set_flashdata('messege', '<div class="alert alert-danger mt-n5" role="alert">Password Salah</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger mt-n5" role="alert">Email Belum Terdaftar!</div>');
            redirect('login');
        }
    }
    public function regist()
    {

        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah terdatar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/header');
            $this->load->view('login/regist');
            $this->load->view('login/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => htmlspecialchars($this->input->post('role', true))
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Selamat Akun Anda Sudah dibuat!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');


        $this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Anda Sudah Logout</div>');
        redirect('login');
    }
}
