<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Models\ProductPrice;

Route::get('/subscription-checkout/{type}/{id}', function (Request $request) { 
    $type = $request->type;
    $price = ProductPrice::findOrFail($request->id);
    $stripePriceId = $price->stripe_price_id;
    $fbClickId = $request->fbclid ?? null;
    
    return $request->user()
        ->newSubscription($type, $stripePriceId)
        ->allowPromotionCodes()
        ->withMetadata(['fbclid' => $fbClickId])
        ->checkout([
            'success_url' => route('payments.thank-you.generic'),
            'cancel_url' => url()->previous(),            
        ]);
})->middleware(['auth'])->name('subscription-checkout');

Route::get('/trial-subscription-checkout/{type}/{id}', function (Request $request) {
    $type = $request->type;
    $price = ProductPrice::findOrFail($request->id);
    $stripePriceId = $price->stripe_price_id;
    $fbClickId = $request->fbclid ?? null;    

    return $request->user()
        ->newSubscription($type, $stripePriceId)
        ->allowPromotionCodes()
        ->withMetadata(['fbclid' => $fbClickId])
        ->trialDays(7)
        ->checkout([
            'success_url' => route('payments.thank-you.generic'),
            'cancel_url' => url()->previous(),            
        ]);
})->middleware(['auth'])->name('trial-subscription-checkout');

Route::get('/{locale}/subscriptions/trials/create/{type}/{id}', 'SubscriptionController@create')->middleware(['auth'])->middleware(['localization'])->name('dashboard.subscriptions.trials.create');


Route::get('/billing', function (Request $request) {
    return $request->user()->redirectToBillingPortal(route('dashboard.index', app()->getLocale()));
})->middleware(['auth'])->name('billing');

Route::get('/', function () {
    $locale = session('locale', 'en');

   return redirect('/' . $locale);
})->name('welcome');

// Audio Uploads //

Route::post('/audio/store', 'AudioController@store');

// Start Admin //
Route::get('/leave-impersonation', [\App\Http\Controllers\ImpersonationController::class, 'leave'])->name('leave-impersonation');

Route::middleware(['can:view_everything'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', 'AdminController@index');

        Route::get('/students', 'AdminController@users');

        Route::get('/users', 'AdminController@usersIndex');

        Route::get('/users/explore/{userId}', 'AdminController@userShow');

        Route::get('/registrations', 'AdminController@registrations');

        Route::get('/registrations/{id}', 'AdminController@show');

        Route::post('/flashcards/store', 'AdminController@storeFlashcards')->name('admin.flashcards.store');

        Route::get('/authors/create', 'AuthorController@create')->name('authors.create');

        Route::post('/authors/store', 'AuthorController@store')->name('authors.store');

        Route::get('/authors', 'AuthorController@index')->name('authors.index');

        Route::get('/posts/create', 'PostController@create');

        Route::post('posts/store', 'PostController@store')->name('posts.store');

        Route::post('posts/update', 'PostController@update')->name('posts.update');

        Route::post('posts/addTableOfContents', 'PostController@addTableOfContentsToPost')->name('posts.admin.addTableOfContentsToPost');

        Route::get('posts', 'PostController@adminIndex')->name('posts.admin.index');

        Route::get('/posts/edit/{id}', 'PostController@edit')->name('posts.edit');

        Route::get('/guides/create', 'GuideController@create')->name('guides.create');

        Route::post('/guides/store', 'GuideController@store')->name('guides.store');

        Route::get('/midjourney/create', 'MidJourneyController@create')->name('midjourney.create');

        Route::post('/midjourney/store', 'MidJourneyController@store')->name('midjourney.store');

        Route::post('/lessons/store', 'LessonController@store')->name('lessons.store');

        Route::get('/lessons/create', 'LessonController@create')->name('lessons.create');

        Route::get('/lessons/{lesson}/edit', 'LessonController@edit')->name('lessons.edit');

        Route::get('/lessons/{lesson}/written-examples', 'WrittenExampleController@index')->name('written-examples.index');

        Route::get('/lessons/{lesson}/discussion-questions', 'DiscussionQuestionController@index')->name('discussion-questions.index');

        Route::get('/lessons/{lesson}', 'LessonController@show')->name('admin.lessons.show');

        Route::get('/lessons/{lesson}/flashcards', 'LessonController@flashcardsIndex')->name('admin.lessons.flashcards');

        Route::post('/lessons/flashcards/{flashcardId}/update', 'LessonController@flashcardsUpdate')->name('admin.flashcards.update');

        Route::get('/flashcards/sets/create', 'AdminFlashcardSetController@create')->name('admin.flashcards.sets.create');

        Route::get('/flashcards/sets', 'AdminFlashcardSetController@index')->name('admin.flashcards.sets.index');

        Route::post('/flashcards/sets/store', 'AdminFlashcardSetController@store')->name('admin.flashcards.sets.store');

        Route::get('/flashcards/sets/{setId}/create', 'AdminFlashcardController@create')->name('admin.flashcards.create');

        Route::get('/flashcards/sets/{setId}', 'AdminFlashcardController@index')->name('admin.flashcards.index');

        Route::get('learning-paths/{id}/vocabulary', 'AdminLearningPathController@vocabularyIndex')->name('admin.learning-paths.vocabulary.index');

        Route::get('learning-paths/{id}/vocabulary/{vocabularyId}', 'AdminLearningPathController@vocabularyShow')->name('admin.learning-paths.vocabulary.show');
    });

});

Route::middleware(['can:access_admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/students', 'AdminController@users')->name('admin.students');
        Route::get('/registrations', 'AdminController@registrations')->name('admin.registrations');
    });
});
// End Admin //

Route::post('/beta-optin-subscribers', 'BetaOptinSubscriberController@store')->name('beta-optin-subscribers.store');

// Quick notes //
Route::get('/quick-notes/new', 'QuickNoteController@create')->name('quick-note.create');
Route::post('/quick-notes', 'QuickNoteController@store');
Route::middleware(['auth'])->group(function () {        
    Route::get('/quick-notes', 'QuickNoteController@index')->name('quick-notes.index');
});


// Learning Paths //
Route::post('/learning-paths/store', 'LearningPathController@store');
Route::post('/learning-paths/explore/study-existing', 'LearningPathController@studyExisting')->name('learning-paths.explore.study-existing');

// Create redirects for the old learning paths //
Route::redirect('/learning-paths', '/en/learning-paths');
// End redirects //

Route::middleware(['localization'])->group(
    function () {
        Route::prefix('{locale}')->group(
            function () {
                Route::get('/learning-paths', 'LearningPathController@info')->name('learning-paths.info');
                Route::get('/learning-paths/explore', 'LearningPathController@explore')->name('learning-paths.explore.index');
                Route::get('/learning-paths/explore/{languageSlug}', 'LearningPathController@exploreLanguageIndex')->name('learning-paths.explore.language.index');
                Route::get('/learning-paths/explore/{languageSlug}/{pathSlug}', 'LearningPathController@exploreShow')->name('learning-paths.explore.show');              
            });
    });

Route::middleware(['localization'])->group(
    function () {
    Route::prefix('{locale}')->group(
        function () {
        Route::prefix('my')->group(
            function () {
            Route::middleware(['auth'])->group(function () {
                Route::get('/learning-paths/new', 'LearningPathController@create')->name('learning-paths.create');
                Route::get('/learning-paths', 'LearningPathController@index')->name('learning-paths.index');                
                Route::get('/learning-paths/{learningPathId}', 'LearningPathController@show')->name('learning-paths.show');
                Route::get('/learning-paths/{learningPathId}/vocabulary/{vocabularyWordId}', 'LearningPathController@vocabularyShow')->name('learning-paths.vocabulary.show');
                Route::get('/learning-paths/{learningPathId}/phrases/{phraseId}', 'LearningPathController@phraseShow')->name('learning-paths.phrases.show');
                Route::get('/learning-paths/{learningPathId}/cultural-notes/{noteId}', 'LearningPathController@culturalNoteShow')->name('learning-paths.cultural-notes.show');
            });
        });
    });
});

// Create redirects for the old flashcard and flashcard features routes without localization //
Route::redirect('/flashcards', '/en/flashcards');
Route::redirect('/flashcards/features', '/en/flashcards/features');
Route::redirect('/flashcards/features/voice-pronunciation', '/en/flashcards/features/voice-pronunciation');
Route::redirect('/flashcards/features/create-from-file', '/en/flashcards/features/create-from-file');
Route::redirect('/flashcards/features/create-from-topic', '/en/flashcards/features/create-from-topic');
Route::redirect('/flashcards/features/image-mode', '/en/flashcards/features/image-mode');
Route::redirect('/flashcards/features/neural-replay', '/en/flashcards/features/neural-replay');
Route::redirect('/flashcards/features/spaced-repetition', '/en/flashcards/features/spaced-repetition');
Route::redirect('/flashcards/features/white-noise', '/en/flashcards/features/white-noise');
Route::redirect('/flashcards/features/image-creation', '/en/flashcards/features/image-creation');


// Flashcards //
Route::middleware(['localization'])->group(
    function () {
        Route::prefix('{locale}')->group(
            function () {
                Route::get('/flashcards', 'FlashcardController@info')->name('flashcards.info');
                Route::get('/flashcards/features', 'FlashcardController@featuresIndex')->name('flashcards.features.index');                
                Route::get('/flashcards/features/voice-pronunciation', 'FlashcardController@voicePronunciation')->name('flashcards.features.voice-pronunciation');
                Route::get('/flashcards/features/create-from-file', 'FlashcardController@createFromFileFeature')->name('flashcards.features.create-from-file');
                Route::get('/flashcards/features/create-from-topic','FlashcardController@createFromTopic')->name('flashcards.features.create-from-topic');
                Route::get('/flashcards/features/image-mode', 'FlashcardController@imageMode')->name('flashcards.features.image-mode');
                Route::get('/flashcards/features/neural-replay', 'FlashcardController@neuralReplay')->name('flashcards.features.neural-replay');
                Route::get('/flashcards/features/spaced-repetition', 'FlashcardController@spacedRepetition')->name('flashcards.features.spaced-repetition');
                Route::get('/flashcards/features/white-noise', 'FlashcardController@whiteNoise')->name('flashcards.features.white-noise');
                Route::get('/flashcards/features/image-creation', 'FlashcardController@imageCreation')->name('flashcards.features.image-creation');
                Route::get('/flashcards/sets/explore', 'FlashcardSetsExplorerController@index')->name('flashcards.sets.explore.index');
                Route::get('/flashcards/sets/explore/{id}', 'FlashcardSetsExplorerController@show')->name('flashcards.sets.explore.show');
            });
    });

// Exam Prep //
Route::middleware(['localization'])->group(
    function () {
        Route::prefix('{locale}')->group(
            function () {
                Route::get('/exam-prep/ielts-coach', 'PagesController@ieltsCoachInfo')->name('exam-prep.ielts-coach.info');
                Route::get('/exam-prep/ielts-coach/speaking', 'PagesController@ieltsSpeakingCoachInfo')->name('exam-prep.ielts-coach.speaking.info');
                Route::get('/exam-prep/ielts-coach/speaking/tests', 'PagesController@ieltsSpeakingTestsPublicIndex')->name('exam-prep.ielts-coach.speaking.index');
                Route::get('/exam-prep/cambridge-coach', 'PagesController@cambridgeCoachInfo')->name('exam-prep.cambridge-coach.info');
        });
});

// Route::get('/language-sherpa', 'LanguageSherpaController@index')->name('language-sherpa.index');

// Route::get('/language-sherpa/journey', 'LanguageSherpaController@show')->name('language-sherpa.show');

// Route::get('/language-sherpa/journey/test', 'LanguageSherpaController@test')->name('language-sherpa.test');


// Gate these flashcard routes so they can only be accessed if you're logged in //
// Route::middleware(['localization'])->group(
//     function () {
//         Route::prefix('{locale}')->group(
//             function () {
//                 Route::prefix('my')->group(
//                     function () {
                        Route::middleware(['auth'])->group(function () {                       
                            Route::get('/my/flashcards/explore/sets', 'FlashcardSetsExplorerController@index')->name('my.flashcards.sets.explore.index');
                            Route::get('/my/flashcards/explore/sets/{id}', 'FlashcardSetsExplorerController@show')->name('my.flashcards.sets.explore.show');
                            Route::post('/flashcards/store', 'FlashcardController@store')->name('flashcards.store');
                            Route::get('/flashcards/sets', 'FlashcardSetController@index')->name('flashcards.sets.index');
                            Route::get('/flashcards/sets/create', 'FlashcardSetController@create')->name('flashcards.sets.create');
                            Route::get('flashcards/sets/create/topic', 'FlashcardSetController@createFromTopic')->name('flashcards.sets.create.topic');
                            Route::get('flashcards/sets/create/youtube', 'FlashcardSetController@createFromYouTube')->name('flashcards.sets.create.youtube');
                            Route::get('flashcards/sets/create/file', 'FlashcardSetController@createFromFile')->name('flashcards.sets.create.file');
                            Route::get('flashcards/sets/create/list', 'FlashcardSetController@createFromList')->name('flashcards.sets.create.list');
                            Route::get('/flashcards/sets/{id}/edit', 'FlashcardSetController@edit')->name('flashcards.sets.edit');
                            Route::put('/flashcards/sets/{id}/update', 'FlashcardSetController@update')->name('flashcards.sets.update');
                            Route::post('/flashcards/sets', 'FlashcardSetController@store')->name('flashcards.sets.store');
                            Route::get('/flashcards/sets/{id}', 'FlashcardSetController@show')->name('flashcards.sets.show');
                            Route::get('/flashcards/{id}/create', 'FlashcardController@create')->name('flashcards.create');
                            Route::get('flashcards/{id}/create/list', 'FlashcardController@createFromList')->name('flashcards.create.list');
                            Route::get('flashcards/{id}/create/file', 'FlashcardController@createFromFile')->name('flashcards.create.file');
                            Route::post('/flashcards/handle-from-topic', 'FlashcardSetController@handleFromTopic')->name('flashcards.handle-from-topic');
                            Route::post('/flashcards/handle-from-youtube', 'FlashcardSetController@handleFromYoutube')->name('flashcards.handle-from-youtube');
                            Route::get('/flashcards/{id}/audio/create', 'FlashcardAudioController@create')->name('flashcards.audio.create');
                            Route::post('/flashcards/audio/store', 'FlashcardAudioController@storeFlashcardsAudioWithGoogleCloud');
                            Route::post('/flashcards/create-audio-with-google', 'FlashcardAudioController@createFlashcardsAudioWithGoogleCloud');
                            Route::get('/flashcards/{id}/images/create', 'FlashcardImageController@create')->name('flashcards.images.create');
                            Route::post('/flashcards/images/store', 'FlashcardImageController@store');
                            Route::get('flashcards/sets/{id}/study', 'FlashcardController@index')->name('flashcards.index');
                            Route::get('/flashcards/{setId}/{id}', 'FlashcardController@show')->name('flashcards.show');
                            Route::get('/flashcards/{setId}/{id}/edit', 'FlashcardController@edit')->name('flashcards.edit');
                            Route::put('/flashcards/{id}/update', 'FlashcardController@update')->name('flashcards.update');
                            Route::delete('/flashcards/{id}/destroy', 'FlashcardController@destroy')->name('flashcards.destroy');
                            Route::post('/attach-flashcards', 'FlashcardSetController@startStudyingFlashcards')->name('attach-flashcards');
                        });
    //                 }
    //             );
    //         }
    //     );
    // }
// );

// End gated flashcard routes //

Route::get('/create-payment-intent', function () {
//    Stripe::setApiKey(env('STRIPE_SECRET'));

    $stripe = new \Stripe\StripeClient(config('services.stripe_secret'));
    $paymentIntent = $stripe->paymentIntents->create([
        'amount' => 1000,
        'currency' => 'usd',
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    return response()->json(['clientSecret' => $paymentIntent->client_secret]);
});

Route::get('/dashboard', function () {
    return redirect('/' . session('locale', 'en') . '/dashboard');
});

Route::middleware(ProtectAgainstSpam::class)->group(function () {
   require __DIR__.'/auth.php';
});

Route::get('/blog', 'PostController@index')->name('blog');

Route::get('/blog/{slug}', 'PostController@show')->name('blog.show');

Route::get('/authors', 'AuthorController@publicIndex')->name('authors.index');

// There is another route for this in the admin area with an admin prefix //

Route::get('/blog/authors/{id}', 'AuthorController@publicShow')->name('authors.show');

Route::get('/correct-my-english', 'PagesController@correctMyEnglish')->name('correct-my-english');

// Route::get('/dutch-level-test', 'LevelTestController@createDutch');

Route::resource('plans', 'PlansController');

Route::resource('lessons', 'LessonController');

Route::resource('lesson-plans', 'LessonPlanController');

Route::get('/thank-you', 'PagesController@thankYou')->name('thank-you');

// Courses //

Route::get('/courses/create', 'CoursesController@create')->name('create-course');

// End Courses //

// Experimentation //

// End Experimentation //
Route::post('image-uploads/store', 'ImageUploadsController@store');

Route::group(['middleware' => 'auth', 'prefix' => 'post'], function () {
   Route::get('get_all', 'PostController@index');
   Route::post('create_post', 'PostController@create');
});

Route::get('/subscribe', 'PagesController@subscribe');

// Groups //
Route::resource('groups', 'GroupController');

Route::post('/registrations/addToGroup', 'RegistrationController@addToGroup');

// Payments //
Route::post('/payments/desposit', 'MolliePaymentsController@prepareDeposit');

Route::post('/payments/remainder', 'MolliePaymentsController@prepareRemainder');

Route::post('/payments/balance', 'MolliePaymentsController@prepareBalance');

Route::post('/payments/mandate', 'MolliePaymentsController@prepareMandate');

Route::post('/payments/subscription', 'MolliePaymentsController@prepareSubscription');

Route::post('/subscriptions/payments/get', 'SubscriptionController@getSubscriptionPayments');

Route::post('/payments/balance/charge', 'PaymentController@chargeBalance')->name('payments.charge-balance');

Route::post('/trials/cancel', 'RegistrationTrialController@cancel')->name('trials.cancel');

Route::post('/payments/stripe/balance', 'PaymentController@prepareStripeBalance')->name('payments.balance');

// Thank you pages //
Route::get('/stripe/payments/thank-you', 'PaymentController@thankYou')->name('stripe.thank-you');

Route::get('/stripe/payments/flashcards/thank-you', 'PaymentController@stripeFlashcardsThankYou')->name('payments.flashcards.thank-you');

Route::get('/payments/thank-you', 'PaymentController@thankYou')->name('payments.thank-you.generic');

Route::get('/payments/thank-you/pro', 'PaymentController@thankYouPro')->name('payments.thank-you.pro');

Route::get('/payments/thank-you/essay-grader', 'PaymentController@thankYouEssayGrader')->name('payments.thank-you.essay-grader');

Route::get('/trials/thank-you', 'RegistrationTrialController@thankYou')->name('trials.thank-you');

// Subscriptions //
Route::post('/subscriptions/create', 'SubscriptionController@create');

Route::post('subscriptions', 'SubscriptionsController@store');

Route::post('/subscriptions/cancel/{id}', 'StripeSubscriptionController@cancel')->name('subscriptions.cancel');

// Tools //
Route::post('/essay-submissions/handle', 'EssaySubmissionController@handleEssaySubmission')->name('essay-submissions.handle');

Route::post('grade-ielts-essay', 'OpenAiController@gradeIeltsEssay');

Route::post('grade-c1-advanced-essay', 'OpenAiController@gradeAdvancedEssay');

Route::post('correct-ielts-essay/{id}', 'OpenAiController@correctIeltsEssay');
// End tools //

// Contact form submissions // 

Route::middleware(ProtectAgainstSpam::class)->group(function () {
    Route::post('contact/store', 'ContactFormSubmissionController@store');
});

// Blog post redirects //
Route::get('blog/how-hard-is-it-to-learn-korean', function () {
    return redirect('blog/korean-hard-to-learn');
});
// End redirects //

// Localized Pages //
Route::middleware(['localization'])->group(function () {

   Route::prefix('{locale}')->group(function () {
        Route::get('/', 'PagesController@index')->name('welcome');        

        Route::get('contact', 'ContactFormSubmissionController@create')->name('contact');

        Route::get('/learn-korean', 'PagesController@learnKorean')->name('learn-korean');
        
        Route::get('/learn-thai', 'PagesController@learnThai')->name('learn-thai');

        Route::get('/learn-vietnamese', 'PagesController@learnVietnamese')->name('learn-vietnamese');

        Route::get('/impressum', 'PagesController@impressum')->name('impressum');

        Route::get('/general-terms', 'PagesController@terms')->name('general-terms');

        Route::get('/privacy-policy', 'PagesController@privacy')->name('privacy-policy');

        Route::get('/guides/{slug}', 'GuideController@show')->name('guide.show');

        Route::get('english/courses/online/ielts-writing/info', 'PagesController@ieltsWritingInfoShow')->name('ielts-writing-info');    

        Route::get('/resources/ielts-academic-words-flashcards', 'PagesController@ieltsFlashcardsOptin')->name('ielts-flashcards');

//       Route::get('/ielts-academic-words-flashcards/access', 'PagesController@ieltsFlashcardsAccess')->name('ielts-flashcards');

        Route::get('english/courses/online', 'CoursesController@Index')->name('courses.english.index');

       Route::get('/tools/c1-advanced-essay-grader', function () {
           $locale = app()->getLocale();
           return redirect("/{$locale}/tools/c1-advanced-essay-ai-grader");
       });

       Route::get('/tools/ielts-essay-ai-grader', 'PagesController@ieltsEssayGrader')->name('ielts-essay-grader');

       Route::get('/tools/ielts-essay-feedback', 'PagesController@ieltsEssayFeedback')->name('ielts-essay-feedback');        

       Route::get('/tools/c1-advanced-essay-ai-grader', 'PagesController@advancedEssayGrader')->name('advanced-essay-grader');

       Route::get('/tools/c1-advanced-essay-feedback', 'PagesController@advancedEssayFeedback')->name('advanced-essay-feedback');

       Route::get('/tools/c2-proficiency-essay-checker', 'PagesController@proficiencyEssayGrader')->name('proficiency-essay-grader');

       Route::get('/tools/b2-first-essay-checker', 'PagesController@firstEssayGrader')->name('first-essay-grader');

        Route::get('/tools/pte-essay-checker', 'PagesController@pteEssayGrader')->name('pte-essay-grader');

       // Course Registrations //
       Route::get('/registrations/confirm', 'RegistrationController@confirm')->name('registration.confirm');

       // Student Dashboard //
       Route::middleware(['auth'])->middleware('verified')->group(function () {
           Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

           Route::get('/dashboard/courses', 'DashboardController@courseIndex')->name('dashboard.courses');

           Route::get('/dashboard/courses/{id}/overview', 'DashboardController@courseShow')->name('dashboard.courses.show');

           Route::get('/dashboard/courses/{id}/progress', 'CourseProgressController@index')->middleware('auth')->name('dashboard.courses.progress.index');

           Route::get('/dashboard/quizzes', 'QuizController@dashboardIndex')->name('dashboard.quizzes.index');

           Route::get('/dashboard/quizzes/graded', 'QuizController@dashboardGradedIndex')->name('dashboard.quizzes.graded.index');

           Route::get('/dashboard/quizzes/{id}', 'QuizController@dashboardShow')->name('dashboard.quizzes.show');

           Route::post('/dashboard/quizzes/store', 'QuizController@store');

           Route::get('/dashboard/flashcards', 'FlashcardSetController@dashboardIndex')->name('dashboard.flashcards.index');

           Route::get('/dashboard/assignments', 'AssignmentController@dashboardIndex')->middleware('auth')->name('dashboard.assignments.index');

           Route::get('/dashboard/courses/{id}/assignments', 'AssignmentController@index')->middleware('auth')->name('dashboard.courses.assignments.index');

           Route::get('/dashboard/courses/{courseId}/lessons', 'DashboardController@lessonIndex')->middleware('auth')->name('dashboard.lessons.index');

            // Exam Prep //

            // Cambridge //
           Route::namespace('\App\Http\Controllers\CambridgeCoach')->group(function () {
                // Writing Checker
                Route::get('my/exam-prep/cambridge/writing/submit', 'WritingController@create')->name('dashboard.exam-prep.cambridge.writing.submit');
                Route::get('my/exam-prep/cambridge/writing/feedback', 'WritingController@index')->name('dashboard.exam-prep.cambridge.writing.feedback.index');
                Route::get('my/exam-prep/cambridge/writing/success', 'WritingController@success')->name('dashboard.exam-prep.cambridge.writing.success');
                Route::get('my/exam-prep/cambridge/writing/progress', 'WritingController@progress')->name('dashboard.exam-prep.cambridge.writing.progress');
                Route::get('my/exam-prep/cambridge/writing/feedback/{id}', 'WritingController@show')->name('dashboard.exam-prep.cambridge.writing.feedback.show');
                // Speaking Coach 
                // Speaking Checker //
                Route::get('my/exam-prep/cambridge/speaking/practice-tests/feedback/{id}', 'SpeakingController@feedbackShow')->name('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback.show');
                Route::get('my/exam-prep/cambridge/speaking/practice-tests/feedback', 'SpeakingController@feedbackIndex')->name('dashboard.exam-prep.cambridge.speaking.practice-tests.feedback.index');
                Route::get('my/exam-prep/cambridge/speaking/practice-tests/{id}', 'SpeakingController@submit')->name('dashboard.exam-prep.cambridge.speaking.practice-tests.submit');
                Route::get('my/exam-prep/cambridge/speaking/practice-tests', 'SpeakingController@index')->name('dashboard.exam-prep.cambridge.speaking.practice-tests.index');                                        
           });

            // IELTS //
            Route::namespace('\App\Http\Controllers\IeltsCoach')->group(function () {
                // Writing Checker //
                Route::get('dashboard/exam-prep/ielts/writing/submit', 'WritingController@create')->name('dashboard.exam-prep.ielts.writing.submit');
                Route::get('dashboard/exam-prep/ielts/writing/feedback', 'WritingController@index')->name('dashboard.exam-prep.ielts.writing.feedback.index');
                Route::get('dashboard/exam-prep/ielts/writing/success', 'WritingController@success')->name('dashboard.exam-prep.ielts.writing.success');
                Route::get('dashboard/exam-prep/ielts/writing/progress', 'WritingController@progress')->name('dashboard.exam-prep.ielts.writing.progress');
                Route::get('dashboard/exam-prep/ielts/writing/feedback/{id}', 'WritingController@show')->name('dashboard.exam-prep.ielts.writing.feedback.show');
                // Writing Practice //
                Route::get('dashboard/exam-prep/ielts/writing/practice/thesis', 'WritingController@thesis')->name('dashboard.exam-prep.ielts.writing.practice.thesis');
                Route::get('dashboard/exam-prep/ielts/writing/practice/introduction', 'WritingController@introduction')->name('dashboard.exam-prep.ielts.writing.practice.introduction');
                Route::get('dashboard/exam-prep/ielts/writing/practice/task-two-outline', 'WritingController@taskTwoOutline')->name('dashboard.exam-prep.ielts.writing.practice.task-two-outline');
                // Speaking Checker //
                Route::get('my/exam-prep/ielts/speaking/practice-tests/feedback/{id}', 'SpeakingController@feedbackShow')->name('dashboard.exam-prep.ielts.speaking.practice-tests.feedback.show');
                Route::get('my/exam-prep/ielts/speaking/practice-tests/feedback', 'SpeakingController@feedbackIndex')->name('dashboard.exam-prep.ielts.speaking.practice-tests.feedback.index');                
                Route::get('my/exam-prep/ielts/speaking/practice-tests/{id}', 'SpeakingController@submit')->name('dashboard.exam-prep.ielts.speaking.practice-tests.submit');
                Route::get('my/exam-prep/ielts/speaking/practice-tests', 'SpeakingController@index')->name('dashboard.exam-prep.ielts.speaking.practice-tests.index');                                        
            });

            // PEARSON //
            Route::namespace('\App\Http\Controllers\PearsonCoach')->group(function () {
                Route::get('dashboard/exam-prep/pearson/writing/submit', 'WritingController@create')->name('dashboard.exam-prep.pearson.writing.submit');
                Route::get('dashboard/exam-prep/pearson/writing/feedback', 'WritingController@index')->name('dashboard.exam-prep.pearson.writing.feedback.index');
                Route::get('dashboard/exam-prep/pearson/writing/success', 'WritingController@success')->name('dashboard.exam-prep.pearson.writing.success');
                Route::get('dashboard/exam-prep/pearson/writing/progress', 'WritingController@progress')->name('dashboard.exam-prep.pearson.writing.progress');
                Route::get('dashboard/exam-prep/pearson/writing/feedback/{id}', 'WritingController@show')->name('dashboard.exam-prep.pearson.writing.feedback.show');
            });

           // End //

           Route::get('dashboard/essays/feedback', 'EssaySubmissionController@index')->name('dashboard.essays.feedback.index');

           Route::get('dashboard/essays/create', 'EssaySubmissionController@create')->name('dashboard.essays.create');

           Route::get('dashboard/essays/success', 'EssaySubmissionController@success')->name('dashboard.essays.success');

           Route::get('dashboard/essays/corrections', 'EssayCorrectionController@index')->name('dashboard.essays.corrections.index');

           Route::get('dashboard/essays/progress', 'EssaySubmissionController@progress')->name('dashboard.essays.progress');

           Route::get('dashboard/essays/feedback/{id}', 'EssaySubmissionController@show')->name('dashboard.essays.feedback.show');

           Route::get('dashboard/essays/corrections/{id}', 'EssayCorrectionController@show')->name('dashboard.essays.corrections.show');

           Route::get('dashboard/essays/practice/thesis', 'EssayPracticeController@thesis')->name('dashboard.essays.practice.thesis');

            Route::get('dashboard/essays/practice/introduction', 'EssayPracticeController@introduction')->name('dashboard.essays.practice.introduction');

           Route::get('dashboard/essays/practice/task-two-outline', 'EssayPracticeController@taskTwoOutline')->name('dashboard.essays.practice.task-two-outline');

           Route::middleware(['lesson.access'])->group(function () {
               Route::post('/dashboard/courses/{courseId}/lessons/{lessonId}/mark-complete/{experience}', 'LessonProgressController@markLessonComplete')->middleware('auth')->name('dashboard.lessons.mark-complete');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}', 'DashboardController@lessonShow')->middleware('auth')->name('dashboard.lessons.show');

               Route::post('/dashboard/goToNextLesson/{lessonId}', 'DashboardController@goToNextLesson')->middleware('auth')->name('dashboard.lessons.goToNextLesson');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/vocabulary-words', 'DashboardController@vocabularyWordsIndex')->middleware('auth')->name('dashboard.lessons.vocabulary-words.index');
//
//               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/vocabulary-practice', 'VocabularyPracticeController@index')->middleware('auth')->name('dashboard.lessons.vocabulary-practice.index');
//
//               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/vocabulary-practice/{wordId}', 'VocabularyPracticeController@show')->middleware('auth')->name('dashboard.lessons.vocabulary-practice.show');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/flashcards', 'DashboardController@flashcardIndex')->middleware('auth')->name('dashboard.lessons.flashcards.index');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/guided-practice', 'ExerciseController@guidedPracticeShow')->middleware('auth')->name('dashboard.lessons.guided-practice.show');

               Route::post('/dashboard/lessons/exercises/grade-exercise/{lessonId}', 'ExerciseController@gradeExercise')->name('exercises.grade-exercise');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/guided-practice/results', 'ExerciseController@guidedPracticeResults')->middleware('auth')->name('dashboard.lessons.guided-practice.results');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/free-practice', 'ExerciseController@freePracticeShow')->middleware('auth')->name('dashboard.lessons.free-practice.show');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/free-practice/results', 'ExerciseController@freePracticeResults')->middleware('auth')->name('dashboard.lessons.free-practice.results');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/quiz', 'DashboardController@QuizShow')->middleware('auth')->name('dashboard.lessons.quiz.show');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/progress', 'LessonProgressController@show')->middleware('auth')->name('dashboard.lessons.progress.show');

               Route::get('/dashboard/courses/{courseId}/lessons/{lessonId}/quiz/results', 'DashboardController@quizResultsShow')->middleware('auth')->name('dashboard.lessons.quiz.results');
           });

           Route::get('/dashboard/registrations/create', 'RegistrationController@create')->name('dashboard.registrations.create');

           Route::get('/dashboard/registrations/confirm', 'RegistrationController@confirm')->name('dashboard.registrations.confirm');

           Route::get('/dashboard/payments', 'DashboardController@payments')->name('dashboard.payments');

           Route::get('/dashboard/payments/methods/create', 'PaymentMethodController@create')->name('dashboard.payments.methods.create');

           Route::get('/dashboard/payments/methods', 'PaymentMethodController@index')->name('dashboard.payments.methods.index');

           Route::get('/dashboard/subscriptions', 'DashboardController@subscriptions')->name('dashboard.subscriptions.index');

           Route::get('/dashboard/company', 'DashboardController@companyIndex')->name('dashboard.company');

       });
   });
   // End Localized Pages //

    // Teacher Dashboard //
    Route::middleware(['auth'])->group(function () {

        Route::get('/myteacher', 'MyTeacherController@index')->middleware('auth')->name('myteacher');

        Route::get('/myteacher/courses', 'MyTeacherController@coursesIndex');

        Route::get('/myteacher/courses/{id}', 'MyTeacherController@showCourse');

        Route::get('/myteacher/courses/update/{id}', 'MyTeacherController@update');

        Route::get('/myteacher/assignments/create', 'AssignmentController@create');

        Route::get('/myteacher/assignments', 'AssignmentController@myteacherIndex');

        Route::get('/myteacher/quizzes', 'MyTeacherController@quizzesIndex');

        Route::get('/myteacher/quizzes/assign', 'QuizController@assign');

        Route::get('/myteacher/quizzes/create', 'QuizController@create');

        Route::get('/myteacher/quizzes/{id}', 'QuizController@show')->name('myteacher-quizzes-show');

        Route::get('/myteacher/students', 'MyTeacherController@studentsIndex');

        Route::get('/myteacher/exercises/create', 'ExerciseController@create');

        Route::get('/myteacher/exercises/{id}', 'ExerciseController@show')->name('myteacher-exercises-show');
    });    

    // Mail Previews //
    Route::get('/mail/welcome/first', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Welcome\First($user);
    });

    Route::get('/mail/ielts/first', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Welcome\Ielts\First($user);
    });

    Route::get('/mail/welcome/ielts/registration-reminder', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Welcome\Ielts\RegistrationReminder($user);
    });

    Route::get('/mail/learning-paths/beta-offer', function () {
        $email = 'lucasanthonyweaver@gmail.com';
        return new App\Mail\LearningPaths\BetaOffer($email);
    });

    Route::get('/mail/newsletter/welcome', function () {
        $email = 'lucasanthonyweaver@gmail.com';
        return new App\Mail\Newsletter\Welcome($email);
    });

    Route::get('/mail/welcome/first', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Welcome\First($user);
    });

    Route::get('/mail/subscriptions/confirmations/pro', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Subscriptions\Confirmations\Pro($user);
    });

    Route::get('/mail/subscriptions/upgrades/basic-essays', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Subscriptions\Upgrades\BasicEssays($user);
    });

    Route::get('/mail/subscriptions/upgrades/basic-essays-discount', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Subscriptions\Upgrades\BasicEssaysDiscount($user);
    });

    Route::get('/mail/subscriptions/upgrades/pro-essays-notification', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Subscriptions\Upgrades\ProEssaysNotification($user);
    });

    Route::get('/mail/subscriptions/upgrades/pro-essays-discount-offer', function () {
        $user = App\Models\User::find(771);
        return new App\Mail\Subscriptions\Upgrades\ProEssaysDiscountOffer($user);
    });

    Route::get('/mail/updates/new-essays-features', function () {        
        return new App\Mail\Updates\NewEssaysFeatures();
    });

    Route::get('/mail/offers/discounts/exam-prep-40', function () {
        return new App\Mail\Offers\Discounts\ExamPrep40();
    });
});

Route::get('/debug-sentry', function() {
    throw new Exception('My first Sentry error!');
});

Route::get('{locale}/my/account', function() {
    $user = auth()->user();
    return view('dashboard.account.index', ['user' => $user]);
})->middleware('auth')->name('account.index');

Route::get('{locale}/my/account/api-keys/new', 'ApiKeyController@create')->name('api-keys.create');

Route::get('{locale}/my/account/api-keys/{token}', 'ApiKeyController@show')->name('api-keys.show');

Route::post('/api-keys/generate', 'ApiKeyController@generate')->name('api-keys.generate');

Route::get('{locale}/my/account/referrals', 'ReferralController@index')->name('referrals.index');

Route::get('{locale}/my/account/communications', 'CommunicationPreferencesController@index')->name('communications.index');

Route::post('/communications/store', 'CommunicationPreferencesController@store')->name('communications.store');

Route::post('/update-personal-information', 'UserController@updatePersonalInformation')->name('update-personal-information');

Route::post('/update-email-address', 'UserController@updateEmailAddress')->name('update-email-address');




