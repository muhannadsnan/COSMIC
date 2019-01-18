<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   

    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['*'], // ex: ['GET', 'POST', 'PUT',  'DELETE']
    // 'allowedHeaders' => ['Accept, Authorization, Content-Type, X-Requested-With, X-CSRF-TOKEN'],
    // 'allowedMethods' => ['GET,POST,PUT,DELETE,OPTIONS'], 
    'exposedHeaders' => [],
    'maxAge' => 0,

];
