<?php

return [
    'url' => env('TRIPAY_URL', 'https://tripay.co.id/api-sandbox'),
    'api_key' => env('TRIPAY_API_KEY', ''),
    'private_key' => env('TRIPAY_PRIVATE_KEY', ''),
    'expired_time' => env('TRIPAY_EXPIRED_TIME', (time() + (24 * 60 * 60))),
    'merchant_code' => env('TRIPAY_MERCHANT_CODE', ''),
];
