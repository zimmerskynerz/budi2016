<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    function sopir_berangkat_rental()
    {
        $data_rental = array(
            'status_rental'   => 'BERANGKAT'
        );
        $this->db->where('no_rental', $this->input->post('no_rental'));
        $this->db->update('pesanan_rental', $data_rental);
    }
    function sopir_selesai_rental()
    {
        $data_rental = array(
            'status_rental'   => 'SELESAI'
        );
        $this->db->where('no_rental', $this->input->post('no_rental'));
        $this->db->update('pesanan_rental', $data_rental);
    }
    function sopir_berangkat_paket()
    {
        $data_rental = array(
            'status_paket'   => 'BERANGKAT'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data_rental);
    }
    function sopir_selesai_paket($id_sopir)
    {
        $data_rental = array(
            'status_paket'   => 'SELESAI'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data_rental);
        $data_sopir = array(
            'status' => 'KOSONG'
        );
        $this->db->where('id_sopir', $id_sopir);
        $this->db->update('tbl_sopir', $data_sopir);
    }
}
