<?php
class Student_model extends CI_Model{
    
    public function get_student(){
        if(!empty($this->input->get("search"))){
          $this->db->like('student_name', $this->input->get("search"));
        }
        $this->db->order_by("student_id", "desc");
        $query = $this->db->get("student_table");
        return $query->result();
    }


    public function insert_student()
    {    
        $dob = $this->input->post('dob') ;
        $age = (date('Y') - date('Y',strtotime($dob))); //find age from dob

        $data = array(
            'student_name' => $this->input->post('student_name'),
            'dob' => $this->input->post('dob'),
            'class'=> $this->input->post('class'),
             'age' => $age,
             'createdby_id' => $this->session->user_id,
        );
         $this->db->insert('student_table',$data); //add student details in to student_table

         $student_id = $this->db->insert_id();
         $batch_id = $this->input->post('batch');
       
         foreach($batch_id as $batch){   //add student batch details in to student_table
            $info = array(
                'batch_id'=> $batch,'student_id'=>$student_id);
            $this->db->insert('batch_student',$info);
            $this->db->insert_id(); 
         }
           return $this->db->insert_id(); 
        
    }


    public function update_student($id) 
    {
        $dob = $this->input->post('dob') ;
        $age = (date('Y') - date('Y',strtotime($dob))); //find age from dob
        
        $data=array(
            'student_name' => $this->input->post('student_name'),
            'dob' => $this->input->post('dob'),
            'class'=> $this->input->post('class'),
            'age' => $age
        );

        $batch_id = $this->input->post('batch');
        
        if($id==0){

            $this->db->where('student_id', $id);
            $this->db->delete('batch_student');//initially delete all batch of this student in batch_student table
       
            foreach($batch_id as $batch){ //add batch
                    $info = array(
                        'batch_id'=> $batch,'student_id'=>$id);
                    $this->db->insert('batch_student',$info);
                    $this->db->insert_id(); 
            }
            return $this->db->insert('student_table',$data);

        }else{
          
            $this->db->where('student_id', $id);
            $this->db->delete('batch_student');//initially delete all batch of this student in batch_student table
            
            foreach($batch_id as $batch){ //add batch
                $info = array(
                    'batch_id'=> $batch,'student_id'=>$id);
                $this->db->insert('batch_student',$info);
                $this->db->insert_id(); 
            }

            $this->db->where('student_id',$id);
            return $this->db->update('student_table',$data);
        }        
    }

}

?>