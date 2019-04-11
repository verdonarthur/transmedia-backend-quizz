<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Correctanswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idQuestion','correctHashAnswer'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [        
    ];

    /**
     * 
     */
    public function checkAnswer(Answer $answer){
        return $this->correctHashAnswer === $answer->hashAnswer;
    }

    public static function findByIdQuestion($idQuestion){
        return self::where('idQuestion',$idQuestion)->get();
    }

}
