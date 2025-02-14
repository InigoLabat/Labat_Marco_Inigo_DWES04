<?php

require '../app/core/DatabaseSingleton.php';
require '../app/models/DTO/AtletaDTO.php';
require '../app/models/entity/AtletaEntity.php';

class AtletaDAO {

    private $db;

    public function __construct()
    {
        $this->db = DatabaseSingleton::getInstance();
    }

    public function mostrarTodo() {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM atletas a JOIN clubes c ON a.id_club = c.id_club";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $atletasDTO = [];

        foreach ($result as $fila) { 
            $atletaDTO = new AtletaDTO(
                $fila['id_atleta'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['prueba'],
                $fila['marca'],
                $fila['nombre_club']
            );
            $atletasDTO[] = $atletaDTO;
        }
        return $atletasDTO;
    }

    public function mostrarId($id) {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM atletas a JOIN clubes c ON a.id_club = c.id_club WHERE a.id_atleta = {$id}";
        $statement = $connection->query($query);
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        $atletaDTO = new AtletaDTO(
            $result['id_atleta'],
            $result['nombre'],
            $result['apellido'],
            $result['prueba'],
            $result['marca'],
            $result['nombre_club']
        );
        return $atletaDTO;
    
    }

    public function mostrarIdPorClub($id) {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM atletas a JOIN clubes c ON a.id_club = c.id_club WHERE a.id_club = {$id}";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $atletasDTO = [];

        foreach ($result as $fila) { 
            $atletaDTO = new AtletaDTO(
                $fila['id_atleta'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['prueba'],
                $fila['marca'],
                $fila['nombre_club']
            );
            $atletasDTO[] = $atletaDTO;
        }
        return $atletasDTO;
    }

    public function aniadir($atleta) {
        $connection = $this->db->getConnection();

        $query = "INSERT INTO atletas (nombre, apellido, id_club, prueba, marca)
        VALUES ('{$atleta['nombre']}', '{$atleta['apellido']}', {$atleta['id_club']}, '{$atleta['prueba']}', {$atleta['marca']})";
        $connection->query($query);
        return $this->mostrarTodo();
    }

    public function actualizar($id, $newData) {
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM atletas a JOIN clubes c ON a.id_club = c.id_club WHERE id_atleta = {$id}";
        $statement = $connection->query($query);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        $atleta = new AtletaEntity($result['nombre'], $result['apellido']);
        $atleta->setIdAlteta($result['id_atleta']);
        $atleta->setNombre($newData['nombre'] ?? $result['nombre']);
        $atleta->setApellido($newData['apellido'] ?? $result['apellido']);
        $atleta->setIdClub($newData['id_club'] ?? $result['id_club']);
        $atleta->setPrueba($newData['prueba'] ?? $result['prueba']);
        $atleta->setMarca($newData['marca'] ?? $result['marca']);
        
        $query = "UPDATE atletas
            SET nombre = '{$atleta->getNombre()}',
                apellido = '{$atleta->getApellido()}',
                id_club = {$atleta->getIdClub()},
                prueba = '{$atleta->getPrueba()}',
                marca = {$atleta->getMarca()}
            WHERE id_atleta = {$id}";
        
        $connection->query($query);
    
        return $this->mostrarId($id);
    }

    public function borrar($id) {
        $connection = $this->db->getConnection();
        $query = "DELETE FROM atletas WHERE id_atleta = {$id}";
        $statement = $connection->query($query);
        $statement->fetchAll(PDO::FETCH_ASSOC);
        return "Filas eliminadas: ". $statement->rowCount();
    }
}