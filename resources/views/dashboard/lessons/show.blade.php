<x-layouts.dashboard.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
    {{ $lesson->name }}
</x-slot>
<x-slot name="content">
    <div style="padding:56.25% 0 0 0;position:relative;">
        <iframe src="https://player.vimeo.com/video/{{ $lesson->videos->where('type', 'main')->firstOrFail()->vimeo_video_id ?? '' }}?badge=0&amp;autopause=0&amp;quality_selector=1&amp;player_id=0&amp;app_id=58479"
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"
                title="{{ $lesson->videos->where('type', 'main')->firstOrFail()->name  ?? '' }} online course lesson video">
        </iframe>
    </div>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        var iframe = document.querySelector('iframe');
        var player = new Vimeo.Player(iframe);

        player.on('play', function() {

        // Send a request to your Laravel route to record the completion event
        fetch('/api/video-started', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({
            videoId: {{ $lesson->videos->where('type', 'main')->firstOrFail()->id ?? '' }}, // replace with the ID of the video being watched
            userId: {{ session('id') }}, // replace with the ID of the current user
            })
        })
        .then(response => {
            if (!response.ok) {
            throw new Error('Failed to record video starting');
            }
        })
        .catch(error => {
            console.error(error);
        });

        });

        player.on('ended', function() {

        // Send a request to your Laravel route to record the completion event
        fetch('/api/video-completed', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({
            videoId: {{ $lesson->videos->where('type', 'main')->firstOrFail()->id ?? '' }}, // replace with the ID of the video being watched
            userId: {{ session('id') }}, // replace with the ID of the current user
            })
        })
        .then(response => {
            if (!response.ok) {
            throw new Error('Failed to record video completion');
            }
        })
        .catch(error => {
            console.error(error);
        });

        });
    </script>
</x-slot>
</x-layouts.dashboard.lessons.show >
