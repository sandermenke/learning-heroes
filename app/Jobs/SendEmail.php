<?php

namespace App\Jobs;

use App\Repository\Eloquent\MailRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\MailjetService;
use Illuminate\Bus\Queueable;
use App\Models\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $to;
    private $subject;
    private $message;

    /**
     * Create a new job instance.
     *
     * @param  string  $to
     * @param  string  $subject
     * @param  string  $message
     */
    public function __construct(string $to, string $subject, string $message)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @param  MailRepository  $mailRepository
     * @return void
     */
    public function handle(MailRepository $mailRepository)
    {
        $mail = $mailRepository->create([
            'mailing_service' => Mail::SERVICE_MAILJET,
            'status' => Mail::STATUS_QUEUED,
            'to' => $this->to,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $mjService = new MailjetService();
        $response = $mjService->send($this->to, $this->subject, $this->message);

        if ($response['success']) {
            $mail->update([
                'message_id' => $response['message_id'],
                'status' => Mail::STATUS_SUCCESS,
            ]);
        }
    }
}
