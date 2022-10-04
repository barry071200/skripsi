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
  public function cek()
  {
    $this->load->model('login_model');
    $post = $this->input->post();
    $username = $post['username'];
    $pw = $post['password'];
    $status = $this->login_model->cek($username, $pw);

    if ($status == true) {
      $data = $status->row_array();
      $name = $data['username'];
      $pass = $data['passsword'];
      $role = $data['role'];
      $setdata = array(
        'username' => $name,
        'password' => $pass,
        'role' => $role,
        'logged_in' => TRUE

      );
      $this->session->set_userdata($setdata);
      if ($status == true && $data['role'] == '1') {
        redirect('dashboard/index');
      } else {
        if ($status == true && $data['role'] == '2') {

          redirect('dashboard/index');
        } else
        if ($status == true && $data['role'] == '3') {
          redirect('dashboard/index');
        }
        else
        if ($status == true && $data['role'] == '4') {
          redirect('dashboard/index');
        }
        redirect('login/index');
      }
    } else {

      redirect('login/index');
    }
  }
  public function logout()
  {
    session_destroy();
    redirect('login/index');
  }
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */