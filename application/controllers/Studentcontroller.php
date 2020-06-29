<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Studentcontroller extends CI_Controller {

    public function __construct() {
       
          parent::__construct(); 
          $this->load->model('Student_model','Batch_student');   
          $this->load->helper('url');      
       }
       public function index()
       {
        $batch_student=new Batch_student;
        $student=new student_model;

        $data = array(
            'data' => $student->get_student(),
            'batch' => $batch_student->get_student_batch()  );
   
        $this->load->view('includes/header');       
        $this->load->view('student/view',$data);
        $this->load->view('includes/footer');

       }
       public function create()
       {
            $batchmodel=new batch_model;
            $batch['batch']=$batchmodel->get_batch();  

          $this->load->view('includes/header');
          $this->load->view('student/create',$batch);
          $this->load->view('includes/footer');      
       }
      
       public function store()
       {
        $this->form_validation->set_rules('student_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('dob', 'DOB', 'trim|required|date');
        $this->form_validation->set_rules('class', 'class', 'trim|required');

        if ($this->form_validation->run())   
            {  
                $student=new student_model;
                $student->insert_student();
            redirect(base_url('student'));
            }   
            else
             {  
                $this->load->view('student/create');  
            }  
           
        }
      
       public function edit($id)
       {
        $batchmodel=new batch_model;
       
           $data = array(
            'student' => $this->db->get_where('student_table', array('student_id' => $id))->row(),
            'batch' => $batchmodel->get_batch());
           $this->load->view('includes/header');
           $this->load->view('student/edit',$data);
           $this->load->view('includes/footer');   
       }
       
       public function update($id)
       {
            $this->form_validation->set_rules('student_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('dob', 'DOB', 'trim|required|date');
            $this->form_validation->set_rules('class', 'class', 'trim|required');

           if ($this->form_validation->run())   
           {  
                $student=new student_model;
                $student->update_student($id);
                redirect(base_url('student')); 
           }   
           else {  

            $batchmodel=new batch_model;
       
            $data = array(
             'student' => $this->db->get_where('student_table', array('student_id' => $id))->row(),
             'batch' => $batchmodel->get_batch());
            $this->load->view('includes/header');
            $this->load->view('student/edit',$data);
            $this->load->view('includes/footer');

            } 

       }
      
       public function delete($id)
       {
           $this->db->where('student_id', $id); 
           $this->db->delete('student_table');// delete student table

           $this->db->where('student_id', $id);
           $this->db->delete('batch_student'); // delete student from batch table

          redirect(base_url('student'));
       }
    

}
