<?php
namespace Rawebone\ViewModel\Tests\Engines;

use Rawebone\ViewModel\Tests\TestCase;
use Rawebone\ViewModel\Tests\Fixtures\BasicViewModel;
use Rawebone\ViewModel\Engines\BasicPhpEngine;

class BasicPhpEngineTest extends TestCase
{
    public function testAsFile()
    {
        $vm = new BasicViewModel("hello");
        $engine = new BasicPhpEngine();
        
        $this->assertEquals("test", $engine->render($vm));
    }
}
