<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPemilikLaporan extends CI_Controller
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
        if ($cek_data['level'] == 'PEMILIK') :
            if (isset($_POST['lihat_laporan'])) :
                $tgl_awal   = $this->input->post('tgl_awal');
                $tgl_akhir  = $this->input->post('tgl_akhir');
                $data_pesanan_rental        = $this->select_model->getDataPesananRentalNew($tgl_awal, $tgl_akhir);
                $data = array(
                    'folder'          => 'laporan',
                    'halaman'         => 'rental',
                    // Halaman data sopir
                    'data_pesanan_rental'   => $data_pesanan_rental
                );
                $this->load->view('pemilik/include/index', $data);
            elseif (isset($_POST['cetak_laporan'])) :
                $tgl_awal   = $this->input->post('tgl_awal');
                $tgl_akhir  = $this->input->post('tgl_akhir');
                $data_pesanan_rental        = $this->select_model->getDataPesananRentalNew($tgl_awal, $tgl_akhir);
                $data = array(
                    'data_pesanan_rental'   => $data_pesanan_rental
                );
                $this->load->view('pemilik/laporan/cetak_rental', $data);
            else :
                $data_pesanan_rental        = $this->select_model->getDataPesananRentalJadwal();
                $data = array(
                    'folder'          => 'laporan',
                    'halaman'         => 'rental',
                    // Halaman data sopir
                    'data_pesanan_rental'   => $data_pesanan_rental
                );
                $this->load->view('pemilik/include/index', $data);
            endif;
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
    public function paket()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'PEMILIK') :
            if (isset($_POST['lihat_laporan'])) :
                # code...
                $tgl_awal   = $this->input->post('tgl_awal');
                $tgl_akhir  = $this->input->post('tgl_akhir');
                $pesanan_paket              = $this->select_model->getDataPesananPaketNew($tgl_awal, $tgl_akhir);
                $data = array(
                    'folder'          => 'laporan',
                    'halaman'         => 'paket',
                    // Halaman data sopir
                    'pesanan_paket'    => $pesanan_paket
                );
                $this->load->view('pemilik/include/index', $data);
            elseif (isset($_POST['cetak_laporan'])) :
                # code...
                $tgl_awal   = $this->input->post('tgl_awal');
                $tgl_akhir  = $this->input->post('tgl_akhir');
                $pesanan_paket              = $this->select_model->getDataPesananPaketNew($tgl_awal, $tgl_akhir);
                $data = array(
                    'pesanan_paket'    => $pesanan_paket
                );
                $this->load->view('pemilik/laporan/cetak_paket', $data);
            else :
                $pesanan_paket              = $this->select_model->getDataPesananPaket();
                $data = array(
                    'folder'          => 'laporan',
                    'halaman'         => 'paket',
                    // Halaman data sopir
                    'pesanan_paket'    => $pesanan_paket
                );
                $this->load->view('pemilik/include/index', $data);
            endif;
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
        
    /* End of file  ControllerPemilikLaporan.php */
