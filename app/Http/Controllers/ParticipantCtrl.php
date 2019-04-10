<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Participant;
use \Illuminate\Http\Request;

class ParticipantCtrl extends BaseController
{
    /* The request instance.
    *
    * @var \Illuminate\Http\Request
    */
    private $request;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Save a participant 
     */
    public function save()
    {
        // validate participant
        if (!$error = Participant::validate($this->request)) {
            return response()->json(
                ['error' => $error],
                401
            );
        }
    }

    /**
     * 
     * @return return all participant 
     */
    public function all()
    {
        return response()->json(Participant::all()->toJson());
    }
}
