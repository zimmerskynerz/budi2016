<?php defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    function simpan_sopir()
    {
        $data_login = array(
            'id_login'      => '',
            'email'         => htmlentities($this->input->post('email')),
            'password'      => password_hash('SOPIR123abc', PASSWORD_DEFAULT),
            'no_hp'         => htmlentities($this->input->post('no_hp')),
            'level'         => 'SOPIR',
            'status'        => 'AKTIF',
            'tgl_gabung'    => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data_login);
        $cek_email = $this->db->get_where('tbl_login', ['email' => $this->input->post('email')])->row_array();
        $id_login  = $cek_email['id_login'];
        $config['upload_path']   = './assets/berkas';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Foto Gagal Dikirim! Ukuran terlalu besar atau format tidak didukung!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['foto']['name'];
            $_FILES['file']['type'] = $_FILES['foto']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['foto']['size'];
            $uploadData = $this->upload->data();
            $data_sopir = array(
                'id_login'     => $id_login,
                'id_sopir'     => '',
                'nm_sopir'     => $this->input->post('nm_sopir'),
                'alamat'       => $this->input->post('alamat'),
                'foto'         => $uploadData['file_name'],
                'sim'          => '',
                'status'       => 'KOSONG'
            );
            $this->db->insert('tbl_sopir', $data_sopir);
        }
        if (!$this->upload->do_upload('sim')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Foto Gagal Dikirim! Ukuran terlalu besar atau format tidak didukung!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['sim']['name'];
            $_FILES['file']['type'] = $_FILES['sim']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['sim']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['sim']['size'];
            $uploadData1 = $this->upload->data();
            $data_sopir2 = array(
                'sim'          => $uploadData1['file_name'],
            );
            $this->db->where('id_login', $id_login);
            $this->db->update('tbl_sopir', $data_sopir2);
        }
    }
}
