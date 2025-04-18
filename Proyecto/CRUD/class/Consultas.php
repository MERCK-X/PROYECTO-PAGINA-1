﻿<?php
//singleton
class Usuarios
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
	    $servidor="localhost";
	    $base="usuarios1";
	    $usuario="root";
	    $contrasenia="";
	    $this->dbh = new PDO('mysql:host='.$servidor.';dbname='.$base, $usuario, $contrasenia);
            $this->dbh->exec("SET CHARACTER SET utf8");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
 
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
 
    public function Consulta($usuario,$correo,$contrasenia)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM usuarios WHERE usuario LIKE ? and correo LIKE ? and contraseña LIKE ?");
            $query->bindParam(1, $usuario);
            $query->bindParam(2, $correo);
            $query->bindParam(3, $contrasenia);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function insertar($nombre,$usuario,$correo,$contrasenia)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?)");
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $usuario);
            $query->bindParam(3, $correo);
            $query->bindParam(4, $contrasenia);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Borrar($p1)
    {
        try {  
            $query = $this->dbh->prepare("DELETE FROM tabla WHERE campo LIKE ?");
            $query->bindParam(1, $p1);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
 
    public function Actualizar($p1,$p2)
    {
        try {
            $query = $this->dbh->prepare("UPDATE tabla SET campo1=? WHERE campo2 LIKE ?");
            $query->bindParam(1, $p1);
            $query->bindParam(2, $p2);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

   
 
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>