<?php

class Edit_model extends CI_Model{

    public function Insert_new_ad($title,$description){
        $data['author_name']=$_SESSION['user'];
        $data['title']=htmlspecialchars($title);
        $data['description']=htmlspecialchars($description);
        $this->db->insert("ad",$data);
        $this->db->where('title',$data['title']);
        $result=$this->db->get('ad');
        return $result->result_array();

    }



    public  function Get_author($id){
        $this->db->where('id',$id);
        $result=$this->db->get('ad');
        return $result->result_array();
    }


    public function GetDataById($id){
        $this->db->where('id',$id);
        $result=$this->db->get('ad');
       return $result->result_array();
    }

    public function UpdateAd($title,$description,$id){
        $data['title']=htmlspecialchars($title);
        $data['description']=htmlspecialchars($description);
        $this->db->where('id',$id);
        $this->db->update('ad',$data);
    }


    public function deleteAd($id){
        $this->db->where('id',$id);
        $this->db->delete('ad');
    }


}



?>