<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Mail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a list of mails can be retrieved.
     */
    public function test_mails_are_listed_correctly()
    {
        $response = $this->get(route('mail.index'));

        $response->assertStatus(200);
    }

    /**
     * Test if a single mail resource can be retrieved.
     */
    public function test_mail_can_be_viewed()
    {
        $mail = Mail::factory()->create();

        $response = $this->get(route('mail.show', $mail));

        $response->assertStatus(200);
    }

    /**
     * Test if a mail database entry is added upon creation.
     */
    public function test_mail_can_be_created()
    {
        $this->post(route('mail.store', [
            'to' => 'test@example.org',
            'subject' => 'Test',
            'message' => 'Test message',
        ]));

        $this->assertDatabaseCount('mails', 1);
    }
}
