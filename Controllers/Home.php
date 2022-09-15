<?php
    require_once("Models/ProjectsTrait.php");
    class Home extends Controllers{
        use ProjectsTrait;
        public function __construct(){
            parent::__construct();
        }

        public function home(){
            $data['page_tag'] = "Diseño & Desarrollado web | David Parrado";
            $data['page_title'] = "Diseño & Desarrollado web | David Parrado";
            $data['page_name'] = "home";
            $data['projects'] = $this->getProjects();
            $this->views->getView($this,"home",$data);
        }
        public function sendMessage(){
            if($_POST){
                if(empty($_POST['txtName']) || empty($_POST['txtEmail']) || empty($_POST['txtBusiness']) || empty($_POST['txtServices']) || empty($_POST['txtMessage'])){
                    $arrResponse = array("status"=>false,"msg"=>"Error de datos");
                }else{
                    $strName = ucwords(strClean($_POST['txtName']));
                    $strEmail = strtolower(strClean($_POST['txtEmail']));
                    $strBusiness = ucwords(strClean($_POST['txtBusiness']));
                    $strServices = strClean($_POST['txtServices']);
                    $strMessage = strClean($_POST['txtMessage']);
                    $arrMessage = array("business"=>$strBusiness,"services"=>$strServices,"message"=>$strMessage); 
                    $data = array("name"=>$strName,"to"=>$strEmail,"message"=>$arrMessage,"cc"=>"davidstiven1999@hotmail.com","subject"=>"Servicios de Diseño & Desarrollo web - David Parrado");
                    
                    if(sendEmail($data,"email_contact")){
                        $arrResponse = array("status"=>true,"msg"=>"Mensaje enviado");  
                    }else{
                        $arrResponse = array("status"=>false,"msg"=>"No se ha podido enviar el mensaje");
                    }
                    
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        public function getProject(){
            if($_POST){
                $id = intval($_POST['id']);
                $request = $this->selectProject($id);
                $arrData = array("data"=>$request);
                echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

    }
?>