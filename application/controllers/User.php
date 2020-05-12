<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Akademik - User';
        $data['jenisuser'] = 'User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates_user/footer');
    }

    public function profil()
    {
        $edit = $this->input->post('edit');

        $data['halaman'] = 'Profil';
        $data['judul'] = 'Akademik - User';
        $data['jenisuser'] = 'User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['edit'] = 'disabled';
        $data['update'] = '';

        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('templates_user/footer');
    }
}
