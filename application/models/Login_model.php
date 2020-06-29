<?php  
  
class Login_model extends CI_Model {  
  
    public function log_in_correctly() {  
  
        $this->db->where('user_name', $this->input->post('user_name'));  
        $this->db->where('password', md5($this->input->post('password')));  
        $query = $this->db->get('user_table');  
  
        if ($query->num_rows() == 1)  
        {  
            $user = $query->result() ;
            $user_id = $user[0]->user_id ;
            $user_name = $user[0]->user_name ;

            $this->session->user_id = $user_id;
            $this->session->user_name = $user_name;

            $data['user_id'] =$user_id;
            $data['user_name'] =$user_name;
            return $data;  
            
        } else {  
            return false;  
        }  
  
    }  
  
      
}  
?>  