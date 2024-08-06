<div x-data="{ open: false }" class="mb-4">
  <div class="mt-1 relative">
    <button @click=" open = !open " @click.away=" open = false " type="button" class="relative bg-white border border-gray-300 rounded-md shadow-sm md:w-3/12 pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
      <span class="flex items-center">
        <span class="ml-3 block truncate">
          Filter Assignments
        </span>
      </span>
      <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
        <!-- Heroicon name: solid/selector -->
        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </span>
    </button>

    <!--
      Select popover, show/hide based on select state.

      Entering: ""
        From: ""
        To: ""
      Leaving: "transition ease-in duration-100"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <ul x-show=" open === true " class="absolute z-10  md:w-3/12 mt-1 bg-white shadow-lg max-h-56 rounded-md py-0 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
      <!--
        Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

        Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
      -->
      <li @click=" selection = 'Open Assignments' " class="text-gray-900 hover:text-white hover:bg-blue-400 cursor-default select-none relative py-2 pl-3 pr-9" id="listbox-option-0" role="option">
        <div class="flex items-center">
          <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
          <span class="font-normal ml-3 block truncate">
            Open
          </span>
        </div>
      </li>

      <li @click=" selection = 'Completed Assignments' " class="text-gray-900 hover:text-white hover:bg-blue-400 cursor-default select-none relative py-2 pl-3 pr-9" id="listbox-option-0" role="option">
        <div class="flex items-center">
          <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
          <span @click=" selection = 'Completed Assignments' " class="font-normal ml-3 block truncate">
            Completed
          </span>
        </div>
      </li>

    </ul>
  </div>
</div>