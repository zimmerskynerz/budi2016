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
    public function paket()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        $identitas = $this->db->get_where('tbl_pelanggan', ['id_login' => $this->session->userdata('id_login')])->row_array();
        if ($cek_data['level'] == 'PELANGGAN') :
            $id_pelanggan               = $identitas['id_pelanggan'];
            $data_pesanan_paket         = $this->select_model->getDataPesananPaket($id_pelanggan);
            $data = array(
                'folder'       => 'pesanan',
                'halaman'      => 'paket',
                'identitas'    => $identitas,
                // Halaman data sopir
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
    public function crudpesanan()
    {
        // Kelola Rental
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
        // Kelola Paket
        if (isset($_POST['batal_proses'])) :
            # code...
            $this->update_model->batal_proses();
            redirect('pelanggan/pesanan/paket');
        endif;
        if (isset($_POST['kirim_ulang_proses'])) :
            # code...
            $harga_paket = $this->input->post('harga_paket');
            $penawaran_baru = $this->input->post('penawaran_baru');
            $hg_standard = $this->input->post('hg_standard');
            if ($harga_paket > $penawaran_baru) :
                # code...
                $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Penawaran Baru Lebih Kecil Dari Penawaran Lama!</div>');
            elseif ($hg_standard < $penawaran_baru) :
                $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Penawaran Baru Lebih Besar Dari Harga Normal!</div>');
            else :
                $this->update_model->kirim_ulang_proses();
            endif;
            redirect('pelanggan/pesanan/paket');
        endif;
        if (isset($_POST['kirim_bukti_paket_dp'])) :
            # code...
            $this->update_model->kirim_bukti_paket_dp();
            redirect('pelanggan/pesanan/paket');
        endif;
        if (isset($_POST['kirim_bukti_paket_dp_ulang'])) :
            # code...
            $this->update_model->kirim_bukti_paket_dp_ulang();
            redirect('pelanggan/pesanan/paket');
        endif;
        if (isset($_POST['kirim_bukti_paket_lunas'])) :
            # code...
            $this->update_model->kirim_bukti_paket_lunas();
            redirect('pelanggan/pesanan/paket');
        endif;
        if (isset($_POST['kirim_bukti_paket_lunas_ulang'])) :
            # code...
            $this->update_model->kirim_bukti_paket_lunas_ulang();
            redirect('pelanggan/pesanan/paket');
        endif;
    }
}
        
    /* End of file  ControllerPelangganPesanan.php */
