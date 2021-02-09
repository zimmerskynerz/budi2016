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
}
