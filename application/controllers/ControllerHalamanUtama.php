<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerHalamanUtama extends CI_Controller
{

    public function index()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            redirect('admin');
        elseif ($cek_data['level'] == 'PEMILIK') :
            redirect('ketua');
        elseif ($cek_data['level'] == 'SOPIR') :
            redirect('pengurus');
        elseif ($cek_data['level'] == 'PELANGGAN') :
            redirect('wali');
        else :
            $this->load->view('halaman_utama');
        endif;
    }
    public function daftar()
    {
        $cek_data = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($cek_data['level'] == 'ADMIN') :
            redirect('admin');
        elseif ($cek_data['level'] == 'PEMILIK') :
            redirect('ketua');
        elseif ($cek_data['level'] == 'SOPIR') :
            redirect('pengurus');
        elseif ($cek_data['level'] == 'PELANGGAN') :
            redirect('wali');
        else :
            $this->load->view('halaman_daftar');
        endif;
    }
    public function cek_login()
    {
        $email      = htmlspecialchars($this->input->post('email'));
        $password   = htmlspecialchars($this->input->post('password'));
        $cek_login  = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
        if ($cek_login > 0) :
            if (password_verify($password, $cek_login['password'])) :
                $data_login = array(
                    'id_login'     => $cek_login['id_login'],
                    'email'        => $cek_login['email'],
                    'no_hp'        => $cek_login['no_hp'],
                    'level'        => $cek_login['level'],
                    'status'       => $cek_login['status']
                );
                if ($cek_login['level'] == 'ADMIN') :
                    $this->session->set_userdata($data_login);
                    redirect('admin');
                elseif ($cek_login['level'] == 'PEMILIK') :
                    $this->session->set_userdata($data_login);
                    redirect('pemilik');
                elseif ($cek_login['level'] == 'SOPIR') :
                    $this->session->set_userdata($data_login);
                    redirect('sopir');
                elseif ($cek_login['level'] == 'PELANGGAN') :
                    $this->session->set_userdata($data_login);
                    redirect('pelanggan');
                else :
                    $this->session->sess_destroy();
                    $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Email atau password salah!</div>');
                    redirect('login');
                endif;
            else :
                // Password salah
                $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Password salah!</div>');
                redirect('login');
            endif;
        else :
            // Tidak Ada Email
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Email tidak terdaftar!</div>');
            redirect('login');
        endif;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
        
    /* End of file  ControllerHalamanUtama.php */
