<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdminTravel extends CI_Controller
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
            $data_sopir        = $this->select_model->getDataSopir();
            $data_kendaraan    = $this->select_model->getDataKendaraan();
            $data_rental       = $this->select_model->getDataRental();
            $data = array(
                'folder'         => 'travel',
                'halaman'        => 'rental',
                // Halaman data rental
                'data_sopir'     => $data_sopir,
                'data_kendaraan' => $data_kendaraan,
                'data_rental'    => $data_rental
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
        if (isset($_POST['simpan_rental'])) :
            # code...
            $id_sopir = $this->input->post('id_sopir');
            $no_registrasi = $this->input->post('no_registrasi');
            $cek_sopir = $this->db->get_where('tbl_rental', ['id_sopir' => $id_sopir, 'status' => 'ADA'])->row_array();
            if ($cek_sopir > 0) :
                $cek_kendaraan = $this->db->get_where('tbl_rental', ['no_registrasi' => $no_registrasi, 'status' => 'ADA'])->row_array();
                if ($cek_kendaraan > 0) :
                    $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Sopir dan Kendaraan Sudah Terdaftar!</div>');
                else :
                    $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Sopir Sudah Terdaftar!</div>');
                endif;
            else :
                $cek_kendaraan = $this->db->get_where('tbl_rental', ['no_registrasi' => $no_registrasi, 'status' => 'ADA'])->row_array();
                if ($cek_kendaraan > 0) :
                    $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Kendaraan Sudah Terdaftar!</div>');
                else :
                    $this->insert_model->simpan_rental();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir dan Kendaraan Berhasil Terdaftar!</div>');
                endif;
            endif;
            redirect('admin/travel/rental');
        endif;
        if (isset($_POST['ubah_rental'])) :
            # code...
            $id_sopir = $this->input->post('id_sopir');
            $no_registrasi = $this->input->post('no_registrasi');
            $cek_sopir = $this->db->get_where('tbl_rental', ['id_sopir' => $id_sopir, 'status' => 'ADA'])->row_array();
            if ($cek_sopir > 0) :
                $cek_kendaraan = $this->db->get_where('tbl_rental', ['no_registrasi' => $no_registrasi, 'status' => 'ADA'])->row_array();
                if ($cek_kendaraan > 0) :
                    $this->update_model->ubah_rental();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Harga Berhasil Diubah!</div>');
                else :
                    $this->update_model->ubah_rental_kendaraan();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Kendaraan Berhasil Diubah!</div>');
                endif;
            else :
                $cek_kendaraan = $this->db->get_where('tbl_rental', ['no_registrasi' => $no_registrasi, 'status' => 'ADA'])->row_array();
                if ($cek_kendaraan > 0) :
                    $this->update_model->ubah_rental_sopir();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir Berhasil Diubah!</div>');
                else :
                    $this->update_model->ubah_rental_full();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir dan Kendaraan Berhasil Diubah!</div>');
                endif;
            endif;
            redirect('admin/travel/rental');
        endif;
        if (isset($_POST['hapus_rental'])) :
            $this->update_model->hapus_rental();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Rental Berhasil Dihapus!</div>');
            redirect('admin/travel/rental');
        endif;
    }
    public function paket()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            $data_paket        = $this->db->get_where('tbl_paket', ['status' => 'ADA'])->result();
            $data = array(
                'folder'         => 'travel',
                'halaman'        => 'paket',
                // Halaman data rental
                'data_paket'     => $data_paket
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
        if (isset($_POST['simpan_paket'])) :
            $this->insert_model->simpan_paket();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Menambah Paket WIsata!</div>');
            redirect('admin/travel/paket');
        endif;
        if (isset($_POST['ubah_paket'])) :
            $this->update_model->ubah_paket();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Merubah Paket WIsata!</div>');
            redirect('admin/travel/paket');
        endif;
        if (isset($_POST['hapus_paket'])) :
            # code...
            $this->update_model->hapus_paket();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Menghapus Paket WIsata!</div>');
            redirect('admin/travel/paket');
        endif;
    }
}
        
    /* End of file  ControllerAdminTravel.php */
