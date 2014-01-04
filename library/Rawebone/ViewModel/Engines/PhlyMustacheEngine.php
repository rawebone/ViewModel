<?php
namespace Rawebone\ViewModel\Engines;

use Phly\Mustache\Mustache;
use Rawebone\ViewModel\ViewEngineInterface;
use Rawebone\ViewModel\ViewModelInterface;

/**
 * Adapter to allow rendering View Models against Phly\Mustache.
 */
class PhlyMustacheEngine implements ViewEngineInterface
{
    protected $engine;
    protected $asFile;
    
    public function __construct(Mustache $engine, $renderFile = true)
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
     * @return \Phly\Mustache\Mustache
     */
    public function engine()
    {
        return $this->engine;
    }
}
