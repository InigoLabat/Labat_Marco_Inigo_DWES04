<?php

require_once __DIR__ . '/../models/DAO/AtletaDAO.php';

class AthleteController {

    public function getAll() {
        $dao = new AtletaDAO();
        $resp = $dao->mostrarTodo();

        if ($resp) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Contenido mostrado correctamente';
            
            $this->sendResponse($status, $cod, $mensaje, $resp);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al acceder al contenido';
            
            $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function getById($id) {
        $dao = new AtletaDAO();
        $resp = $dao->mostrarId($id);

        if ($resp) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elemento mostrado correctamente';
            
            $this->sendResponse($status, $cod, $mensaje, $resp);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al acceder al elemento';
            
            $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function getByClubId($id) {
        $dao = new AtletaDAO();
        $resp = $dao->mostrarIdPorClub($id);

        if ($resp) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elementos del club mostrados correctamente';
            
            $this->sendResponse($status, $cod, $mensaje, $resp);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al acceder al ID del club. No encontrado.';
            
            $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function create($data) {
        $dao = new AtletaDAO();
        $resp = $dao->aniadir($data);

        if ($resp) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elemento creado correctamente';
            
            $this->sendResponse($status, $cod, $mensaje, $resp);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al crear el elemento';
            
            $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function update($id, $data) {
        $dao = new AtletaDAO();
        $resp = $dao->actualizar($id, $data);

        if ($resp) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elemento con ID '. $id . ' actualizado correctamente';
            
            $this->sendResponse($status, $cod, $mensaje, $resp);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al actualizar el contenido';
            
            $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function delete($id) {
        $dao = new AtletaDAO();
        $resp = $dao->borrar($id);

        if ($resp) {
            $status = 'SUCCES';
            $cod = 200;
            $mensaje = 'Elemento eliminado correctamente';
            
            $this->sendResponse($status, $cod, $mensaje, $resp);
        } else {
            $status = 'NO SUCCES';
            $cod = 404;
            $mensaje = 'Error al eliminar el elemento';
            
            $this->sendResponse($status, $cod, $mensaje, null);
        }
    }

    public function sendResponse($status, $cod, $mensaje, $data) {
        header('Content-Type: application/json');
        http_response_code($cod);
        $response = [
            'status' => $status,
            'codigo' => $cod,
            'mensaje' => $mensaje,
            'data' => $data
        ];
        echo $this->toJson($response);
    }

    public function toJson ($data){
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}