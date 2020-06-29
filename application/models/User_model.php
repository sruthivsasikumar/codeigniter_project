<?php
class User_model extends CI_Model{

    
    public function get_user(){
        if(!empty($this->input->get("search"))){
          $this->db->like('name', $this->input->get("search"));
        }
        $this->db->order_by("user_id", "desc");
        $query = $this->db->get("user_table");
        return $query->result();
    }

    public function insert_user()
    {    
            $user=new user_model;
            $is_user_exists = $user->user_exists() ;
    
            if($is_user_exists == true){
                //user is exists.so don't make duplication
            }
            else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        'dob' => $this->input->post('dob'),
                        'user_name'=> $this->input->post('user_name'),
                        'password' =>md5($this->input->post('password')),
                    );
                    $this->db->insert('user_table', $data); //add user 

                    $user_id = $this->db->insert_id(); 
                    $permission_id = $this->input->post('permission');
                    
                    foreach($permission_id as $permission){   //add permissions to user
                        $info = array(
                        'permission_id'=> $permission,'user_id'=>$user_id);
                        $this->db->insert('permission_user',$info);
                        
                    }   
                    return true ;   
            }
        
    }

    public function user_exists() 
    {
        $this->db->where('user_name', $this->input->post('user_name'));  
        $query = $this->db->get('user_table')->result(); 

            //checking username already exists
            if ($query)      //exists
            {
                return true ;
            } 
    }


    public function update_user($id) 
    {

        if($this->input->post('password') == $this->input->post('confirm_password')){
            $data = array(
                'name' => $this->input->post('name'),
                'dob' => $this->input->post('dob'),
                'user_name'=> $this->input->post('user_name'),
                'password' =>md5($this->input->post('password')),
            );

             $permission_id = $this->input->post('permission');

            $this->db->where('user_id', $id);
            $this->db->delete('permission_user');//initially delete all permissions of user
           
                foreach($permission_id as $permission){ //add permission
                    $info = array(
                        'permission_id'=> $permission,'user_id'=>$id);
                    $this->db->insert('permission_user',$info);
                    $this->db->insert_id(); 
                }

            $this->db->where('user_id',$id);
            return $this->db->update('user_table',$data);

               
            }    



        
            
    }




}

?>