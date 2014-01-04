<?php
namespace Rawebone\ViewModel\Tests\MetaData;

use Rawebone\ViewModel\MetaData\Exposed;
use Rawebone\ViewModel\Tests\TestCase;

class ExposedTest extends TestCase
{
    public function testBasic()
    {
        $exp = new Exposed(1, 2, 3, 4);
        $this->assertEquals(1, $exp->type());
        $this->assertEquals(2, $exp->name());
        $this->assertEquals(3, $exp->returnType());
        $this->assertEquals(4, $exp->example());
    }
    
    public function testIsProperty()
    {
        $exp = new Exposed(Exposed::TYPE_PROPERTY, 2, 3, 4);
        $this->assertEquals(true, $exp->isProperty());
    }
    
    public function testIsMethod()
    {
        $exp = new Exposed(Exposed::TYPE_METHOD, 2, 3, 4);
        $this->assertEquals(true, $exp->isMethod());
    }
}
