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
    function simpan_kendaraan($no_registrasi)
    {
        $config['upload_path']   = './assets/foto_kendaraan';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_kendaraan')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Foto Gagal Dikirim! Ukuran terlalu besar atau format tidak didukung!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['foto_kendaraan']['name'];
            $_FILES['file']['type'] = $_FILES['foto_kendaraan']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['foto_kendaraan']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['foto_kendaraan']['size'];
            $uploadData = $this->upload->data();
            $data_sopir = array(
                'no_registrasi'     => $no_registrasi,
                'merk'              => $this->input->post('merk'),
                'type'              => $this->input->post('type_kendaraan'),
                'jenis'             => $this->input->post('jenis'),
                'th_pembuatan'      => $this->input->post('th_pembuatan'),
                'warna'             => $this->input->post('warna'),
                'berlaku_stnk'      => $this->input->post('berlaku_stnk'),
                'jml_penumpang'     => $this->input->post('jml_penumpang'),
                'status'            => 'ADA',
                'foto_kendaraan'    => $uploadData['file_name']
            );
            $this->db->insert('tbl_kendaraan', $data_sopir);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Menambah Kendaraan!</div>');
        }
    }
    function simpan_rental()
    {
        $data_rental = array(
            'id_rental'     => '',
            'id_sopir'      => $this->input->post('id_sopir'),
            'no_registrasi' => $this->input->post('no_registrasi'),
            'harga'         => $this->input->post('harga'),
            'status'        => 'ADA'
        );
        $this->db->insert('tbl_rental', $data_rental);
    }
    function simpan_paket()
    {
        $data_paket = array(
            'id_paket'       => '',
            'id_rental'      => $this->input->post('id_rental'),
            'nm_paket'       => $this->input->post('nm_paket'),
            'destination'    => $this->input->post('destination'),
            'ket_paket'      => $this->input->post('ket_paket'),
            'hg_modal'       => $this->input->post('hg_modal'),
            'hg_standard'    => $this->input->post('hg_standard'),
            'hg_minim'       => $this->input->post('hg_minim'),
            'status'         => 'ADA'
        );
        $this->db->insert('tbl_paket', $data_paket);
    }
}
