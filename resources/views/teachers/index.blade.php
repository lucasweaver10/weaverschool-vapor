<x-layouts.app>
  <x-slot name="title">
    Online language teachers | The Weaver School
  </x-slot>
  <x-slot name="description">
    Choose the right language teacher for you. Group teachers and private lessons for professionals, adults, and academic students.
  </x-slot>

<div x-data="{ subcategory: '{{ request('language') ?? '1', }}' }">
    <div class="section bg-light py-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="ml-5 text-4xl font-extrabold">@lang('teachers/index.our_teachers')</h1>
          </div>
        </div>


          <div class="w-1/3 ml-24 mt-3 mb-4">
              <label for="subcategory" class="block text-xl font-medium text-black">@lang('teachers/index.language')</label>
              <select id="language" x-model="subcategory" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white
                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-md">
                  @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                  @endforeach
              </select>
          </div>

            <div class="bg-white rounded-xl mx-5 mt-5">
              <div x-show="subcategory === '1'" class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8 py-5">
                  @foreach ($englishTeachers as $teacher)
                    <x-teacher-card :teacher="$teacher" />
                  @endforeach
              </div>

              <div x-show="subcategory === '2'" class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8 py-5">
                  @foreach ($dutchTeachers as $teacher)
                      <x-teacher-card :teacher="$teacher" />
                  @endforeach
              </div>
            </div>



      </div>

        <div class="mt-36">
        @if (Auth::check())
            <x-cta.welcome.user />
        @else
            <x-cta.welcome.visitor />
        @endif
        </div>

    </div>
</div>

</x-layouts.app>
