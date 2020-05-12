<?php

class Mhs_model extends CI_model
{
    public function getAllMhs()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function tambahDataMhs()
    {
        $data = [
            "npm" => $this->input->post('npm', true),
            "nama" => $this->input->post('nama', true),
            "idprodi" => $this->input->post('idprodi', true),
        ];

        $datauser = [
            'username' => htmlspecialchars($this->input->post('npm', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => '',
            'password' => password_hash($this->input->post('npm'), PASSWORD_DEFAULT),
            'jenisuser' => '0',
            'level' => '00',
            'status' => 'F'
        ];

        $this->db->insert('mahasiswa', $data);
        $this->db->insert('user', $datauser);
    }

    public function hapusDataMhs($npm)
    {
        $this->db->where('npm', $npm);
        $this->db->delete('mahasiswa');
        
        $this->db->where('username', $npm);
        $this->db->delete('user');
    }

    public function getMahasiswaById($npm)
    {
        return $this->db->get_where('mahasiswa', ['npm' => $npm])->row_array();
    }

    public function ubahDataMhs()
    {
        $data = [
            "npm" => $this->input->post('npm', true),
            "nama" => $this->input->post('nama', true),
            "idprodi" => $this->input->post('idprodi', true),
        ];

        $this->db->where('idmhs', $this->input->post('idmhs'));
        $this->db->update('mahasiswa', $data);
    }

    public function cariDataMhs()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('npm', $keyword);
        $this->db->or_like('nama', $keyword);

        return $this->db->get('mahasiswa')->result_array();
    }
}

?> 