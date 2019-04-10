<?php

use Illuminate\Database\Seeder;
use App\Participant;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'name','surname','birthdate','street','npa','email','canSendNewsletter','hashAnswers'
        $testParticipant1 = new Participant([
            'name' => 'klark',
            'surname' => 'kent',
            'birthdate' => new DateTime('01/02/1999'),
            'street' => 'rue Metropolis 1',
            'npa' => 3432,
            'email' => 'kkent@test.ch',
            'canSendNewsletter' => true,
            'hashAnswers' => 'lsfjrdjghreudgnoerngeirure'
        ]);

        $testParticipant1->save();
    }
}
