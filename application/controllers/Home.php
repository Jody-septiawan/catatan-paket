<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->Login_model->check();
    }

    public function index()
    {
        $data['title'] = '- Dashboard';

        $query = "SELECT * FROM main ORDER BY id DESC";
        $data['data'] = $this->db->query($query)->result_array();
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();

        $data['user'] = [
            'id' => $data['user']['id'],
            'username' => $data['user']['username']
        ];

        $this->load->view('home/templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('home/templates/footer');
    }

    public function addpaket()
    {
        $date = date("d M Y");
        $nama = $this->input->post('nama');
        $nilai = $this->input->post('nilai');

        $data = [
            'nama' => $nama,
            'nilai' => $nilai,
            'createAt' => $date
        ];

        $this->db->insert('main', $data);

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3 shadow' role='alert'>
        Tambah paket <b>$nama</b> berhasil </div>");

        redirect('home');
    }

    public function deletePaket($id = null)
    {
        $check = $this->db->get_where('main', ['id' => $id])->row_array();
        if ($check) {

            $this->db->where('id', $id);
            $this->db->delete('main');

            $this->db->where('id_main', $id);
            $this->db->delete('material');

            $this->db->where('id_main', $id);
            $this->db->delete('tukang');

            $this->db->where('id_main', $id);
            $this->db->delete('lain');

            $this->db->where('id_main', $id);
            $this->db->delete('pembayaran');

            $nama = $check['nama'];
            $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3' role='alert'>
                Hapus paket $nama berhasil </div>");
            redirect('/');
        } else {
        }
    }

    public function updateUsername()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');

        $this->db->where('id', $id);
        $this->db->set('username', $username);
        $this->db->update('user');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3 shadow' role='alert'>
        Update username <b>$username</b> berhasil </div>");

        redirect('home');
    }

    public function updatePassword()
    {
        $id = $this->input->post('id');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->db->where('id', $id);
        $this->db->set('password', $password);
        $this->db->update('user');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3 shadow' role='alert'>
        Update password berhasil </div>");

        redirect('home');
    }

    public function detailPaket($id = null)
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();

        $data['user'] = [
            'id' => $data['user']['id'],
            'username' => $data['user']['username']
        ];

        $data['data'] = $this->db->get_where('main', ['id' => $id])->row_array();
        $data['material'] = $this->db->get_where('material', ['id_main' => $id])->result_array();
        $data['tukang'] = $this->db->get_where('tukang', ['id_main' => $id])->result_array();
        $data['lain'] = $this->db->get_where('lain', ['id_main' => $id])->result_array();
        $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_main' => $id])->result_array();
        $data['title'] = '- ' . $data['data']['nama'];

        $data['Total_pembayaran'] = 0;
        foreach ($data['pembayaran'] as $m) :
            $data['Total_pembayaran'] += $m['harga'];
        endforeach;

        $data['Total_material'] = 0;
        foreach ($data['material'] as $m) :
            $data['Total_material'] += $m['harga'];
        endforeach;

        $data['Total_tukang'] = 0;
        foreach ($data['tukang'] as $m) :
            $data['Total_tukang'] += $m['harga'];
        endforeach;

        $data['Total_lain'] = 0;
        foreach ($data['lain'] as $m) :
            $data['Total_lain'] += $m['harga'];
        endforeach;

        $data['sisa_pembayaran'] = $data['data']['nilai'] - $data['Total_pembayaran'];

        $data['nominal_ppn'] = $data['data']['nilai'] * ($data['data']['ppn_pph'] / 100);

        $data['pengeluaran'] = $data['nominal_ppn'] + $data['data']['fee'] + $data['Total_material'] + $data['Total_tukang'] + $data['Total_lain'];

        $data['profit'] = $data['data']['nilai'] - $data['pengeluaran'];


        $this->load->view('home/templates/header', $data);
        $this->load->view('home/detail/index');
        $this->load->view('home/detail/material');
        $this->load->view('home/detail/upah_tukang');
        $this->load->view('home/detail/lain');
        $this->load->view('home/detail/delete_paket');
        $this->load->view('home/templates/footer');
    }

    public function updateNama()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $this->db->where('id', $id);
        $this->db->set('nama', $nama);
        $this->db->update('main');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3' role='alert'>
        Update nama paket berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function updateNilai()
    {
        $id = $this->input->post('id');
        $nilai = $this->input->post('nilai');

        $this->db->where('id', $id);
        $this->db->set('nilai', $nilai);
        $this->db->update('main');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3' role='alert'>
        Update nilai paket berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function updateKet()
    {
        $id = $this->input->post('id');
        $ket = $this->input->post('ket');

        $this->db->where('id', $id);
        $this->db->set('ket', $ket);
        $this->db->update('main');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3' role='alert'>
        Update keterangan berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function addUM()
    {
        $id = $this->input->post('id');
        $um = $this->input->post('um-termin');

        $this->db->where('id', $id);
        $this->db->set('um_termin', $um);
        $this->db->update('main');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3' role='alert'>
        Update UM-Termin berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function addPPN()
    {
        $id = $this->input->post('id');
        $um = $this->input->post('ppn');

        $this->db->where('id', $id);
        $this->db->set('ppn_pph', $um);
        $this->db->update('main');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3' role='alert'>
        Update PPN berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function addFEE()
    {
        $id = $this->input->post('id');
        $um = $this->input->post('fee');

        $this->db->where('id', $id);
        $this->db->set('fee', $um);
        $this->db->update('main');

        $this->session->set_flashdata('message', "<div class='alert alert-success py-1 mt-3' role='alert'>
        Update FEE berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function addMaterial()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id,
            'nama' => $nama,
            'harga' => $harga
        ];

        $this->db->insert('material', $data);

        $this->session->set_flashdata('message2', "<div class='alert alert-success py-1' role='alert'>
        Tambah Material $nama berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function updateMaterial()
    {
        $id = $this->input->post('id');
        $id_paket = $this->input->post('id_paket');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id_paket,
            'nama' => $nama,
            'harga' => $harga
        ];

        $this->db->where('id', $id);
        $this->db->update('material', $data);

        $this->session->set_flashdata('message2', "<div class='alert alert-success py-1' role='alert'>
        Update Material $nama berhasil </div>");

        redirect("home/detailPaket/$id_paket");
    }

    public function deleteMaterial($id = null, $id_paket = null)
    {
        $check = $this->db->get_where('material', ['id' => $id])->row_array();
        if ($check) {
            $this->db->where('id', $id);
            $this->db->delete('material');

            $nama = $check['nama'];
            $this->session->set_flashdata('message2', "<div class='alert alert-success py-1' role='alert'>
                Hapus Material $nama berhasil </div>");
        } else {
            $this->session->set_flashdata('message2', "<div class='alert alert-danger py-1' role='alert'>
                Hapus Material gagal </div>");
        }

        redirect("home/detailPaket/$id_paket");
    }

    public function addTukang()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id,
            'nama' => $nama,
            'harga' => $harga
        ];

        $this->db->insert('tukang', $data);

        $this->session->set_flashdata('message3', "<div class='alert alert-success py-1' role='alert'>
        Tambah Upah Tukang $nama berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function updateTukang()
    {
        $id = $this->input->post('id');
        $id_paket = $this->input->post('id_paket');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id_paket,
            'nama' => $nama,
            'harga' => $harga
        ];

        $this->db->where('id', $id);
        $this->db->update('tukang', $data);

        $this->session->set_flashdata('message3', "<div class='alert alert-success py-1' role='alert'>
        Update Upah Tukang $nama berhasil </div>");

        redirect("home/detailPaket/$id_paket");
    }

    public function deleteTukang($id = null, $id_paket = null)
    {
        $check = $this->db->get_where('tukang', ['id' => $id])->row_array();
        if ($check) {
            $this->db->where('id', $id);
            $this->db->delete('tukang');

            $nama = $check['nama'];
            $this->session->set_flashdata('message3', "<div class='alert alert-success py-1' role='alert'>
                Hapus Upah Tukang $nama berhasil </div>");
        } else {
            $this->session->set_flashdata('message3', "<div class='alert alert-danger py-1' role='alert'>
                Hapus Upah Tukang gagal </div>");
        }

        redirect("home/detailPaket/$id_paket");
    }

    public function addLain()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id,
            'nama' => $nama,
            'harga' => $harga
        ];

        $this->db->insert('lain', $data);

        $this->session->set_flashdata('message4', "<div class='alert alert-success py-1' role='alert'>
        Tambah Biaya lain-lain $nama berhasil </div>");

        redirect("home/detailPaket/$id");
    }

    public function updateLain()
    {
        $id = $this->input->post('id');
        $id_paket = $this->input->post('id_paket');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id_paket,
            'nama' => $nama,
            'harga' => $harga
        ];

        $this->db->where('id', $id);
        $this->db->update('lain', $data);

        $this->session->set_flashdata('message4', "<div class='alert alert-success py-1' role='alert'>
        Update Biaya lain-lain $nama berhasil </div>");

        redirect("home/detailPaket/$id_paket");
    }

    public function deleteLain($id = null, $id_paket = null)
    {
        $check = $this->db->get_where('lain', ['id' => $id])->row_array();
        if ($check) {
            $this->db->where('id', $id);
            $this->db->delete('lain');

            $nama = $check['nama'];
            $this->session->set_flashdata('message4', "<div class='alert alert-success py-1' role='alert'>
                Hapus Biaya lain-lain $nama berhasil </div>");
        } else {
            $this->session->set_flashdata('message4', "<div class='alert alert-danger py-1' role='alert'>
                Hapus Biaya lain-lain gagal </div>");
        }

        redirect("home/detailPaket/$id_paket");
    }

    public function addPembayaran()
    {
        $id_main = $this->input->post('id');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id_main,
            'harga' => $harga
        ];

        $this->db->insert('pembayaran', $data);

        redirect("home/detailPaket/$id_main");
    }

    public function updatePembayaran()
    {
        $id = $this->input->post('id');
        $id_paket = $this->input->post('id_paket');
        $harga = $this->input->post('harga');

        $data = [
            'id_main' => $id_paket,
            'harga' => $harga
        ];

        $this->db->where('id', $id);
        $this->db->update('pembayaran', $data);

        $this->session->set_flashdata('message4', "<div class='alert alert-success py-1' role='alert'>
        Update pembayaran berhasil </div>");

        redirect("home/detailPaket/$id_paket");
    }

    public function deletePembayaran($id = null, $id_paket = null)
    {
        $check = $this->db->get_where('pembayaran', ['id' => $id])->row_array();

        if ($check) {
            $this->db->where('id', $id);
            $this->db->delete('pembayaran');

            $this->session->set_flashdata('message4', "<div class='alert alert-success py-1' role='alert'>
                Hapus pembayaran berhasil </div>");
        } else {
            $this->session->set_flashdata('message4', "<div class='alert alert-danger py-1' role='alert'>
                Hapus pembayaran gagal </div>");
        }

        redirect("home/detailPaket/$id_paket");
    }
}
