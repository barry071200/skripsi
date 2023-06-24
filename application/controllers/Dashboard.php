<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function index()
  {
    $this->load->model("dashboard_model");
    //$data['tm'] = $this->dashboard_model->count()->result_array();
    $data['karyawan'] = $this->dashboard_model->countkaryawan();
    $data['unit'] = $this->dashboard_model->countunit();
    $data['timesheet'] = $this->dashboard_model->counttimesheet();
    $data['jam'] = $this->dashboard_model->countjam()->result_array();
    $data['genderData'] = $this->dashboard_model->getGenderData();
    $query = $this->db->query("SELECT timesheet.id_karyawan, karyawan.nama_karyawan, CASE WHEN timesheet.tanggal IS NULL THEN CURDATE() ELSE DATE_FORMAT(timesheet.tanggal, '%M %Y') END AS bulan, SUM(timesheet.hm_akhir - timesheet.hm_awal) AS jam FROM timesheet JOIN karyawan ON timesheet.id_karyawan = karyawan.id_karyawan WHERE (timesheet.tanggal IS NULL OR (MONTH(timesheet.tanggal) = MONTH(CURRENT_DATE()) AND YEAR(timesheet.tanggal) = YEAR(CURRENT_DATE()))) GROUP BY timesheet.id_karyawan, karyawan.nama_karyawan, bulan ORDER BY jam DESC LIMIT 5");

    // Mengambil hasil query sebagai array
    $chartData = $query->result();

    // Memuat view dan mengirimkan data ke view
    $data['chartData'] = $chartData;
    $data['judul'] = "Dashboard";
    $data['layout'] = "dashboard";
    $this->load->view('template', $data);
  }
}
