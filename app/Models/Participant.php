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
     * 
     * @return a json with the error
     */
    public static function validate(Request $request)
    {
        return Validator::make($request->all(),[
            'name' => 'required | string',
            'surname' => 'required | string',
            'birthdate' => 'required | date | date_format:dd-mm-yyyy',
            'street' => 'required | string',
            'npa' => 'required | integer',
            'email' => 'required | email',
            'canSendNewsletter' => 'required | boolean',
            'hashAnswers | string'
        ]);
    }
}
