<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    function sewa_rental($no_rental_hari_ini, $tgl_berangkat, $tgl_selesai)
    {
        $data_rental = array(
            'no_rental'     => $no_rental_hari_ini,
            'id_rental'     => $this->input->post('id_rental'),
            'id_pelanggan'  => $this->input->post('id_pelanggan'),
            'tgl_pesan'     => date('Y-m-d'),
            'tgl_dp'        => null,
            'tgl_lunas'     => null,
            'tgl_berangkat' => $tgl_berangkat,
            'tgl_selesai'   => $tgl_selesai,
            'jml_hari'      => $this->input->post('jml_hari'),
            'harga_total'   => $this->input->post('ttl_harga'),
            'bukti_dp'      => null,
            'bukti_lunas'   => null,
            'status_rental' => 'PROSES'
        );
        $this->db->insert('pesanan_rental', $data_rental);
    }
    function pilih_paket($harga_paket, $no_paket_hari_ini)
    {
        $tgl_berangkat = $this->input->post('tgl_berangkat');
        $jml_hari      = $this->input->post('jml_hari');
        $query = $this->db->select("'$tgl_berangkat' + INTERVAL $jml_hari DAY as tgl_selesai")->get()->row_array();
        $tgl_selesai = $query['tgl_selesai'];
        $data_paket = array(
            'no_pesanan'    => $no_paket_hari_ini,
            'id_paket'      => $this->input->post('id_paket'),
            'id_pelanggan'  => $this->input->post('id_pelanggan'),
            'tgl_pesan'     => date('Y-m-d'),
            'tgl_berangkat' => $this->input->post('tgl_berangkat'),
            'tgl_selesai'   => $tgl_selesai,
            'tgl_dp'        => null,
            'tgl_lunas'     => null,
            'bukti_dp'      => null,
            'bukti_lunas'   => null,
            'harga_paket'   => $harga_paket,
            'status_paket' => 'PROSES'
        );
        $this->db->insert('pesanan_paket', $data_paket);
    }
}
