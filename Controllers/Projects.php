<?php
    class Projects extends Controllers{

        public function __construct(){
            session_start();
            if(empty($_SESSION['login'])){
                header("location: ".base_url());
                die();
            }
            parent::__construct();
        }
        
        public function projects(){
            if($_SESSION['idUser'] == 1){
                $data['page_tag'] = "Proyecto";
                $data['page_title'] = "Proyectos";
                $data['page_name'] = "proyectos";
                $data['projects'] = $this->getProjects();
                $data['app'] = "functions_projects.js";
                $this->views->getView($this,"projects",$data);
            }else{
                header("location: ".base_url());
                die();
            }
        }
        public function getProjects($option=null,$params=null){
            if($_SESSION['idUser'] == 1){
                $html="";
                $request="";
                if($option == 1){
                    $request = $this->model->search($params);
                }else if($option == 2){
                    $request = $this->model->sort($params);
                }else{
                    $request = $this->model->selectProjects();
                }
                if(count($request)>0){
                    for ($i=0; $i < count($request); $i++) { 
                        
                        $btnEdit = '<button class="btn btn-success m-1" type="button" title="Edit" data-id="'.$request[$i]['idproject'].'" name="btnEdit"><i class="fas fa-pencil-alt"></i></button>';
                        $btnDelete = '<button class="btn btn-danger m-1" type="button" title="Delete" data-id="'.$request[$i]['idproject'].'" name="btnDelete"><i class="fas fa-trash-alt"></i></button>';
                        $html.='
                            <tr class="item" data-name="'.$request[$i]['name'].'">
                                <td>'.$request[$i]['name'].'</td>
                                <td>'.$request[$i]['date'].'</td>
                                <td class="item-btn">'.$btnEdit.$btnDelete.'</td>
                            </tr>
                        ';
                    }
                    $arrResponse = array("status"=>true,"data"=>$html);
                }else{
                    $arrResponse = array("status"=>false,"data"=>"No hay datos");
                }
            }else{
                header("location: ".base_url());
                die();
            }
            
            return $arrResponse;
        }
        public function getProject(){
            if($_SESSION['idUser'] == 1){

                if($_POST){
                    if(empty($_POST)){
                        $arrResponse = array("status"=>false,"msg"=>"Error de datos");
                    }else{
                        $idProject = intval($_POST['idProject']);
                        $request = $this->model->selectProject($idProject);
                        if(!empty($request)){
                            $request['picture'] = media()."/images/uploads/".$request['picture'];
                            $arrResponse = array("status"=>true,"data"=>$request);
                        }else{
                            $arrResponse = array("status"=>false,"msg"=>"Error, intenta de nuevo"); 
                        }
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }else{
                header("location: ".base_url());
                die();
            }
            die();
        }
        public function setProject(){
            //dep($_POST);exit;
            if($_SESSION['idUser'] == 1){
                if($_POST){
                    if(empty($_POST['txtName']) || empty($_POST['txtDescription']) || empty($_POST['txtUrl'])){
                        $arrResponse = array("status" => false, "msg" => 'Error de datos');
                    }else{ 
                        $idProject = intval($_POST['idProject']);
                        $strName = ucwords(strClean($_POST['txtName']));
                        $strDescription = strClean($_POST['txtDescription']);
                        $strUrl = $_POST['txtUrl'];
                        $photo = "";
                        $photoProject="";

                        if($idProject == 0){
                            $option = 1;

                            if($_FILES['txtImg']['name'] == ""){
                                $photoProject = "project.jpg";
                            }else{
                                $photo = $_FILES['txtImg'];
                                $photoProject = 'project_'.bin2hex(random_bytes(6)).'.png';
                            }

                            $request= $this->model->insertProject(
                                $photoProject, 
                                $strName,
                                $strDescription,
                                $strUrl
                            );
                        }else{
                                $option = 2;
                                $request = $this->model->selectProject($idProject);
                                if($_FILES['txtImg']['name'] == ""){
                                    $photoProject = $request['picture'];
                                }else{
                                    if($request['picture'] != "Project.jpg"){
                                        deleteFile($request['picture']);
                                    }
                                    $photo = $_FILES['txtImg'];
                                    $photoProject = 'Project_'.bin2hex(random_bytes(6)).'.png';
                                }
                                $request = $this->model->updateProject(
                                    $idProject, 
                                    $photoProject, 
                                    $strName,
                                    $strDescription,
                                    $strUrl
                                );
                        }
                        if($request > 0 ){
                            if($photo!=""){
                                uploadImage($photo,$photoProject);
                            }
                            if($option == 1){
                                $arrResponse = $this->getProjects();
                                $arrResponse['msg'] = 'Datos guardados.';
                            }else{
                                $arrResponse = $this->getProjects();
                                $arrResponse['msg'] = 'Datos actualizados.';
                            }
                        }else if($request == 'exist'){
                            $arrResponse = array('status' => false, 'msg' => 'El proyecto ya existe, pruebe con otro nombre.');		
                        }else{
                            $arrResponse = array("status" => false, "msg" => 'No es posible guardar los datos.');
                        }
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }else{
                header("location: ".base_url());
                die();
            }
			die();
		}
        public function delProject(){
            if($_SESSION['idUser'] == 1){
                if($_POST){
                    if(empty($_POST['idProject'])){
                        $arrResponse=array("status"=>false,"msg"=>"Error de datos");
                    }else{
                        $id = intval($_POST['idProject']);

                        $request = $this->model->selectProject($id);
                        if($request['picture']!="project.jpg"){
                            deleteFile($request['picture']);
                        }
                        
                        $request = $this->model->deleteProject($id);
                        if($request=="ok"){
                            $arrResponse = $this->getProjects();
                            $arrResponse['msg'] = "Se ha eliminado";
                        }else{
                            $arrResponse = array("status"=>false,"msg"=>"No es posible eliminar, intenta de nuevo.");
                        }
                    }
                    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
                }
            }else{
                header("location: ".base_url());
                die();
            }
            die();
        }
        public function search($params){
            if($_SESSION['idUser'] == 1){
                $search = strClean($params);
                $arrResponse = $this->getProjects(1,$search);
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
        public function sort($params){
            if($_SESSION['idUser'] == 1){
                $sort = intval($params);
                $arrResponse = $this->getProjects(2,$sort);
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
    }
?>