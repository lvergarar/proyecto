<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();


        $this->load->library('tank_auth');
    }

    /*
     *  En caso de ser rol coordinador o encargado de proyecto/actividad
     *  Lista en caso de existir:
     *     - 3 últimos proyectos del usuario 
     *     - 3 últimas actividades del usuario 
     *     - del periodo actual o apunto en el selector de periodo
     * 
     */

    public function index() {

        if ($this->tank_auth->is_logged_in()) {
            redirect('/buscar_entrenamiento/');
        } else {


            /* $data['username'] = $this->tank_auth->get_username();
              $data['user_id'] = $this->tank_auth->get_user_id();

              $data['contenido'] = "proyecto/lista";
              $this->load->view('templates/head');
              $this->load->view('templates/header',$data);
              $this->load->view('templates/left_side');


              $data['titulo']  = "Home";
              $this->load->view('templates/contenido',$data);
              // $this->load->view('templates/map', $data);
              $this->load->view('templates/footer'); */

            $this->load->view('public/header');
            $this->load->view('public/nav');
            $this->load->view('public/slider');
            $this->load->view('public/about');
            $this->load->view('public/services');
            // $this->load->view('templates/map', $data);
            $this->load->view('public/footer');
        } }
    

}

?>