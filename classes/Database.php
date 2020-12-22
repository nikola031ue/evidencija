<?php 
require_once ("Rad.php");
require_once ("Radnik.php");

class Database {
    private $conn;

    public function __construct($config_file="config.ini") {
        if ($config = parse_ini_file($config_file)) {
            $host = isset($config["host"]) ? $config["host"] : "";
            $database = isset($config["database"]) ? $config["database"] : "";
            $user = isset($config["user"]) ? $config["user"] : "";
            $password = isset($config["password"]) ? $config["password"] : "";
        

            try {
                $this->conn = new POD("mysql:host=$host;dbname=$database;charset=utf8mb4", $user, $password);
                $this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
                return true;
            } catch (PDOException $e) {
                $this->conn = null;
            }
        }
        return false;
    }

    public function dodajRadnik(Radnik $radnik) {
        if(!$this->conn) return false;
        try {
            $sql = "insert into radnik values (:id, :ime, :prezime, :sef, :username, :password);";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue("id", $radnik->getId());
            $stmt->bindValue("ime", $radnik->getIme());
            $stmt->bindValue("prezime", $radnnik->getPrezime());
            $stmt->bindValue("sef", $radnik->getSef());
            $stmt->bindValue("username", $radnik->getUsername());
            $stmt->bindValue("password", $radnik->getPassword());
            return $stmt->execute();
        } catch (PDOException $e) { }
        return false;
    }

    public function dodajRad(Rad $rad) {
        if(!$this->conn) return false;
        try {
            $sql = "insert into rad values (:id, :bolovanje, :odmor, :redovni_rad, :prekovremeno, :praznik);";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue("id", $rad->getId());
            $stmt->bindValue("bolovanje", $rad->getBolovanje());
            $stmt->bindValue("odmor", $rad->getOdmor());
            $stmt->bindValue("redovni_rad", $rad->getRedovni_rad());
            $stmt->bindValue("prekovremeno", $rad->getPrekovremeno());
            $stmt->bindvalue("praznik", $rad->getPraznik());
            return $stmt->execute();
        } catch (PDOException $e) { }
        return false;
    }

    public function getRadnik($data) {
        if(!$this->conn) return null;
        try {
            $sql = "select * from radnik where username = :username;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue("username", $data);
            $stmt->execute();
            if($row = $stmt->fetch()) {
                return new Radnik($row); 
            }
        } catch (PDOException $e) { }
        return null;
    }

    public function getRadnici() {
        $radnici = array();
        if(!$this->conn) return $radnici;
        try {
            $sql = "select * from radnik;";
            $stmt = $this->conn->query($sql);
            while($row = $stmt->getch()) {
                $radnici[] = new Radnik($row);
            }
        } catch (PDException $e) { }
        return $radnici;
    }

    public function getRad($data) {
        if(!$this->conn) return null;
        try {
            $sql = "select * from rad where id = :id;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue("id", $data);
            $stmt->execute();
            if($row = $stmt->fetch()) {
                return new Rad($row); 
            }
        } catch (PDOException $e) { }
        return null;
    }

    public function getRadSve() {
        $rad = array();
        if(!$this->conn) return $rad;
        try {
            $sql = "select * from rad;";
            $stmt = $this->conn->query($sql);
            while($row = $stmt->getch()) {
                $rad[] = new Rad($row);
            }
        } catch (PDException $e) { }
        return $rad;
    }
}