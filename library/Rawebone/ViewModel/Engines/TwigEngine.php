<?php
namespace Rawebone\ViewModel\Engines;

use Twig_Environment;
use Rawebone\ViewModel\ViewEngineInterface;
use Rawebone\ViewModel\ViewModelInterface;

/**
 * Adapter to allow rendering View Models against Twig.
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
        $tmpl = ($this->asFile ? $vm->getTemplateFile() . ".twig" : $this->contents($vm));
        return $this->engine->render($tmpl, array("model" => $vm));
    }
    
    /**
     * @return \Twig_Environment
     */
    public function engine()
    {
        return $this->engine;
    }
        
    protected function contents(ViewModelInterface $vm)
    {
        return file_get_contents($vm->getTemplateFile() . ".twig");
    }
}
