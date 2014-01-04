<?php
namespace Rawebone\ViewModel\Tests\MetaData\Providers;

use Rawebone\ViewModel\MetaData\Providers\ZeptechMetaDataProvider;
use Rawebone\ViewModel\Tests\Fixtures\BasicViewModel;
use Rawebone\ViewModel\Tests\TestCase;

class ZeptechMetaDataProviderTest extends TestCase
{
    public function testCollate()
    {
        $provider = new ZeptechMetaDataProvider();
        $collation = $provider->collateFor(new BasicViewModel("hello"));
        
        $this->assertCount(2, $collation);
        
        $property = $collation[0];
        $this->assertEquals(true, $property->isProperty());
        $this->assertEquals("lower", $property->name());
        $this->assertEquals("hello", $property->example());
        $this->assertEquals("string", $property->returnType());
        
        $method = $collation[1];
        $this->assertEquals(true, $method->isMethod());
        $this->assertEquals("upper", $method->name());
        $this->assertEquals("HELLO", $method->example());
        $this->assertEquals("string", $method->returnType());
    }
}
