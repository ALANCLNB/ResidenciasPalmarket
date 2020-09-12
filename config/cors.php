<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'],

    'allowed_methods' => ['*','POST','GET'],

    'allowed_origins' => ['*','https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*','Access-Control-Allow-Origin', 'X-CSRF-TOKEN', 'Content-Type', 'X-Requested-With'],

    'exposed_headers' => ['*'],//default vacio

    'max_age' => 0,

    'supports_credentials' => false,

];
