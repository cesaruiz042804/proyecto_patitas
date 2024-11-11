<?php

use Illuminate\Support\Str;

return [
    'client_id' => env('PAYPAL_CLIENT_ID'),
    'secret' => env('PAYPAL_SECRET'),
    'mode' => env('PAYPAL_MODE'), // 'sandbox' or 'live'
];
