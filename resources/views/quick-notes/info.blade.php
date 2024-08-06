<x-layouts.app>
  <x-slot name="title">
    Add Flashcard from Quick Note
  </x-slot>
  <x-slot name="description">
    The Weaver School provides premium online language lessons to students across the world.
  </x-slot>
<x-layouts.dashboard.show>
    <div class="bg-black min-h-screen flex flex-col items-center pt-24 p-4" x-data="{ recording: false, recorded: false, playing: false, audioUploaded: false, typing: false, textSaved: false }">
      <div class="text-center">
        <h1 class="text-white text-3xl font-bold mb-12">What do you want to learn?</h1>
            <div x-cloak x-show="!recording && !recorded && !textSaved" class="mx-5 mb-2">
                <textarea id="textNote" x-on:input="audioUploaded = true, typing = true" id="flashcard-text" rows="3" placeholder="Type your note here or record a voice note below..." class="px-4 py-2 w-full rounded-md bg-black border-1 border-white text-white text-lg text-center placeholder-white focus:outline-none focus:ring-2 focus:ring-teal-400"></textarea>                                     
            </div>
          <div class="flex justify-center items-center">
            <div>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <!-- Recording Controls -->
                <div class="my-8">      
                    <div x-cloak x-show="!audioUploaded" class="flex items-center mt-2">
                        <!-- Record button -->
                        <button x-on:click="recording = true" x-show="!recording && !recorded" id="record-button" onclick="checkAndStartRecording()" class="mr-2 bg-violet-600 rounded-full p-2">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z" />
                          </svg>
                        </button>
                        <!-- Stop button -->
                        <button id="stop-button" onclick="stopRecording()" x-cloak x-on:click="recording = false; recorded = true" x-show="recording" class="mr-2 bg-red-400 rounded-full p-2">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5A2.25 2.25 0 0 1 7.5 5.25h9a2.25 2.25 0 0 1 2.25 2.25v9a2.25 2.25 0 0 1-2.25 2.25h-9a2.25 2.25 0 0 1-2.25-2.25v-9Z" />
                          </svg>
                        </button>
                      <span class="text-white ml-3 font-semibold" x-cloak x-show="!recorded && !recording">Record audio</span>
                      <span class="text-white ml-3" x-cloak x-show="recording">Recording...</span>          
                      <!-- Recorded audio -->
                      <audio x-cloak x-show="recorded && !audioUploaded" class="mx-auto" id="recorded-audio" controls></audio>
                    </div>
                </div>                                            

                <button id="submitButton" x-cloak class="mt-8 bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-5 rounded-full focus:outline-none focus:shadow-outline">
                    Make AI Magic
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-1">
                      <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                    </svg>

                </button>

                <script>
                  let mediaRecorder;
                  let chunks = [];
                  let audioBlob;
                  let audioStream;

                  function checkAndStartRecording() {
                    navigator.mediaDevices.enumerateDevices()
                      .then((devices) => {
                        const audioDevices = devices.filter(device => device.kind === 'audioinput');
                        if (audioDevices.length > 0) {
                          // Check the permission status
                          navigator.permissions.query({ name: 'microphone' })
                            .then((permissionStatus) => {
                              if (permissionStatus.state === 'granted') {
                                // Permission already granted
                                startRecording();
                              } else if (permissionStatus.state === 'prompt') {
                                // Permission not yet granted or denied, ask for it
                                startRecording();
                              } else {
                                // Permission denied
                                console.error('Microphone permission denied');
                                // Handle the denied permission, e.g., show a UI element to guide the user
                              }
                            })
                            .catch((error) => {
                              console.error('Error checking microphone permission:', error);
                            });
                        } else {
                          console.error('No audio input devices found');
                          // Inform the user that no audio input device is found
                        }
                      })
                      .catch((error) => {
                        console.error('Error listing media devices:', error);
                      });
                  }

                  function startRecording() {
                    const constraints = { audio: true };
                    navigator.mediaDevices.getUserMedia(constraints)
                      .then((stream) => {
                        audioStream = stream;
                        mediaRecorder = new MediaRecorder(stream);
                        chunks = []; // Clear previous recordings

                        // Set up the event handler right after creating the MediaRecorder
                        mediaRecorder.ondataavailable = (e) => {
                          if (e.data.size > 0) { // Ensure the chunk has data
                            chunks.push(e.data);
                          }
                        };

                        mediaRecorder.onstop = () => {
                          // Create the audio blob from the chunks
                          audioBlob = new Blob(chunks, { type: 'audio/mpeg' });
                          const audioUrl = URL.createObjectURL(audioBlob);
                          document.getElementById('recorded-audio').src = audioUrl;
                          document.getElementById('recorded-audio').style.display = 'block'; // Show the audio element              
                        };

                        mediaRecorder.start(1000);
                      })
                      .catch((error) => {
                        console.error('Error accessing the microphone:', error);
                      });
                  }

                  function stopRecording() {
                    if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                      mediaRecorder.stop();
                      console.log('Recording stopped');
                      // Stop the tracks on the stream
                      mediaRecorder.stream.getTracks().forEach(track => track.stop());                      
                    } else {
                      console.log('MediaRecorder not active or undefined');
                    }
                  }

                  function playRecording() {
                    const audio = document.getElementById('recorded-audio');
                    if (audioBlob) { // Ensure there's something to play
                      audio.play();
                    } else {
                      console.log('No recording available to play.');
                    }
                  }

                  function uploadRecording() {
                    const blob = new Blob(chunks, { type: 'audio/mpeg' });
                    const formData = new FormData();
                    formData.append('audio', blob, 'recording.mp3');
                    fetch('/quick-notes', {
                      method: 'POST',
                      body: formData,
                      headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                      },
                    })
                    .then(response => response.json()) // Assuming JSON response
                    .then(data => handleResponseData(data))
                  }

                  function submitText() {
                      const textData = document.getElementById('textNote').value; // Assuming 'textNote' is your textarea ID
                      fetch('/quick-notes', {
                          method: 'POST',
                          headers: {
                              'Content-Type': 'application/json',
                              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Laravel CSRF token
                          },
                          body: JSON.stringify({text: textData})
                      })
                    .then(response => response.json())
                    .then(data => handleResponseData(data))
                  }

                  function handleResponseData(data) {
                    console.log(data);
                    if (data.success) {                      
                      window.dispatchEvent(new CustomEvent('success', {
                        detail: {
                          message: data.message
                        }
                      }));
                      //
                      //setTimeout(() => {
                        //window.location.reload(); // Refreshes the current page
                      //}, 3000);                      
                    } else {
                      window.dispatchEvent(new CustomEvent('error', {
                        detail: {
                          message: data.message
                        }
                      }));                      
                    }
                  }

                  document.getElementById('submitButton').addEventListener('click', function() {
                      // Determine if it's an audio or text submission
                      if (audioBlob) {                          
                          uploadRecording();
                      } else if (document.getElementById('textNote').value.trim().length > 0) {                          
                          submitText();
                      } else {                          
                          console.log("Please record an audio or enter text before sending.");
                        window.dispatchEvent(new CustomEvent('error', {
                          detail: {
                            message: 'Please record an audio or enter text before sending.'
                          }
                        }));    
                      }
                  });

                </script>

            </div>
          </div>          
      </div>
      <x-alerts.success />
      <x-alerts.error />
    </div>
    </x-layouts.dashboard.show>
</x-layouts.app>