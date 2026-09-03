<?php

class Database
{
    private string $host = '127.0.0.1';
    private string $db = 'DBLogin';
    private string $user = 'root';
    private string $pass = '';

    private ?PDO $connection = null;

    public function getConnection(): PDO
    {
        if ($this->connection === null) {

            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4",
                $this->user,
                $this->pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }

        return $this->connection;
    }
}