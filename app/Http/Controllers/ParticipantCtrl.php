<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Participant;

class ParticipantCtrl extends BaseController
{
    public function save()
    { }

    public function all()
    {
        return Participant::all();
    }
}
