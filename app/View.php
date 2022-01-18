<?php

namespace app;

class View
{
    private string $template;

    private array $params;
    private bool $mainTemplate;
    private string $mainTemplateFile = 'template';

    public function __construct($template, $params = [], $mainTemplate = True)
    {
        $this->template = $template;
        $this->params = $params;
        $this->mainTemplate = $mainTemplate;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    public function render()
    {
        $template = $this->renderTemplate();
        if ($this->mainTemplate) {
            $mainTemplate = $this->renderMainTemplate();
        }
        echo str_replace('{{content}}', $template, $mainTemplate);
        exit;
    }

    private function renderTemplate()
    {
        extract($this->params);
        ob_start();
        include_once LAYOUT_PATH . $this->template . '.php';
        return ob_get_clean();
    }

    private function renderMainTemplate()
    {
        ob_start();
        include_once LAYOUT_PATH . $this->mainTemplateFile . '.php';
        return ob_get_clean();
    }
}