<x-layouts.app>
    <x-slot name="title">
        Edit a Teacher
    </x-slot>
    <x-slot name="description">
    </x-slot>

    <div class="container-fluid bg-white">

        <div class="row justify-content-center mt-3">

            <div class="col-lg-8">
                <form action="/teachers/{{ $teacher->id }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PATCH')

                    <div class="form-group">
                      <label for="">First Name</label>
                      <input type="text" class="form-control" name="firstName" id="first-name" aria-describedby="helpId" value="{{ $teacher->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="last-name" aria-describedby="helpId" value="{{ $teacher->last_name }}">
                    </div>

                    <div class="form-group">
                        <label for="">About</label>
                        <input type="text" class="form-control" name="about" id="about" aria-describedby="helpId" value="{{ $teacher->about }}">
                    </div>

                    <div class="form-group">
                        <label for="">About Translation Locale</label>
                        <input type="text" class="form-control" name="aboutTranslationLocale" id="about-translation-locale" aria-describedby="helpId" value="">
                        <label for="">About Translation Content</label>
                        <input type="text" class="form-control" name="aboutTranslationContent" id="about-translation-content" aria-describedby="helpId" value="">
                    </div>

                    <div class="form-group">
                        <label for="">Nationality</label>
                        <input type="text" class="form-control" name="nationality" id="nationality" aria-describedby="helpId" value="{{ $teacher->nationality }}">
                    </div>

                    <div class="form-group">
                        <label for="">Specialties</label>
                        <input type="text" class="form-control" name="specialties" id="specialties" aria-describedby="helpId" value="{{ $teacher->specialties }}">
                    </div>

                    <div class="form-group">
                        <label for="">Specialties Translation Locale</label>
                        <input type="text" class="form-control" name="specialtiesTranslationLocale" id="specialties-translation-locale" aria-describedby="helpId" value="">
                        <label for="">Specialties Translation Content</label>
                        <input type="text" class="form-control" name="specialtiesTranslationContent" id="specialties-translation-content" aria-describedby="helpId" value="">
                    </div>

                    <div class="form-group">
                        <label for="">Fun Fact</label>
                        <input type="text" class="form-control" name="funFact" id="fun-fact" aria-describedby="helpId" value="{{ $teacher->fun_fact }}">
                    </div>

                    <div class="form-group">
                        <label for="">Languages Spoken</label>
                        <input type="text" class="form-control" name="languagesSpoken" id="languages-spoken" aria-describedby="helpId" value="{{ $teacher->languages_spoken }}">
                    </div>

                    <div class="form-group">
                        <label for="">Subjects</label>
                        <select class="form-control" id="subject" aria-describedby="helpId">
                            <option>English</option>
                            <option>Dutch</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-lg btn-primary">
                    </div>

                </form>


        </div>
      </div>
    </div>
</x-layouts.app>

