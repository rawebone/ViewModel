<?php
namespace Rawebone\ViewModel\Tests;

class AbstractViewModelTest extends TestCase
{
    public function testName()
    {
        $vm = $this->getVM();
        $this->assertEquals("BasicViewModel", $vm->getTemplateName());
    }
    
    public function testFileName()
    {
        $vm = $this->getVM();
        $this->assertEquals(__DIR__ . "/Fixtures/BasicViewModel.view", $vm->getTemplateFile());
    }
    
    /**
     * @return \Rawebone\ViewModel\Tests\Fixtures\BasicViewModel
     */
    protected function getVM()
    {
        return new Fixtures\BasicViewModel("hello");
    }
}
