<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdminJadwal extends CI_Controller
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
    public function list_jadwal()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            $data_pesanan_rental        = $this->select_model->getDataPesananRentalJadwal();
            $pesanan_paket              = $this->select_model->getDataPesananPaket();
            $data_rental                = $this->select_model->getDataRental();
            $data = array(
                'folder'          => 'jadwal',
                'halaman'         => 'jadwal_list',
                // Halaman data sopir
                'data_pesanan_rental'   => $data_pesanan_rental,
                'pesanan_paket'    => $pesanan_paket,
                'data_rental'      => $data_rental
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
    public function crudjadwal()
    {
        if (isset($_POST['simpan_sopir'])) :
            $id_rental  = $this->input->post('id_rental');
            $cek_rental = $this->select_model->getDataRentalKosong($id_rental);
            $id_sopir   = $cek_rental['id_sopir'];
            if ($cek_rental > 0) :
                $this->update_model->simpan_sopir($id_sopir);
                $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Memilih Sopir dan Kendaraan!</div>');
            else :
                $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Jumlah Penumpang Kendaraan Kurang Dari Yang Dipesan!</div>');
            endif;
            redirect('admin/jadwal/list_jadwal');
        endif;
    }
}
        
    /* End of file  ControllerAdminJadwal.php */
