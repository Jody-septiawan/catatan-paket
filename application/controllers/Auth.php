<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->Login_model->check_auth();
        $this->load->view('auth/index');
    }

    public function login_proses()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query1 = "SELECT * FROM user WHERE username = '$username'";

        $check_username = $this->db->query($query1)->row_array();

        if ($check_username) {
            if (password_verify($password, $check_username['password'])) {
                $data = [
                    'user_id' => $check_username['id']
                ];

                $this->session->set_userdata($data);
                redirect('/');
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger py-1 mt-3' role='alert'>
                <b>Username</b> atau <b>password</b> salah </div>");
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger py-1 mt-3' role='alert'>
            <b>Username</b> atau <b>password</b> salah  </div>");
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');

        redirect('auth');
    }
}
