<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AnthropicService
{
    protected $client;
    protected $key;
    protected $baseUrl = 'https://api.anthropic.com/v1/';

    public function __construct()
    {
        $this->key = config('services.anthropic.api_key');
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-API-Key' => $this->key,
            ],
        ]);    
    }

    public function sendMessage($content, $systemPrompt = '', $options = [])
    {
        $defaultOptions = [
            'model' => 'claude-3-5-sonnet-20240620',
            'max_tokens' => 1000,
            'temperature' => 0.7,
        ];

        $options = array_merge($defaultOptions, $options);

        $messages = [];
        if (!empty($systemPrompt)) {
            $messages[] = ['role' => 'system', 'content' => $systemPrompt];
        }
        $messages[] = ['role' => 'user', 'content' => $content];

        try {
            $response = $this->client->post('messages', [
                'json' => [
                    'model' => $options['model'],
                    'max_tokens' => $options['max_tokens'],
                    'messages' => $messages,
                    'temperature' => $options['temperature'],
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            return $result['content'][0]['text'];
        } catch (Exception $e) {
            Log::error('Anthropic API Error: ' . $e->getMessage());
            throw new Exception('Failed to send message to Anthropic API: ' . $e->getMessage());
        }
    }

}