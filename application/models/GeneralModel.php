<?php
class GeneralModel extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getVisitNum(){

    	$query = $this -> db ->query("SELECT * FROM `v_user`");
    	return $query-> num_rows();
    }

    public function getRegNum(){

    	$query = $this -> db ->query("SELECT * FROM `registr`");
    	return $query-> num_rows();
    }

    public function getVisitWeekData($week){

    	$result = array();

    	foreach ($week as $value) {
    		$qeury = $this -> db -> query("SELECT * FROM `v_user` WHERE date(created_at) = '".$value."'");

    		$result[] = $qeury -> num_rows();
    	}

    	return $result;

    }

    public function getRegWeekData($week){

    	$result = array();

    	foreach ($week as $value) {
    		$qeury = $this -> db -> query("SELECT * FROM `registr` LEFT JOIN `v_user` ON `registr`.uid = `v_user`.id  WHERE date(created_at) = '".$value."'");	

    		$result[] = $qeury -> num_rows();
    	}

    	return $result;

    }

    public function getVisitPage(){

    	$sql = "SELECT * FROM `page` ORDER BY `v_times` DESC LIMIT 5";

    	$query = $this -> db -> query($sql);

    	$row = $query -> result_array();    	

    	return $row;
    }
    
    public function getSumTypeNumber(){
    
    	$sql = "SELECT SUM(`v_times`) as num FROM `refer`";
    	
    	$query = $this -> db -> query($sql);
    	
    	$row = $query -> row_array();
    	
    	return $row['num'];
    	
    }

    public function getVisitTypeNumber(){
        $result = array();

        $sql = "SELECT `type`,`v_times` FROM `refer` GROUP BY `type`";

        $query = $this -> db -> query($sql);
        
        $row = $query -> result_array();        

        foreach($row as $v){
            $result['type'][] = $v['type'];
            $result['v_times'][] = $v['v_times'];
        }

        return $result;
    }
}