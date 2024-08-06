<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class generateUserReferralCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-user-referral-codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add referral codes to users table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        foreach($users as $user) {
            $user->generateReferralCode();
        }

        return 'Referral codes created';
    }
}
