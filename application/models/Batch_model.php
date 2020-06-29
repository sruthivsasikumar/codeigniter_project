<?php
class Batch_model extends CI_Model{
    
    public function get_batch(){
        if(!empty($this->input->get("search"))){
          $this->db->like('batch_name', $this->input->get("search"));
        }
        $this->db->order_by("batch_id", "desc");
        $query = $this->db->get("batch_table");
        return $query->result();
    }


    public function insert_batch()
    {    
        $data = array(
            'batch_name' => $this->input->post('batch_name')
        );
        return $this->db->insert('batch_table', $data);
    }


    public function update_batch($id) 
    {
        $data=array(
            'batch_name' => $this->input->post('batch_name')
        );
        if($id==0){
            return $this->db->insert('batch_table',$data);
        }else{
            $this->db->where('batch_id',$id);
            return $this->db->update('batch_table',$data);
        }        
    }
}

?>