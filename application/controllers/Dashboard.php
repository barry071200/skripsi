<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller
{
    

  public function index()
  {
    $this->load->model("Karyawan_model");
    $data['karyawan'] = $this->Karyawan_model->index()->result_array();

    $data['judul'] = "Tabel Contoh";
    $data['layout'] = "conten";
		$this->load->view('template', $data);
    

    
    
    
  }

}

