<x-layouts.lessons.show :course="$course" :lesson="$lesson" :registration="$registration">
<x-slot name="title">
  Quiz Results
</x-slot>
<x-slot name="content">
  <div class="text-2xl font-bold">Your grade: {{ $submission->grade }}</div>

  <div>
   <div class="overflow-x-auto">
  <table class="table-auto w-full border-collapse">
    <thead>
      <tr>
        <th class="px-4 py-2">Question</th>
        <th class="px-4 py-2">Your Answer</th>
        <th class="px-4 py-2">Correct Answer</th>
      </tr>
    </thead>
    <tbody>
      @foreach($results as $result)
        <tr class="@if($result['is_correct']) bg-green-100 @else bg-red-100 @endif">
          <td class="border px-4 py-2">{{ $loop->index + 1 }}. {{ $result['question'] }}</td>
          <td class="border px-4 py-2">{{ $result['answer'] }}</td>
          <td class="border px-4 py-2 bg-green-200">{{ $result['correct_answer'] }}</td>
        </tr>
        {{-- @if(!$result['is_correct'])
          <tr class="bg-gray-200">
            <td class="border px-4 py-3 text-sm" colspan="3">
              {{ $result['explanation'] }}
            </td>
          </tr>
        @endif --}}
      @endforeach
    </tbody>
  </table>
</div>

  </div>
</x-slot>
</x-layouts.lessons>
