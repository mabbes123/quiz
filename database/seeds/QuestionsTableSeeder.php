<?php

use App\Options;
use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $question1 = new Question();
        $question1->topic_id = 1;
        $question1->question_text = 'Quel est le doctype d\'un document HTML5 ?';
        $question1->save();

        $q1answer1 = new Options();
        $q1answer1->question_id = 1;
        $q1answer1->option = '<!DOCTYPE html>';
        $q1answer1->correct = 1;
        $q1answer1->save();

        $q1answer2 = new Options();
        $q1answer2->question_id = 1;
        $q1answer2->option = '<!DOCTYPE html5>';
        $q1answer2->save();

        $q1answer3 = new Options();
        $q1answer3->question_id = 1;
        $q1answer3->option = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML5.0 Strict//EN">';
        $q1answer3->save();

        $question2 = new Question();
        $question2->topic_id = 1;
        $question2->question_text = 'Quelle est la syntaxe pour déclarer l\'encodage des caractères du document en UTF-8 ?';
        $question2->save();

        $q2answer1 = new Options();
        $q2answer1->question_id = 2;
        $q2answer1->option = '<meta encoding="text/html; charset=utf-8">';
        $q2answer1->save();

        $q2answer2 = new Options();
        $q2answer2->question_id = 2;
        $q2answer2->option = '<meta charset="utf-8">';
        $q2answer2->correct = 1;
        $q2answer2->save();

        $q2answer3 = new Options();
        $q2answer3->question_id = 2;
        $q2answer3->option = '<meta charset="text/html; UTF-8">';
        $q2answer3->save();

        $question3 = new Question();
        $question3->topic_id = 1;
        $question3->question_text = 'Quelle nouvelle balise de section permet de regrouper un contenu tangentiel au contenu principal du document ?';
        $question3->save();

        $q3answer1 = new Options();
        $q3answer1->question_id = 3;
        $q3answer1->option = '<aside>';
        $q3answer1->correct = 1;
        $q3answer1->save();

        $q3answer2 = new Options();
        $q3answer2->question_id = 3;
        $q3answer2->option = '<section id="sidebar">';
        $q3answer2->save();

        $q3answer3 = new Options();
        $q3answer3->question_id = 3;
        $q3answer3->option = '<sidebar>';
        $q3answer3->save();
    }
}
