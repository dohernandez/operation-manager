<?php declare(strict_types=1);

namespace ManagerBundle\Twig;

use Twig_Environment;
use Twig_Extension;
use Twig_Function_Node;

class ObjectFieldExtension extends Twig_Extension
{
    public function getFunctions()
    {
        return [
            'getObjectFields' => new Twig_Function_Node(
                'Symfony\Bridge\Twig\Node\SearchAndRenderBlockNode',
                array('is_safe' => array('html'))
            ),
        ];
    }

    /**
     * Initializes the runtime environment.
     *
     * This is where you can load some file that contains filter functions for instance.
     *
     * @deprecated since 1.23 (to be removed in 2.0), implement Twig_Extension_InitRuntimeInterface instead
     */
    public function initRuntime(Twig_Environment $environment)
    {
        // TODO: Implement initRuntime() method.
    }

    /**
     * Returns a list of global variables to add to the existing list.
     *
     * @return array An array of global variables
     *
     * @deprecated since 1.23 (to be removed in 2.0), implement Twig_Extension_GlobalsInterface instead
     */
    public function getGlobals()
    {
        // TODO: Implement getGlobals() method.
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     *
     * @deprecated since 1.26 (to be removed in 2.0), not used anymore internally
     */
    public function getName()
    {
        return 'crud_list_extension';
    }
}
