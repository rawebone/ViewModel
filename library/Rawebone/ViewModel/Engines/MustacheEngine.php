<?php
namespace Rawebone\ViewModel\Engines;

use Mustache_Engine;
use Rawebone\ViewModel\ViewEngineInterface;
use Rawebone\ViewModel\ViewModelInterface;

/**
 * Adapter to allow rendering View Models against Mustache.
 */
class MustacheEngine implements ViewEngineInterface
{
    protected $engine;
    protected $asFile;
    
    public function __construct(Mustache_Engine $engine, $renderFile = true)
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
     * @return \Mustache_Engine
     */
    public function engine()
    {
        return $this->engine;
    }
}
