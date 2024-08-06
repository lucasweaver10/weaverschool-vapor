<div class="sm:flex mt-2 mb-12">
    <div class="mx-auto bg-gray-800 shadow-lg rounded-lg p-8">    
        <!-- Textarea for New Flashcards -->
        <div x-data="{ addVoice: true }" class="grid">                        
            <div class="w-full mb-4">
                <label class="block text-white text-base font-bold mb-2" for="title">
                    Name
                </label>
                <input wire:model="setTitle" class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400" 
                id="title" placeholder="Enter a name for your flashcard set">                    
                @error('setTitle')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full my-4">
                <label class="block text-white text-base font-bold mb-2" for="description">
                    Description
                </label>
                <input wire:model="setDescription" class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400" 
                id="description" placeholder="Enter a description"> 
                @error('setDescription')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror                                  
            </div>

            <div class="w-full my-4">
                <label class="block text-white text-base font-bold mb-2" for="type">
                    Definitions or translations? <x-popover text="Choose whether you want the definition or translation of the word on the back of each flashcard" />
                </label>
                <select class="form-input px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400" 
                wire:model="type" id="type">
                    <option value="">Select content type</option>
                    <option value="definitions">Definitions</option>
                    <option value="translations">Translations</option>
                </select>
                @error('type')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full my-4">
                <label class="block text-white text-base font-bold mb-2" for="target-language">
                    Target Language
                </label>
                <select class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400" 
                wire:model="targetLanguage" id="target-language">
                    <option value="">Select a language</option>
                    <option value="chi_sim">Chinese (Simplified)</option>
                    <option value="chi_tra">Chinese (Traditional)</option>
                    <option value="nld">Dutch</option>
                    <option value="eng">English</option>
                    <option value="fas">Persian</option>
                    <option value="fra">French</option>
                    <option value="deu">German</option>
                    <option value="ell">Greek</option>
                    <option value="heb">Hebrew</option>
                    <option value="hun">Hungarian</option>
                    <option value="ind">Indonesian</option>
                    <option value="ita">Italian</option>
                    <option value="jpn">Japanese</option>
                    <option value="khm">Khmer</option>
                    <option value="kor">Korean</option>
                    <option value="lao">Lao</option>
                    <option value="lat">Latin</option>
                    <option value="msa">Malay</option>
                    <option value="mya">Burmese</option>
                    <option value="nor">Norwegian</option>
                    <option value="pol">Polish</option>
                    <option value="pan">Punjabi</option>
                    <option value="por">Portuguese</option>
                    <option value="rus">Russian</option>
                    <option value="srp">Serbian</option>
                    <option value="spa">Spanish</option>
                    <option value="swa">Swahili</option>
                    <option value="swe">Swedish</option>
                    <option value="syr">Syriac</option>
                    <option value="tha">Thai</option>
                    <option value="tur">Turkish</option>
                    <option value="ukr">Ukrainian</option>
                    <option value="vie">Vietnamese</option>
                </select>
                @error('targetLanguage')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full my-4">
                <label class="block text-white text-base font-bold mb-2" for="native-language">
                    Native Language
                </label>
                <input type="text" class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal-400" 
                wire:model="nativeLanguage" id="native-language"
                       placeholder="Enter your native language">
                @error('nativeLanguage')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 text-white mt-8">
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
              <div x-cloak x-show="addVoice" class="mt-10 mb-6 grid grid-cols-2 text-white gap-y-10">
                <div class="col-span-2">
                  <label for="native-language" class="block text-white text-base font-bold mb-2">Voice Gender:</label>
                  <select name="voice_gender" id="voice_gender" class="px-4 py-2 w-full rounded-md bg-gray-900 border border-gray-600 text-white text-xl text-center focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="FEMALE">Female</option>
                    <option value="MALE">Male</option>    
                  </select>              
                </div>
            </div>

            <div class="w-full mt-4">
                <label class="block text-white text-base font-bold mb-2" for="file">
                    File (PDF or image)
                </label>
                <input type="file" wire:model="uploads" id="uploads" class="mb-4 text-white">
                <div wire:loading wire:target="uploads">Working...</div>
                <span class="text-red-600 text-sm">@error('uploads.*') {{ $message }} @enderror</span>                
            </div>

            <!-- Submission Button -->
            <div class="flex justify-end mt-8">
                <button x-cloak wire:click="store" class="mt-8 sm:mt-8 bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-5 rounded-lg focus:outline-none focus:shadow-outline">
                    <span wire:loading wire:target="store" class="mr-2">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </span>
                    <span wire:loading.remove>
                        Make AI Magic
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-flex text-amber-300 w-5 h-5 mb-1">
                        <path fill-rule="evenodd" d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <x-alerts.success />
    </x-alerts.error />
</div>
