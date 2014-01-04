<?php
namespace Rawebone\ViewModel\Engines;

use Twig_Environment;
use Rawebone\ViewModel\ViewEngineInterface;
use Rawebone\ViewModel\ViewModelInterface;

/**
 * Adapter to allow rendering View Models against Mustache.
 */
class TwigEngine implements ViewEngineInterface
{
    protected $engine;
    protected $asFile;
    
    public function __construct(Twig_Environment $engine, $renderFile = true)
    {
        $this->engine = $engine;
        $this->asFile = $renderFile;
    }
    
    public function render(ViewModelInterface $vm)
    {
        $tmpl = ($this->asFile ? $vm->getTemplateFile() : $vm->getTemplateContents());
        return $this->engine->render($tmpl, array("model" => $vm));
    }
    
    /**
     * @return \Twig_Environment
     */
    public function engine()
    {
        return $this->engine;
    }
}
