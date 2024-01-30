<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class AddUserCreditsDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-user-credits-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add credits to every users daily';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Adding 40 credits to each user...');

        User::chunk(200, function ($users) {
            foreach ($users as $user) {
                $credits = 20;
                if ($user->hasRole('premium-user')){
                    $credits = 40;
                }

                $user->increment('credits', $credits);
            }
        });

        $this->info('Credits added successfully.');
    }
}
