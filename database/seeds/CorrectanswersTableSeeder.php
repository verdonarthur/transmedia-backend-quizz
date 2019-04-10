<?php

use Illuminate\Database\Seeder;
use App\Correctanswer;

class CorrectanswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answerOne = new Correctanswer([
            'idQuestion'=>1,
            'hashAnswer'=>'vdm2389h934'
        ]);
        $answerTwo = new Correctanswer([
            'idQuestion'=>2,
            'hashAnswer'=>'vdm2389h934'
        ]);
        $answerThree = new Correctanswer([
            'idQuestion'=>3,
            'hashAnswer'=>'vdm2389h934'
        ]);
        $answerFour = new Correctanswer([
            'idQuestion'=>4,
            'hashAnswer'=>'vdm2389h934'
        ]);
        $answerFive = new Correctanswer([
            'idQuestion'=>5,
            'hashAnswer'=>'vdm2389h934'
        ]);
    }
}
