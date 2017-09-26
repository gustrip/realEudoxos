<?php

namespace realEudoxos\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Mail;
use realEudoxos\Mail\EmailVerification;

class SendVerificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    public $tries = 10;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EmailVerification($this->user);
        $email->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        Mail::to($this->user->email)->send($email);
    }
}
