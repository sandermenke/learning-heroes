<?php

namespace App\Http\Controllers;

use App\Repository\MailRepositoryInterface;
use App\Http\Requests\MailRequest;
use App\Jobs\SendEmail;

class MailController extends Controller
{
    private $mailRepository;

    /**
     * MailController constructor.
     *
     * @param  MailRepositoryInterface  $mailRepository
     */
    public function __construct(MailRepositoryInterface $mailRepository)
    {
        $this->mailRepository = $mailRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        return $this->mailRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MailRequest $request)
    {
        $emails = explode(',', str_replace(' ', '', $request->emails));

        foreach ($emails as $email) {
            SendEmail::dispatch($email, $request->subject, $request->message);
        }

        return response('Mail has been queued.');
    }
}
