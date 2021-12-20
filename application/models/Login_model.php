<?php
class Login_model extends CI_Model {


    public function check_email_pwd($email,$pwd)
    {
            //$query = $this->db->get('users');
            $sql = "SELECT * FROM users WHERE email='".$email."' and pwd='".$pwd."'";
            //echo $sql;
            //die();
            $query = $this->db->query($sql);
            $users = $query->result();
            if(count($users)==1){
                //var_dump($users);
                $user = $users[0];
                if($user->pwd == $pwd){
                        $user_data["id"] = $user->id;
                        $user_data["fname"] = $user->fname;
                        $user_data["lname"] = $user->lname;
                        $user_data["email"] = $user->email;
                        $user_data["telno"] = $user->telno;
                        $user_data["logged_in"] = TRUE;
                        $this->session->set_userdata($user_data);
                        return (true);
                }else{
                        return (false);
                }
                
            }else{
                return (false);
            }

    }

}


