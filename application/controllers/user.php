<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('tank_auth');
        $this->load->model('user_model');
    }

    /*
     *  En caso de ser rol coordinador o encargado de proyecto/actividad
     *  Lista en caso de existir:
     *     - 3 últimos proyectos del usuario 
     *     - 3 últimas actividades del usuario 
     *     - del periodo actual o apunto en el selector de periodo
     * 
     */

    public function actualizar_datos() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

              $data['username'] = $this->tank_auth->get_username();
              $data['user_id'] = $this->tank_auth->get_user_id();
              $data['avatar']  = $this->tank_auth->get_avatar();

              $user_info = $this->user_model->get_user_info($data['user_id']);
              
              foreach ($user_info  as $item) {
                $data['username'] = $item['username'];
                $data['email'] = $item['email'];
                $data['fecha_creacion'] = $item['fecha_creacion'];
              
            }
              $data['js']  ="";
              $data['contenido'] = "usuario/actualizar_datos";
    
              
              

              
              $data['titulo']  = "Home";
              $this->load->view('contenedor',$data);
              
       

        }
        }
        
        
    public function upload_avatar(){
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]); 
    $file_extension = end($temporary);
    $user_id = $this->tank_auth->get_user_id();

    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
            ) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) 
	{

        if ($_FILES["file"]["error"] > 0)
		{
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } 
		else 
		{ 
				if (file_exists("assets/admin/upload/upload/user/".$user_id."_". $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				} 
				else 
				{					
					$sourcePath = $_FILES['file']['tmp_name'];   // Storing source path of the file in a variable
					$targetPath = "assets/admin/upload/upload/user/".$user_id."/".$_FILES['file']['name'];  // Target path where file is to be stored
                                        $targetPathThumb = "assets/admin/upload/upload/user/".$user_id."/thumb_".$_FILES['file']['name'];  // Target path where file is to be stored
					
                                        //Imagen THUMB
                                        $original = imagecreatefromjpeg($_FILES['file']['tmp_name']);
                                        $thumb = imagecreatetruecolor(150,150); // Lo haremos de un tamaño 150x150

                                        $ancho = imagesx($original);
                                        $alto = imagesy($original);

                                        imagecopyresampled($thumb,$original,0,0,0,0,150,150,$ancho,$alto);
                                        imagejpeg($thumb,$targetPathThumb,90); // 90 es la calidad de compresión
                                        move_uploaded_file($sourcePath,$targetPath) ; //  Moving Uploaded file
                                      //  move_uploaded_file($final_thumb,$targetPath) ; //  Moving Uploaded file
                                        $this->user_model->update_avatar($user_id,$_FILES['file']['name']);
                                        
                                        
                                        
					
					echo "<span id='success'>Imagen cargada exitosamente...!!</span><br/>";
					/*echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
					echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
					echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";*/
                                   
						
				}				       
        }        
    }   
	else 
	{
        echo "<span id='invalid'>***Es invalido el tipo o peso de la imagen.***<span>";
    }
    
    
        echo "<script>actualizarPagina();</script>";
    }    
    
    
    
    

}

?>
