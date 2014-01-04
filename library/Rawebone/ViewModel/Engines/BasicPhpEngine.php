<?php
namespace Rawebone\ViewModel\Engines;

use Rawebone\ViewModel\ViewEngineInterface;
use Rawebone\ViewModel\ViewModelInterface;

class BasicPhpEngine implements ViewEngineInterface
{
    public function engine()
    {
        return null;
    }

    public function render(ViewModelInterface $vm)
    {
        return $this->doRender($vm->getTemplateFile(), $vm);
    }
    
    protected function doRender($file, $model)
    {
        ob_start();
        include $file;
        return ob_get_clean();
    }
}
