<?php

namespace App\Repository\Eloquent;

use App\Repository\MailRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Mail;

class MailRepository extends BaseRepository implements MailRepositoryInterface
{
    /**
     * MailRepository constructor.
     *
     * @param  Mail  $model
     */
    public function __construct(Mail $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
