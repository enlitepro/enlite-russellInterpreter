<?php

namespace EnliteRussellInterpreter\Options;

use Zend\Stdlib\AbstractOptions;

class InterpreterOptions extends AbstractOptions
{

    /**
     * The useDefaultExtensions
     *
     * @var bool
     */
    protected $useDefaultExtensions = true;

    /**
     * The extensions
     * [nameInExtensionsManager => [synonym1, synonym2]]
     *
     * @var array
     */
    protected $extensions = [];

    /**
     * @param boolean $useDefaultExtensions
     */
    public function setUseDefaultExtensions($useDefaultExtensions)
    {
        $this->useDefaultExtensions = $useDefaultExtensions;
    }

    /**
     * @return boolean
     */
    public function getUseDefaultExtensions()
    {
        return $this->useDefaultExtensions;
    }

    /**
     * @param array $extensions
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @return array
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}
