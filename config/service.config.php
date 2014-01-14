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
            'array' => 'RussellInterpreter\Extension\Arr',
            'cycle' => 'RussellInterpreter\Extension\Cycle',
            'until' => 'RussellInterpreter\Extension\Until',
            'true' => 'RussellInterpreter\Extension\True',
            'false' => 'RussellInterpreter\Extension\False',
            'increment' => 'RussellInterpreter\Extension\Increment',
            'decrement' => 'RussellInterpreter\Extension\Decrement',
            'equal' => 'RussellInterpreter\Extension\Equal',
            'notEqual' => 'RussellInterpreter\Extension\NotEqual',
            'conditionalOperator' => 'RussellInterpreter\Extension\ConditionalOperator',
            'conjunction' => 'RussellInterpreter\Extension\Conjunction',
            'disjunction' => 'RussellInterpreter\Extension\Disjunction',
            'negation' => 'RussellInterpreter\Extension\Negation',

        )
    )
);