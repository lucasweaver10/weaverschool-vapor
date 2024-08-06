@if($user->level !== null)
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Test Score</th>
            <th scope="col">Level</th>
            <th scope="col">Recommended Course</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $user->level_test_score }}/25</td>
            <td>{{ $user->level }}</td>
            {{-- <td>{{ $recommendation }}</td> --}}
          </tr>
        </tbody>
      </table>
@else
    <livewire:level-test :questions="$questions" :levelTestId="$levelTestId" wire:ignore.self />
@endif
