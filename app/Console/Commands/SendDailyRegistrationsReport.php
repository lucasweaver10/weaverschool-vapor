<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyRegistrationsReportMail;

class SendDailyRegistrationsReport extends Command
{
    protected $signature = 'report:daily-registrations';
    protected $description = 'Send a daily report of new user registrations';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {               
        $yesterday = now()->subDay()->startOfDay();
        $today = now()->startOfDay();

        $users = User::whereBetween('created_at', [$yesterday, $today])
                     ->with('userTrackingData') // Assuming relation exists on your User model
                     ->get();

        // Categories
        $categories = ['flashcards', 'learning-paths', 'cambridge', 'ielts', 'other'];
        $categorizedUsers = [];

        foreach ($categories as $category) {
            $categorizedUsers[$category] = collect(); // Initialize each category as an empty collection
        }

        // Categorize users
        foreach ($users as $user) {
            $found = false;
            foreach ($categories as $category) {
                if ($category !== 'other') {
                    $convertingPageUrl = strtolower($user->userTrackingData->converting_page_url ?? '');
                    $firstPageVisited = strtolower($user->userTrackingData->first_page_visited ?? '');
                    if ((isset($user->userTrackingData->converting_page_url) && strpos($convertingPageUrl, $category) !== false) ||
                        (isset($user->userTrackingData->first_page_visited) && strpos($firstPageVisited, $category) !== false)
                    ) {
                        $categorizedUsers[$category]->push($user);
                        $found = true;
                        break;
                    }
                }
            }
            if (!$found) {
                // If no specific category is found, categorize as 'other'
                $categorizedUsers['other']->push($user);
            }
        }
        Mail::to('lucas@weaverschool.com')->send(new DailyRegistrationsReportMail($categorizedUsers, $users->count()));
    }
}
