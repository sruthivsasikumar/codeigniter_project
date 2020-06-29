<?php
class Permission_model extends CI_Model{

    
    public function get_permission(){
        if(!empty($this->input->get("search"))){
          $this->db->like('name', $this->input->get("search"));
        }
        $this->db->order_by("permission_id", "desc");
        $query = $this->db->get("permission_table");
        return $query->result();
    }


    public function insert_permission()
    {    
        
        $data = array(
            'permissions' => $this->input->post('permissions')
        );
        return $this->db->insert('permission_table', $data);
    }


    public function update_permission($id) 
    {
        $data = array(
            'permissions' => $this->input->post('permissions')
        );
        if($id==0){
            return $this->db->insert('permission_table',$data);
        }else{
            $this->db->where('permission_id',$id);
            return $this->db->update('permission_table',$data);
        }        
    }

}

?>