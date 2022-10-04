<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Dashboard extends CI_Controller
{


  public function index()
  {
    $this->load->model("dashboard_model");
    $data['tm'] = $this->dashboard_model->count()->result_array();
    $data['karyawan'] = $this->dashboard_model->countkaryawan();
    $data['unit'] = $this->dashboard_model->countunit();
    $data['timesheet'] = $this->dashboard_model->counttimesheet();
    $data['jam'] = $this->dashboard_model->countjam()->result_array();
    //var_dump($data);
   // die;


    $data['judul'] = "Dashboard";
    $data['layout'] = "dashboard";
    $this->load->view('template', $data);
  }
}
