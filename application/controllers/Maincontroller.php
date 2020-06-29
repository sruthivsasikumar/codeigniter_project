<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Maincontroller extends CI_Controller {  

    public function index()  
    {  
        $this->load->model('Login_model','Permission_user');   
        $this->load->helper('url');      
        $this->login();  
        
    }  
  
    public function login()  
    {  
        $this->load->view('login_view');  
    }  
  
    public function signin()  
    {  
        $this->load->view('signin');  
    }  
  
    public function data()  
    {  
        if ($this->session->userdata('currently_logged_in'))   
        {  
                $permissions= new Permission_user;
                    foreach ($permissions->get_permission_user() as $value) 
                    {

                      if($this->session->user_id == $value->user_id){
                        //add all user permissionIDs  and values in to an array

                            $permissionArray[$value->permission_id] = $value->permissions ;
                        }

                    }
            
                    $this->session->user_permission = $permissionArray;  //set userpermission array to session value


                    $this->load->view('includes/header');       
                    $this->load->view('data');
                    $this->load->view('includes/footer');

        } else {  

            redirect(base_url('invalid'));
        }  
    }  
  
    public function invalid()  
    {  
        $this->load->view('invalid');  
    }  
  
    public function login_action()  
    {  
        $this->load->helper('security');  
        $this->load->library('form_validation');  
  
        $this->form_validation->set_rules('user_name', 'Username:', 'required|trim|xss_clean|callback_validation');  
        $this->form_validation->set_rules('password', 'Password:', 'required|trim');  
  
        if ($this->form_validation->run())   
        {  
            $data = array(  
                'username' => $this->input->post('username'),  
                'currently_logged_in' => 1  
                );    
                    $this->session->set_userdata($data);   
                redirect(base_url('home'));
        }   
        else {  
            $this->load->view('login_view');  
        }  
    }  
  
    public function validation()  
    {  
        $this->load->model('Login_model');  
  
        if ($this->Login_model->log_in_correctly())  
        {  
  
            return true;  
        } else {  
            $this->form_validation->set_message('validation', 'Incorrect username/password.');  
            return false;  
        }  
    }  
  
    public function logout()  
    {  
       
        $this->session->sess_destroy();  
        redirect(base_url('login'));
    }  
  
}  
?>  