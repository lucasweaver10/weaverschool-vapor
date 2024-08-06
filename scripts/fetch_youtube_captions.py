import sys
import json
from youtube_transcript_api import YouTubeTranscriptApi, NoTranscriptFound, TranscriptsDisabled, VideoUnavailable

def get_video_id(url):
    if 'v=' in url:
        return url.split('v=')[1].split('&')[0]
    else:
        return None

def fetch_captions(video_url, language='en'):
    video_id = get_video_id(video_url)
    if not video_id:
        return json.dumps({"error": "Invalid video URL"})

    try:
        # Fetch the available transcripts for the video
        available_transcripts = YouTubeTranscriptApi.list_transcripts(video_id)
        available_languages = [t.language_code for t in available_transcripts]
        print(f"Available languages for captions: {available_languages}", file=sys.stderr)

        # Check if the requested language is available
        if language not in available_languages:
            return json.dumps({"error": f"No transcript available for the video in the language '{language}'."})

        # Fetch the transcript in the requested language
        transcript = available_transcripts.find_transcript([language])
        transcript_text = " ".join([item['text'] for item in transcript.fetch()])
        return json.dumps({"captions": transcript_text}, ensure_ascii=False)

    except NoTranscriptFound:
        return json.dumps({"error": f"No transcript found for the video in the language '{language}'."})
    except TranscriptsDisabled:
        return json.dumps({"error": "Transcripts are disabled for this video."})
    except VideoUnavailable:
        return json.dumps({"error": "The video is unavailable."})
    except Exception as e:
        return json.dumps({"error": f"An error occurred: {str(e)}"})

if __name__ == "__main__":
    video_url = sys.argv[1]
    language = sys.argv[2] if len(sys.argv) > 2 else 'en'
    captions = fetch_captions(video_url, language)
    print(captions)
