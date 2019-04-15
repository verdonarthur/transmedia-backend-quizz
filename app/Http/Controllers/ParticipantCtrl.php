<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Participant;
use \Illuminate\Http\Request;
use PHPUnit\Runner\Exception;

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
        $validator = Participant::validate($this->request->all());
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(),
                400
            );
        }

        try {
            $participant = Participant::saveOne($this->request->all());

            return response()->json($participant, 200);
        } catch (Exception $e) {
            return response()->json(
                $e,
                500
            );
        }

        // validate participant
        //if ($participant) { }
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
