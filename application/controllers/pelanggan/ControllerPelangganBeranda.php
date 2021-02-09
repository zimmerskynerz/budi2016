<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ControllerPelangganBeranda extends CI_Controller
{

    public function index()
    {
        $data = array(
            'folder'    => 'beranda',
            'halaman'   => 'index'
        );
        $this->load->view('pelanggan/include/index', $data);
    }
}
        
    /* End of file  ControllerPelangganBeranda.php */
