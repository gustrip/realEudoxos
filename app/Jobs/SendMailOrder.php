<?php

namespace realEudoxos\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Mail;
use realEudoxos\Order;
use realEudoxos\Mail\MailOrder;

class SendMailOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $order;

    public $tries = 10;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {   
        $this->order=$order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email=new MailOrder($this->order);
        $user_email=$this->order->user->email;
        $email->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        Mail::to($user_email)->send($email);
    }
}
