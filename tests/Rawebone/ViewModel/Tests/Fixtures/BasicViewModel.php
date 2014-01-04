<?php
namespace Rawebone\ViewModel\Tests\Fixtures;

use Rawebone\ViewModel\AbstractViewModel;

class BasicViewModel extends AbstractViewModel
{
    /**
     * @vmReturn string
     * @vmExample hello
     * @vmExpose
     */
    public $lower;
    
    protected $value;
    
    public function __construct($value)
    {
        $this->value = $value;
        $this->lower = strtolower($value);
    }
    
    /**
     * @return string
     * @vmReturn string
     * @vmExample HELLO
     * @vmExpose
     */
    public function upper()
    {
        return strtoupper($this->value);
    }
}
