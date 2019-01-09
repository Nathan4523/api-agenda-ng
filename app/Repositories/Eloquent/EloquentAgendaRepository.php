<?php

namespace App\Repositories\Eloquent;

use App\Agenda;
use App\Repositories\Contracts\AgendaRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentAgendaRepository extends AbstractRepository implements AgendaRepository
{
    public function entity()
    {
        return Agenda::class;
    }
}
