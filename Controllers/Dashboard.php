<?php
    class Dashboard extends Controllers{
        public function __construct(){
            session_start();
            if(empty($_SESSION['login'])){
                header("location: ".base_url()."/login");
                die();
            }
            parent::__construct();
        }

        public function dashboard(){
            if($_SESSION['idUser'] == 1){
                $data['page_tag'] = "Dashboard";
                $data['page_title'] = "Dashboard";
                $data['page_name'] = "dashboard";
                $data['app'] = "functions_dashboard.js";
                $this->views->getView($this,"dashboard",$data);
            }else{
                header("location: ".base_url());
                die();
            }
        }
    }
?>