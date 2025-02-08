<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Console Commands
    |--------------------------------------------------------------------------
    |
    | This option allows you to add additional Artisan commands that should
    | be available within the Tinker environment. Once the command is in
    | this array you may execute the command in Tinker using its name.
    |
    */

    'commands' => [
        // App\Console\Commands\ExampleCommand::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Auto Aliased Classes
    |--------------------------------------------------------------------------
    |
    | Tinker will not automatically alias classes in your vendor namespaces
    | but you may explicitly allow a subset of clasUses to get aliased by
    | adding the names of each of those classes to the following list.
    |
    */

    'alias' => [
        "Usuario"   => App\Models\Usuario::class,
        "Tarea"     => App\Models\Tarea::class,
        "Etiqueta"  => App\Models\Etiqueta::class,
    ],

    /*
    'include' => [
        app_path("Models/Usuario.php"),
        app_path("Models/Tarea.php"),
        app_path("Models/Etiqueta.php"),
    ],*/

    /*
    |--------------------------------------------------------------------------
    | Classes That Should Not Be Aliased
    |--------------------------------------------------------------------------
    |
    | Typically, Tinker automatically aliases classes as you require them in
    | Tinker. However, you may wish to never alias certain classes, which
    | you may accomplish by listing the classes in the following array.
    |
    */

    'dont_alias' => [
        'App\Nova',
    ],

];
