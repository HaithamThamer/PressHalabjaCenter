<?php


class HDatabaseConnection{
    private $connection = null;
    private $isConnected = false;
    private $serverIP;
    private $serverUsername;
    private $serverPassword;
    private $serverDatabaseName;
    private $serverDatabasePort;
    public function __construct($serverIP,$serverUsername,$serverPassword,$serverDatabaseName,$serverDatabasePort){
        $this->serverIP = $serverIP;
        $this->serverUsername = $serverUsername;
        $this->serverPassword = $serverPassword;
        $this->serverDatabaseName = $serverDatabaseName;
        $this->serverDatabasePort = $serverDatabasePort;

    }
    private function openConnection(){
        if($this->isConnected == false && $this->connection == null){
            $this->connection = new mysqli($this->serverIP, $this->serverUsername, $this->serverPassword, $this->serverDatabaseName, $this->serverDatabasePort);
            $this->isConnected = true;
            return $this->isConnected;
        }
        return false;
    }
    private function closeConnection(){
        if($this->isConnected){
            $this->connection->close();
            $this->connection = NULL;
            $this->isConnected = false;
            return !$this->isConnected;
        }
        return false;
    }
    public function query($sql){
        $result = NULL;
        if($this->openConnection()){
            $this->connection->query("set names utf8;");
            $result = $this->connection->query($sql);
            $this->closeConnection();
        }
        return $result;
    }
}