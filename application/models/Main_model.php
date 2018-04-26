<?php

class Main_model extends CI_Model
{

    public function Show_ad($count,$offset)
    {
       $result= $this->db->order_by("ID","desc");
       $result= $this->db->get('ad',$count,$offset);
      return $result->result_array();
    }


    public function ShowOneAd($id)
    {
        $this->db->where('id',$id);
        $result=$this->db->get('ad');
        return  $result->result_array();

    }

}

?>