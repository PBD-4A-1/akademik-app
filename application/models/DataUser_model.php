<?php

class DataUser_model extends CI_model
{
    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahDataUser()
    {
        $datauser = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'jenisuser' => $this->input->post('jenisuser'),
            'level' => $this->input->post('level'),
            'status' => 'F'
        ];

        $this->db->insert('user', $datauser);
    }

    public function hapusDataUser($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('user');
    }

    public function getUserById($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function ubahDataUser()
    {
        $datauser = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'jenisuser' => $this->input->post('jenisuser'),
            'level' => $this->input->post('level'),
            'status' => 'F'
        ];

        $this->db->where('username', $this->input->post('username'));
        $this->db->update('user', $datauser);
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('username', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('email', $keyword);

        return $this->db->get('user')->result_array();
    }
}

?> 