<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSopirBeranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sopir/insert_model');
        $this->load->model('sopir/select_model');
        $this->load->model('sopir/update_model');
        $this->set_timezone();
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        $identitas = $this->db->get_where('tbl_sopir', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'SOPIR') :
            $id_sopir                   = $identitas['id_sopir'];
            $data_pesanan_rental        = $this->select_model->getDataPesananRental($id_sopir);
            $data_pesanan_paket         = $this->select_model->getDataPesananPaket($id_sopir);
            $data = array(
                'folder'       => 'beranda',
                'halaman'      => 'index',
                'identitas'    => $identitas,
                // Halaman data sopir
                'data_pesanan_rental'   => $data_pesanan_rental,
                'pesanan_paket'   => $data_pesanan_paket
            );
            $this->load->view('sopir/include/index', $data);
        elseif ($cek_data['level'] == 'PEMILIK') :
            redirect('pemilik');
        elseif ($cek_data['level'] == 'PELANGGAN') :
            redirect('pelanggan');
        elseif ($cek_data['level'] == 'ADMIN') :
            redirect('admin');
        else :
            redirect('login');
        endif;
    }
    public function crudkonfirmasi()
    {
        if (isset($_POST['sopir_berangkat_rental'])) :
            $this->update_model->sopir_berangkat_rental();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir Sudah Berangkat!</div>');
            redirect('sopir');
        endif;
        if (isset($_POST['sopir_selesai_rental'])) :
            $this->update_model->sopir_selesai_rental();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir Sudah Kembali!</div>');
            redirect('sopir');
        endif;
        if (isset($_POST['sopir_berangkat_paket'])) :
            $this->update_model->sopir_berangkat_paket();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir Sudah Berangkat!</div>');
            redirect('sopir');
        endif;
        if (isset($_POST['sopir_selesai_paket'])) :
            $identitas = $this->db->get_where('tbl_sopir', ['id_login' => $this->session->userdata('id_login')])->row_array();
            $id_sopir = $identitas['id_sopir'];
            $this->update_model->sopir_selesai_paket($id_sopir);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir Sudah Kembali!</div>');
            redirect('sopir');
        endif;
    }
}
        
    /* End of file  ControllerSopirBeranda.php */
