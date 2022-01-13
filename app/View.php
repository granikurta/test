<?php

namespace app;

class View
{
    private $template;

    private $params;
    private $mainTemplate;

    public function __construct($template, $params = [], $mainTemplate = 'template')
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
        $mainTemplate = $this->renderMainTemplate();
        echo str_replace('{{content}}', $template, $mainTemplate);
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
        include_once LAYOUT_PATH . $this->mainTemplate . '.php';
        return ob_get_clean();
    }
}