<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['check-ticket-quota', 'check-registration-status']);
    }

	/**
	 * Displays a random question along with a second fixed question
	 * @return view
	 */
    public function questionnaire()
    {
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
