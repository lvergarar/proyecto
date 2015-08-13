<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *  
 * Clase para el manejo de proyectos
 * 
 * 
 */

class Proyecto extends CI_Controller {

    // Constructor
    public function __construct() {

        parent::__construct();
        $this->load->library('ajax');
        $this->load->model('proyecto_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('tank_auth');
    }

    public function index() {

        $data['username'] = $this->tank_auth->get_username();
        $data['user_id'] = $this->tank_auth->get_user_id();
        $data['titulo'] = "Nuevo Proyecto";
        $this->load->view('templates/head');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/left_side');
        $data['contenido'] = 'proyecto/nuevo';
        $this->load->view('templates/contenido', $data);
        $this->load->view('templates/footer');
    }

    //Metodo que carga todos los proyectos del usuario en el año actual pagidos   	
    public function lista_proyectos($offset = '') {

        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {

            $data['username'] = $this->tank_auth->get_username();
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['titulo'] = "Proyectos";
            $data['contenido'] = "proyecto/lista";
            $this->load->view('templates/head');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/left_side');
            $data['proyectos'] = $this->proyecto_model->getProyectos();
            $this->load->view('templates/contenido', $data);
            $this->load->view('templates/footer');
        }
    }

    public function crear() {

        if ($this->input->post()) {

            $ot = $this->input->post('ot');
            $oc = $this->input->post('oc');
            $descproyecto = $this->input->post('descproyecto');
            $valorCubicadora = $this->input->post('valorCubicadora');
            $tecnocom = $this->input->post('tecnocom');
            $dif_cubicadora = $this->input->post('dif_cubicadora');
            $fecha_ingreso = $this->input->post('fecha_ingreso');


            $res = $this->proyecto_model->crearProyecto($ot, $oc,  $descproyecto, $valorCubicadora, $tecnocom, $dif_cubicadora, $fecha_ingreso);

            if ($res['resultado']) {
                $arr['resultado'] = 'true';
                $arr['mensaje'] = "El proyecto se creó correctamente.";
            } else {
                $arr['resultado'] = 'false';
            }
            $this->ajax->output_ajax($arr);
        } else {
            echo "sadasd";
            
        }
    }

}
