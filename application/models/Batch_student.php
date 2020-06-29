<?php
class Batch_student extends CI_Model{

    

    public function get_student_batch(){

        //Getting data from many to many relationship
        $this->db->select('student_table.student_id,batch_table.batch_name');
        $this->db->from('student_table');
        $this->db->join('batch_student', 'student_table.student_id = batch_student.student_id', 'inner');
        $this->db->join('batch_table', 'batch_student.batch_id = batch_table.batch_id', 'inner');

        $query = $this->db->get();
        return $query->result();

    }
    
    
}

?>