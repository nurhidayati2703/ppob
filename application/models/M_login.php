<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    // public function login()
    // {
    //     return $this->db
	// 		->where('username',$this->input->post('username'))
	// 		->where('password',$this->input->post('password'))
    //         ->get('admin');
            

    //     // $query = $this->db->get_where('admin', $where)->result_array();
    //     // return $query;
        
    // }    

    public function cek_login($where)
    {
        $query = $this->db->get_where('admin', $where)->num_rows();
        return $query;
    }



}

?>