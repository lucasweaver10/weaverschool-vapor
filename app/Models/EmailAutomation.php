<?php

namespace App\Models;

use App\Mail\PaymentReminder;
use App\Mail\RegistrationReminder;
use App\Mail\Welcome\Ielts\RegistrationReminder as IeltsRegistrationReminder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class EmailAutomation extends Model
{
    use HasFactory;

    public static function sendRegistrationReminder($user) {
        $user = User::find($user->id);
        if(count($user->registrations->where('type', '!=', 'bonus')) == 0)
        {
            Mail::to($user->email)->send(new RegistrationReminder($user));
        }
        else {
            info('User has registrations!');
        }
    }

    public static function sendIeltsRegistrationReminder($user) {
        if(count($user->registrations->where('course_id', 1501)) == 0)
        {
            Mail::to($user->email)->send(new IeltsRegistrationReminder($user));
        }
        else {
            info('User has registrations!');
        }
    }

    public static function sendPaymentReminder($user) {
        Mail::to($user->email)->send(new PaymentReminder($user));
    }
}
