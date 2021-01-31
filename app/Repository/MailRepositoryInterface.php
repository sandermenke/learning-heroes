<?php

namespace App\Repository;

use Illuminate\Support\Collection;
use App\Models\Mail;

interface MailRepositoryInterface
{
    public function all(): Collection;
}
