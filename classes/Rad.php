<?php 

class Rad {
    private $id;
    private $bolovanje;
    private $odmor;
    private $redovan_rad;
    private $prekovremeno;
    private $praznik;

    function __construct($data) {
        $this->id = htmlspecialchars($data['id']);
        $this->bolovanje = htmlspecialchars($data['bolovanje']);
        $this->odmor = htmlspecialchars($data['odmor']);
        $this->redovan_rad = htmlspecialchars($data['redovan_rad']);
        $this->prekovremeno = htmlspecialchars($data['prekovremeno']);
        $this->praznik = htmlspecialchars($data['praznik']);
    }

    function getId() {
        return $this->id;
    }
    
    function getBolovanje() {
        return $this->bolovanje;
    }

    function getOdmor() {
        return $this->odmor;
    }

    function getRedovan_rad() {
        return $this->redovan_rad;
    }

    function getPrekovremeno() {
        return $this->prekovremeno;
    }

    function getPraznik() {
        return $this->praznik;
    }
}