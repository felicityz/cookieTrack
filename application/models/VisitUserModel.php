<?php

class VisitUserModel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this -> load -> database();
    }

    public function visitMost($start,$end){

       if($start == 0){
            $where = "WHERE date(created_at) < '".$end."'";
        }else if($end == 0){
            $where = "WHERE date(created_at) > '".$start."'";
        }else{
            $where = "WHERE date(created_at) BETWEEN '".$start."' AND '".$end."'";        
        }

       $sql = "SELECT *,MAX(v_times) as cc FROM `v_user` ".$where." GROUP BY `uid` ORDER BY `v_times` DESC LIMIT 10";

       $query = $this ->db -> query($sql);

       $result = $query -> result_array();

       return $result;
    }
}