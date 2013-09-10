<?php

class UserRegRatio extends CI_Controller{

	public function __construct(){
		parent:: __construct();
	}

	public function view($page="index",$data){        

        $this->load->view('public/header');
        $this->load->view("public/leftNav");
        $this->load->view($page,$data);
        $this->load->view('public/footer');
    }

    public function index(){
    	$this -> view("userRegRatio",$data=array());
    }
}