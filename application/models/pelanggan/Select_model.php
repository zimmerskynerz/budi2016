<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    function getKodeRental()
    {
        $tgl_ini = date('Y-m-d');
        $query  = $this->db->select('max(no_rental) as max_kode');
        $query  = $this->db->from('pesanan_rental');
        $query  = $this->db->where('tgl_pesan', $tgl_ini);
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getKodePaket()
    {
        $tgl_ini = date('Y-m-d');
        $query  = $this->db->select('max(no_pesanan) as max_kode');
        $query  = $this->db->from('pesanan_paket');
        $query  = $this->db->where('tgl_pesan', $tgl_ini);
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getDataPesananRental($id_pelanggan)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('pesanan_rental as A');
        $query  = $this->db->join('tbl_rental as B', 'A.id_rental=B.id_rental');
        $query  = $this->db->join('tbl_sopir as C', 'B.id_sopir=C.id_sopir');
        $query  = $this->db->join('tbl_kendaraan as D', 'B.no_registrasi=D.no_registrasi');
        $query  = $this->db->where('A.id_pelanggan', $id_pelanggan);
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPesananPaket($id_pelanggan)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_paket as A');
        $query = $this->db->join('tbl_paket as B', 'A.id_paket=B.id_paket');
        $query  = $this->db->where('A.id_pelanggan', $id_pelanggan);
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPaketNew($tgl_berangkat, $tgl_selesai, $id_rental)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('pesanan_paket as A');
        $query  = $this->db->join('tbl_paket as B', 'A.id_paket=B.id_paket');
        $query  = $this->db->join('pesanan_rental as C', 'B.id_rental=C.id_rental');
        $query  = $this->db->where('C.id_rental', $id_rental);
        $query  = $this->db->where('C.status_rental', 'KONFIRMASI');
        $query  = $this->db->where('C.tgl_selesai >=', $tgl_berangkat);
        $query  = $this->db->where('C.tgl_selesai <=', $tgl_selesai);
        $query  = $this->db->get();
        return $query->row_array();
    }
    function getDataRental()
    {
        // SQL
        // select * from tbl_rental where status != HAPUS
        $query = $this->db->select('*,B.status as status_sopir');
        $query = $this->db->from('tbl_rental as A');
        $query = $this->db->join('tbl_sopir as B', 'A.id_sopir=B.id_sopir');
        $query = $this->db->join('tbl_kendaraan as C', 'A.no_registrasi=C.no_registrasi');
        $query = $this->db->where('A.status !=', 'HAPUS');
        $query = $this->db->where('B.status', 'KOSONG');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPaket()
    {
        // SQL
        // select * from tbl_rental where status != HAPUS
        $query = $this->db->select('*,B.status as status_sopir');
        $query = $this->db->from('tbl_rental as A');
        $query = $this->db->join('tbl_sopir as B', 'A.id_sopir=B.id_sopir');
        $query = $this->db->join('tbl_kendaraan as C', 'A.no_registrasi=C.no_registrasi');
        $query = $this->db->join('tbl_paket as D', 'D.id_rental=A.id_rental');
        $query = $this->db->where('A.status !=', 'HAPUS');
        $query = $this->db->where('D.status !=', 'HAPUS');
        $query  = $this->db->get();
        return $query->result();
    }
}
