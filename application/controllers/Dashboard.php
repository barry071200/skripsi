<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller
{
    

  public function index()
  {
    $this->load->model("dashboard_model");
    $data['tm'] = $this->dashboard_model->count()->result_array();


    $data['judul'] = "Tabel Contoh";
    $data['layout'] = "dashboard";
		$this->load->view('template', $data);
    

    
    
    
  }

}

