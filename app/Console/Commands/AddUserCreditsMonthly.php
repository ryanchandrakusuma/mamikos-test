<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddUserCreditsMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-user-credits-monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add credits to every users monthly';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::chunk(200, function ($users) {
            foreach ($users as $user) {
                $credits = 20;
                if ($user->hasRole('premium-user')) {
                    $credits = 40;
                }

                $user->increment('credits', $credits);
            }
        });

        $this->info('Credits added successfully.');
    }
}
