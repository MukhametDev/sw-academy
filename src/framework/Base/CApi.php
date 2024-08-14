<?php

namespace Framework;

use Exception;
class CApi {
    const API_NAME = "Ajax";

    private array $request = [];

    public function __construct(){
        $this->request = $this->getRequest();
    }

    public function getAction(): string{
        return $this->request["action"] ?? "";
    }

    public function getPayload(): array{
        return $this->request["payload"] ?? [];
    }

    public function getApiClass($template = null): string {
        $className = self::API_NAME;
        $component = $this->request["component"] ?? "";

        $templateClass = $template ? "Templates\\{$template}\\components\\{$component}\\{$className}" : null;
        $defaultClass = "Components\\{$component}\\{$className}";

        return match (true) {
            $templateClass && class_exists($templateClass) => $templateClass,
            class_exists($defaultClass) => $defaultClass,
            default => throw new Exception("Class not found: {$templateClass} or {$defaultClass}")
        };
    }


    private function getRequest(): array{
        if($_SERVER["REQUEST_METHOD"] !== "POST"){
            return $_GET;
        }

        return [
            ...json_decode(file_get_contents('php://input'), true),
            ...$_REQUEST
        ];
    }
}
