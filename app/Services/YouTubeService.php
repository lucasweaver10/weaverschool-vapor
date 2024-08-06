<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class YouTubeService
{
    public function getCaptions($videoUrl, $language = 'en')
    {
        // Assuming you have the Python script in the 'scripts' directory
        $process = new Process(['python3', base_path('scripts/fetch_youtube_captions.py'), $videoUrl, $language]);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Fetch and log the output
        $output = $process->getOutput();                

        // Decode the JSON output from the Python script
        $decodedOutput = json_decode($output, true);        

        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Invalid JSON output from tokenizer script: ' . json_last_error_msg());
        }

        // Check if there's an error in the decoded output
        if (isset($decodedOutput['error'])) {
            Log::error('Error from caption script: ' . $decodedOutput['error']);            
            return response()->json(['error' => $decodedOutput['error']], 400);
        }

        // Ensure the response is properly encoded in UTF-8 and does not escape Unicode characters
        return response()->json(['captions' => $decodedOutput['captions']], 200, [], JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);        
    }

    public function tokenizeCaptions($text, $tokenLimit = 14500)
    {
        // Ensure the text is correctly handled as UTF-8
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        // Escape the text argument to safely pass to the Python script
        $escapedText = escapeshellarg($text);

        // Create and run the process
        $process = new Process(['python3', base_path('scripts/tokenizer.py'), $escapedText, $tokenLimit]);
        $process->run();

        // Check if the process was successful
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Get and decode the JSON output
        $output = $process->getOutput();
        $result = json_decode($output, true);

        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Invalid JSON output from tokenizer script: ' . json_last_error_msg());
        }

        return $result;
    }
}
