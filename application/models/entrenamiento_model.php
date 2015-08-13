<?php

class Entrenamiento_model extends Ci_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getEntrenamientos($id) {
        $this->db->query("SET lc_time_names = 'es_CL'");



        $sql = " SELECT
                           evento_descripcion as descripcion,
                           evento_coordenada_lat as lat,
                           evento_coordenada_long as lng,
                           evento_coordenadas as coordenadas,
                           TIME_FORMAT(evento_hora, '%H:%i') as hora_evento,
                           DATE_FORMAT(evento_fecha_creacion, '%W  %w de %M de %Y') as fecha_creacion,
                           DATE_FORMAT(evento_fecha, '%W  %w de %M de %Y') as fecha_evento,
                           username as usuario,
                           users.id as usuario_id,
                           evento_id as entrenamiento_id
                  FROM
                           evento,
                           users
                  WHERE
                           evento_users_id = id 
                  AND
                           evento_users_id != $id     ORDER BY id DESC ";

        $query = $this->db->query($sql);

        if ($query->result_array()) {
            return $query->result();
            $query->free_result();
        } else {
            return false;
        }
    }

    public function unirseEntrenamiento($usuario_id, $entrenamiento_id) {
        $data = array(
            'eventuser_evento_id' => $entrenamiento_id,
            'eventuser_users_id' => $usuario_id
        );
        $res = $this->db->insert('evento_usuario', $data);
        if ($res) {
            return true; //existen registros con ese codigo
        } else {
            return false;
        }
    }

    public function participaEntrenamiento($usuario_id, $entrenamiento_id) {

        $data = array(
            'eventuser_evento_id' => $entrenamiento_id,
            'eventuser_users_id' => $usuario_id
        );
        $this->db->select("*");
        $this->db->where($data);
        $res = $this->db->count_all_results('evento_usuario');
       
        if ($res == 0) {
            $data['errorMsje'] = $this->db->_error_message();
            $data['errorNum'] = $this->db->_error_number();
            $data["resultado"] = 'no';
        } else {
            $data["resultado"] = 'si';
        }
        return $data;
    }

    public function getEntrenamiento($id) {


        $sql = " SELECT
                           evento_descripcion as descripcion,
                           evento_coordenada_lat as lat,
                           evento_coordenada_long as lng,
                           evento_coordenadas as coordenadas,
                           TIME_FORMAT(evento_hora, '%H:%i') as hora_evento,
                           DATE_FORMAT(evento_fecha_creacion, '%W  %w de %M de %Y') as fecha_creacion,
                           DATE_FORMAT(evento_fecha, '%W') as fecha_evento,
                           username as usuario
                  FROM
                           evento,
                           users
                  WHERE
                           evento_id=$id ";

        $query = $this->db->query($sql);

        if ($query->result_array()) {
            return $query->result_array();
            $query->free_result();
        } else {
            return false;
        }
    }
    
     public function getNotificaciones($id) {


        $sql = " SELECT
                           TIME_FORMAT(e.evento_hora, '%H:%i') as hora_evento,
                           DATE_FORMAT(e.evento_fecha, '%W  %w de %M de %Y') as fecha_evento,
                           e.evento_id,
                           u.username as usuario,
                           u.id as usuario_id
                           
                  FROM
                           evento_usuario AS ev,
                           evento AS e,
                           users AS u
                  WHERE
                           ev.eventuser_estado=0
                  AND
                           ev.eventuser_users_id=$id 
                  AND
                           e.evento_id=ev.eventuser_evento_id
                  AND
                            u.id=eventuser_users_id
                            ";

        $query = $this->db->query($sql);

        if ($query->result_array()) {
            return $query->result_array();
            $query->free_result();
        } else {
            return false;
        }
    }

    public function crearEntrenamiento($desc, $fecha, $hora, $coordenadas, $marcador_inicial_lat, $marcador_inicial_lng, $usuario) {


        $data = array(
            'evento_descripcion' => $desc,
            'evento_fecha' => $fecha,
            'evento_hora' => $hora,
            'evento_coordenada_lat' => $marcador_inicial_lat,
            'evento_coordenada_long' => $marcador_inicial_lng,
            'evento_coordenadas' => $coordenadas,
            'evento_users_id' => $usuario
        );

        $res = $this->db->insert('evento', $data);


        if (!$res) {
            $data['errorMsje'] = $this->db->_error_message();
            $data['errorNum'] = $this->db->_error_number();

            $data["resultado"] = false;
        } else {

            $data["resultado"] = true;
        }

        return $data;
    }

}

?>