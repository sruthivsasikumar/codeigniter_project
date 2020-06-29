<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Batchcontroller extends CI_Controller {

    public function __construct() {
       
          parent::__construct(); 
          $this->load->model('Batch_model');   
          $this->load->helper('url');      
       }
       public function index()
       {
           $batch=new batch_model;
           $data['data']=$batch->get_batch();
           $this->load->view('includes/header');       
           $this->load->view('batch/view',$data);
           $this->load->view('includes/footer');
       }
       public function create()
       {

          $this->load->view('includes/header');
          $this->load->view('batch/create');
          $this->load->view('includes/footer');      
       }
      
       public function store()
       {
            $this->form_validation->set_rules('batch_name', 'Batch Name', 'trim|required');

            if ($this->form_validation->run())   
            {  
                $batch=new batch_model;
                $batch->insert_batch();
                redirect(base_url('batch'));
            }   
            else
             {  
                $this->load->view('batch/create');  
            }  

        }
      
       public function edit($id)
       {
           $batch = $this->db->get_where('batch_table', array('batch_id' => $id))->row();
           $this->load->view('includes/header');
           $this->load->view('batch/edit',array('batch'=>$batch));
           $this->load->view('includes/footer');  
            
       }
      
       public function update($id)
       {
            $this->form_validation->set_rules('batch_name', 'Batch Name', 'trim|required');

            if ($this->form_validation->run())   
           {  
            $batch=new batch_model;
            $batch->update_batch($id);
            redirect(base_url('batch'));
           }   
           else
            {  
                $batch = $this->db->get_where('batch_table', array('batch_id' => $id))->row();
                $this->load->view('includes/header');
                $this->load->view('batch/edit',array('batch'=>$batch));
                $this->load->view('includes/footer'); 
            } 

       }
     
       public function delete($id)
       {
       
           $this->db->where('batch_id', $id);
           $this->db->delete('batch_table');

           $this->db->where('batch_id', $id);
           $this->db->delete('batch_student'); // delete student from batch 

          redirect(base_url('batch'));
       }
    

}
