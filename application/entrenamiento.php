<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Entrenamiento extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('tank_auth');
        $this->load->model('entrenamiento_model');
    }
    /*
     *  
     */

    public function buscar_entrenamiento() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            //Obtiene entrenamientos bd
            $entrenamientos = $this->entrenamiento_model->getEntrenamientos();

            //Google maps
            $this->load->library('googlemaps');
            $this->load->helper('url');
            $config = array();
            $config['center'] = 'auto';
            /* $config['drawing'] = true;

              $config['drawingDefaultMode'] = 'marker';
              $config['drawingModes'] = array('polyline'); */
            $config['onboundschanged'] = 'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                        position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                });
        }
          centreGot = true;';
            //    $config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
            $this->googlemaps->initialize($config);

            //Genera Marcas en el mapa segun datos de bd
            if ($entrenamientos) {
                foreach ($entrenamientos as $row) {
                    $marker = array();
                    $marker['position'] = $row['evento_coordenadas'];
                    $info = $this->generarHtmlEntramientoMapa($row);


                    $marker['infowindow_content'] = $info;
                    // $marker['infowindowMaxWidth'] = '500px';

                    $this->googlemaps->add_marker($marker);
                }
            }

            $data['map'] = $this->googlemaps->create_map();

            //User data
            $data['username'] = $this->tank_auth->get_username();
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['avatar']  = $this->tank_auth->get_avatar();
            $data['contenido'] = "entrenamiento/buscar";
            $this->load->view('templates/head');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/left_side');


            $data['titulo'] = "Buscar Entrenamientos";
            $data['subtitulo'] = "La busqueda se realiza de acuerdo a tu actual ubicación";
            $this->load->view('templates/contenido', $data);
            // $this->load->view('templates/map', $data);
            $this->load->view('templates/footer');
        }
    }

    public function nuevo_entrenamiento() {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {


            $data['username'] = $this->tank_auth->get_username();
            $data['user_id'] = $this->tank_auth->get_user_id();

            $data['contenido'] = "entrenamiento/nuevo";
            $this->load->view('templates/head');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/left_side');


            $data['titulo'] = "Nuevo Entrenamiento";
            $this->load->view('templates/contenido', $data);
            // $this->load->view('templates/map', $data);
            $this->load->view('templates/footer');
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

}

?>