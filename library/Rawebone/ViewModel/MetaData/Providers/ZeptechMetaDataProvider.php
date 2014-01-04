<?php

namespace Rawebone\ViewModel\MetaData\Providers;

use Rawebone\ViewModel\MetaData\MetaDataProviderInterface;
use Rawebone\ViewModel\ViewModelInterface;
use Rawebone\ViewModel\MetaData\Exposed;
use zpt\anno\Annotations;

class ZeptechMetaDataProvider implements MetaDataProviderInterface
{
    /**
     * @param \Rawebone\ViewModel\ViewModelInterface $vm
     * @return array|\Rawebone\ViewModel\MetaData\Exposed
     */
    public function collateFor(ViewModelInterface $vm) {
        $graph = array();
        $rc = new \ReflectionClass($vm);
        $this->getExposedProperties($graph, $rc);
        $this->getExposedMethods($graph, $rc);
        return $graph;
    }

    protected function getExposedProperties(array &$graph, \ReflectionClass $rc) {
        foreach ($rc->getProperties(\ReflectionProperty::IS_PUBLIC) as $prop) {
            if (($exposed = $this->getExposed(Exposed::TYPE_PROPERTY, $prop->getName(), new Annotations($prop)))) {
                $graph[] = $exposed;
            }
        }
    }

    protected function getExposedMethods(array &$graph, \ReflectionClass $rc) {
        foreach ($rc->getMethods(\ReflectionMethod::IS_PUBLIC) as $meth) {
            if (($exposed = $this->getExposed(Exposed::TYPE_METHOD, $meth->getName(), new Annotations($meth)))) {
                $graph[] = $exposed;
            }
        }
    }

    protected function getExposed($type, $name, Annotations $anno) 
    {
        if (!$anno->hasAnnotation("vmExpose")) {
            return null;
        }
        
        $return = ($anno->hasAnnotation("vmReturn") ? $anno["vmReturn"] : null);
        $example = ($anno->hasAnnotation("vmExample") ? $anno["vmExample"] : null);
        
        return new Exposed($type, $name, $return, $example);
    }
}
