<?php
    require_once("Models/ProjectsTrait.php");
    class Mail extends Controllers{
        public function __construct(){
            session_start();
            if(empty($_SESSION['login'])){
                header("location: ".base_url());
                die();
            }
            parent::__construct();
        }

        public function mail(){
            if($_SESSION['idUser'] == 1){
                $data['inbox'] = $this->getMails();
                //$data['sent'] = $this->getSentMails();
                $data['page_tag'] = "Correo | David Parrado";
                $data['page_title'] = "Correo | David Parrado";
                $data['page_name'] = "mailbox";
                $data['app'] = "functions_mailbox.js";
                $this->views->getView($this,"mailbox",$data);
            }else{
                header("location: ".base_url());
                die();
            }
            
            $this->views->getView($this,"mailbox",$data);
        }
        public function message($params){
            if($_SESSION['idUser']== 1){
                if(is_numeric($params)){
                    $id = intval($params);
                    $data['message'] = $this->model->selectMail($id);
                    $data['page_tag'] = "Mensaje";
                    $data['page_title'] = "Mensaje";
                    $data['page_name'] = "message";
                    $data['app'] = "functions_mailbox.js";
                    $this->views->getView($this,"message",$data);
                }else{
                    header("location: ".base_url());
                    die();
                }
            }else{
                header("location: ".base_url());
                die();
            }
        }
        public function getMails(){
            if($_SESSION['idUser']== 1){
                $html="";
                $total = 0;
                $request = $this->model->selectMails();
                if(count($request)>0){
                    for ($i=0; $i < count($request); $i++) { 
                        $status ="";
                        $url = base_url()."/mail/message/".$request[$i]['id'];
                        if($request[$i]['status'] == 1){
                            $status="text-black-50";
                        }else{
                            $total++;
                        }
                        $html.='
                        <div class="mail-item '.$status.'">
                            <div class="row position-relative">
                                <div class="col-4">
                                    <p class="m-0 mail-info">'.$request[$i]['name'].'</p>
                                </div>
                                <div class="col-4">
                                    <p class="mail-info">'.$request[$i]['subject'].'</p>
                                </div>
                                <div class="col-4">
                                    <p class="m-0">'.$request[$i]['date'].'</p>
                                </div>
                                <a href="'.$url.'" class="position-absolute w-100 h-100"></a>
                            </div>
                            <button type="button" class="btn" onclick="delMail('.$request[$i]['id'].',1)"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        ';
                    }
                    $arrResponse = array("status"=>true,"data"=>$html,"total"=>$total);
                }else{
                    $arrResponse = array("status"=>false,"msg"=>"No hay datos");
                }
            }
            return $arrResponse;
        }
        public function setReply(){
            if($_SESSION['idUser']== 1){
                if($_POST){
                    if(empty($_POST['txtMessage']) || empty($_POST['idMessage']) || empty($_POST['txtEmail']) || empty($_POST['txtName'])){
                        $arrResponse = array("status"=>false,"msg"=>"Error de datos");
                    }else{
                        $strMessage = strClean($_POST['txtMessage']);
                        $idMessage = intval($_POST['idMessage']);
                        $strEmail = strClean(strtolower($_POST['txtEmail']));
                        $strName = strClean(ucwords($_POST['txtName']));
                        $request = $this->model->updateMessage($strMessage,$idMessage);
                        if($request>0){
                            $dataEmail = array('to'=>$strEmail,
                                                'subject' =>'Respondiendo tu mensaje.',
                                                "message"=>$strMessage,
                                                'company'=>EMPRESA,
                                                'name'=>$strName);
                            sendEmail($dataEmail,'email_reply');
                            $arrResponse = array("status"=>true,"msg"=>"Respuesta enviada"); 
                        }else{
                            $arrResponse = array("status"=>false,"msg"=>"Ha ocurrido un error, intenta de nuevo.");
                        }
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }
            die();
        }
        public function delMail(){
            if($_SESSION['idUser']== 1){
                if($_POST){
                    $id = intval($_POST['id']);
                    $option = intval($_POST['option']);

                    $request = $this->model->delEmail($id,$option);
                    
                    if($request=="ok"){
                        $arrResponse = array("status"=>true,"msg"=>"Se ha eliminado"); 
                    }else{
                        $arrResponse = array("status"=>false,"msg"=>"Error, intenta de nuevo."); 
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

    }
?>