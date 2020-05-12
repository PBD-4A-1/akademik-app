<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->model('Mhs_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        // Lv 1 Jenis 10
        $data['judul'] = 'Akademik - Admin';
        $data['jenisuser'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function profil()
    {
        $edit = $this->input->post('edit');

        $data['halaman'] = 'Profil';
        $data['judul'] = 'Akademik - Admin';
        $data['jenisuser'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['edit'] = 'disabled';
        $data['update'] = '';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('templates_admin/footer');
    }

    //Program Studi
    public function prodi()
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Daftar Program Studi';
        $data['halaman'] = 'Data Program Studi';
        $data['akademik'] = $this->Prodi_model->getAllAkreditasi();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->input->post('keyword')) {
            $data['akademik'] = $this->Prodi_model->cariDataAkreditasi();
        }
        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/10prodi', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function tambah()
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Tambah Data Akreditasi';
        $data['halaman'] = 'Form Tambah Data';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        $this->form_validation->set_rules('kdprodi', 'Kode Prodi', 'required');
        $this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('admin/10tambah', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->Prodi_model->tambahDataAkreditasi();
            $this->session->set_flashdata('flash_data', 'ditambahkan');
            redirect('admin/prodi');
        }
    }

    public function detailHapus($idprodi)
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Hapus Data Akreditasi';
        $data['halaman'] = 'Hapus Data Akreditasi';
        $data['akademik'] = $this->Prodi_model->getAkreditasiById($idprodi);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/10detailhapus', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function hapus($idprodi)
    {
        $this->Prodi_model->hapusDataAkreditasi($idprodi);
        $this->session->set_flashdata('flash_data', 'dihapus');
        redirect('admin/prodi');
    }
    
    public function detail($idprodi)
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Detail Data Akreditasi';
        $data['halaman'] = 'Detail Akreditasi';
        $data['akademik'] = $this->Prodi_model->getAkreditasiById($idprodi);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/10detail', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function ubah($idprodi)
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Ubah Data Akreditasi';
        $data['halaman'] = 'Ubah Data Akreditasi';
        $data['akademik'] = $this->Prodi_model->getAkreditasiById($idprodi);
        $data['akreditasi'] = ['-', 'A', 'B', 'C'];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->form_validation->set_rules('kdprodi', 'Kode Prodi', 'required');
        $this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('templates_admin/topbar', $data);
            $this->load->view('admin/10ubah', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->Prodi_model->ubahDataAkreditasi();
            $this->session->set_flashdata('flash_data', 'diubah');
            redirect('admin/prodi');
        }
    }

    //Mahasiswa
    public function mhs()
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Daftar Mahasiswa';
        $data['halaman'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['mhs'] = $this->Mhs_model->getAllMhs();

        if ($this->input->post('keyword')) {
            $data['mhs'] = $this->Mhs_model->cariDataMhs();
        }

        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('admin/10mhs', $data);
        $this->load->view('templates_super/footer');
    }

    public function tambahMhs()
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Tambah Data Mahasiswa';
        $data['halaman'] = 'Form Tambah Data';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('idprodi', 'ID Program Studi', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_super/header', $data);
            $this->load->view('templates_super/sidebar', $data);
            $this->load->view('templates_super/topbar', $data);
            $this->load->view('admin/10tambahMhs', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->Mhs_model->tambahDataMhs();
            $this->session->set_flashdata('flash_data', 'ditambahkan');
            redirect('super_admin/mhs');
        }
    }

    public function detailHapusMhs($npm)
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Hapus Data Mahasiswa';
        $data['halaman'] = 'Hapus Data Mahasiswa';
        $data['mhs'] = $this->Mhs_model->getMahasiswaById($npm);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('admin/10hapusMhs', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function hapusMhs($npm)
    {
        $this->Mhs_model->hapusDataMhs($npm);
        $this->session->set_flashdata('flash_data', 'dihapus');
        redirect('super_admin/mhs');
    }
    
    public function detailMhs($npm)
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['halaman'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->Mhs_model->getMahasiswaById($npm);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('admin/10detailMhs', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function ubahMhs($npm)
    {
        $data['jenisuser'] = 'Admin';
        $data['judul'] = 'Ubah Data Akreditasi';
        $data['halaman'] = 'Ubah Data Akreditasi';
        $data['mhs'] = $this->Mhs_model->getMahasiswaById($npm);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('idprodi', 'ID Program Studi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_super/header', $data);
            $this->load->view('templates_super/sidebar', $data);
            $this->load->view('templates_super/topbar', $data);
            $this->load->view('admin/10ubahMhs', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->Mhs_model->ubahDataMhs();
            $this->session->set_flashdata('flash_data', 'diubah');
            redirect('super_admin/mhs');
        }
    }
}
