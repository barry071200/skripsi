<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlatModel extends CI_Model
{

    public function getAlat()
    {
        // Query untuk mengambil data alat dari tabel "alat"
        $query = $this->db->get('alat');
        // Mengembalikan hasil query sebagai array
        return $query->result_array();
    }
}
