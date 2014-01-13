<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'EnliteRussellInterpreterExtensionsManager' => 'EnliteRussellInterpreter\ExtensionsManager',
        ),
        'invokables' => array(
            
        ),
        'abstract_factories' => [
            'EnliteRussellInterpreterAbstractFactory' => 'EnliteRussellInterpreter\InterpreterAbstractFactory'
        ],
    ),
    'EnliteRussellInterpreterExtensionsManager' => [
        'invokables' => array(
            'assignment' => 'RussellInterpreter\Extension\Assignment',
            'summation' => 'RussellInterpreter\Extension\Summation',
            'subtraction' => 'RussellInterpreter\Extension\Subtraction',
            'division' => 'RussellInterpreter\Extension\Division',
            'multiplication' => 'RussellInterpreter\Extension\Multiplication',
            'random' => 'RussellInterpreter\Extension\Random',
            'array' => 'RussellInterpreter\Extension\Arr',
        )
    ]
);