<?php defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    function getDataSopir()
    {
        // SQL
        // SELECT * FROM `tbl_login` as `A` JOIN tbl_sopir `as` `B` ON `A`.`id_login`=`B`.`id_login` WHERE `A`.`level` = 'SOPIR' AND `A`.`status` != 'HAPUS'
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_sopir as B', 'A.id_login=B.id_login');
        $query  = $this->db->where('A.level', 'SOPIR');
        $query  = $this->db->where('A.status !=', 'HAPUS');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataRentalKosong($id_rental)
    {
        $jml_penumpang = $this->input->post('jml_penumpang');
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_rental as A');
        $query = $this->db->join('tbl_kendaraan as B', 'A.no_registrasi=B.no_registrasi');
        $query = $this->db->join('tbl_sopir as C', 'A.id_sopir=C.id_sopir');
        $query = $this->db->where('A.id_rental', $id_rental);
        $query = $this->db->where('B.jml_penumpang >=', $jml_penumpang);
        $query = $this->db->where('C.status', 'KOSONG');
        $query = $this->db->get();
        return $query->row_array();
    }
    function getDataKendaraan()
    {
        // SQL
        // select * from tbl_kendaraan where status != HAPUS
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_kendaraan');
        $query = $this->db->where('status !=', 'HAPUS');
        $query  = $this->db->get();
        return $query->result();
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
    function getDataPesananRental()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_rental as A');
        $query = $this->db->join('tbl_rental as B', 'A.id_rental=B.id_rental');
        $query = $this->db->join('tbl_pelanggan as C', 'A.id_pelanggan=C.id_pelanggan');
        $query = $this->db->where('A.status_rental !=', 'PROSES');
        $query = $this->db->where('A.status_rental !=', 'GAGAL');
        $query = $this->db->order_by('A.no_rental', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPesananRentalJadwal()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_rental as A');
        $query = $this->db->join('tbl_rental as B', 'A.id_rental=B.id_rental');
        $query = $this->db->join('tbl_pelanggan as C', 'A.id_pelanggan=C.id_pelanggan');
        // $query = $this->db->where('A.status_rental', 'KONFIRMASI');
        $query = $this->db->order_by('A.no_rental', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPesananRentalNew($tgl_awal, $tgl_akhir)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_rental as A');
        $query = $this->db->join('tbl_rental as B', 'A.id_rental=B.id_rental');
        $query = $this->db->join('tbl_pelanggan as C', 'A.id_pelanggan=C.id_pelanggan');
        $query = $this->db->where('A.tgl_lunas >=', $tgl_awal);
        $query = $this->db->where('A.tgl_lunas <=', $tgl_akhir);
        $query = $this->db->order_by('A.no_rental', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPesananPaket()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_paket as A');
        $query = $this->db->join('tbl_paket as B', 'B.id_paket=A.id_paket');
        $query = $this->db->join('tbl_pelanggan as C', 'C.id_pelanggan=A.id_pelanggan');
        $query = $this->db->order_by('A.no_pesanan', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPesananPaketNew($tgl_awal, $tgl_akhir)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_paket as A');
        $query = $this->db->join('tbl_paket as B', 'B.id_paket=A.id_paket');
        $query = $this->db->join('tbl_pelanggan as C', 'C.id_pelanggan=A.id_pelanggan');
        $query = $this->db->where('A.tgl_lunas >=', $tgl_awal);
        $query = $this->db->where('A.tgl_lunas <=', $tgl_akhir);
        $query = $this->db->order_by('A.no_pesanan', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
    function getDataPesananPaketJadwal()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('pesanan_paket as A');
        $query = $this->db->join('tbl_paket as B', 'B.id_paket=A.id_paket');
        $query = $this->db->join('tbl_rental as C', 'C.id_rental=B.id_rental');
        $query = $this->db->join('tbl_pelanggan as D', 'A.id_pelanggan=D.id_pelanggan');
        $query = $this->db->where('A.status_paket', 'KONFIRMASI');
        $query = $this->db->order_by('A.no_pesanan', 'DESC');
        $query  = $this->db->get();
        return $query->result();
    }
}
