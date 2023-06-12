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
    if ($this->session->userdata('logged_in') !== TRUE) {
      redirect('login/index');
    }
  }


  public function index()
  {
    if ($this->session->userdata('role') == '1' or $this->session->userdata('role') == '5') {
      $this->load->model('Timesheet_model');
      $data['timesheet'] = $this->Timesheet_model->ambil()->result_array();
      $data['unit'] = $this->Timesheet_model->unit()->result();
      $data['karyawan'] = $this->Timesheet_model->karyawan()->result();
      $data['layout'] = 'timesheet/index';
      $data['judul'] = 'Data Timesheet';
      $this->load->view('template', $data);
    } else {
      redirect('login/index');
    }
  }

  public function tambah()
  {
    if ($this->session->userdata('role') == '1' or $this->session->userdata('role') == '5') {
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
      $this->session->set_flashdata('success_message', 'Data berhasil disimpan.');
      redirect('timesheet/index');
    } else {
      redirect('login/index');
    }
  }
  public function delete($id)
  {
    if ($this->session->userdata('role') == '1' or $this->session->userdata('role') == '5') {
      $this->load->model('timesheet_model');
      $this->timesheet_model->hapus($id);

      redirect('timesheet/index');
    } else {
      redirect('login/index');
    }
  }
  public function coba()
  {

    $this->load->model('cetak_model');
    $data = $this->cetak_model->coba()->result();
    var_dump($data);
  }
}


/* End of file Timesheet.php */
/* Location: ./application/controllers/Timesheet.php */