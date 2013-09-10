<?php

class VisitPage extends CI_Controller{

	public function __construct(){
		parent:: __construct();

        $this -> load -> model("VisitPageModel");
	}

	public function view($page="index",$data){        

        $this->load->view('public/header');
        $this->load->view("public/leftNav");
        $this->load->view($page,$data);
        $this->load->view('public/footer');
    }

    public function index(){

        $userTrack = $this -> VisitPageModel -> getUserTrack();
        
        foreach ($userTrack as $key => $val) {
            $userTrack[$key]['page'] = $this -> VisitPageModel -> UserVisitPage($val['page']);
            
        }
        //print_r($userTrack);

        $data['userTrack']  = $userTrack;

        

    	$this -> view("visitPage",$data);
    }
}