<?php 

	class Login extends Controllers{
		public function __construct(){
		
			session_start();
			if(isset($_SESSION['login'])){
				header('Location: '.base_url()."/dashboard");
				die();
			}
			parent::__construct();
		}

		public function login(){
			$data['page_tag'] = "Login";
			$data['page_title'] = "Login";
            $data['page_name'] = "login";
			$this->views->getView($this,"login",$data);
		}
		public function loginUser(){
			if($_POST){
				if(empty($_POST['txtEmail']) || empty($_POST['txtPassword'])){
					$arrResponse = array('status' => false, 'msg' => 'Error de datos' );
				}else{
					$strUser  =  strtolower(strClean($_POST['txtEmail']));
					$strPassword = hash("SHA256",$_POST['txtPassword']);
					$requestUser = $this->model->loginUser($strUser, $strPassword);
					if(empty($requestUser)){
						$arrResponse = array('status'=>false, 'msg'=> 'El usuario o la contraseña son incorrectos.');
					}else{
						$arrData =$requestUser;
						$_SESSION['idUser'] = $arrData['id'];
						$_SESSION['login'] = true;

						$arrData = $this->model->sessionLogin($_SESSION['idUser']);
						sessionUser($_SESSION['idUser']);
						$arrResponse = array('status'=>true);
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	}
 ?>