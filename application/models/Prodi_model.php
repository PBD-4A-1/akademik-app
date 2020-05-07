<?php

class Prodi_model extends CI_model
{
    public function getAllAkreditasi()
    {
        return $this->db->get('dt_prodi')->result_array();
    }

    public function tambahDataAkreditasi()
    {
        $data = [
            "idprodi" => $this->input->post('idprodi', true),
            "nmprodi" => $this->input->post('nmprodi', true),
            "kdprodi" => $this->input->post('kdprodi', true),
            "akreditasi" => $this->input->post('akreditasi', true),
        ];

        $this->db->insert('dt_prodi', $data);
    }

    public function hapusDataAkreditasi($idprodi)
    {
        $this->db->where('idprodi', $idprodi);
        $this->db->delete('dt_prodi');
    }

    public function getAkreditasiById($id)
    {
        return $this->db->get_where('dt_prodi', ['idprodi' => $id])->row_array();
    }

    public function ubahDataAkreditasi()
    {
        $data = [
            "idprodi" => $this->input->post('idprodi', true),
            "nmprodi" => $this->input->post('nmprodi', true),
            "kdprodi" => $this->input->post('kdprodi', true),
            "akreditasi" => $this->input->post('akreditasi', true),
        ];

        $this->db->where('idprodi', $this->input->post('idprodi'));
        $this->db->update('dt_prodi', $data);
    }

    public function cariDataAkreditasi()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kdprodi', $keyword);
        $this->db->or_like('akreditasi', $keyword);

        return $this->db->get('dt_prodi')->result_array();
    }
}

?> 