<?php

namespace ManagerBundle\Twig;

use ReflectionClass;
use Twig_Extension;
use Twig_SimpleTest;

class ManagerExtension extends Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getTests()
    {
        return array(
            new Twig_SimpleTest('instanceof', array($this, 'isInstanceOf'))
        );
    }

    public function isInstanceOf($object, $class)
    {
        $reflectionClass = new ReflectionClass($class);
        return $reflectionClass->isInstance($object);
    }
}
