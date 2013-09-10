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
        $data = "";
    	$this -> view("visitUser",$data);
    }
}