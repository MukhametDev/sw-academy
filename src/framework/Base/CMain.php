<?php

namespace Framework;

class CMain
{
    public function includeComponent(string $component, string $template = ".default", array $arParams = [])
    {
        ob_start();
        include $this->getPathComponent($component) . "/component.php";
        include $this->getPathTemplate($component, $template) . "/template.php";
        $output = ob_get_clean();
        $styles = file_get_contents($this->getPathTemplate($component, $template) . "/style.css");
        $output = $this->insertStylesInHead($output, $styles);
        echo $output;
    }

    public function getPathComponent(string $component)
    {
        return $this->getDocumentRoot() . "/components/{$component}";
    }

    public function getPathTemplate(string $component, string $template)
    {
        return $this->getPathComponent($component) . "/templates/{$template}";
    }

    public function getDocumentRoot(): string
    {
        return $_SERVER["DOCUMENT_ROOT"];
    }

    public function insertStylesInHead(string $html, string $styles): string
    {
        if (strpos($html, '<head>') !== false) {
            $html = str_replace('<head>', "<head><style>{$styles}</style>", $html);
        } else {
            $html = "<style>{$styles}</style>" . $html;
        }
        return $html;
    }
}
