<?php
namespace Rawebone\ViewModel\Tests\Engines;

use Rawebone\ViewModel\Tests\TestCase;
use Rawebone\ViewModel\Tests\Fixtures\BasicViewModel;
use Rawebone\ViewModel\Engines\PhlyMustacheEngine;
use Mockery as m;

class PhlyMustacheEngineTest extends TestCase
{
    public function testAsFile()
    {
        $vm = new BasicViewModel("hello");
        $engine = new PhlyMustacheEngine($m = $this->getEngineMock(), true);
        
        $m->shouldReceive("render")
          ->with($vm->getTemplateFile() . ".mustache", array("model" => $vm));
                
        $engine->render($vm);
    }
    
    public function testNotFile()
    {
        $vm = new BasicViewModel("hello");
        $engine = new PhlyMustacheEngine($m = $this->getEngineMock(), false);
        
        $m->shouldReceive("render")
          ->with("test", array("model" => $vm));
                
        $engine->render($vm);
    }
    
    protected function getEngineMock()
    {
        return m::mock("\\Phly\\Mustache\\Mustache");
    }
}
