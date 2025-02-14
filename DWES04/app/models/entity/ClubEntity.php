<?php

class ClubEntity {

    private $id_club;
    private $nombre_club;
    private $ciudad;
    private $fundacion;
    private $created_at;
    private $updated_at;
    

    public function __construct($nombre, $ciudad)
    {
        $this->nombre_club = $nombre;
        $this->ciudad = $ciudad;
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
     * Get the value of nombre_club
     */
    public function getNombreClub()
    {
        return $this->nombre_club;
    }

    /**
     * Set the value of nombre_club
     */
    public function setNombreClub($nombre_club): self
    {
        $this->nombre_club = $nombre_club;

        return $this;
    }

    /**
     * Get the value of ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     */
    public function setCiudad($ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of fundacion
     */
    public function getFundacion()
    {
        return $this->fundacion;
    }

    /**
     * Set the value of fundacion
     */
    public function setFundacion($fundacion): self
    {
        $this->fundacion = $fundacion;

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