<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['header'] = 'Dashboard';
        $data['ico'] = 'fa fa-wave-square';
        $data['judul'] = 'Bendi Car';
        $data['halaman'] = 'Dashboard';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}

?> 