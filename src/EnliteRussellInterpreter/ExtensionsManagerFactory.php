<?php
/**
 * The factory for ExtensionsManager
 *
 * @category   Factory
 * @package    EnliteRussellInterpreter
 * @author     Vladimir Struts <Sysaninster@gmail.com>
 * @license    LICENSE.txt
 * @date       13.01.14
 */

namespace EnliteRussellInterpreter;


use Zend\ServiceManager\Config;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ExtensionsManagerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $managerConfig = new Config(isset($config['EnliteRussellInterpreterExtensionsManager'])
            ? $config['EnliteRussellInterpreterExtensionsManager']
            : []);
        $manager = new ExtensionsManager($managerConfig);

        return $manager;
    }
}