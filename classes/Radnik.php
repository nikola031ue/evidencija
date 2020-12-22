<?php

class Radnik{
    private $id;
    private $ime;
    private $prezime;
    private $sef;
    private $username;
    private $lozinka;

    function __construct($data) {
        $this->id = htmlspecialchars($data['id']);
        $this->ime = htmlspecialchars($data['ime']);
        $this->prezime = htmlspecialchars($data['prezime']);
        $this->sef = htmlspecialchars($data['sef']);
        $this->username = htmlspecialchars($data['username']);
        $this->password = htmlspecialchars($data['password']);
    }

    function getId() {
        return $this->id;
    }
    
    function getIme() {
        return $this->ime;
    }
    
    function getPrezime() {
        return $this->prezime;
    }
    
    function getSef() {
        return $this->sef;
    }
    
    function getUsername() {
        return $this->username;
    }
    
    function getPassword() {
        return $this->password;
    }
}