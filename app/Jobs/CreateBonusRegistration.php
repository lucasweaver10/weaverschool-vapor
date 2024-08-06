<?php

namespace App\Jobs;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateBonusRegistration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected  $userId;
    
     public function __construct($userId)
    {
        $data = [
            'type' => 'private',
            'course_id' => '1001',
            'course_name' => 'The Neuroscience of Learning',
            'subcategory_id' => 1,
            'status' => 'Active',
            'experience' => 'Online',
            'user_id' => $userId,
            'user_name' => 'Unknown',
            'total_hours' => 1,
            'weekly_lessons' => 1,
            'outstanding_balance' => 0.00,
            'total_paid' => 0.00,
            ];
    
            $registration = Registration::create($data);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
