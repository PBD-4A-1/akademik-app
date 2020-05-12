<?php

class Auth_model extends CI_model
{
    public function ubahStatusUserT($username)
    {
        $data = [
            "status" => "T"
        ];

        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }

    public function ubahStatusUserF($username)
    {
        $data = [
            "status" => "F"
        ];

        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }
}
