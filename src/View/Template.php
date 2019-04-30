<?php

namespace App\View;

class Template
{
    private $tags = [];
    private $template;

    public function __construct($templateFile)
    {
        $this->template = $this->getTemplateFile($templateFile);

        if (!$this->template)
        {
            return "Error: Can't load the template file - " . $templateFile;
        }
    }

    public function render()
    {
        $this->replaceTags();

        echo $this->template;
    }

    public function set($tag, $value)
    {
        $this->tags[$tag] = $value;
    }

    public function getTemplateFile($file)
    {
        if (file_exists($file))
        {
            $file = file_get_contents($file);

            return $file;
        } else {

            return false;
        }
    }

    private function replaceTags()
    {
        foreach ($this->tags as $tag => $value) {
            $this->template = str_replace('{'.$tag.'}', $value, $this->template);
        }

        return true;
    }

}