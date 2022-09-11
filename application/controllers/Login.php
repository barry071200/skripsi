<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
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

class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('login');

    
  }
  public function cek(){
    $this->load->model('login_model');
    $post = $this->input->post();
    $username = $post['username'];
    $pw = $post['password'];
    $status = $this->login_model->cek($username, $pw)->result();
    if($status==true)
    {
      redirect('timesheet/index');
    } 
    else
    {
    
      redirect('login/index');
      echo 'salah';
    }
    
  }

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */