<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\CommunicationPreference;

class createUserCommunicationPreferences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user-communication-preferences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make new db records for communications preferences for all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::chunk(100, function ($users) {
            foreach ($users as $user) {
                if ($user->communicationPreferences()->count() === 0) {
                    try {
                        CommunicationPreference::create([
                            'user_id' => $user->id,
                            'email' => $user->email,
                        ]);
                    } catch (\Exception $e) {
                        // Log the error or handle it as necessary
                        Log::error('Error creating communication preference for user ID ' . $user->id . ': ' . $e->getMessage());
                    }
                }
            }
        });

        return 'Communication preference records created successfully.';
    }
}
