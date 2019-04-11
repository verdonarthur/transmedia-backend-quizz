<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idQuestion', 'hashAnswer'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relation to Participant
     */
    public function participant()
    {
        return $this->belongsTo('App\Participant', 'idParticipant');
    }

    /**
     * Check if results is correct
     */
    public function check()
    {
        $correctAnswer = Correctanswer::findByIdQuestion($this->idQuestion);
        return $correctAnswer->correctHashAnswer === $this->hashAnswer;
    }

    public static function validate($data)
    {
        return Validator::make($data, [
            'idQuestion' => 'required | integer',
            'hashAnswer' => 'required | string',
        ])->after(function ($validator) use ($data){
            //if(self::where('idQuestion', $data['idQuestion'])->and->get() !== null){
            //    $validator->errors()->add('exists','the Answer for this question already exist');
            //}
            // TODO EVENTUALLY : CHECK IF AN ANSWER ALREADY EXIST WITH THE LINKED PARTICIPANT
        });
    }
}
