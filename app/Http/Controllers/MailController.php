<?php

namespace App\Http\Controllers;

use App\Repository\MailRepositoryInterface;
use App\Http\Requests\MailRequest;
use App\Jobs\SendEmail;
use App\Models\Mail;

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
        SendEmail::dispatch($request->to, $request->subject, $request->message);

        return response('Mail has been queued.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return Mail
     */
    public function show(Mail $mail)
    {
        return $mail;
    }
}
