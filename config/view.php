<?php

return [
    'cache'=> false,

    'paths' => [
        resource_path('views'),
    ],


    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
