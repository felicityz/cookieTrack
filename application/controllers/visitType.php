<?php

class VisitType extends CI_Controller{

	public function __construct(){
		parent:: __construct();
        $this -> load -> Model("VisitTypeModel");
	}

	public function view($page="index",$data){        

        $this->load->view('public/header');
        $this->load->view("public/leftNav");
        $this->load->view($page,$data);
        $this->load->view('public/footer');
    }

    public function index(){
    	$this -> view("visitType",$data=array());       
        
    }

    public function getTypeData($start,$end){
        $getTypeData = $this ->  VisitTypeModel -> getVisitType($start,$end); 
        
        $i = 0;        
        

        foreach($getTypeData as $val){
            

           $arr["name".$i] = $val['type'];

           $arr['num'.$i] = $val['num'];
           
           $i++;
        }
        $arr['numTotal'] = $i;

        echo json_encode($arr);

        
        
/*
        [{
            name: 'google',
            y: 20,
            sliced: true,
            selected: true
        },
        ['reren',    15],                    
        ['Others',   20]]*/
        
    }
}