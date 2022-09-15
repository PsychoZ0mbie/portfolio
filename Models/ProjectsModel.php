<?php 
    class ProjectsModel extends Mysql{
        private $intIdProject;
		private $strName;
        private $strUrl;
        private $strPhoto;
        private $strDescription;

        public function __construct(){
            parent::__construct();
        }
        /*************************Category methods*******************************/
        public function insertProject(string $photo,string $strName, string $strDescription, string $strUrl){

			$this->strName = $strName;
			$this->strUrl = $strUrl;
            $this->strDescription = $strDescription;
            $this->strPhoto = $photo;
			$return = 0;

			$sql = "SELECT * FROM projects WHERE 
					name = '{$this->strName}'";
			$request = $this->select_all($sql);

			if(empty($request))
			{ 
				$query_insert  = "INSERT INTO projects(name,description,picture,url) 
								  VALUES(?,?,?,?)";
	        	$arrData = array(
                    $this->strName,
                    $this->strDescription,
                    $this->strPhoto,
                    $this->strUrl
        		);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}
        public function updateProject(int $intIdProject,string $photo, string $strName, string $strDescription,string $strUrl){
            $this->intIdProject = $intIdProject;
            $this->strName = $strName;
            $this->strDescription = $strDescription;
			$this->strUrl = $strUrl;
            $this->strPhoto = $photo;
            

			$sql = "SELECT * FROM projects WHERE name = '{$this->strName}' AND idproject != $this->intIdProject";
			$request = $this->select_all($sql);

			if(empty($request)){

                $sql = "UPDATE projects SET picture=?, name=?,description=?, url=? WHERE idproject = $this->intIdProject";
                $arrData = array(
                    $this->strPhoto,
                    $this->strName,
                    $this->strDescription,
                    $this->strUrl
                );
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}
        public function deleteProject($id){
            $this->intIdProject = $id;
            $sql = "DELETE FROM projects WHERE idproject = $this->intIdProject;SET @autoid :=0; 
			UPDATE projects SET idproject = @autoid := (@autoid+1);
			ALTER TABLE projects Auto_Increment = 1";
            $request = $this->delete($sql);
            return $request;
        }
        public function selectProjects(){
            $sql = "SELECT *,DATE_FORMAT(date, '%d/%m/%Y') as date FROM projects ORDER BY idproject DESC";       
            $request = $this->select_all($sql);
            return $request;
        }
        public function selectProject($id){
            $this->intIdProject = $id;
            $sql = "SELECT * FROM projects WHERE idproject = $this->intIdProject";
            $request = $this->select($sql);
            return $request;
        }
        public function search($search){
            $sql = "SELECT *,DATE_FORMAT(date, '%d/%m/%Y') as date FROM projects WHERE name LIKE '%$search%'";
            $request = $this->select_all($sql);
            return $request;
        }
        public function sort($sort){
            $option="DESC";
            if($sort == 2){
                $option = " ASC"; 
            }
            $sql = "SELECT *,DATE_FORMAT(date, '%d/%m/%Y') as date FROM projects ORDER BY idproject $option ";
            $request = $this->select_all($sql);
            return $request;
        }
    }
?>