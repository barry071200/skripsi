<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('Alat_model');
    }

    public function index()
    {
        // Panggil fungsi pada model untuk mendapatkan data alat
        $data['alat'] = $this->AlatModel->getAlat();

        // Tampilkan view dengan data alat
        $this->load->view('alat/index', $data);
    }
}
