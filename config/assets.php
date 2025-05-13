<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Asset URL Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration determines the base URL for all assets in your
    | application. This includes images, CSS, JavaScript, and other
    | files that are served through the public directory.
    |
    */

    'url' => env('ASSET_URL', 'http://127.0.0.1:8000'),

    /*
    |--------------------------------------------------------------------------
    | Storage URL Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration determines the base URL for all files stored
    | in your application's storage directory.
    |
    */

    'storage_url' => env('STORAGE_URL', 'http://127.0.0.1:8000/storage'),
]; 