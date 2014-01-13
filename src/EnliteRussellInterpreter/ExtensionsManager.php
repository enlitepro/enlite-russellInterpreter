<?php
/**
 * The extensions manager
 *
 * @category   Manager
 * @package    EnliteRussellInterpreter
 * @author     Vladimir Struts <Sysaninster@gmail.com>
 * @license    LICENSE.txt
 * @date       13.01.14
 */

namespace EnliteRussellInterpreter;


use EnliteRussellInterpreter\Exception\RuntimeException;
use RussellInterpreter\ExtensionInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

class ExtensionsManager extends AbstractPluginManager
{

    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws RuntimeException if invalid
     */
    public function validatePlugin($plugin)
    {
        if (! $plugin instanceof ExtensionInterface) {
            throw new RuntimeException('Plugin must be instance of ExtensionInterface');
        }
    }

}