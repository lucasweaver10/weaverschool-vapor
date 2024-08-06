<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\OpenAiController;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::get('/courses', function () {
//    $response = array("message" => "Working");
//    // Convert the response to JSON format and return it
//    return response()->json($response);
//});

Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::post('/handle-chrome-extension', 'ChromeExtensionController@handle')->middleware('auth:sanctum');

Route::get('/courses/{courseId}/lesson-thumbnails/{lessonId}', 'CoursesController@getLessonThumbnail');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Webhooks //

// Mollie //

Route::post('mollie/webhook/customer', 'WebhooksController@handleCustomer');

Route::post('mollie/webhook/payment', 'WebhooksController@handlePayment');

Route::post('mollie/webhook/mandate', 'WebhooksController@handleMandate');

Route::post('mollie/webhook/trial/mandate', 'WebhooksController@handleTrialMandate');

Route::post('mollie/webhook/subscription', 'WebhooksController@handleSubscriptionPayment');

// End Mollie //

// Sendgrid //

Route::post('sendgrid/webhook', 'WebhooksController@handleSendgrid');

// End sendgrid //

// Typeform //

Route::post('typeform/webhook/level-test', 'WebhooksController@handleLevelTest');

// End Typeform //

// Invoicing //

Route::post('invoicingDetails/store', 'InvoicingDetailsController@store');

Route::post('invoices/sendToMoneybird', 'InvoiceController@sendToMoneybird');

Route::post('invoices/createInvoice', 'MoneybirdController@createInvoice');

// Course Registrations //

Route::resource('registration/update', 'RegistrationController');

Route::resource('registration/destroy', 'RegistrationController');

// Assignments //

Route::post('assignments/store', 'AssignmentController@store');

// Attachments //

Route::get('attachments/{filename}', 'AssignmentAttachmentController@show');

// Homework //

Route::get('homework/{filename}', 'CompletedHomeworkController@show');

Route::get('graded-homework/{filename}', 'GradedHomeworkController@show');

// Level Test //

Route::post('level-test/store', 'LevelTestController@store');

// Exercises //

// Vimeo //
Route::post('video-started', 'VideoActivityTrackingController@started');

Route::post('video-completed', 'VideoActivityTrackingController@completed');

// Audio //

Route::post('/upload-audio', function(Request $request) {
    $audio = $request->file('audio');
    $path = $audio->store('audio', 'public');
    $controller = new OpenAiController();
    $controller->transcribeAudio($path);
    return response('Audio uploaded successfully!');
});


