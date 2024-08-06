<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OpenAi;
use Illuminate\Support\Facades\Http;

class LanguageSherpaController extends Controller
{
    public function index()
    {
        return view('language-sherpa.index');
    }

    public function show(Request $request)
    {
        $key = getenv('OPEN_AI_API_KEY');
        $client = OpenAI::client($key);

        $maxRetries = 5;
        $retries = 0;
        $messages = [];
        $words = [];

        $language = $request->input('language');
        $topic = $request->input('topic');

        do {
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user',
                        'content' => "You are an AI language learning assistant called Language Sherpa. Please generate 3
                         advanced-level vocabulary words in" . $language . "
                         that are about the topic of " . $topic . " Include an explanation of the word,
                         and an example in the target language. Only provide a RFC8259 compliant
                         JSON response, following this format without deviation:
                         [{
                         'word': 'café',
                         'explanation': 'In French, café primarily refers to coffee, the popular beverage made from roasted
                         coffee beans. It can also refer to a place where coffee and other refreshments are served, similar
                         to a coffee shop or coffee house.',
                         'example': 'Les cafés sont d'excellents endroits pour avoir une réunion en raison de l'atmosphère décontractée.'
                         }]"
                        ],
                ],
            ]);

            foreach($response->choices as $result) {
                $decodedMessage = json_decode($result->message->content, true);
                if (is_array($decodedMessage)) {
                    $messages = array_merge($messages, $decodedMessage);
                    $words = array_column($messages, 'word');
                    break; // Exit the loop if successful
                }
            }

            foreach($messages as &$message) {
                $audioWordPath = $this->textToSpeech($message['word']);
                $audioExamplePath = $this->textToSpeech($message['example']);

                $message['word_audio'] = $audioWordPath;
                $message['example_audio'] = $audioExamplePath;
            }

            $retries++;
        } while (empty($messages) && $retries < $maxRetries);

        if (empty($messages)) {
            // Handle the error here, such as logging or returning a default value
        }

        return view('language-sherpa.show', compact('messages', 'topic', 'language', 'words'));
    }

    public function test(Request $request)
    {
        $key = getenv('OPEN_AI_API_KEY');
        $client = OpenAI::client($key);

        $maxRetries = 5;
        $retries = 0;
        $words = json_decode($request->words);
        $messages = [];

        $language = $request->language;
        $topic = $request->topic;

        do {
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user',
                        'content' => "You are an AI language learning assistant called Language Sherpa helping a student
                         learn" . $language . "Generate an advanced-level 12 question fill-in the blank" . $language
                            . "exercise in a narrative form testing these 3 words: " . implode(", ", $words) .
                        "There should be 4 blanks for each word, 12 blanks in total. The topic of the generated text should be " . $topic .
                        " Every blank should be in the form of four underscores in a row, i.e. ____. Then below the text, provide the
                         answers in a list beginning with Answers:"
                    ],
                ],
            ]);

            foreach($response->choices as $result) {
                $content = $result->message->content;

                // Find the position of "Answers:"
                $position = strpos($content, "Answers:");

                // Extract the paragraph
                $paragraph = substr($content, 0, $position);

                // Extract and parse the answers
                $answersString = substr($content, $position + strlen("Answers:"));
                $correctAnswers = explode("\n", trim($answersString));

                $counter = 1;

                $tests[] = preg_replace_callback('/____/', function($matches) use (&$counter) {
                    return '<input type="text" id="blank' . $counter++ . '" name="testAnswers[]" class="text-center rounded-md
                    border-0 py-1.5 my-1 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                    focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">';
                }, $paragraph);
            }

            $retries++;
        } while (empty($tests) && $retries < $maxRetries);

        if (empty($tests)) {
            // Handle the error here, such as logging or returning a default value
        }

        return view ('language-sherpa.test', compact('tests', 'correctAnswers'));
    }

    public function textToSpeech($text)
    {
        $voiceId = 'XB0fDUnXU5powFXDhCwa';
//        $maleVoiceId = 'zcAOhNBS3c14rBihAFp1';
        $url = "https://api.elevenlabs.io/v1/text-to-speech/" . $voiceId;
        $headers = [
            "Accept" => "audio/mpeg",
            "Content-Type" => "application/json",
            "xi-api-key" => 'ac6e18bf678449cb7e3c25c54d210f8f'
        ];

        $body = [
            "text" => $text,
            "voice_id" => $voiceId,
            "model_id" => "eleven_monolingual_v1", // You can specify the model if needed
            // Add other voice settings if needed
        ];

        $response = Http::withHeaders($headers)->post($url, $body);

        if ($response->successful()) {
            // Get the audio content
            $audioContent = $response->body();

            // Generate a unique filename
            $filename = 'audio/audio_' . uniqid() . '.mp3';

            // Use Laravel's storage facade to store the file
            Storage::put($filename, $audioContent);

            // Return the path to the stored file
            return $filename;
        } else {
            // Handle error
            return null;
        }
    }
}
