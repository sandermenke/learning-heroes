<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {--to=} {--subject=} {--message=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a simple email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        SendEmail::dispatch($this->option('to'), $this->option('subject'), $this->option('message'));
    }
}
