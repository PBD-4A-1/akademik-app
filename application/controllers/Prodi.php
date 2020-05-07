<?php

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['header'] = 'Tabel';
        $data['ico'] = 'fa fa-table';
        $data['judul'] = 'Daftar Program Studi';
        $data['halaman'] = 'Data Program Studi';
        $data['akademik'] = $this->Prodi_model->getAllAkreditasi();

        if ($this->input->post('keyword')) {
            $data['akademik'] = $this->Prodi_model->cariDataAkreditasi();
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/prodi/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        $data['header'] = 'Tabel';
        $data['ico'] = 'fa fa-table';
        $data['judul'] = 'Tambah Data Akreditasi';
        $data['halaman'] = 'Form Tambah Data';

        $this->form_validation->set_rules('kdprodi', 'Kode Prodi', 'required');
        $this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/prodi/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Akreditasi_model->tambahDataAkreditasi();
            $this->session->set_flashdata('flash_data', 'ditambahkan');
            redirect('admin');
        }
    }

    public function detailHapus($idprodi)
    {
        $data['header'] = 'Tabel';
        $data['ico'] = 'fa fa-table';
        $data['judul'] = 'Hapus Data Akreditasi';
        $data['halaman'] = 'Hapus Data Akreditasi';
        $data['akademik'] = $this->Akreditasi_model->getAkreditasiById($idprodi);
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/prodi/hapus', $data);
        $this->load->view('templates/footer');
    }
    
    public function hapus($idprodi)
    {
        $this->Akreditasi_model->hapusDataAkreditasi($idprodi);
        $this->session->set_flashdata('flash_data', 'dihapus');
        redirect('admin');
    }
    
    public function detail($idprodi)
    {
        $data['header'] = 'Tabel';
        $data['ico'] = 'fa fa-table';
        $data['judul'] = 'Detail Data Akreditasi';
        $data['halaman'] = 'Detail Akreditasi';
        $data['akademik'] = $this->Akreditasi_model->getAkreditasiById($idprodi);
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/prodi/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function ubah($idprodi)
    {
        $data['header'] = 'Tabel';
        $data['ico'] = 'fa fa-table';
        $data['judul'] = 'Ubah Data Akreditasi';
        $data['halaman'] = 'Ubah Data Akreditasi';
        $data['akademik'] = $this->Prodi_model->getAkreditasiById($idprodi);
        $data['akreditasi'] = ['A', 'B', 'C', '-'];
        
        $this->form_validation->set_rules('kdprodi', 'Kode Prodi', 'required');
        $this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('admin/prodi/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Prodi_model->ubahDataAkreditasi();
            $this->session->set_flashdata('flash_data', 'diubah');
            redirect('admin/prodi');
        }
    }
}

?> 