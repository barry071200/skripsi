<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Timesheet
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

class Supervisor extends CI_Controller
{
    
  public function __construct()
  {

    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login/index');
    }
  }

  public function index()
  {
    
    $this->load->model('Supervisor_model');
    $data['timesheet'] = $this->Supervisor_model->ambil()->result_array();
    $data['layout'] = 'supervisor/index';
    $data['judul'] = 'Data Timesheet';
    $this->load->view('template', $data);
  }
  public function cek($id, $valid)
    {

        $this->load->model('Supervisor_model');
        $this->Supervisor_model->valid($id,$valid);
        redirect('supervisor/index');

    }
}


/* End of file Timesheet.php */
/* Location: ./application/controllers/Timesheet.php */