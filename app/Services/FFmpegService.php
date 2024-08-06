<?php

namespace App\Services;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Log;

class FFmpegService
{
    public function validateAudioFile($audioContent)
    {
        $tempFilePath = sys_get_temp_dir() . '/temp_audio.mp3';
        file_put_contents($tempFilePath, $audioContent);

        $process = new Process(['ffmpeg', '-v', 'error', '-i', $tempFilePath, '-f', 'null', '-']);
        $process->run();

        if (!$process->isSuccessful()) {
            $errorOutput = $process->getErrorOutput();
            Log::error('FFmpeg error: ' . $errorOutput);
            return false;
        }

        return true;
    }
}