<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissioncontroller extends CI_Controller {

    public function __construct() {
       
          parent::__construct(); 
          $this->load->model('Permission_model');   
          $this->load->helper('url');      
       }
       public function index()
       {
           $permission=new permission_model;
           $data['data']=$permission->get_permission();
           $this->load->view('includes/header');       
           $this->load->view('permission/view',$data);
           $this->load->view('includes/footer');
       }
       public function create()
       {

          $this->load->view('includes/header');
          $this->load->view('permission/create');
          $this->load->view('includes/footer');      
       }
      
       public function store()
       {
            $this->form_validation->set_rules('permissions', 'Permission', 'trim|required');

            if ($this->form_validation->run())   
            {  
                $permission=new permission_model;
                $permission->insert_permission();
                redirect(base_url('permission'));
            }   
            else
             {  
                $this->load->view('permission/create');  
            } 
            
        }
      
       public function edit($id)
       {

           $permission = $this->db->get_where('permission_table', array('permission_id' => $id))->row();
           $this->load->view('includes/header');
           $this->load->view('permission/edit',array('permission'=>$permission));
           $this->load->view('includes/footer');   
       }
      
       public function update($id)
       {
            $this->form_validation->set_rules('permissions', 'Permission', 'trim|required');
            
            if ($this->form_validation->run())   
            {  
                $permission=new permission_model;
                $permission->update_permission($id);
                redirect(base_url('permission'));
            }   
            else
             {  
                $permission = $this->db->get_where('permission_table', array('permission_id' => $id))->row();
                $this->load->view('includes/header');
                $this->load->view('permission/edit',array('permission'=>$permission));
                $this->load->view('includes/footer'); 
             } 
 
       }
      
       public function delete($id)
       {
           $this->db->where('permission_id', $id);
           $this->db->delete('permission_table');
           
          redirect(base_url('permission'));
       }
    

}
