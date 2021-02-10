<?php defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    // KElola bukti pembayaran DP
    function kirim_bukti_dp_rental()
    {
        $config['upload_path']   = './assets/bukti_tranfer';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_dp')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Gagal Mengirim Bukti Tranfer!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['bukti_dp']['name'];
            $_FILES['file']['type'] = $_FILES['bukti_dp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bukti_dp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bukti_dp']['size'];
            $uploadData = $this->upload->data();
            $data_dp = array(
                'tgl_dp'            => date('Y-m-d'),
                'bukti_dp'          => $uploadData['file_name'],
                'status_rental'     => 'DP'
            );
            $this->db->where('no_rental', $this->input->post('no_rental'));
            $this->db->update('pesanan_rental', $data_dp);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Mengirim Bukti DP!</div>');
        };
    }
    function kirim_bukti_dp_rental_ulang()
    {
        $config['upload_path']   = './assets/bukti_tranfer';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_dp')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Gagal Mengirim Bukti Tranfer!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['bukti_dp']['name'];
            $_FILES['file']['type'] = $_FILES['bukti_dp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bukti_dp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bukti_dp']['size'];
            $uploadData = $this->upload->data();
            $data_dp = array(
                'tgl_dp'            => date('Y-m-d'),
                'bukti_dp'          => $uploadData['file_name'],
                'status_rental'     => 'DP'
            );
            $this->db->where('no_rental', $this->input->post('no_rental'));
            $this->db->update('pesanan_rental', $data_dp);
            $foto_lama = htmlspecialchars($this->input->post('bukti_dp_lama'));
            $berkas_lama = './assets/bukti_tranfer/' . $foto_lama . '';
            unlink($berkas_lama);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Mengirim Bukti DP!</div>');
        };
    }
    // Kelola Bukti Pembayaran Lunas
    function kirim_bukti_rental_lunas()
    {
        $config['upload_path']   = './assets/bukti_tranfer';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_dp')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Gagal Mengirim Bukti Tranfer!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['bukti_dp']['name'];
            $_FILES['file']['type'] = $_FILES['bukti_dp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bukti_dp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bukti_dp']['size'];
            $uploadData = $this->upload->data();
            $data_dp = array(
                'tgl_lunas'         => date('Y-m-d'),
                'bukti_lunas'       => $uploadData['file_name'],
                'status_rental'     => 'LUNAS'
            );
            $this->db->where('no_rental', $this->input->post('no_rental'));
            $this->db->update('pesanan_rental', $data_dp);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Mengirim Bukti Lunas!</div>');
        };
    }
    function kirim_bukti_rental_lunas_ulang()
    {
        $config['upload_path']   = './assets/bukti_tranfer';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_dp')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Gagal Mengirim Bukti Tranfer!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['bukti_dp']['name'];
            $_FILES['file']['type'] = $_FILES['bukti_dp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bukti_dp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bukti_dp']['size'];
            $uploadData = $this->upload->data();
            $data_dp = array(
                'tgl_lunas'         => date('Y-m-d'),
                'bukti_lunas'       => $uploadData['file_name'],
                'status_rental'     => 'LUNAS'
            );
            $this->db->where('no_rental', $this->input->post('no_rental'));
            $this->db->update('pesanan_rental', $data_dp);
            $foto_lama = htmlspecialchars($this->input->post('bukti_lunas_lama'));
            $berkas_lama = './assets/bukti_tranfer/' . $foto_lama . '';
            unlink($berkas_lama);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Mengirim Bukti Lunas!</div>');
        };
    }
    // Kelola Bukti DP Paket
    function kirim_bukti_paket_dp()
    {
        $config['upload_path']   = './assets/bukti_tranfer';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 20024; // 10MB
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_dp')) {
            $this->session->set_flashdata('pesan_gagal', '<div class="alert alert-danger" id="pesan_gagal" role="alert">Gagal Mengirim Bukti Tranfer!</div>');
        } else {
            $_FILES['file']['name'] = $_FILES['bukti_dp']['name'];
            $_FILES['file']['type'] = $_FILES['bukti_dp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bukti_dp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bukti_dp']['size'];
            $uploadData = $this->upload->data();
            $data_dp = array(
                'tgl_dp'            => date('Y-m-d'),
                'bukti_dp'          => $uploadData['file_name'],
                'status_paket'      => 'DP'
            );
            $this->db->where('no_pesanan', $this->input->post('no_pesanan'));
            $this->db->update('pesanan_paket', $data_dp);
            $this->session->set_flashdata('pesan_berhasil', '<div class="alert alert-success" id="pesan_berhasil" role="alert">Berhasil Mengirim Bukti DP!</div>');
        }
    }
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
    function ubah_paket_full()
    {
        $data_paket = array(
            'id_rental'      => $this->input->post('id_rental'),
            'nm_paket'       => $this->input->post('nm_paket'),
            'destination'    => $this->input->post('destination'),
            'ket_paket'      => $this->input->post('ket_paket'),
            'hg_modal'       => $this->input->post('hg_modal'),
            'hg_standard'    => $this->input->post('hg_standard'),
            'hg_minim'       => $this->input->post('hg_minim')
        );
        $this->db->where('id_paket', $this->input->post('id_paket'));
        $this->db->update('tbl_paket', $data_paket);
    }
    function ubah_paket()
    {
        $data_paket = array(
            'nm_paket'       => $this->input->post('nm_paket'),
            'destination'    => $this->input->post('destination'),
            'ket_paket'      => $this->input->post('ket_paket'),
            'hg_modal'       => $this->input->post('hg_modal'),
            'hg_standard'    => $this->input->post('hg_standard'),
            'hg_minim'       => $this->input->post('hg_minim')
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
}
