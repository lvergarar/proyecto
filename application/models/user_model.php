<?php

class User_model extends Ci_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_user_info() {
        $this->db->query("SET lc_time_names = 'es_CL'");
        $this->db->select("username,
                           email,
                           DATE_FORMAT(created, '%W  %w de %M de %Y') as fecha_creacion", FALSE);

        $this->db->from('users');
        $query = $this->db->get();

        if ($query->result_array()) {

            

            return $query->result_array();
            $query->free_result();
        } else {
            return false;
        }
    }

    public function crearProyecto($ot, $oc, $descproyecto, $valorCubicadora, $tecnocom, $dif_cubicadora, $fecha_ingreso) {


        $data = array(
            'proyecto_OT' => $ot,
            'proyecto_estadoOC' => $oc,
            'proyecto_descripción' => $descproyecto,
            'proyecto_valorCubicadora' => $valorCubicadora,
            'proyecto_porcentajeTecnocom' => $tecnocom,
            'proyecto_difcubicadora' => $dif_cubicadora,
            'proyecto_fechaIngresoOT' => $fecha_ingreso
        );

        $res = $this->db->insert('proyecto', $data);


        if (!$res) {
            $data['errorMsje'] = $this->db->_error_message();
            $data['errorNum'] = $this->db->_error_number();

            $data["resultado"] = false;
        } else {

            $data["resultado"] = true;
        }

        return $data;
    }

    
    public function update_avatar($id,$name){        
        $data = array(
               'avatar' => $name
            );
        $this->db->where('id', $id);
        $this->db->update('users', $data); 
        
    }
     public function getAvatar($id){        
       
        $this->db->select("avatar", FALSE);

        $this->db->from('users');
          $this->db->where('id', $id);
        $query = $this->db->get();
        
    }
}

?>