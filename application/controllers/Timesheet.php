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
  public function tambah()
  {
    $this->load->model('timesheet_model');
    $data = array();
    $post = $this->input->post();
    $data['id_karyawan'] = $post['id_karyawan'];
    $data['tanggal'] = $post['tanggal'];
    $data['id_unit'] = $post['id_unit'];
    $data['hm_awal'] = $post['hm_awal'];
    $data['hm_akhir'] = $post['hm_akhir'];
    $data['keterangan'] = $post['keterangan'];
  
    $this->timesheet_model->tambah($data);
    redirect('timesheet/index');
  }
  public function delete($id)
  {
    $this->load->model('timesheet_model');
    $this->timesheet_model->hapus($id);

    redirect('timesheet/index');

  }
  public function coba(){

    $this->load->model('cetak_model');
    $data = $this->cetak_model->coba()->result();
    var_dump($data);
    
  }

}


/* End of file Timesheet.php */
/* Location: ./application/controllers/Timesheet.php */