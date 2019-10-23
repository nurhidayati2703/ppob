<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
		$this->load->model('M_login');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Login' ;
            $this->load->view('v_login', $data);

        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = array('username' => $username ,'password' => $password );

            $cek = $this->M_login->cek_login($where) ;

                if ($cek > 0 )
                {
                    $data_session = array(
                        'status' => 'logged in'

                    );
                    $this->session->set_userdata($data_session);

                    redirect('Home/index');
                } else
                {

                    $this->session->set_flashdata('pesan','Username atau password salah');
                    //flashdata hanya sekali pakai

                    redirect('Login/index');
                }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
		redirect('Login');
    }

    

}
?>

