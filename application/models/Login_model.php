<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function check()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function check_auth()
    {
        if ($this->session->userdata('user_id')) {
            redirect('home');
        }
    }
}
