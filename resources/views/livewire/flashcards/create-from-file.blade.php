<div class="sm:flex mt-2 mb-12">
    <div class="mx-auto bg-white shadow-lg rounded-lg p-6">    
        <!-- Textarea for New Flashcards -->
        <div>
            <h2 class="text-2xl text-center sm:text-3xl text-gray-700 font-semibold mb-6">Add Flashcards from File</h2>
            
            <div class="w-full mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                    Definitions or translations?
                </label>
                <select class="form-input w-full rounded-md border-gray-300 py-2 px-4 my-2 focus:border-teal-500
                focus:ring focus:ring-teal-200 text-gray-900" wire:model="type" id="type">
                    <option value="">Select content type</option>
                    <option value="definitions">Definitions</option>
                    <option value="translations">Translations</option>
                </select>
            </div>

            <div class="w-full mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="target-language">
                    Target Language
                </label>
                <select class="form-input w-full rounded-md border-gray-300 py-2 px-4 my-2 focus:border-teal-500
                focus:ring focus:ring-teal-200 text-gray-900" wire:model="targetLanguage" id="target-language">
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
            </div>

            <div class="w-full mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="native-language">
                    Native Language
                </label>
                <input type="text" class="form-input w-full rounded-md border-gray-300 py-2 px-4 my-2 focus:border-teal-500
                focus:ring focus:ring-teal-200 text-gray-900" wire:model="nativeLanguage" id="native-language"
                       placeholder="Enter your native language">
            </div>

            <div class="w-full mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-4" for="file">
                    File (PDF or image)
                </label>
                <input type="file" wire:model.live="uploads" id="file" class="mb-4">
                <div wire:loading wire:target="uploads">Working...</div>
                @error('flashcards') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submission Button -->
            <div class="flex justify-start mt-8">
                <button x-cloak wire:click="store" class="bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-5 rounded-full transition">
                    <span wire:loading wire:target="store" class="mr-2">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading" class="w-5 h-5">
                                    </span>
                    <span wire:loading.remove>Upload</span>
                </button>
            </div>
        </div>
    </div>
    <x-alerts.success />
    </x-alerts.error />
</div>
