@extends('layouts.visitor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Questionaire Page</h3></div>
                <div class="panel-body">
                    <form method="POST" action="/register-visitor">
					    {{ csrf_field() }}
					    <p>What 7th March means to you ?</p>
					    <div class="radio">
						  <label>
						    <input type="radio" name="slogan" value="1" required>
						    Amar Shahosh
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="slogan" value="2">
						    Amar Ohongkar
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="slogan" value="3">
						    Amar Valobasha
						  </label>
						</div>
					    <div class="radio">
						  <label>
						    <input type="radio" name="slogan" value="4">
						    Amar something else
						  </label>
						</div>
						<div class="form-group">
					    	<button type="submit" class="btn btn-primary center-block">Submit Answers</button>
					    </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
