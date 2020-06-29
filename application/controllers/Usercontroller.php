<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usercontroller extends CI_Controller {

    public function __construct() {
        
          parent::__construct(); 

          $this->load->model('User_model','Permission_user');   
          $this->load->helper('url','form');  
          $this->load->library(array('form_validation'));
          $this->load->library('session');
       }
       public function index()
       {

            $user=new user_model;
            $permissions= new Permission_user;

             $data = array(
            'data' => $user->get_user(),
            'permission' => $permissions->get_permission_user() );

            $this->load->view('includes/header');       
            $this->load->view('user/view',$data);
            $this->load->view('includes/footer');
          
       }
       public function create()
       {

        $permissions=new Permission_model;
        $permission['permission']=$permissions->get_permission();  

          $this->load->view('includes/header');
          $this->load->view('user/create',$permission);
          $this->load->view('includes/footer');      
       }
      
       public function store()
       {

        $user=new user_model;
        $is_user_exists = $user->user_exists() ;

        if($is_user_exists){
          $this->form_validation->set_rules('user_name', 'Username', 'required|callback_exists_in_database'); 
        }
        else{
          $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
        }
            $this->form_validation->set_error_delimiters('<span style="font-size: 10px;color:red">', '</span>');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('dob', 'DOB', 'trim|required|date');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Confrim password', 'trim|required|min_length[5]');
           
         
          if ($this->form_validation->run() ) 
            {
              $user=new user_model;

                    if($user->insert_user() == true ){  //inserted user data currectly
                      redirect(base_url('user'));
                    }
                    else{
                      $permissions=new Permission_model;
                      $permission['permission']=$permissions->get_permission();  
                
                      $this->load->view('includes/header');
                      $this->load->view('user/create',$permission);  
                      $this->load->view('includes/footer'); 
                    }
            
            }

          else       
            {
              $permissions=new Permission_model;
              $permission['permission']=$permissions->get_permission();  
        
              $this->load->view('includes/header');
              $this->load->view('user/create',$permission);  
              $this->load->view('includes/footer'); 
         
            } 
        }

        public function exists_in_database($username)
        {
                //checking username already exists
                $this->db->where('user_name', $this->input->post('user_name'));  
                $query = $this->db->get('user_table')->result(); 
                    if ($query)      //exists
                    {
                        return true;
                    } 
                    else{
                      $this->form_validation->set_message('exists_in_database', 'Please enter an existing username');
                      return FALSE;
                    }
        }

      
      public function edit($id)
      {

        $permissions = new Permission_model;
       
           $data = array(
            'user' => $this->db->get_where('user_table', array('user_id' => $id))->row(),
            'permission' => $permissions->get_permission() );
           $this->load->view('includes/header');
           $this->load->view('user/edit',$data);
           $this->load->view('includes/footer');   
        }
     
      public function update($id)
      {     
          $this->form_validation->set_rules('name', 'Name', 'trim|required');
          $this->form_validation->set_rules('dob', 'DOB', 'trim|required|date');
          $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
          $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]');
	        $this->form_validation->set_rules('confirm_password', 'Confrim password', 'trim|required|min_length[5]');

           if ($this->form_validation->run())   
           {  
                  $user=new user_model;
                  $user->update_user($id);
                  redirect(base_url('user'));  
           }   
           else {  
                $permissions = new Permission_model;
                $data = array(
                'user' => $this->db->get_where('user_table', array('user_id' => $id))->row(),
                'permission' => $permissions->get_permission() );
            
                $this->load->view('includes/header');
                $this->load->view('user/edit',$data);
                $this->load->view('includes/footer');
            } 
        
      }
     
      public function delete($id)
      {
          $this->db->where('user_id', $id);
          $this->db->delete('user_table');// delete user data

          $this->db->where('user_id', $id);
          $this->db->delete('permission_user'); // delete student from batch table
          
         redirect(base_url('user'));
      }
   

}
