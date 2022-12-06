<?php

return [
    'environment' => env('ETA_ENVIRONMENT', 'preprod'),

    'client_id' => env('ETA_CLIENT_ID'),

    'client_secret' => env('ETA_CLIENT_SECRET'),

    'invoices_adapter' => env('ETA_INVOICES_ADAPTER', 'retail_pro'),

    'drivers' => [
        'retail_pro' => [
            'baseURL' => env('RETAIL_PRO_BASE_URL', 'http://localhost'),
            'username' => env('RETAIL_PRO_USERNAME', 'sysadmin'),
            'password' => env('RETAIL_PRO_PASSWORD', 'sysadmin'),
        ],
    ],
];
