<?php

class AtletaDTO implements JsonSerializable {

    private $id_alteta;
    private $nombre;
    private $apellido;
    private $prueba;
    private $marca;
    private $nombre_club;

    public function __construct($id_alteta, $nombre, $apellido, $prueba, $marca, $nombre_club)
    {
        $this->id_alteta = $id_alteta;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->prueba = $prueba;
        $this->marca = $marca;
        $this->nombre_club = $nombre_club;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of id_alteta
     */
    public function getIdAlteta()
    {
        return $this->id_alteta;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Get the value of prueba
     */
    public function getPrueba()
    {
        return $this->prueba;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Get the value of nombre_club
     */
    public function getNombreClub()
    {
        return $this->nombre_club;
    }
}