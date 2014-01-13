<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'EnliteRussellInterpreterExtensionsManager' => 'EnliteRussellInterpreter\ExtensionsManagerFactory'
        ),
        'invokables' => array(
            
        ),
        'abstract_factories' => array(
            'EnliteRussellInterpreterAbstractFactory' => 'EnliteRussellInterpreter\InterpreterAbstractFactory'
        )
    ),
    'EnliteRussellInterpreterExtensionsManager' => array(
        'invokables' => array(
            'assignment' => 'RussellInterpreter\Extension\Assignment',
            'summation' => 'RussellInterpreter\Extension\Summation',
            'subtraction' => 'RussellInterpreter\Extension\Subtraction',
            'division' => 'RussellInterpreter\Extension\Division',
            'multiplication' => 'RussellInterpreter\Extension\Multiplication',
            'random' => 'RussellInterpreter\Extension\Random',
            'array' => 'RussellInterpreter\Extension\Arr'
        )
    )
);