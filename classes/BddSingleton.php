<?php

class BddSingleton {

    private static ?PDO $object = null;

    private string $username;
    private string $password;
    private string $server;
    private string $bddName;
    private string $charset = "utf8";

    public function bddConnect(): PDO{
        //condition qui annonce que si objet est null on try catch.
        if(self::$object === null) {
            try {
                self::$object = new PDO("mysql:host{$this->server};dbname={$this->bddName};charset={$this->charset}", $this->username, $this->password);
                self::$object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                //crash la tentative de connexion si il y a une erreur
                die();
            }
        }
        return self::$object;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $server
     */
    public function setServer(string $server): self
    {
        $this->server = $server;
        return $this;
    }

    /**
     * @param string $bddName
     */
    public function setBddName(string $bddName): self
    {
        $this->bddName = $bddName;
        return $this;
    }

}