<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Karyawan
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Karyawan extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->model('karyawan_model');
    $data['karyawan'] = $this->karyawan_model->ambil()->result_array();
    $data['judul'] = "Tabel Karyawan";
    $data['layout'] = "karyawan/index";
		$this->load->view('template', $data);
  }

  public function tambah()
  {
    $data['judul'] = "Tambah Karyawan";
    $data['layout'] = "karyawan/tambah";
		$this->load->view('template', $data);
  }

}


/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */