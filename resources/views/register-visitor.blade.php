@extends('layouts.visitor')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h3>Enter your details</h3></div>
                <div class="panel-body">
                    <form method="POST" action="/generate-ticket">
					    {{ csrf_field() }}
					    <input type="hidden" name="slogan" value="{{ $slogan }}">
					    <div class="form-group">
					    	<input type="text" class="form-control" name='name' placeholder="Enter your name" required>
					    </div>
					    <div class="form-group">
					    	<input type="email" class="form-control" name='email' placeholder="Enter your email address" required>
					    </div>
					    <div class="form-group">
					    	<input type="tel" class="form-control" name='phone' placeholder="Enter your phone number" required>
					    </div>
					    <div class="form-group">
					    	<button type="submit" class="btn btn-primary center-block">Request Ticket</button>
					    </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
