<?php

namespace App\Http\Controllers;

use Vimeo\Vimeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\VideoActivityTracking;

class VideoActivityTrackingController extends Controller
{
    public function started(Request $request)
    {
        // Initialize the Vimeo PHP SDK
        $client = new Vimeo(
            config('services.vimeo.client_id'),
            config('services.vimeo.client_secret'),
            config('services.vimeo.access_token')
        );

        $videoId = $request->input('videoId');
        $userId = $request->input('userId');

        VideoActivityTracking::create([
            'lesson_video_id' => $videoId,
            'user_id' => $userId,
            'action' => 'started',
        ]);


        return response('OK', 200);
    }

    public function completed(Request $request)
    {
        // Initialize the Vimeo PHP SDK
        $client = new Vimeo(
            config('services.vimeo.client_id'),
            config('services.vimeo.client_secret'),
            config('services.vimeo.access_token')
        );

        $videoId = $request->input('videoId');
        $userId = $request->input('userId');

        VideoActivityTracking::create([
            'lesson_video_id' => $videoId,
            'user_id' => $userId,
            'action' => 'completed',
        ]);
        return response('OK', 200);
    }
}
