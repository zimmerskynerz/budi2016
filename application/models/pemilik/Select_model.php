<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    function getDataPesananRental($id_sopir)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('pesanan_rental as A');
        $query  = $this->db->join('tbl_rental as B', 'A.id_rental=B.id_rental');
        $query  = $this->db->join('tbl_sopir as C', 'B.id_sopir=C.id_sopir');
        $query  = $this->db->join('tbl_kendaraan as D', 'B.no_registrasi=D.no_registrasi');
        $query  = $this->db->where('C.id_sopir', $id_sopir);
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPesananPaket($id_sopir)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_paket as A');
        $query = $this->db->join('tbl_rental as B', 'A.id_rental=B.id_rental');
        $query = $this->db->join('tbl_pelanggan as C', 'A.id_pelanggan=C.id_pelanggan');
        $query = $this->db->join('tbl_paket as D', 'A.id_paket=D.id_paket');
        $query  = $this->db->where('B.id_sopir', $id_sopir);
        $query  = $this->db->get();
        return $query->result();
    }
}
