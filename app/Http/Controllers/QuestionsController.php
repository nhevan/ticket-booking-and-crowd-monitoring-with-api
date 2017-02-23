<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
	/**
	 * Displays a random question along with a second fixed question
	 * @return view
	 */
    public function questionnaire()
    {
        $is_registration_allowed = Setting::where('setting', 'is_registration_allowed')->first()->value;
        if (!$is_registration_allowed) {
            return view('registration-on-pause');
        }
    	$question = $this->getRandomQuestion();

    	return view('questionnaire', compact('question'));
    }

    /**
     * returns a random question from thr questions table
     * @return Question 
     */
    protected function getRandomQuestion()
    {
    	$question = Question::inRandomOrder()->first();
    	return $question;
    }
}
