<?php
namespace Rawebone\ViewModel;

trait ViewModelComposition
{
    public function getTemplateContents()
    {
        return file_get_contents($this->getTemplateFile());
    }

    public function getTemplateFile()
    {
        return __DIR__ . "/" . $this->getTemplateName() . ".view.php";
    }

    public function getTemplateName()
    {
        $rc = new \ReflectionClass($this);
        return $rc->getShortName();
    }
}
