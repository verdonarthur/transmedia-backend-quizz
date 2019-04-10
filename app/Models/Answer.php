<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idQuestion','hashAnswer'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [        
    ];

    public function participant(){
        return $this->belongsTo('App\Participant','idParticipant');
    }

}
