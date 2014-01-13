<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 13.01.14
 * Time: 11:24
 */

namespace EnliteRussellInterpreter;


use EnliteRussellInterpreter\Options\InterpreterOptions;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class InterpreterAbstractFactory implements AbstractFactoryInterface
{

    /**
     * @var array
     */
    protected $config;

    /**
     * Configuration key for cache objects
     *
     * @var string
     */
    protected $configKey = 'EnliteRussellInterpreters';

    /**
     * Retrieve cache configuration, if any
     *
     * @param  ServiceLocatorInterface $services
     * @return array
     */
    protected function getConfig(ServiceLocatorInterface $services)
    {
        if ($this->config !== null) {
            return $this->config;
        }

        if (!$services->has('Config')) {
            $this->config = array();
            return $this->config;
        }

        $config = $services->get('Config');
        if (!isset($config[$this->configKey])) {
            $this->config = array();
            return $this->config;
        }

        $this->config = $config[$this->configKey];
        return $this->config;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @param $requestName
     * @return InterpreterOptions
     */
    protected function getOptions(ServiceLocatorInterface $serviceLocator, $requestName)
    {
        $config = $this->getConfig($serviceLocator);
        return new InterpreterOptions($config[$requestName]);
    }

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $config = $this->getConfig($serviceLocator);
        if (empty($config)) {
            return false;
        }

        return (isset($config[$requestedName]) && is_array($config[$requestedName]));
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        // TODO: Implement createServiceWithName() method.
    }
}