<?php

class Index extends CI_Controller{
    
    public function __construct(){
        parent :: __construct();
    }

    public function view($page="index",$data){
        /*不管用????
        if(!file_exists('/ci_test/application/views/'.$page.'.php')){                            
            show_404();
        }*/

        $this->load->view('public/header');
        $this->load->view("public/leftNav");
        $this->load->view($page,$data);
        $this->load->view('public/footer');
    }

    public function index(){
        $preWeekArr = $this -> getPreWeek();
        $val = '';      

        foreach ($preWeekArr as  $value) {
               $val .= "\"".$value."\",";
        }
        $data["preWeek"] = rtrim($val,",");        

        $this -> load -> model("GeneralModel");

        $data['visitNum'] = $this -> GeneralModel -> getVisitNum();

        $data['regNum'] = $this -> GeneralModel -> getRegNum();

        $data['visitWeekNum'] = $this -> GeneralModel -> getVisitWeekData($this -> getPreWeek());

        $data['regWeekNum'] = $this -> GeneralModel -> getRegWeekData($this -> getPreWeek());

        $data['pageData'] = $this -> GeneralModel -> getVisitPage();

        $data['getSumTypeNumber'] = $this -> GeneralModel -> getSumTypeNumber();

        $data['getVisitTypeNumber'] = $this -> GeneralModel -> getVisitTypeNumber();
                  
        $this ->  view("index",$data);
    }   

    public function getPreWeek(){

        $weekday = array();
        for($i=6;$i >= 0;$i--){
            $weekday[] = date("Y-m-d",strtotime("-{$i} day"));
        }

        return $weekday;
    }
    
}