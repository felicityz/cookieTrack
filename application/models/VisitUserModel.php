<?php

class VisitUserModel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this -> load -> database();
    }

    public function visitMost(){
       
       $sql = "SELECT *,MAX(v_times) as cc FROM `v_user`  GROUP BY `uid` ORDER BY cc DESC LIMIT 10";

       $query = $this -> query($sql);

       $reslt = $query -> reslut_array();
    }
}