<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdminPesanan extends CI_Controller
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
    public function rental()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            $data_pesanan_rental        = $this->select_model->getDataPesananRental();
            $data = array(
                'folder'       => 'pesanan',
                'halaman'      => 'rental',
                // Halaman data sopir
                'data_pesanan_rental'   => $data_pesanan_rental
            );
            $this->load->view('admin/include/index', $data);
        elseif ($cek_data['level'] == 'PEMILIK') :
            redirect('pemilik');
        elseif ($cek_data['level'] == 'SOPIR') :
            redirect('sopir');
        elseif ($cek_data['level'] == 'PELANGGAN') :
            redirect('pelanggan');
        else :
            redirect('login');
        endif;
    }
    public function crudrental()
    {
        if (isset($_POST['reset_password'])) :
            # code...
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Menambah Guru!</div>');
            redirect('admin/rental/sopir');
        endif;
        if (isset($_POST['hapus_sopir'])) :
        # code...
        endif;
        if (isset($_POST['ubah_sopir'])) :
        # code...
        endif;
    }
    public function paket()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            $pesanan_paket    = $this->select_model->getDataPesananPaket();
            $data = array(
                'folder'            => 'pesanan',
                'halaman'           => 'paket',
                // Data kendaraan
                'pesanan_paket'    => $pesanan_paket
            );
            $this->load->view('admin/include/index', $data);
        elseif ($cek_data['level'] == 'PEMILIK') :
            redirect('pemilik');
        elseif ($cek_data['level'] == 'SOPIR') :
            redirect('sopir');
        elseif ($cek_data['level'] == 'PELANGGAN') :
            redirect('pelanggan');
        else :
            redirect('login');
        endif;
    }
    public function crudpaket()
    {
        if (isset($_POST['simpan_kendaraan'])) :
            # code...
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Menambah Guru!</div>');
            redirect('admin/rental/kendaraan');
        endif;
        if (isset($_POST['ubah_kendaraan'])) :
        # code...
        endif;
        if (isset($_POST['hapus_kendaraan'])) :
        # code...
        endif;
    }
}
        
    /* End of file  ControllerAdminPesanan.php */
