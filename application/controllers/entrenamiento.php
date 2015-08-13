<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Entrenamiento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('tank_auth');
        $this->load->model('entrenamiento_model');
        $this->load->library('ajax');
    }

    /*
     *  
     */
    public function buscar_entrenamiento() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            
            $data['username'] = $this->tank_auth->get_username();
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['avatar'] = $this->tank_auth->get_avatar();
            
            //Obtiene entrenamientos bd
            $entrenamientos = $this->entrenamiento_model->getEntrenamientos($data['user_id']);
         
            //Obtiene notificaciones usuario bd
            $data['notificaciones'] = $this->entrenamiento_model->getNotificaciones($data['user_id']);
                
            
            
            
            $marcas = array();
            $data['entrenamientos'] = false;
            if($entrenamientos){
            foreach ($entrenamientos AS $gmarker) { // Los resultados van a un arreglo que permitirá manejar mucho más fácil en  la vista los datos obtenidos.
                $participa_en_entrenamiento = $this->entrenamiento_model->participaEntrenamiento($data['user_id'],$gmarker->entrenamiento_id);
             //  echo $participa_en_entrenamiento["resultado"] ;
                $marcas[] = array(
                    'usuarioMarca' => $gmarker->usuario,
                    'usuarioIdMarca' => $gmarker->usuario_id,
                    'entrenamientoIdMarca' => $gmarker->entrenamiento_id,
                    'descMarca' => $gmarker->descripcion,
                    'latMarca' => $gmarker->lat,
                    'lngMarca' => $gmarker->lng,
                    'rutaMarca' => $gmarker->coordenadas,
                    'horaMarca' => $gmarker->hora_evento,
                    'fechaMarca' => $gmarker->fecha_evento,
                    'participaEntrenamientoMarca' => $participa_en_entrenamiento["resultado"]
                );
            }
            $data['marcas'] = $marcas;
            $data['entrenamientos'] = true;
            }

            $data['titulo'] = "Buscar Entrenamientos";
            $data['subtitulo'] = "La busqueda se realiza de acuerdo a tu actual ubicación";
            $data['contenido'] = "entrenamiento/buscar_entrenamiento";
            $data['js'] = "<script src='" . base_url() . "assets/admin/js/buscar_entrenamiento/map_buscar_entrenamiento.js' type='text/javascript'></script>"
                     . "<script src='" . base_url() . "assets/admin/js/buscar_entrenamiento/funciones_buscar_entrenamiento.js' type='text/javascript'></script>";;
            $this->load->view('contenedor', $data);
        
        }
    }
    
    public function ver_bitacora_entrenamiento(){
        
            $data['username'] = $this->tank_auth->get_username();
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['avatar'] = $this->tank_auth->get_avatar();
            
            //Obtiene entrenamientos bd
            $entrenamientos = $this->entrenamiento_model->getEntrenamientos($data['user_id']);
         
            //Obtiene notificaciones usuario bd
            $data['notificaciones'] = $this->entrenamiento_model->getNotificaciones($data['user_id']);
            $data['titulo'] = "Buscar Entrenamientos";
            $data['subtitulo'] = "La busqueda se realiza de acuerdo a tu actual ubicación";
            $data['contenido'] = "entrenamiento/bitacora";
            $data['js'] = "<script src='" . base_url() . "assets/admin/js/buscar_entrenamiento/map_buscar_entrenamiento.js' type='text/javascript'></script>"
                     . "<script src='" . base_url() . "assets/admin/js/buscar_entrenamiento/funciones_buscar_entrenamiento.js' type='text/javascript'></script>";;
            $this->load->view('contenedor', $data);
    }

    public function nuevo_entrenamiento() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
           

            $data['username'] = $this->tank_auth->get_username();
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['avatar'] = $this->tank_auth->get_avatar();           
            
             //Obtiene notificaciones usuario bd
            $data['notificaciones'] = $this->entrenamiento_model->getNotificaciones($data['user_id']);
            
            $data['titulo'] = "Nuevo Entrenamientos";
            $data['subtitulo'] = "";
            $data['contenido'] = "entrenamiento/nuevo_entrenamiento";
            $data['js'] = "<script src='" . base_url() . "assets/admin/js/nuevo_entrenamiento/map_nuevo_entrenamiento.js' type='text/javascript'></script>"
                    . "<script src='" . base_url() . "assets/admin/js/nuevo_entrenamiento/funciones_nuevo_entrenamiento.js' type='text/javascript'></script>";
            $this->load->view('contenedor', $data);
        }
    }

    public function crear_entrenamiento()  {
        if ($this->input->post()) {
    
            $desc = $this->input->post('descripcion');
            
            $fecha = $this->input->post('fecha_entrenamiento');
            $fecha = date('Y-m-d', strtotime($fecha));
            $hora = $this->input->post('hora_entrenamiento');
            $coordenadas = $this->input->post('ruta_entrenamiento');
           
            /*Extracción de primeras coordenadas. Punto de partida para marcador */
            $ruta = explode(" ", $coordenadas);
            $marcador = explode(",", $ruta[0]);
            $marcador_inicial_lat = $marcador[0];
            $marcador_inicial_lng = $marcador[1];
            /*´+++++++++++++*/
            $usuario = $this->tank_auth->get_user_id();
            $res = $this->entrenamiento_model->crearEntrenamiento($desc,$fecha,$hora,$coordenadas, $marcador_inicial_lat,$marcador_inicial_lng,$usuario);

            if ($res['resultado']) {
                $arr['resultado'] = 'true';
                $arr['mensaje'] = "El proyecto se creó correctamente.";
                           } else {
                $arr['resultado'] = 'false';
            }
            $this->ajax->output_ajax($arr);
        }
    }
    
    public function ver_entrenamiento(){
        
        
         if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $data['username'] = $this->tank_auth->get_username();
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['titulo'] = "Proyecto ";
             //Obtiene notificaciones usuario bd
            $data['notificaciones'] = $this->entrenamiento_model->getNotificaciones($data['user_id']);
            $data['proyectos'] = $this->proyecto_model->getProyecto($id);
            $data['proyecto_id'] = $id;
            $data['gastos'] = $this->proyecto_model->getGastos($id);
            $data['sumGastos'] = $this->proyecto_model->sumGastos($id);
            $data['contenido'] = 'proyecto/view.php';
            $this->load->view('templates/head');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/left_side');
            $this->load->view('templates/contenido', $data);
            $this->load->view('templates/footer');
        }
    }
    
     // Metodo para validar si el proyecto éxiste
    public function unirse_entrenamiento() {
       
        if( $this->input->post()){
      
            $entrenamamiento_id = $this->input->post('entrenamamiento_id');
            if($this->entrenamiento_model->unirseEntrenamiento($this->tank_auth->get_user_id(),$entrenamamiento_id)){  
            $arr['resultado'] = 'true';
       
        }else{
            $arr['resultado'] = 'false';             
        }
        
            $this->ajax->output_ajax($arr);
      
       }else{
             redirect('/proyecto/', 'refresh');
           
       }

    }
    
    
    function generarHtmlEntramientoMapa($row) {

        $html = "<div id='content' style=''>
                 <div id='siteNotice'>
                 </div>
              
                 <h1 id='firstHeading' class='firstHeading'>" . $row['evento_descripcion'] . "</h1>
                 <div id='bodyContent'>
                 <div class='box-body'><dt>Descripción</dt>
                      <dd>" . $row['evento_descripcion'] . "</dd>
                      <dt>Día y horario</dt>
                      <dd>" . $row['fecha_evento'] . " a las " . $row['hora_evento'] . "</dd>            
                      <dt>Creado</dt>
                      <dd>" . $row['fecha_creacion'] . "</dd>
                          <br>
                    <dt>  <div class='btn btn-default pull-right'><i class='fa fa-plus'></i> Sumarse</div></dt>   
                  </div>
                 </div>
                 </div>;";

        $html = $this->db->escape_str($html);
        return $html;
    }
    
    

    public function generar_mapa($num_marcadores) {
        $data = array();
        //$this->load->library('pagination'); // Para paginar resultados
        $this->load->model('mapa'); // modelo mapa

        $per_page = 5;
        $data['marcasTotal'] = $this->mapa->cuentaMarcas();

        $total = $this->mapa->cuentaMarcas();

        if ($total >= 1) {
            $resMarcas = $this->mapa->marcasQuery($per_page, (int) $this->uri->segment(3)); // Query para el listado de marcas
            $marcas = array();
            foreach ($resMarcas AS $gmarker) { // Los resultados van a un arreglo que permitirá manejar mucho más fácil en  la vista los datos obtenidos.
                $marcas[] = array(
                    'idMarca' => $gmarker->id,
                    'nombreMarca' => $gmarker->descripciobn,
                    'latMarca' => $gmarker->lat,
                    'lngMarca' => $gmarker->long
                );
            }
            $data['marcas'] = $marcas;

            $data['conMarcas'] = 'Existen ' . $total . 'marcas registradas en base de datos.';
            $data['sinMarcas'] = '';
        } else {
            $data['sinMarcas'] = 'Actualmente no existen temas registrados.';
            $data['conMarcas'] = '';
        }
        $data['marcas'] = $marcas;
        $this->load->view('mapas', $data);
    }

}

?>