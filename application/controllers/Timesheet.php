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

class Timesheet extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->model('Timesheet_model');
    $data['timesheet'] = $this->Timesheet_model->ambil()->result_array();
    $data['layout'] = 'timesheet/index';
    $data['judul'] = 'Data Timesheet';
    $this->load->view('template', $data);
  }

}


/* End of file Timesheet.php */
/* Location: ./application/controllers/Timesheet.php */