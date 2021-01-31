<?php

namespace App\Services;

use Mailjet\Client;
use Mailjet\Resources;

class MailjetService
{
    /**
     * MailjetService constructor.
     *
     */
    public function __construct()
    {
        $this->client = new Client(config('mail.mailers.mailjet.public_key'),
            config('mail.mailers.mailjet.private_key'), true, ['version' => 'v3.1']);
    }

    /**
     * @param  string  $to
     * @param  string  $subject
     * @param  string  $message
     * @return array
     */
    public function send(string $to, string $subject, string $message): array
    {
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => config('mail.from.address'),
                        'Name' => config('mail.from.name'),
                    ],
                    'To' => [
                        [
                            'Email' => $to,
                        ],
                    ],
                    'Subject' => $subject,
                    'TextPart' => $message,
                ],
            ],
        ];

        $response = $this->client->post(Resources::$Email, ['body' => $body]);

        return [
            'success' => $response->success(),
            'message_id' => $response->getData()['Messages'][0]['To'][0]['MessageID'],
        ];
    }
}
