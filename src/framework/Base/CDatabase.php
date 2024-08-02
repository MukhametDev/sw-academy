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
        $dsn = "{$this->config['driver']}:dbname={$this->config['database']};host={$this->config['host']};";

        $this->connection = new \PDO(
            $dsn,
            $this->config['user'],
            $this->config['password'],
        );
    }

    public function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function execute(string $sql, array $params = []): bool
    {
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($params);
    }

    public function fetchAssoc(string $sql, array $params = []): ?array
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll(string $sql, array $params = []): array
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getLastInsertId(): int
    {
        return $this->connection->lastInsertId();
    }

    public function close()
    {
        $this->connection = null;
    }
}
