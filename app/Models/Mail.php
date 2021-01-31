<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

    const STATUS_FAILED = 'failed';
    const STATUS_SUCCESS = 'success';
    const STATUS_QUEUED = 'queued';

    const SERVICE_MAILJET = 'mailjet';
    const SERVICE_SENDGRID = 'sendgrid';

    const STATUSES = [
        self::STATUS_FAILED,
        self::STATUS_SUCCESS,
        self::STATUS_QUEUED,
    ];

    const SERVICES = [
        self::SERVICE_MAILJET,
        self::SERVICE_SENDGRID,
    ];

    protected $fillable = [
        'to',
        'subject',
        'message',
        'mailing_service',
        'message_id',
        'status',
    ];
}
