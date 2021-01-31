<?php

namespace Database\Factories;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mailing_service' => $this->faker->randomElement(Mail::SERVICES),
            'message_id' => $this->faker->uuid,
            'status' => $this->faker->randomElement(Mail::STATUSES),
            'to' => $this->faker->email,
            'subject' => $this->faker->word,
            'message' => $this->faker->text,
        ];
    }
}
