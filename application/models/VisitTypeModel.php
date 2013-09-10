<?php
class VisitTypeModel extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getVisitType($start,$end){
        if($start == 0){
            $where = "WHERE date(created_at) < '".$end."'";
        }else if($end == 0){
            $where = "WHERE date(created_at) > '".$start."'";
        }else{
            $where = "WHERE date(created_at) BETWEEN '".$start."' AND '".$end."'";        
        }

        $sql = "SELECT count(*) as num,`refer`.type FROM `v_user` LEFT JOIN `refer` ON `v_user`.refer = `refer`.id ".$where." GROUP BY `type`";

        $query = $this -> db -> query($sql);

        return $query -> result_array();

        
    }
}