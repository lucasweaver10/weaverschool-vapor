<x-layouts.app>
  <x-slot name="title">
    Create a Learning Path
  </x-slot>
  <x-slot name="description">
    Create a new learning path to master a specific language learning topic.
  </x-slot>
<x-layouts.dashboard.show>
    <div x-data="{ howDoesThisWorkOpen: false }" class="bg-gray-900 min-h-screen flex flex-col items-center p-4">
        <!-- Modal for "How does this work?" -->
        <div x-cloak x-show="howDoesThisWorkOpen" class="fixed inset-0 bg-black bg-opacity-75 z-50 flex justify-center items-center">
            <div class="bg-gray-900 rounded-lg max-w-5xl mx-5 text-center relative p-4">
                <button @click="howDoesThisWorkOpen = false" class="absolute top-0 right-0 mt-4 mr-4 text-white hover:text-gray-300">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="w-full">
                    <iframe class="w-full h-96" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <form class="text-center" method="POST" action="/learning-paths/store">
        @csrf
          <h1 class="text-gray-100 text-3xl sm:text-4xl font-bold mt-4 sm:mt-0 mb-12">What topic do you want to learn?</h1>
          {{-- <button @click="howDoesThisWorkOpen = true" class="mb-12 text-sm text-white hover:text-teal-600 font-semibold">
              How does this work?
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline w-4 h-4 ml-1 mb-1 bg-teal-600 p-1 rounded-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
              </svg>
          </button> --}}
            <div class="bg-gray-800 mx-4 rounded-lg p-8 shadow-xl">
              <div class="mx-auto mb-5">
                  <textarea name="topic" id="topic" id="topic" rows="3" placeholder="'How to ask for directions in Korean'" 
                  class="px-4 py-2 w-full rounded-md bg-gray-900 border-1 border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400"></textarea>                                     
              </div>
              <div class="mb-10 grid grid-cols-2 text-white gap-y-10">
                <div class="col-span-2 sm:col-span-1 sm:mr-2">
                  <label for="native-language" class="block text-white text-base font-bold mb-2">Native Language:</label>
                  <input type="text" name="native_language" id="native-language" placeholder="English" 
                    class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400">              
                </div>
                <div class="col-span-2 sm:col-span-1 sm:ml-2">
                  <label for="target-language" class="block text-white text-base font-bold mb-2">Target Language:</label>
                  <input type="text" name="target_language" id="target-language" placeholder="Korean" 
                    class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400">              
                </div>
              </div>
              <div class="mb-2 grid grid-cols-2 text-white gap-y-10">
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
              <button class="mt-8 sm:mt-8 mb-6 bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-5 rounded-lg focus:outline-none focus:shadow-outline">
                  Make AI Magic
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-1">
                    <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                  </svg>
              </button>                         
            </div>          
        </form>
     
      <x-alerts.success />
      <x-alerts.error />
    </div>
    </x-layouts.flashcards.study>
</x-layouts.app>