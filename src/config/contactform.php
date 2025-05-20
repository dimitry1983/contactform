<?php

return [

    'register_routes' => false,

    // Ontvanger van het contactformulier
    'recipient_email' => env('CONTACTFORM_RECIPIENT', 'info@example.com'),

    // Route prefix voor de contactroutes
    'route_prefix' => 'contact',

    // View component override key
    'component_name' => 'contact-form',

    'use_turnstile' => env('TURNSTILE_ENABLED', true),


];
