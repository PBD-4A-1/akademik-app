<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
    
            $this->load->view('templates_auth/header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('templates_auth/footer', $data);
        } else {
            //Login
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
            if ($user['status'] == 'T') {
                $this->session->set_flashdata(
                    'flash_data',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <small>
                            <strong>Username</strong> sedang aktif!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </small>
                    </div>'
                );
                redirect('auth');
            } elseif ($user['status'] == 'F') {
                if (password_verify($password, $user['password'])) {
                    $this->Auth_model->ubahStatusUserT($username);

                    $data = [
                        'username' => $user['username'],
                        'jenisuser' => $user['jenisuser'],
                        'level' => $user['level']
                    ];

                    $this->session->set_userdata($data);

                    if ($user['jenisuser'] == 1 && $user['level'] == 11) {
                        redirect('super_admin');
                    } elseif ($user['jenisuser'] == 1 && $user['level'] == 10) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata(
                        'flash_data',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <small>
                                            <strong>Password</strong> salah!
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </small>
                                        </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'flash_data',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <small>
                    <strong>Username</strong> belum terdaftar!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </small>
                </div>'
                );
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($user['status'] == 'T') {
            $username = $user['username'];

            $this->Auth_model->ubahStatusUserF($username);
            
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('jenisuser');
            $this->session->unset_userdata('level');

            $this->session->set_flashdata(
                'flash_data',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <small>
                    Berhasil <strong>Logout</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </small>
            </div>'
            );
            redirect('auth');
        } elseif ($user['status'] == 'F') {
            if ($user['jenisuser'] == 1 && $user['level'] == 11) {
                redirect('super_admin');
            } elseif ($user['jenisuser'] == 1 && $user['level'] == 10) {
                redirect('admin');
            } else {
                redirect('user');
            }
        }
    }
    
    
    public function registrasi()
    {
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
            $data['judul'] = 'Registrasi';
        
            $this->load->view('templates_auth/header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates_auth/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'jenisuser' => '0',
                'level' => '00',
                'status' => 'F'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata(
                'flash_data',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<small>
					Registrasi <strong>berhasil.</strong> Silahkan Login!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
				    </button>
				</small>
		    </div>'
            );
            redirect('auth');
        }
    }

    public function lupa()
    {
        $data['judul'] = 'Lupa Password';
    
        $this->load->view('templates_auth/header', $data);
        $this->load->view('auth/lupa_password', $data);
        $this->load->view('templates_auth/footer', $data);
    }
}
