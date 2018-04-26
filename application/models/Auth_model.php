<?php

class Auth_model extends CI_Model
{

    public function  LogIn($login)
    {
        $this->db->where('login',$login);
        $result=  $this->db->get('users');
        return $result->result_array();

    }



    public function RegNewUser($login, $password)
    {
        $data['login']=$login;
        $data['password']=password_hash($password, PASSWORD_DEFAULT) ;
        $this->db->insert('users', $data);

    }
}


?>