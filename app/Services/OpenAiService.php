<?php

namespace App\Services;

use OpenAI;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class OpenAIService
{
    protected $client;
    protected $key;

    public function __construct()
    {        
        $this->key = config('services.openai.key');
        $this->client = OpenAI::client($this->key);
    }

    public function generateTextResponse($prompt, $model = 'gpt-4o')
    {
        try {
            $response = $this->client->chat()->create([
                'model' => $model,                
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => 0.1,
            ]);

            return $response->choices[0]->message->content;
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            return __('Error processing your request. Please try again later.');
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function generateArrayResponse($prompt, $model = 'gpt-4o')
    {
        try {
            $response = $this->client->chat()->create([
                'model' => $model,
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
            ]);

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent) && is_array($responseContent)) {

                    return $responseContent;
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                    return false;
                }
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function generateArrayResponseWithSystemInstructions($userPrompt, $systemPrompt, $model)
    {
        try {
            $response = $this->client->chat()->create([
                'model' => $model,
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $systemPrompt,
                    ],
                    [
                        'role' => 'user',
                        'content' => $userPrompt,
                    ],                    
                ],
                'max_tokens' => 2200,
                'temperature' => 0.1,
            ]);

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent) && is_array($responseContent)) {
                    return $responseContent;
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                    return false;
                }
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }    

    public function generateImageResponse($userPrompt, $image_url, $model)
    {
        Log::error('Reached the generateImageResponse function');
        try {
            $response = $this->client->chat()->create([
                'model' => $model,
                'response_format' => ['type' => 'json_object'],
                'messages' => [
                    [                                                                    
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => $userPrompt
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => $image_url
                                ]
                            ]
                        ]                    
                    ]
                ],
                'max_tokens' => 1500,
                'temperature' => 0.1,
            ]);

            foreach ($response->choices as $result) {
                $responseContent = json_decode($result->message->content, true);
                if (isset($responseContent) && is_array($responseContent)) {

                    return $responseContent;
                } else {
                    // Send the user an error message
                    Log::error('Response from OpenAI does not match array specification', ['response' => $response]);
                    session()->flash('error', __('Error processing your request. Please try again.'));
                    return false;
                }
            }
        } catch (\Exception $e) {
            // Handle and log exception
            Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
            session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function generateEmbedding($input)
    {
        try {
            $response = $this->client->embeddings()->create([
                'model' => 'text-embedding-ada-002',               
                'input' => $input,
            ]);

            // Assuming the API response includes at least one embedding.
            if (!empty($response->embeddings)) {
                // Directly return the first embedding's array.
                return $response->embeddings[0]->embedding;
            }

            return null; // Return null if no embeddings were found.

        } catch (\Exception $e) {
        // Handle and log exception
        Log::error('Error interacting with OpenAI', ['exception' => $e->getMessage()]);
        session()->flash('error', __('Error processing your request. Please try again later.'));
        }
    }

    public function generateImage($prompt)
    {        
        $response = $this->client->images()->create([
            'model' => 'dall-e-3',
            'prompt' => $prompt,
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);


        foreach ($response->data as $data) {
            try {
                return $data->url;
            } catch (Exception $e) {
                // Handle any exceptions
                echo "Error: " . $e->getMessage() . "\n";
            }
        }
    }
}
