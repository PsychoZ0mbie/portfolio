<?php
    require_once("Libraries/Core/Mysql.php");
    /**
     * 
     */
    trait ProjectsTrait{
        private $con;
        
        public function getProjects(){
            $this->con = new Mysql();
            $sql = "SELECT *,DATE_FORMAT(date, '%Y') as date FROM projects ORDER BY idproject DESC";       
            $request = $this->con->select_all($sql);
            $html ="";
            for ($i = 0; $i < count($request); $i++) {
                $html .= '
                <div class="col-lg-3 col-md-4 mb-3">
                    <div class="project" onclick="getProject('.$request[$i]['idproject'].')">
                        <img src="'.media().'/images/uploads/'.$request[$i]['picture'].'" alt="'.$request[$i]['name']." ".EMPRESA.'">
                        <span>+</span>
                        <div>
                            <h2>'.$request[$i]['name'].'</h2>
                            <p>'.$request[$i]['date'].'</p>
                        </div>
                    </div>
                </div>
                ';
            }
            return $html;
        }
        public function selectProject($id){
            $this->con = new Mysql();
            $this->intIdProject = $id;
            $sql = "SELECT *,DATE_FORMAT(date, '%Y') as date FROM projects WHERE idproject = $this->intIdProject";
            $request = $this->con->select($sql);
            return $request;
        }
    }
    
?>