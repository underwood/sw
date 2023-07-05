<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateShipDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-ship-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the ship date based on information in the comments field.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating ship date...');

        $comments = \App\Models\Comment::all();

        foreach ($comments as $comment) {
            $comment->updateShipDate();
        }

        $this->info('Ship date updated.');
    }
}
