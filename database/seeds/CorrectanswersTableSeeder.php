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
        $arrayCorrectHash = [
            'f1abd670358e036c31296e66b3b66c382ac00812',
            '7ee85206c565e76ac292108e4c0b094c4fa4ec37',
            'daa607707d1fe35772d5d37e08cae9e75ec61b47',
            'bc124a6a8b165d27282d5d25a45ed5d2dd0add94',
            '548f493f7601b9923fc4bd9ce1af2e8d04c1f340',
            'df82de49db4b352799887f0044d58820e5adcd0b'
        ];

        for ($i = 1; $i <= 6; $i++) { 
            $corAnswer = new Correctanswer([
                'idQuestion' => $i,
                'correctHash' => $arrayCorrectHash[$i-1]
            ]);
            $corAnswer->save();
        }

    }
}
