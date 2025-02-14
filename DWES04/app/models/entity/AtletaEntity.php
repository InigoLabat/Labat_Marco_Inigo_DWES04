<?php

class AtletaEntity {

    private $id_alteta;
    private $nombre;
    private $apellido;
    private $id_club;
    private $prueba;
    private $marca;
    private $created_at;
    private $updated_at;

    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    /**
     * Get the value of id_alteta
     */
    public function getIdAlteta()
    {
        return $this->id_alteta;
    }

    /**
     * Set the value of id_alteta
     */
    public function setIdAlteta($id_alteta): self
    {
        $this->id_alteta = $id_alteta;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     */
    public function setApellido($apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of id_club
     */
    public function getIdClub()
    {
        return $this->id_club;
    }

    /**
     * Set the value of id_club
     */
    public function setIdClub($id_club): self
    {
        $this->id_club = $id_club;

        return $this;
    }

    /**
     * Get the value of prueba
     */
    public function getPrueba()
    {
        return $this->prueba;
    }

    /**
     * Set the value of prueba
     */
    public function setPrueba($prueba): self
    {
        $this->prueba = $prueba;

        return $this;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     */
    public function setMarca($marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */
    public function setUpdatedAt($updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}