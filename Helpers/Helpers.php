<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require_once('Libraries/PHPMailer/Exception.php');
    require_once('Libraries/PHPMailer/PHPMailer.php');
    require_once('Libraries/PHPMailer/SMTP.php');

    function base_url(){
        return BASE_URL;
    }
    function media(){
        return BASE_URL."/assets";
    }
    function headerPage($data=""){

        $view_header="Views/Template/header_page.php";
        require_once ($view_header);
    }
    function footerPage($data=""){

        $view_footer="Views/Template/footer_page.php";
        require_once ($view_footer);
    }
    function headerAdmin($data=""){
        $view_header="Views/Template/header_admin.php";
        require_once ($view_header);
    }
    function footerAdmin($data=""){

        $view_footer="Views/Template/footer_admin.php";
        require_once ($view_footer);
    }
    function getModal(string $nameModal, $data){
    
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once $view_modal;        
    }
    function dep($data){
    
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }
    function emailNotification(){
        require_once("Models/StoreModel.php");
        $obj = new StoreModel();
        $request = $obj->selectMails();
        $total = 0;
        if(!empty($request)){
            foreach ($request as $email) {
                if($email['status']!=1)$total++;
            }
        }
        return $total;
    }
    function sessionUser(int $idpersona){
        require_once("Models/LoginModel.php");
        $objLogin = new LoginModel();
        $request = $objLogin ->sessionLogin($idpersona);
        return $request;
    }
    function sendEmail($data,$template){

        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = 'UTF-8';
            $asunto = $data['subject'];
            $emailDestino = $data['to'];
            $nombre=$data['name'];

            $empresa = "David Parrado";
            $remitente = "pruebascodigoenergizado@hotmail.com";

            ob_start();
            require_once("Views/Template/Email/".$template.".php");
            $mensaje = ob_get_clean();

            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true; 
            $mail->Username   = $remitente;
            $mail->Password   = "Da.197023";
                                    //Enable SMTP authentication
                                //SMTP username
                                        //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            //Recipients
            $mail->setFrom($remitente,$empresa);
            $mail->addAddress($emailDestino, $nombre);     //Add a recipient
            if(!empty($data['cc'])){
                $mail->addBCC($data['cc']);
                $mail->addBCC($remitente);
            }
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $mensaje;
            $mail->send();
            return true;
        } catch (Exception $e) {
            
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    function orderFiles($files){
        $arrFiles = [];
        for ($i=0; $i < count($files['name']) ; $i++) { 
            $data = array("tmp_name"=>$files['tmp_name'][$i]);
            $rename ='product_'.bin2hex(random_bytes(6)).'.png';
            $arrFile = array(
                "name"=>$files['name'][$i],
                "rename"=>$rename,
            );
            uploadImage($data, $rename);
            array_push($arrFiles,$arrFile);
        }
        return $arrFiles;
    }
    function getFile(string $url, $data){
        ob_start();
        require_once("Views/{$url}.php");
        $file = ob_get_clean();
        return $file;        
    }
    function uploadImage(array $data, string $name){
        $url_temp = $data['tmp_name'];
        $destino = 'Assets/images/uploads/'.$name;
        $move = move_uploaded_file($url_temp, $destino);
        return $move;
    }
    function deleteFile(string $name){
        unlink('Assets/images/uploads/'.$name);
    }
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
    function clear_cadena(string $cadena){
        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );
 
        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );
 
        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );
 
        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );
 
        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );
 
        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç',',','.',';',':'),
        array('N', 'n', 'C', 'c','','','',''),
        $cadena
        );
        return $cadena;
    }
	function passGenerator($length = 10){
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    function getCatFooter(){
        require_once("Models/CategoriasModel.php");
        $categoria = new CategoriasModel();
        $request = $categoria->getCategoriasFooter();
        return $request;
    }

?>