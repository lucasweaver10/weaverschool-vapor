<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class RegistrationTrial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function processActiveTrials()
    {
        $currentDate = now()->toDateString();        

        $activeTrials = RegistrationTrial::where('status', 'Active')
            ->where('end_date', '<', $currentDate)
            ->get();

        foreach ($activeTrials as $trial) {
            $trial->update(['status' => 'Completed']);
            $registration = $trial->registration;
            $payment = Payment::where('registration_id', $registration->id)->first();
            if ($payment->status == 'paid') {
                $registration->update(['status' => 'Active']);
            } else {
                $registration->update(['status' => 'Pending']);
                // Send email to user to notify them that their payment failed and trial has ended //
            }
        }
    }

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
