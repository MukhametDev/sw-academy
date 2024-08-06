<?php

namespace Framework;

class CMain
{
    public function includeComponent(string $component, string $template = ".default", array $arParams = [])
    {
        $arResult = $arParams;

        // Начало буферизации вывода
        ob_start();

        // Получаем переменную окружения и убираем пробелы
        $switch_env_variable = trim(Config::getInstance()->getEnv("CUSTOM_TEMPLATE"));

        // Получаем путь к компоненту
        $componentPath = $this->getComponentPath($component);

        // Определяем путь к шаблону
        $templatePath = $switch_env_variable
            ? $this->getCustomTemplatePath($component, $template, $switch_env_variable)
            : $this->getStandardTemplatePath($component, $template);

        // Устанавливаем глобальную переменную $arResult для использования в шаблоне
        global $arResult;

        // Проверяем существование компонента
        if (!file_exists($componentPath)) {
            throw new \Exception("Component file not found: " . $componentPath);
        }

        // Подключаем файл компонента
        include $componentPath;

        // Проверяем существование шаблона
        if (!file_exists($templatePath)) {
            // Если кастомный шаблон не найден, ищем стандартный
            $templatePath = $this->getStandardTemplatePath($component, $template);
            if (!file_exists($templatePath)) {
                throw new \Exception("Template file not found: " . $templatePath);
            }
        }

        // Подключаем файл шаблона
        include $templatePath;

        // Получаем содержимое буфера
        $output = ob_get_clean();

        // Путь к файлу стилей компонента
        $stylesPath = dirname($templatePath) . "/style.css";

        // Путь к общему файлу стилей
        $commonStylesPath = $this->getCommonStylesPath($switch_env_variable);

        // Если файл стилей компонента существует, получаем его содержимое
        $styles = file_exists($stylesPath) ? file_get_contents($stylesPath) : '';

        // Если общий файл стилей существует, добавляем его содержимое
        $commonStyles = file_exists($commonStylesPath) ? file_get_contents($commonStylesPath) : '';

        // Вставляем стили в <head>
        $output = $this->insertStylesInHead($output, $styles . $commonStyles);

        // Выводим конечный результат
        echo $output;
    }

    private function getComponentPath(string $component): string
    {
        return $this->getDocumentRoot() . "/components/{$component}/component.php";
    }

    private function getCustomTemplatePath(string $component, string $template, string $switch_env_variable): string
    {
        return $this->getDocumentRoot() . "/templates/{$switch_env_variable}/components/{$component}/templates/{$template}/template.php";
    }

    private function getStandardTemplatePath(string $component, string $template): string
    {
        return $this->getDocumentRoot() . "/components/{$component}/templates/{$template}/template.php";
    }

    public function getDocumentRoot(): string
    {
        return $_SERVER["DOCUMENT_ROOT"];
    }

    // Новый метод для получения пути к общему файлу стилей
    private function getCommonStylesPath(string $switch_env_variable): string
    {
        return $this->getDocumentRoot() . "/templates/{$switch_env_variable}/css/main.css";
    }

    public function insertStylesInHead(string $html, string $styles): string
    {
        if (!empty($styles)) {
            if (strpos($html, '</head>') !== false) {
                $html = str_replace('</head>', "<style>{$styles}</style></head>", $html);
            } elseif (strpos($html, '<body>') !== false) {
                $html = str_replace('<body>', "<style>{$styles}</style><body>", $html);
            } else {
                $html = "<style>{$styles}</style>" . $html;
            }
        }
        return $html;
    }

    public function processHeader(string $templateName, string $styles, $arParams): void
    {
        $documentRoot = $this->getDocumentRoot();
        $arResult = $arParams;
        $switch_env_variable = trim(Config::getInstance()->getEnv("CUSTOM_TEMPLATE"));
        // Путь к header.php
        $headerPath = "{$documentRoot}/templates/{$switch_env_variable}/header.php";
        if (file_exists($headerPath)) {
            ob_start();
            include $headerPath;
            $headerContent = ob_get_clean();
            $output = $this->insertStylesInHead($headerContent, $styles);
        } else {
            throw new \Exception("Header file not found: " . $headerPath);
        }

        echo $output;
    }

    public function processFooter(string $templateName, string $styles, $arParams): void
    {
        $documentRoot = $this->getDocumentRoot();
        $arResult = $arParams;
        $switch_env_variable = trim(Config::getInstance()->getEnv("CUSTOM_TEMPLATE"));
        $output = '';
        $footerPath = "{$documentRoot}/templates/{$switch_env_variable}/footer.php";
        if (file_exists($footerPath)) {
            ob_start();
            include $footerPath;
            $footerContent = ob_get_clean();
            $output .= $footerContent;
        } else {
            throw new \Exception("Footer file not found: " . $footerPath);
        }

        echo $output;
    }
}
