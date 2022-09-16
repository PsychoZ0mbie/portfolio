<?php 

	class MailModel extends Mysql
	{
        private $intIdUser;
        private $strEmail;
        private $strMessage;
        private $intIdMessage;

		public function __construct()
		{
			parent::__construct();
        }	
        
        public function selectMails(){
            $sql = "SELECT * ,DATE_FORMAT(date, '%d/%m/%Y') as date FROM contact ORDER BY id DESC";       
            $request = $this->select_all($sql);
            return $request;
        }
        public function selectSentMails(){
            $sql = "SELECT * ,DATE_FORMAT(date, '%d/%m/%Y') as date FROM sendmessage ORDER BY id DESC";       
            $request = $this->select_all($sql);
            return $request;
        }
        public function selectMail(int $id){
            $sql = "UPDATE contact SET status=? WHERE id = $id";
            $arrData = array(1);
            $request = $this->update($sql,$arrData);
            $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') as date, DATE_FORMAT(date_update, '%d/%m/%Y') as dateupdated FROM contact WHERE id=$id";
            $request = $this->select($sql);
            return $request;
        }
        public function selectSentMail(int $id){
            $sql = "SELECT *, DATE_FORMAT(date, '%d/%m/%Y') as date FROM sendmessage WHERE id=$id";
            $request = $this->select($sql);
            return $request;
        }
        public function updateMessage($strMessage,$idMessage){
            $this->strMessage = $strMessage;
            $this->intIdMessage = $idMessage;
            $sql = "UPDATE contact SET reply=?, date_update=NOW() WHERE id = $this->intIdMessage";
            $arrData = array($this->strMessage);
            $request = $this->update($sql,$arrData);
            return $request;
        }
        public function insertMessage($strSubject,$strEmail,$strMessage){
            $this->strMessage = $strMessage;
            $this->strEmail = $strEmail;
            $this->strSubject = $strSubject;

            $sql = "INSERT INTO sendmessage(email,subject,message) VALUES(?,?,?)";
            $arrData = array($this->strEmail,$this->strSubject,$this->strMessage);
            $request = $this->insert($sql,$arrData);
            return $request;
        }
        public function delEmail($id,$option){
            $sql = "DELETE FROM contact WHERE id =$id;SET @autoid :=0; 
                UPDATE contact SET id = @autoid := (@autoid+1);
                ALTER TABLE contact Auto_Increment = 1";
            $request = $this->delete($sql);
            return $request;
        }
	}
 ?>