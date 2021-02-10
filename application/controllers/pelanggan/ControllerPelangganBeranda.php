<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPelangganBeranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan/insert_model');
        $this->load->model('pelanggan/select_model');
        $this->load->model('pelanggan/update_model');
        $this->set_timezone();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        $identitas = $this->db->get_where('tbl_pelanggan', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'PELANGGAN') :
            $id_pelanggan               = $identitas['id_pelanggan'];
            $data_pesanan_rental        = $this->select_model->getDataPesananRental($id_pelanggan);
            $data_pesanan_paket         = $this->select_model->getDataPesananPaket($id_pelanggan);
            $data = array(
                'folder'       => 'beranda',
                'halaman'      => 'index',
                'identitas'    => $identitas,
                // Halaman data sopir
                'data_pesanan_rental'   => $data_pesanan_rental,
                'data_pesanan_paket'   => $data_pesanan_paket
            );
            $this->load->view('pelanggan/include/index', $data);
        elseif ($cek_data['level'] == 'PEMILIK') :
            redirect('pemilik');
        elseif ($cek_data['level'] == 'SOPIR') :
            redirect('sopir');
        elseif ($cek_data['level'] == 'ADMIN') :
            redirect('admin');
        else :
            redirect('login');
        endif;
    }
}
        
    /* End of file  ControllerPelangganBeranda.php */
