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
            'not_equal' => 'RussellInterpreter\Extension\NotEqual',
            'conditional_operator' => 'RussellInterpreter\Extension\ConditionalOperator',
            'conjunction' => 'RussellInterpreter\Extension\Conjunction',
            'disjunction' => 'RussellInterpreter\Extension\Disjunction',
            'negation' => 'RussellInterpreter\Extension\Negation',
            'plural' => 'RussellInterpreter\Extension\Plural',
            'concatenation' => 'RussellInterpreter\Extension\Concatenation',
            'greater' => 'RussellInterpreter\Extension\Greater',
            'greater_or_equal' => 'RussellInterpreter\Extension\Greaterorequal',
            'less' => 'RussellInterpreter\Extension\Less',
            'less_or_equal' => 'RussellInterpreter\Extension\Lessorequal',
            'modulo' => 'RussellInterpreter\Extension\Modulo',
            'random_argument' => 'RussellInterpreter\Extension\RandomArgument',
            'square_root' => 'RussellInterpreter\Extension\SquareRoot',
            'exponential' => 'RussellInterpreter\Extension\Exponential',

        )
    )
);