<?php

class DatabaseSingleton {

    private static $instance;
    private $connection;
    private $config = [];

    private function __construct()
    {
        $this->loadConfig();
        $this->connection = new PDO("mysql:host={$this->config['host']};dbname={$this->config['dbname']}", $this->config['user'], $this->config['password']);
    }

    private function loadConfig() {
        $json = file_get_contents('../config/db-conf.json');
        $this->config = json_decode($json, true);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}