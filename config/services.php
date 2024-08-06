<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */    
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'mollie' => [
        'key' => env('MOLLIE_KEY'),
        'webhook_url' => env('MOLLIE_WEBHOOK_URL', '/webhooks/payments/mollie'),
    ],
    'recaptcha' => [
        'secret' => env('RECAPTCHA_SECRET')
    ],
    'openai' => [
        'key' => env('OPEN_AI_API_KEY')
    ],
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'vimeo' => [
        'client_id' => env('VIMEO_CLIENT_ID'),
        'client_secret' => env('VIMEO_CLIENT_SECRET'),
        'access_token' => env('VIMEO_ACCESS_TOKEN'),
    ],    
    'mixpanel' => [
        'token' => env('MIXPANEL_TOKEN'),
    ],
    'elevenlabs' => [
        'api_key' => env('ELEVENLABS_API_KEY'),
    ],
    'google_cloud' => [
        'api_key' => env('GOOGLE_CLOUD_API_KEY'),
    ],
    'google_cloud_text_to_speech' => [
        'api_key' => env('GOOGLE_CLOUD_TEXT_TO_SPEECH_API_KEY'),
    ],
    'google_cloud_text_translation' => [
        'api_key' => env('GOOGLE_CLOUD_TEXT_TRANSLATION_API_KEY'),
    ],
    'azure_speech' => [
        'key' => env('AZURE_SPEECH_KEY'),
        'region' => env('AZURE_SPEECH_REGION'),
        'endpoint' => env('AZURE_SPEECH_ENDPOINT'),
    ],
    'speechsuper' => [
        'api_key' => env('SPEECHSUPER_API_KEY'),
        'secret_key' => env('SPEECHSUPER_SECRET_KEY'),
    ],
    'media' => [
        'disk' => env('MEDIA_DISK', 's3-public'),
        'prefix' => env('MEDIA_PREFIX'),
    ],
    'anthropic' => [
        'api_key' => env('ANTHROPIC_SECRET_KEY'),
    ],
];
