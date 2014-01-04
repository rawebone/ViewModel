<?php
namespace Rawebone\ViewModel\MetaData;

use Rawebone\ViewModel\ViewModelInterface;

/**
 * The MetaDataProviderInterface enables the '@vmExpose' documentation
 * tag on properties and methods of a ViewModel to be collated into a graph
 * for documentation output or review.
 * 
 * Supported tags are:
 * 
 * - @vmExpose: the method or property is exposed to the ViewEngine
 * - @vmReturn: the scalar/object type returned
 * - @vmExample: an example of the expected return value
 */
interface MetaDataProviderInterface
{
    /**
     * @return array|\Rawebone\ViewModel\MetaData\Exposed
     */
    function collateFor(ViewModelInterface $vm);
}
