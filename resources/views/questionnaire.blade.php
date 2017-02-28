@extends('layouts.visitor')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form id="questionnaire-form" method="GET" action="/register-visitor">
			    {{ csrf_field() }}
				<p>{{ $question['question'] }}</p>
				{{ Form::hidden('question', Crypt::encrypt($question['id']) ) }}
				<div class="radio">
				  <label>
				    <input type="radio" name="answer" formnovalidate value="{{ Crypt::encrypt($question['option1']) }}" required>
				    {{ $question['option1'] }}
				  </label>
				</div>
				<div class="radio">
				  <label>
				    <input type="radio" name="answer" value="{{ Crypt::encrypt($question['option2']) }}">
				    {{ $question['option2'] }}
				  </label>
				</div>
				<div class="radio">
				  <label>
				    <input type="radio" name="answer" value="{{ Crypt::encrypt($question['option3']) }}">
				    {{ $question['option3'] }}
				  </label>
				</div>
				<hr>
			    <p>৭ই মার্চ আপনার জন্য কি ?</p>
			    <div class="radio">
				  <label>
				    <input type="radio" name="slogan" value="1" required>
				    আমার সাহস
				  </label>
				</div>
				<div class="radio">
				  <label>
				    <input type="radio" name="slogan" value="2">
				    আমার অহঙ্কার
				  </label>
				</div>
				<div class="radio">
				  <label>
				    <input type="radio" name="slogan" value="3">
				    আমার বিশ্বাস
				  </label>
				</div>
			    <div class="radio">
				  <label>
				    <input type="radio" name="slogan" value="4">
				    আমার প্রেরণা
				  </label>
				</div>
				<div class="form-group">
			    	<button type="submit" class="btn btn-primary center-block">Submit Answers</button>
			    </div>
			</form>
        </div>
    </div>
@endsection

@section('scripts')
	<script>
    	var questionnaire = document.getElementById('questionnaire-form'); // form has to have ID: <form id="formID">
        var isSafari = navigator.vendor && navigator.vendor.indexOf('Apple') > -1 && navigator.userAgent && !navigator.userAgent.match('CriOS');
        if(isSafari){
        	questionnaire.noValidate = true;
        	questionnaire.addEventListener('submit', function(event) { // listen for questionnaire submitting
	            if (!event.target.checkValidity()) {
	                event.preventDefault(); // dismiss the default functionality
	                alert('Please answer both the questions mentioned on the page before proceeding further.'); // error message
	            }
	        }, false);
        }
    </script>
@endsection
