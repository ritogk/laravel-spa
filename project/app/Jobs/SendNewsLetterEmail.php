<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class SendNewsLetterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $subject;
    private $message;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param string $subject
     * @param string $message
     * @return void
     */
    public function __construct(User $user, string $subject, string $message)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::raw($this->message, function ($message) {
            $message->to($this->user->email)->subject($this->subject);
        });
    }
}
