<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // Kelola Sopir
    function reset_password_admin()
    {
        $data_login = array(
            'password' => password_hash('SOPIR123abc', PASSWORD_DEFAULT)
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
    }
    function hapus_sopir()
    {
        $data_login = array(
            'status' => 'HAPUS'
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
    }
    function ubah_sopir()
    {
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
    function ubah_sopir_hp()
    {
        $data_login = array(
            'no_hp'  => htmlentities($this->input->post('no_hp'))
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
    function ubah_sopir_email()
    {
        $data_login = array(
            'email'  => htmlentities($this->input->post('email'))
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
    function ubah_sopir_full()
    {
        $data_login = array(
            'no_hp'  => htmlentities($this->input->post('no_hp')),
            'email'  => htmlentities($this->input->post('email'))
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
}
