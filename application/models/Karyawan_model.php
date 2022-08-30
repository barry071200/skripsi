<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Karyawan_model
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

class Karyawan_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    $this->db->select('*');
    $this->db->from('karyawan');
    return $this->db->get('');
  }

  // ------------------------------------------------------------------------

}

/* End of file Karyawan_model.php */
/* Location: ./application/models/Karyawan_model.php */