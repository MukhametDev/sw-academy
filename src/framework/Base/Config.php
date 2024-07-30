<?php

namespace Framework;

use Framework\Traits\Singleton;

class Config
{
    use Singleton;

    private array $dbSettings = [];

    public function __construct()
    {
        $this->init();
    }

    protected function init(): void
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . "/../../../");
        $dotenv->load();

        $this->dbSettings = [
            "host" => $_ENV["DB_HOST"],
            "user" => $_ENV["DB_USER"],
            "password" => $_ENV["DB_PASSWORD"],
            "database" => $_ENV["DB_DATABASE"],
            "port" => $_ENV["DB_PORT"],
            "driver" => $_ENV["DB_DRIVER"],
        ];
    }

    public function getDBSettings(): array
    {
        return $this->dbSettings;
    }
}
