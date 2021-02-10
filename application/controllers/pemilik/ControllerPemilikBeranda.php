<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPemilikBeranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/insert_model');
        $this->load->model('admin/select_model');
        $this->load->model('admin/update_model');
        $this->set_timezone();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'PEMILIK') :
            $data_pesanan_rental        = $this->select_model->getDataPesananRentalJadwal();
            $pesanan_paket              = $this->select_model->getDataPesananPaket();
            $data_rental                = $this->select_model->getDataRental();
            $data = array(
                'folder'          => 'beranda',
                'halaman'         => 'index',
                // Halaman data sopir
                'data_pesanan_rental'   => $data_pesanan_rental,
                'pesanan_paket'    => $pesanan_paket,
                'data_rental'      => $data_rental
            );
            $this->load->view('pemilik/include/index', $data);
        elseif ($cek_data['level'] == 'ADMIN') :
            redirect('admin');
        elseif ($cek_data['level'] == 'SOPIR') :
            redirect('sopir');
        elseif ($cek_data['level'] == 'PELANGGAN') :
            redirect('pelanggan');
        else :
            redirect('login');
        endif;
    }
}
        
    /* End of file  ControllerPemilikBeranda.php */
