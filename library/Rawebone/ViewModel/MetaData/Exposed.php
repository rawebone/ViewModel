<?php
namespace Rawebone\ViewModel\MetaData;

/**
 * Immutable encapsulation of information about a method or property
 * exposed to the ViewEngine by a ViewModel.
 */
class Exposed
{
    const TYPE_PROPERTY = 1;
    const TYPE_METHOD   = 2;
    
    protected $type;
    protected $name;
    protected $returns;
    protected $example;
    
    public function __construct($type, $name, $returnType, $example)
    {
        $this->type = $type;
        $this->name = $name;
        $this->return = $returnType;
        $this->example = $example;
    }
    
    public function type()
    {
        return $this->type;
    }
    
    public function name()
    {
        return $this->name;
    }
    
    public function returnType()
    {
        return $this->returns;
    }
    
    public function example()
    {
        return $this->example;
    }
}
