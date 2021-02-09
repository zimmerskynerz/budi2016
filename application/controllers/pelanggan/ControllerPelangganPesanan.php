<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPelangganPesanan extends CI_Controller
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
    public function rental()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        $identitas = $this->db->get_where('tbl_pelanggan', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'PELANGGAN') :
            $id_pelanggan               = $identitas['id_pelanggan'];
            $data_pesanan_rental        = $this->select_model->getDataPesananRental($id_pelanggan);
            $data = array(
                'folder'       => 'pesanan',
                'halaman'      => 'rental',
                'identitas'    => $identitas,
                // Halaman data sopir
                'data_pesanan_rental'   => $data_pesanan_rental
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
    public function crudpesanan()
    {
        if (isset($_POST['kirim_bukti_rental_dp'])) :
            $this->update_model->kirim_bukti_dp_rental();
            redirect('pelanggan/pesanan/rental');
        endif;
        if (isset($_POST['kirim_bukti_rental_dp_ulang'])) :
            $this->update_model->kirim_bukti_dp_rental_ulang();
            redirect('pelanggan/pesanan/rental');
        endif;
        if (isset($_POST['kirim_bukti_rental_lunas'])) :
            $this->update_model->kirim_bukti_rental_lunas();
            redirect('pelanggan/pesanan/rental');
        endif;
        if (isset($_POST['kirim_bukti_rental_lunas_ulang'])) :
            $this->update_model->kirim_bukti_rental_lunas_ulang();
            redirect('pelanggan/pesanan/rental');
        endif;
    }
}
        
    /* End of file  ControllerPelangganPesanan.php */
