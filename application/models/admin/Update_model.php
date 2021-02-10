<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // Kelola Sopir
    function reset_password_admin()
    {
        $data_login = array(
            'password' => password_hash('SOPIR123abc', PASSWORD_DEFAULT)
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
    }
    function hapus_sopir()
    {
        $data_login = array(
            'status' => 'HAPUS'
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
    }
    function ubah_sopir()
    {
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
    function ubah_sopir_hp()
    {
        $data_login = array(
            'no_hp'  => htmlentities($this->input->post('no_hp'))
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
    // Tidak digunakan
    function ubah_sopir_email()
    {
        $data_login = array(
            'email'  => htmlentities($this->input->post('email'))
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
    function ubah_sopir_full()
    {
        $data_login = array(
            'no_hp'  => htmlentities($this->input->post('no_hp')),
            'email'  => htmlentities($this->input->post('email'))
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_login', $data_login);
        $data_sopir = array(
            'nm_sopir'     => $this->input->post('nm_sopir'),
            'alamat'       => $this->input->post('alamat')
        );
        $this->db->where('id_login', $this->input->post('id_login'));
        $this->db->update('tbl_sopir', $data_sopir);
    }
    // Kelola Kendaraan
    function ubah_kendaraan()
    {
        $no_registrasi           = $this->input->post('no_registrasi');
        $config['upload_path']   = './assets/foto_kendaraan';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_kendaraan')) {
            $data_kendaraan = array(
                'merk'              => $this->input->post('merk'),
                'type'              => $this->input->post('type_kendaraan'),
                'jenis'             => $this->input->post('jenis'),
                'th_pembuatan'      => $this->input->post('th_pembuatan'),
                'warna'             => $this->input->post('warna'),
                'berlaku_stnk'      => $this->input->post('berlaku_stnk'),
                'jml_penumpang'     => $this->input->post('jml_penumpang')
            );
            $this->db->where('no_registrasi', $no_registrasi);
            $this->db->update('tbl_kendaraan', $data_kendaraan);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Merubah Detail Kendaraan!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['foto_kendaraan']['name'];
            $_FILES['file']['type'] = $_FILES['foto_kendaraan']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['foto_kendaraan']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['foto_kendaraan']['size'];
            $uploadData = $this->upload->data();
            $data_kendaraan = array(
                'merk'              => $this->input->post('merk'),
                'type'              => $this->input->post('type_kendaraan'),
                'jenis'             => $this->input->post('jenis'),
                'th_pembuatan'      => $this->input->post('th_pembuatan'),
                'warna'             => $this->input->post('warna'),
                'berlaku_stnk'      => $this->input->post('berlaku_stnk'),
                'jml_penumpang'     => $this->input->post('jml_penumpang'),
                'foto_kendaraan'    => $uploadData['file_name']
            );
            $this->db->where('no_registrasi', $no_registrasi);
            $this->db->update('tbl_kendaraan', $data_kendaraan);
            $foto_lama = htmlspecialchars($this->input->post('foto_lama'));
            $berkas_lama = './assets/foto_kendaraan/' . $foto_lama . '';
            unlink($berkas_lama);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Merubah Detail Kendaraan!</div>');
        }
    }
    function hapus_kendaraan()
    {
        $no_registrasi           = $this->input->post('no_registrasi');
        $data_kendaraan = array(
            'status' => 'HAPUS'
        );
        $this->db->where('no_registrasi', $no_registrasi);
        $this->db->update('tbl_kendaraan', $data_kendaraan);
        $foto_lama = htmlspecialchars($this->input->post('foto_lama'));
        $berkas_lama = './assets/foto_kendaraan/' . $foto_lama . '';
        unlink($berkas_lama);
        $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Menghapus Data Detail Kendaraan!</div>');
    }
    // Kelola Rental
    function ubah_rental_full()
    {
        $data_rental = array(
            'id_sopir'      => $this->input->post('id_sopir'),
            'no_registrasi' => $this->input->post('no_registrasi'),
            'harga'         => $this->input->post('harga')
        );
        $this->db->where('id_rental', $this->input->post('id_rental'));
        $this->db->update('tbl_rental', $data_rental);
    }
    function ubah_rental()
    {
        $data_rental = array(
            'harga'         => $this->input->post('harga')
        );
        $this->db->where('id_rental', $this->input->post('id_rental'));
        $this->db->update('tbl_rental', $data_rental);
    }
    function hapus_rental()
    {
        $data_rental = array(
            'status' => 'HAPUS'
        );
        $this->db->where('id_rental', $this->input->post('id_rental'));
        $this->db->update('tbl_rental', $data_rental);
    }
    function ubah_rental_kendaraan()
    {
        $data_rental = array(
            'no_registrasi' => $this->input->post('no_registrasi'),
            'harga'         => $this->input->post('harga')
        );
        $this->db->where('id_rental', $this->input->post('id_rental'));
        $this->db->update('tbl_rental', $data_rental);
    }
    function ubah_rental_sopir()
    {
        $data_rental = array(
            'id_sopir'      => $this->input->post('id_sopir'),
            'harga'         => $this->input->post('harga')
        );
        $this->db->where('id_rental', $this->input->post('id_rental'));
        $this->db->update('tbl_rental', $data_rental);
    }
    function ubah_paket()
    {
        $data_paket = array(
            'nm_paket'       => $this->input->post('nm_paket'),
            'destination'    => $this->input->post('destination'),
            'ket_paket'      => $this->input->post('ket_paket'),
            'hg_modal'       => $this->input->post('hg_modal'),
            'hg_standard'    => $this->input->post('hg_standard'),
            'hg_minim'       => $this->input->post('hg_minim'),
            'jml_hari'       => $this->input->post('jml_hari'),
            'jml_penumpang'       => $this->input->post('jml_penumpang')
        );
        $this->db->where('id_paket', $this->input->post('id_paket'));
        $this->db->update('tbl_paket', $data_paket);
    }
    function hapus_paket()
    {
        $data_paket = array(
            'status'  => 'HAPUS'
        );
        $this->db->where('id_paket', $this->input->post('id_paket'));
        $this->db->update('tbl_paket', $data_paket);
    }
    function terima_rental_dp()
    {
        $data_dp = array(
            'status_rental'     => 'DP_TERIMA'
        );
        $this->db->where('no_rental', $this->input->post('no_rental'));
        $this->db->update('pesanan_rental', $data_dp);
    }
    function tolak_rental_dp()
    {
        $data_dp = array(
            'status_rental'     => 'GAGAL_DP'
        );
        $this->db->where('no_rental', $this->input->post('no_rental'));
        $this->db->update('pesanan_rental', $data_dp);
    }
    function terima_rental_lunas()
    {
        $data_dp = array(
            'status_rental'     => 'KONFIRMASI'
        );
        $this->db->where('no_rental', $this->input->post('no_rental'));
        $this->db->update('pesanan_rental', $data_dp);
    }
    function tolak_rental_lunas()
    {
        $data_dp = array(
            'status_rental'     => 'GAGAL_LUNAS'
        );
        $this->db->where('no_rental', $this->input->post('no_rental'));
        $this->db->update('pesanan_rental', $data_dp);
    }
    function terima_penawaran()
    {
        $data_paket = array(
            'status_paket'  => 'KONFIRMASI_DP'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data_paket);
    }
    function tolak_penawaran()
    {
        $data_paket = array(
            'status_paket'  => 'KONFIRMASI_TOLAK'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data_paket);
    }
    function terima_paket_dp()
    {
        $data = array(
            'status_paket' => 'TERIMA_DP'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data);
    }
    function tolak_paket_dp()
    {
        $data = array(
            'status_paket' => 'TOLAK_DP'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data);
    }
    function terima_paket_lunas()
    {
        $data = array(
            'status_paket' => 'KONFIRMASI'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data);
    }
    function tolak_paket_lunas()
    {
        $data = array(
            'status_paket' => 'GAGAL_LUNAS'
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data);
    }
    function simpan_sopir($id_sopir)
    {
        $data = array(
            'id_rental' => $this->input->post('id_rental')
        );
        $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
        $this->db->update('pesanan_paket', $data);
        $data_sopir = array(
            'status' => 'BERANGKAT'
        );
        $this->db->where('id_sopir', $id_sopir);
        $this->db->update('tbl_sopir', $data_sopir);
    }
}
