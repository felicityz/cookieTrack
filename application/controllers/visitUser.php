<?php

class VisitUser extends CI_Controller{

	public function __construct(){
		parent:: __construct();

        $this -> load -> Model("visitUserModel");
	}

	public function view($page="index",$data){        

        $this->load->view('public/header');
        $this->load->view("public/leftNav");
        $this->load->view($page,$data);
        $this->load->view('public/footer');
    }

    public function index(){
        
    	$this -> view("visitUser",$data="");
    }

    public function getData($start,$end){

        $mostVisit = $this -> visitUserModel -> visitMost($start,$end);

        print_r($mostVisit);

        /*

        $str = "";

        foreach ($mostVisit as $key => $value) {
            echo '<tr>';
            echo '<td>',($key+1),'</td>';
            echo '<td>',$value['id'],'</td>';
            echo '<td>',$value['uid'],'</td>';
            echo '<td>',$value['v_times'],'</td>';
            echo '<td>',$value['created_at'],'</td>';
            echo '<td>','chakan','</td>';
            echo '</tr>';
        }*/
    }
}