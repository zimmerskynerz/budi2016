<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAdminRental extends CI_Controller
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
    public function sopir()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            $data_sopir        = $this->select_model->getDataSopir();
            $data = array(
                'folder'       => 'rental',
                'halaman'      => 'sopir',
                // Halaman data sopir
                'data_sopir'   => $data_sopir
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
    public function crudsopir()
    {
        if (isset($_POST['simpan_sopir'])) :
            # code...
            $email     = html_escape($this->input->post('email'));
            $no_hp     = html_escape($this->input->post('no_hp'));
            $cek_login = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
            if ($cek_login > 0) :
                $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Email Sudah Ada!</div>');
            else :
                # code...
                if ($cek_login['no_hp'] == $no_hp) :
                    # c=ode...
                    $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Nomor HP Sudah Dipakai!</div>');
                else :
                    $this->insert_model->simpan_sopir();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Sopir Berhasil Ditambahkan!</div>');
                endif;
            endif;
            redirect('admin/rental/sopir');
        endif;
        if (isset($_POST['reset_password'])) :
            # code...
            $this->update_model->reset_password_admin();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Password Berhasil Di Reset!</div>');
            redirect('admin/rental/sopir');
        endif;
        if (isset($_POST['hapus_sopir'])) :
            # code...
            $this->update_model->hapus_sopir();
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Akun Berhasil Di Hapus!</div>');
            redirect('admin/rental/sopir');
        endif;
        if (isset($_POST['ubah_sopir'])) :
            # code...
            $email     = html_escape($this->input->post('email'));
            $no_hp     = html_escape($this->input->post('no_hp'));
            $cek_login = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
            if ($cek_login > 0) :
                if ($cek_login['no_hp'] == $no_hp) :
                    $this->update_model->ubah_sopir();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Data Sopir Berhasil Di Ubah!</div>');
                else :
                    $this->update_model->ubah_sopir_hp();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Data Sopir Berhasil Di Ubah!</div>');
                endif;
            else :
                if ($cek_login['no_hp'] == $no_hp) :
                    $this->update_model->ubah_sopir_email();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Data Sopir Berhasil Di Ubah!</div>');
                else :
                    $this->update_model->ubah_sopir_full();
                    $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Data Sopir Berhasil Di Ubah!</div>');
                endif;
            endif;
            redirect('admin/rental/sopir');
        endif;
    }
    public function kendaraan()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            $data_kendaraan    = $this->select_model->getDataKendaraan();
            $data = array(
                'folder'            => 'rental',
                'halaman'           => 'kendaraan',
                // Data kendaraan
                'data_kendaraan'    => $data_kendaraan
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
    public function crudkendaraan()
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
        
    /* End of file  ControllerAdminRental.php */
