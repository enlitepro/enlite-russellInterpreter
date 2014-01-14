enlite-russellInterpreter-
==========================

The ZF2 module for the module RussellInterpreter (https://github.com/enlitepro/russell-interpreter)

INSTALL
=======

1. The recommended way to install is through composer.

```json
{
    "require": {
        "enlitepro/enlite-russellInterpreter": "1.0.*"
    }
}
```

2. Add `EnliteRussellInterpreter` to your `config/application.config.php` to enable module.

3. Register interpreter in `InterpreterAbstractFactory`:

```php
'EnliteRussellInterpreters' => [
        'youInterpreter' => [
            'use_default_extensions' => true,
            'extensions' => [
                'myFavoriteFunction' => ['synonym1', 'synonym2']
            ]
        ]
    ],
```

USAGE
=====

New functions you must register in `ExtensionsManager` in `EnliteRussellInterpreterExtensionsManager` section:

```php
'EnliteRussellInterpreterExtensionsManager' => array(
        'invokables' => array(
            'myFavoriteFunction' => 'MyModule\Extension\MyFavoriteFunction',
        )
    )
```