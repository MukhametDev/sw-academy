<?php

namespace Framework;

class CDatabase
{
    protected array $config = [];

    protected \PDO $connection;

    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->loadConfiguration();
        $this->makeConnect();
    }

    protected function loadConfiguration(): void
    {
        $this->config = Config::getInstance()->getDBSettings();
    }

    protected function makeConnect()
    {
        $dsn = "{$this->config['driver']}:dbName={$this->config['database']};host={$this->config['host']};";

        $connection = new \PDO(
            $dsn,
            $this->config['user'],
            $this->config['password'],
        );

        dd(
            $connection->query("SELECT 1")
        );
    }

    public function query(string $sql): \PDOStatement
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
