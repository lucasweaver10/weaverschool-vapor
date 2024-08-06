<x-layouts.flashcards>
<x-slot name="title">Create Flashcards from a YouTube Video</x-slot>
<x-slot name="description">Create flashcards from a YouTube video using Weaver School's AI flashcard maker.</x-slot>
    <!-- Header Section -->
    <header class="flex justify-between items-center mb-10">
        <x-flashcards.sets.header.heading text="Create Flashcards from YouTube" />                
        <x-flashcards.sets.header.back-link text="Back to Sets" route="/flashcards/sets" />
    </header>        
    <div x-data="{ addVoice: true }" class="bg-gray-900 min-h-screen flex flex-col items-center p-4">   
        <form class="text-center form-control" method="POST" action="/flashcards/handle-from-youtube">
        @csrf
           @if ($errors->any())
          <div class="mb-4">
              <ul class="list-disc list-inside text-red-500 text-lg">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif          
            <div class="bg-gray-800 mx-4 rounded-lg p-8 shadow-xl">
              <div class="mx-auto mb-5">
                  <label for="set-title" class="block text-white text-base font-bold mb-2">Flashcard Set Title:</label>
                  <textarea name="set_title" id="set-title" rows="1" placeholder="'Leo Messi Interview about Miami'" 
                  class="px-4 py-2 w-full rounded-md bg-gray-900 border-1 border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400"></textarea>                                     
              </div>
              <div class="mb-10 grid grid-cols-2 text-white gap-y-10">
                <div class="col-span-2 sm:col-span-1 sm:mr-2">
                  <label for="video_url" class="block text-white text-base font-bold mb-2">Video URL:</label>
                  <input type="text" name="video_url" id="video-url" placeholder="Full video URL" 
                    class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400">              
                </div>
                <div class="col-span-2 sm:col-span-1 sm:ml-2">
                  <label for="video_language" class="block text-white text-base font-bold mb-2">Video Language:</label>
                  <select class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400" 
                    name="video_language" id="video-language">
                    <option value="">Select a language</option>
                    <option value="zh-Tw">Chinese (Simplified)</option>
                    <option value="zh-CN">Chinese (Traditional)</option>
                    <option value="da">Danish</option>
                    <option value="nl">Dutch</option>
                    <option value="en">English</option>
                    <option value="fa">Persian</option>
                    <option value="fr">French</option>
                    <option value="de">German</option>
                    <option value="el">Greek</option>
                    <option value="he">Hebrew</option>
                    <option value="hu">Hungarian</option>
                    <option value="id">Indonesian</option>
                    <option value="it">Italian</option>
                    <option value="ja">Japanese</option>
                    <option value="km">Khmer</option>
                    <option value="ko">Korean</option>
                    <option value="lo">Lao</option>
                    <option value="la">Latin</option>
                    <option value="ms">Malay</option>
                    <option value="my">Burmese</option>
                    <option value="no">Norwegian</option>
                    <option value="pl">Polish</option>
                    <option value="pa">Punjabi</option>
                    <option value="pt">Portuguese</option>
                    <option value="ru">Russian</option>
                    <option value="sr">Serbian</option>
                    <option value="es">Spanish</option>
                    <option value="sw">Swahili</option>
                    <option value="sv">Swedish</option>
                    <option value="syr">Syriac</option>
                    <option value="th">Thai</option>
                    <option value="tr">Turkish</option>
                    <option value="uk">Ukrainian</option>
                    <option value="vi">Vietnamese</option>
                    @error('targetLanguage')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                  </select>
                </div>
              </div>
              <div class="mb-10 grid grid-cols-2 text-white gap-y-10">
                <div class="col-span-2 sm:col-span-1 sm:mr-2">
                  <label for="native-language" class="block text-white text-base font-bold mb-2">Your Native Language:</label>
                  <input type="text" name="native_language" id="native-language" placeholder="English" 
                    class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400">              
                </div>
                <div class="col-span-2 sm:col-span-1 sm:ml-2">
                  <label for="target-language" class="block text-white text-base font-bold mb-2">Your Target Language:</label>
                  <input type="text" name="target_language" id="target-language" placeholder="Spanish" 
                    class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400">              
                </div>
              </div>
              <div class="grid grid-cols-2 text-white">
                  <div class="col-span-2 sm:col-span-1 sm:mr-2">
                    <label for="images" class="text-white text-base font-bold mb-2 mr-2">Add AI Images?
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-4 h-4 mb-1">
                          <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                      </svg>
                    </label>
                    <input type="checkbox" name="add_images" id="add_images" checked
                      class="bg-gray-900 accent-gray-700 border border-gray-600 text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-700">              
                  </div>
                  <div class="col-span-2 sm:col-span-1 sm:ml-2">
                    <label for="voice_examples" class="text-white text-base font-bold mb-2 mr-2">Add AI Voice Examples?
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-4 h-4 mb-1">
                          <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                      </svg>
                    </label>
                    <input x-model="addVoice" type="checkbox" name="add_voice_examples" id="add-voice-examples" checked
                      class="bg-gray-900 accent-gray-700 border border-gray-600 text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-700">              
                  </div>
                </div>
                <div x-cloak x-show="addVoice" class="mt-10 grid grid-cols-2 text-white gap-y-10">
                  <div class="col-span-2">
                    <label for="native-language" class="block text-white text-base font-bold mb-2">Voice Gender:</label>
                    <select name="voice_gender" id="voice_gender" class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center focus:outline-none focus:ring-2 focus:ring-teal-400">
                      <option value="FEMALE">Female</option>
                      <option value="MALE">Male</option>    
                    </select>              
                  </div>
                </div>
              </div>
              <div class="flex justify-center items-center">            
                <button type="submit" class="mt-8 sm:mt-8 mb-6 bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-5 rounded-lg focus:outline-none focus:shadow-outline">
                    Make AI Magic
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-1">
                      <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                    </svg>
                </button>  
              </div>                       
            </div>          
        </form>

    </div>    
    
    <x-alerts.success />
    <x-alerts.error />
</x-layouts.flashcards>
