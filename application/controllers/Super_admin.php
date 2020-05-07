<?php

class Super_admin extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Akademik - Super Admin';
        $data['jenisuser'] = 'Super Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('super_admin/index', $data);
        $this->load->view('templates/footer');
    }
}
