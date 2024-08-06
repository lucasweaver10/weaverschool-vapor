<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\Offers\Discounts\ExamPrep40;

class SendEmailToUserCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-to-user-collection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::whereHas('essaySubmissions', function ($query) {
            $query->where('created_at', '>=', now()->subDays(60));
        })
            ->whereDoesntHave('subscriptions')
            ->get();        

        Log::error('Sending email to: ' . $users->count() . ' users');

        foreach ($users as $user) {
            Mail::to($user->email)->send(new ExamPrep40());
        }
    }
}
