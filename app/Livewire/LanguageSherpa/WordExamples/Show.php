<?php

namespace App\Livewire\LanguageSherpa\WordExamples;

use App\Models\TextToSpeech;
use Livewire\Component;
use OpenAI;

class Show extends Component
{
    public $word;
    public $topic;
    public $example;
    public $language;
    public $exampleIndex;
    public $exampleAudioSrc;
    public $messages = [];
    public $maxRetries = 5;
    public $retries = 0;

    public function getNewExample()
    {
        $key = getenv('OPEN_AI_API_KEY');
        $client = OpenAI::client($key);

        do {
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user',
                        'content' => "You are an AI language learning assistant called Language Sherpa. Please generate a new
                             example of the word " . $this->word . "
                             in the target language " . $this->language .  " related to the topic of " . $this->topic . " Make it
                             different from this example you just gave: " . $this->example . " that you just gave previously.
                             Only provide a RFC8259 compliant JSON response, following this format without deviation:
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
                    $messages = array_merge($this->messages, $decodedMessage);
                    $this->example = $messages[0]['example'];
                    $this->exampleAudioSrc = TextToSpeech::convertTextToSpeech($this->example);
                    break; // Exit the loop if successful
                }

                $this->retries++;
            }

        } while (empty($messages) && $this->retries < $this->maxRetries);
        if (empty($this->messages)) {
            // Handle the error here, such as logging or returning a default value
        }

    }

    public function render()
    {
        return view('livewire.language-sherpa.word-examples.show');
    }
}
