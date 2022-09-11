<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Timesheet_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Timesheet_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function ambil()
  {
    $this->db->select('*');
    $this->db->from('timesheet, unit');
    $this->db->join('karyawan', 'timesheet.id_karyawan = karyawan.id_karyawan AND unit.id_unit = timesheet.id_unit');
    $this->db->order_by('tanggal', 'asc');
    return $this->db->get('');
  }
  public function sum($id)
  {
    $this->db->from('timesheet, unit');
    $this->db->select('sum(unit.harga*(timesheet.hm_akhir-timesheet.hm_awal))', FALSE);
    $this->db->where('unit.id_unit=', $id);
    $this->db->where('timesheet.id_unit=', $id);
    $query = $this->db->get('');
    return ($query);
  }
  public function tambah($data)
  {
    $this->db->insert('timesheet', $data);
  }
  public function hapus($id)
  {

    $this->db->where('id_timesheet', $id);
    $this->db->delete('timesheet');
  }






  // ------------------------------------------------------------------------

}

/* End of file Timesheet_model.php */
/* Location: ./application/models/Timesheet_model.php */