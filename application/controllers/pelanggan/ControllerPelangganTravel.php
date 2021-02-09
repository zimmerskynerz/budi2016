<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPelangganTravel extends CI_Controller
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
            $data_rental        = $this->select_model->getDataRental();
            $data = array(
                'folder'       => 'travel',
                'halaman'      => 'rental',
                'identitas'    => $identitas,
                // Halaman data sopir
                'data_rental'   => $data_rental
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
            $data_paket        = $this->db->get_where('tbl_paket', ['status' => 'ADA'])->result();
            $data = array(
                'folder'       => 'travel',
                'halaman'      => 'paket',
                'identitas'    => $identitas,
                // Halaman data sopir
                'data_paket'   => $data_paket
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
    public function crudtravel()
    {
        if (isset($_POST['sewa_rental'])) :
            $cek_rental_pesan = $this->select_model->getKodeRental();
            $max_pesanan = $cek_rental_pesan['max_kode'];
            $max_fix = substr($max_pesanan, -3);
            $no_rental = $max_fix + 1;
            $tahun = date('Y');
            $bulan = date('m');
            $tgl = date('d');
            $no_rental_hari_ini = $tahun . $bulan . $tgl . sprintf("%03s", $no_rental);
            $tgl_berangkat = $this->input->post('tgl_berangkat');
            $tgl_selesai   = $this->input->post('tgl_selesai');
            if ($tgl_berangkat > $tgl_selesai) :
                # code...
                echo 'Format Tanggal Salah';
                die;
            else :
                $cek_tgl_berangkt = $this->db->select('*')->from('pesanan_rental')->where(['id_rental' => $this->input->post('id_rental'), 'status_rental' => 'KONFIRMASI', 'tgl_selesai >=' => $tgl_berangkat, 'tgl_selesai <=' => $tgl_selesai])->get()->row_array();
                if ($cek_tgl_berangkt > 0) :
                    $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Mobil Sudah Dirental!</div>');
                else :
                    // $this->insert_model->sewa_rental($no_rental_hari_ini, $tgl_berangkat, $tgl_selesai);
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Merental Mobil! Silahkan Menuju Menu Pesanan Rental!</div>');
                endif;
            endif;
            redirect('pelanggan/travel/rental');
        endif;
        if (isset($_POST['pilih_paket'])) :
            $hg_minim       = $this->input->post('hg_minim');
            $tawar_harga    = $this->input->post('tawar_harga');
            $hg_standard    = $this->input->post('hg_standard');
            if ($hg_minim > $tawar_harga) :
            else :
                if ($hg_standard < $tawar_harga) :
                else :
                endif;
            endif;
        endif;
    }
}
        
    /* End of file  ControllerPelangganTravel.php */
