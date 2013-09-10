<?php
class VisitPageModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getUserTrack($uid=""){
		
		if(!$uid){

			$sql = "SELECT uid,page,`v`.time,`r`.type,`v`.v_times,created_at FROM `v_user` AS `v` LEFT JOIN  `refer` AS `r` ON `v`.refer = `r`.id  WHERE `uid` = (SELECT `uid` FROM `v_user` ORDER BY `v_times` DESC LIMIT 1)";

			$query = $this -> db -> query($sql);

			$result = $query -> result_array();
		}		


		return $result;
	}

	public function UserVisitPage($page){

		$sql = "select `url` FROM `page` where `page_id` in($page)";

		$query = $this -> db -> query($sql);

		$result = $query -> result_array();

		//print_r($result);
		return $result;
	}
}