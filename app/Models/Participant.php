<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','birthdate','street','npa','email','canSendNewsletter','hashAnswers'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [        
    ];

    public function answers(){
        return $this->hasMany('App\Answer','id');
    }


}
