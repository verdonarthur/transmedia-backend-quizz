<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Http\Request;
use Validator;

class Participant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'birthdate', 'street', 'npa', 'email', 'canSendNewsletter', 'hashAnswers'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Default eloquent join for table
     */
    public function answers()
    {
        return $this->hasMany('App\Answer', 'id');
    }

    /**
     * validate a participant
     * @return Validator
     */
    public static function validate($data)
    {
        return Validator::make($data, [
            'name' => 'required | string',
            'surname' => 'required | string',
            'birthdate' => 'required | date_format:Y-m-d',
            'street' => 'required | string',
            'npa' => 'required | integer',
            'email' => 'required | email',
            'canSendNewsletter' => 'required | boolean',
            'hashAnswers' => 'required | string',
            'answers' => 'required | array'
        ]);
    }

    /**
     * check answer to save stats on how many answer are correct
     */
    public function checkAnswers($answers)
    {

        if ($this->isAllAnswerCorrect = $this->hashAnswers === env('HASH_ANSWERS')) {
            $this->nbrCorrectAnswer = env('TOTAL_NUMBER_QUESTION');
            return;
        }

        $this->nbrCorrectAnswer = 0;

        foreach ($answers as $answer) {
            if (Answer::validate($answer)->passes()) {
                $answerToSave = new Answer($answer);
                $answerToSave->participant()->associate($this);
                $answerToSave->save();

                if ($answerToSave->check()) {
                    $this->nbrCorrectAnswer++;
                }
            }
        }
        
        $this->save();
    }

    /**
     * Save a participant
     */
    public static function saveOne($data)
    {
        $participant = new Participant($data);
        $participant->save();
        $participant->checkAnswers($data['answers']);

        return $participant;
    }
}
