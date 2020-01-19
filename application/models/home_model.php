<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_images()
    {
        $query = $this->db->get('images');
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return $result;
        } else {
            return false;
        }
    }
}
