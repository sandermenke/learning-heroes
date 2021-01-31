<?php

namespace App\Services;

use SendGrid\Mail\Mail;

class SendgridService
{
    private $client;
    private $email;

    /**
     * MailjetService constructor.
     *
     */
    public function __construct()
    {
        $this->client = new \SendGrid(config('mail.mailers.sendgrid.api_key'));
        $this->email = new Mail();
    }

    /**
     * @param  string  $to
     * @param  string  $subject
     * @param  string  $message
     * @return array
     * @throws \SendGrid\Mail\TypeException
     */
    public function send(string $to, string $subject, string $message): array
    {
        $this->email->setFrom(config('mail.from.address'), config('mail.from.name'));
        $this->email->setSubject($subject);
        $this->email->addTo($to);
        $this->email->addContent('text/plain', $message);

        try {
            $response = $this->client->send($this->email);

            $success = $response->statusCode() === 202;
        } catch (\Exception $e) {
            $success = false;
        }

        return [
            'success' => $success,
        ];
    }
}
