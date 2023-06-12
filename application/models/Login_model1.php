<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function get_user($username, $password)
    {
        $query = $this->db->get_where('user', array('username' => $username, 'password' => md5($password)), 1);
        var_dump($query);

        // return $query->row();
    }
}
