<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailgunTest;


class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $user_correct_choices;
    /**
     * Create a new job instance.
     */
    public function __construct($name,$user_correct_choices)
    {
        $this->name = $name;
        $this->user_correct_choices = $user_correct_choices;
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('losegroove31@gmail.com')->send(new MailgunTest($this->name,$this->user_correct_choices));
        //
    }
}
