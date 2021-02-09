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
            redirect('pelanggan');
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
            redirect('pelanggan');
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
    public function cruddaftar()
    {
        $email       = $this->input->post('email');
        $no_hp       = $this->input->post('no_hp');
        $query = $this->db->select('*')->where('email', $email)->from('tbl_login')->or_where('no_hp', $no_hp)->get()->row_array();
        if ($query > 0) :
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Email dan Nomer Hp Sudah Ada!</div>');
            redirect('daftar');
        else :
            $data_login = array(
                'id_login'        => '',
                'email'           => $this->input->post('email'),
                'password'        => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_hp'           => $this->input->post('no_hp'),
                'level'           => 'PELANGGAN',
                'status'          => 'BLOKIR',
                'tgl_gabung'      => date('Y-m-d')
            );
            $this->db->insert('tbl_login', $data_login);
            $cek_login = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
            $id_login  = $cek_login['id_login'];
            $config['upload_path']   = './assets/ktp';
            $config['allowed_types'] = 'jpeg|jpg|png|gif';
            $config['encrypt_name']  = true;
            $config['overwrite']     = true;
            $config['max_size']      = 20024; // 10MB
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ktp')) {
                $data_pelanggan = array(
                    'id_pelanggan' => '',
                    'id_login'     => $id_login,
                    'nm_pelanggan' => $this->input->post('nm_pelanggan'),
                    'alamat'       => $this->input->post('alamat'),
                    'foto_ktp'     => 'default.png'
                );
                $this->db->insert('tbl_pelanggan', $data_pelanggan);
            } else {
                $_FILES['file']['name'] = $_FILES['ktp']['name'];
                $_FILES['file']['type'] = $_FILES['ktp']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['ktp']['tmp_name'];
                $_FILES['file']['size'] = $_FILES['ktp']['size'];
                $uploadData = $this->upload->data();
                $data_pelanggan = array(
                    'id_pelanggan' => '',
                    'id_login'     => $id_login,
                    'nm_pelanggan' => $this->input->post('nm_pelanggan'),
                    'alamat'       => $this->input->post('alamat'),
                    'foto_ktp'     => $uploadData['file_name']
                );
                $this->db->insert('tbl_pelanggan', $data_pelanggan);
            }
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Silahkan Login!</div>');
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
