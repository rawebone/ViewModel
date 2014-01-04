<?php
namespace Rawebone\ViewModel;

abstract class AbstractViewModel implements ViewModelInterface
{
    public function getTemplateFile()
    {
        $rc = new \ReflectionClass($this);
        return dirname($rc->getFileName()) . "/" . $this->getTemplateName() . ".view";
    }

    public function getTemplateName()
    {
        $rc = new \ReflectionClass($this);
        return $rc->getShortName();
    }
}
