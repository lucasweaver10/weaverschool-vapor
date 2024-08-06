<x-layouts.app>
  <x-slot name="title">
    C1 Advanced Writing Essay AI Grader Tool - Score and Feedback
  </x-slot>
  <x-slot name="description">
    AI generated band score and feedback on your submitted C1 Advanced Writing essay.
  </x-slot>
<x-layouts.guest>

<div class="mx-24 mb-12">
  <div class="mb-2"><h1>C1 Advanced Writing Essay AI Feedback</h1></div>
  <div class="text-xl"><em>These results are AI generated, are not 100% accurate, and should not be considered as an
          official C1 Advanced score. They're meant to give you a good idea of where you are with your writing before you
          take your C1 Advanced Writing Exam to see where you can improve. If you need more precise feedback you can
          <a href="mailto:lucas@weaverschool.com">contact me</a> to get access to an experienced teacher.</em></div>
</div>
<div class="mx-24">
  <div class="font-bold">Feedback</div>
  <div class="mb-5 text-2xl prose prose-xl">
    @if(session('feedback'))
      @foreach (session('feedback') as $text)
          {!! $text !!}
      @endforeach
    @else
    There's no feedback at this time. Go back to the grading page and submit your essay.
    @endif
  </div>
</div>
</x-layouts.guest>
</x-layouts.app>
