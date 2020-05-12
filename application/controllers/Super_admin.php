<?php

class Super_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->model('Mhs_model');
        $this->load->model('DataUser_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        //Lv 1 Jenis 11
        $data['judul'] = 'Akademik - Super Admin';
        $data['jenisuser'] = 'Super Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/index', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function profil()
    {
        $edit = $this->input->post('edit');

        $data['halaman'] = 'Profil';
        $data['judul'] = 'Akademik - Super Admin';
        $data['jenisuser'] = 'Super Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['edit'] = 'disabled';
        $data['update'] = '';

        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/profil', $data);
        $this->load->view('templates_super/footer');
    }

    //Program Studi
    public function prodi()
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Daftar Program Studi';
        $data['halaman'] = 'Data Program Studi';
        $data['akademik'] = $this->Prodi_model->getAllAkreditasi();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->input->post('keyword')) {
            $data['akademik'] = $this->Prodi_model->cariDataAkreditasi();
        }
        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/11prodi', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function tambah()
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Tambah Data Akreditasi';
        $data['halaman'] = 'Form Tambah Data';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        $this->form_validation->set_rules('kdprodi', 'Kode Prodi', 'required');
        $this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_super/header', $data);
            $this->load->view('templates_super/sidebar', $data);
            $this->load->view('templates_super/topbar', $data);
            $this->load->view('super_admin/11tambah', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->Prodi_model->tambahDataAkreditasi();
            $this->session->set_flashdata('flash_data', 'ditambahkan');
            redirect('super_admin/prodi');
        }
    }

    public function detailHapus($idprodi)
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Hapus Data Akreditasi';
        $data['halaman'] = 'Hapus Data Akreditasi';
        $data['akademik'] = $this->Prodi_model->getAkreditasiById($idprodi);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/11hapus', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function hapus($idprodi)
    {
        $this->Prodi_model->hapusDataAkreditasi($idprodi);
        $this->session->set_flashdata('flash_data', 'dihapus');
        redirect('super_admin/prodi');
    }
    
    public function detail($idprodi)
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Detail Data Akreditasi';
        $data['halaman'] = 'Detail Akreditasi';
        $data['akademik'] = $this->Prodi_model->getAkreditasiById($idprodi);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/11detail', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function ubah($idprodi)
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Ubah Data Akreditasi';
        $data['halaman'] = 'Ubah Data Akreditasi';
        $data['akademik'] = $this->Prodi_model->getAkreditasiById($idprodi);
        $data['akreditasi'] = ['-', 'A', 'B', 'C'];
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->form_validation->set_rules('kdprodi', 'Kode Prodi', 'required');
        $this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_super/header', $data);
            $this->load->view('templates_super/sidebar', $data);
            $this->load->view('templates_super/topbar', $data);
            $this->load->view('super_admin/11ubah', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->Prodi_model->ubahDataAkreditasi();
            $this->session->set_flashdata('flash_data', 'diubah');
            redirect('super_admin/prodi');
        }
    }

    //Mahasiswa
    public function mhs()
    {
        $data['jenisuser'] = 'Super Admin';
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
        $this->load->view('super_admin/11mhs', $data);
        $this->load->view('templates_super/footer');
    }

    public function tambahMhs()
    {
        $data['jenisuser'] = 'Super Admin';
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
            $this->load->view('super_admin/11tambahMhs', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->Mhs_model->tambahDataMhs();
            $this->session->set_flashdata('flash_data', 'ditambahkan');
            redirect('super_admin/mhs');
        }
    }

    public function detailHapusMhs($npm)
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Hapus Data Mahasiswa';
        $data['halaman'] = 'Hapus Data Mahasiswa';
        $data['mhs'] = $this->Mhs_model->getMahasiswaById($npm);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/11hapusMhs', $data);
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
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['halaman'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->Mhs_model->getMahasiswaById($npm);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/11detailMhs', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function ubahMhs($npm)
    {
        $data['jenisuser'] = 'Super Admin';
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
            $this->load->view('super_admin/11ubahMhs', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->Mhs_model->ubahDataMhs();
            $this->session->set_flashdata('flash_data', 'diubah');
            redirect('super_admin/mhs');
        }
    }

    //Data User
    public function user()
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Daftar User';
        $data['halaman'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['datauser'] = $this->DataUser_model->getAllUser();

        if ($this->input->post('keyword')) {
            $data['datauser'] = $this->DataUser_model->cariDataUser();
        }

        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/11datauser', $data);
        $this->load->view('templates_super/footer');
    }

    public function tambahUser()
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Tambah Data User';
        $data['halaman'] = 'Form Tambah Data';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username sudah digunakan.'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah digunakan.'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_super/header', $data);
            $this->load->view('templates_super/sidebar', $data);
            $this->load->view('templates_super/topbar', $data);
            $this->load->view('super_admin/11tambahDatauser', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->DataUser_model->tambahDataUser();
            $this->session->set_flashdata('flash_data', 'ditambahkan');
            redirect('super_admin/user');
        }
    }
    
    public function hapusDataUser($username)
    {
        $this->DataUser_model->hapusDataUser($username);
        $this->session->set_flashdata('flash_data', 'dihapus');
        redirect('super_admin/user');
    }
    
    public function detailDataUser($username)
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Detail Data User';
        $data['halaman'] = 'Detail User';
        $data['datauser'] = $this->DataUser_model->getUserById($username);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $this->load->view('templates_super/header', $data);
        $this->load->view('templates_super/sidebar', $data);
        $this->load->view('templates_super/topbar', $data);
        $this->load->view('super_admin/11detailDataUser', $data);
        $this->load->view('templates_super/footer');
    }
    
    public function ubahDataUser($username)
    {
        $data['jenisuser'] = 'Super Admin';
        $data['judul'] = 'Ubah Data User';
        $data['halaman'] = 'Ubah Data User';
        $data['ju'] = ['-', '1', '0'];
        $data['level'] = ['-', '11', '10', '00'];
        $data['datauser'] = $this->DataUser_model->getUserById($username);
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_super/header', $data);
            $this->load->view('templates_super/sidebar', $data);
            $this->load->view('templates_super/topbar', $data);
            $this->load->view('super_admin/11ubahDataUser', $data);
            $this->load->view('templates_super/footer');
        } else {
            $this->DataUser_model->ubahDataUser();
            $this->session->set_flashdata('flash_data', 'diubah');
            redirect('super_admin/user');
        }
    }
}
