<div>
    <div x-data="{ 
            recording: false, 
            recorded: false, 
            playing: false, 
            processing: $wire.entangle('processing'), 
            submitted: $wire.entangle('submitted'), 
            identifier: '{{ $this->identifier }}' 
        }"
        id="audioRecorder-{{ $this->identifier }}" 
        :data-identifier="identifier">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Recording Controls -->
        <div class="mt-4 p-4">      
            <div class="flex items-center mt-2">
                <!-- Record button -->
                <button x-on:click="recording = true" 
                        x-show="!recording && !recorded" 
                        @click="startRecording(identifier)" 
                        class="mr-2 bg-indigo-400 rounded-full p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                  </svg>
                </button>
                <!-- Stop button -->
                <button @click="stopRecording(identifier)" 
                        x-cloak x-on:click="recording = false; recorded = true" 
                        x-show="recording" 
                        class="mr-2 bg-red-400 rounded-full p-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5A2.25 2.25 0 0 1 7.5 5.25h9a2.25 2.25 0 0 1 2.25 2.25v9a2.25 2.25 0 0 1-2.25 2.25h-9a2.25 2.25 0 0 1-2.25-2.25v-9Z" />
                  </svg>
                </button>            
              <span class="dark:text-white ml-3" x-cloak x-show="!recorded && !recording">{{ $instructionText }}</span>
              <span class="text-white ml-3" x-cloak x-show="recording">Recording...</span>          
              <!-- Recorded audio -->
              <audio x-cloak x-show="recorded" class="mx-auto" id="recorded-audio-{{ $this->identifier }}" controls></audio>
            </div>
        </div>
        
        <!-- Upload Button -->
        <div x-cloak class="mx-auto text-center" x-show="recorded">        
            <button x-show="!submitted && !processing" 
                    @click="uploadRecording(identifier)" 
                    x-on:click="processing = true" 
                    class="bg-teal-500 hover:bg-teal-600 text-white py-2 px-3 mt-8 rounded-lg font-bold">
              Submit
            </button>
          <div x-show="processing" class="text-white py-2 px-2 mt-8 rounded">
            Processing 
            <span class="inline-flex"><img src="{{ asset('images/loading.gif') }}" alt="Loading" class="ml-2 w-4 h-4"></span></div>
          <button disabled x-show="submitted" class="text-white py-2 px-2 mt-8 rounded">Submitted ✓</button>
        </div>   
    </div> 

    <script>
      (function() {
        let mediaRecorder;
        let chunks = [];
        let audioBlob;
        let audioStream;         

        function startRecording(identifier) {   
          let element = document.getElementById(`audioRecorder-${identifier}`);
          console.log('Identifier:', identifier);   
          const constraints = { audio: true };
          navigator.mediaDevices.getUserMedia(constraints)
            .then((stream) => {
              audioStream = stream;
              mediaRecorder = new MediaRecorder(stream);
              chunks = []; // Clear previous recordings

              mediaRecorder.ondataavailable = (e) => {
                chunks.push(e.data);
              };

              mediaRecorder.onstop = () => {
                audioBlob = new Blob(chunks, { type: 'audio/wav; codecs=audio/pcm; samplerate=16000' });
                const audioUrl = URL.createObjectURL(audioBlob);
                document.getElementById(`recorded-audio-${identifier}`).src = audioUrl;
                document.getElementById(`recorded-audio-${identifier}`).style.display = 'block';
              };

              mediaRecorder.start();
            })
            .catch((error) => {
              console.error('Error accessing the microphone:', error);
            });
        }

        function stopRecording(identifier) {
          if (mediaRecorder && mediaRecorder.state !== 'inactive') {
            mediaRecorder.stop();
            console.log('Recording stopped');          
            mediaRecorder.stream.getTracks().forEach(track => track.stop());
          } else {
            console.log('MediaRecorder not active or undefined');
          }
        }

        function uploadRecording(identifier) {
          const blob = new Blob(chunks, { type: 'audio/wav; codecs=audio/pcm; samplerate=16000' });
          const formData = new FormData();
          formData.append('audio', blob, 'recording.wav'); 
          fetch('/audio/store', {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
          })
          .then(response => response.json())
          .then(data => {
            console.log(data);
            if (data.audioPath) {              
              $wire = Livewire.getByName('audio-recorder')[0];
              $wire.dispatch('audio-uploaded', { audioPath: data.audioPath, identifier: identifier});
              console.log('Audio Path:', data.audioPath);
              console.log('Identifier:', identifier);
            }
          })
          .catch(error => console.error('Error:', error));
          console.log('Audio uploaded');

          $wire = Livewire.getByName('audio-recorder')[0];
          $wire.on('audio-error', (identifier) => {
            if (identifier === $wire.identifier) {
              chunks = [];
              audioBlob = null;
              document.getElementById(`recorded-audio-${identifier}`).src = '';
              document.getElementById(`recorded-audio-${identifier}`).style.display = 'none';
              console.log('Audio cleared due to error. Identifier:', identifier);
            }
          });
        }

        window.startRecording = startRecording;
        window.stopRecording = stopRecording;
        window.uploadRecording = uploadRecording;
      })();
    </script>
</div>
