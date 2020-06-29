<?php
class Permission_user extends CI_Model{

    public function get_permission_user(){

        $this->db->select('user_table.user_id,permission_table.permissions,permission_table.permission_id');
        $this->db->from('user_table');
        $this->db->join('permission_user', 'permission_user.user_id = user_table.user_id', 'inner');
        $this->db->join('permission_table', 'permission_user.permission_id = permission_table.permission_id', 'inner');



        $query = $this->db->get();
        return $query->result();

    }
    
    
}

?>