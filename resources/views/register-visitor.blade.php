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
					    {{ Form::hidden('slogan', Crypt::encrypt($slogan) ) }}
					    <div class="form-group">
					    	<input type="text" class="form-control" name='name' placeholder="Enter your name" value="{{ old('name') }}" required>
					    </div>
					    <div class="form-group">
					    	<input type="email" class="form-control" name='email' placeholder="Enter your email address" value="{{ old('email') }}" required>
					    </div>
					    <div class="form-group">
					    	<div class="input-group">
					    		<div class="input-group-addon">+880</div>
						    	<input type="number" class="form-control" name='phone' placeholder="Enter your phone number" value="{{ old('phone') }}" required>
					    	</div>
					    </div>
					    <div class="form-group">
					    	<button type="submit" class="btn btn-primary center-block">Request Ticket</button>
					    </div>
					</form>
					@if (count($errors))
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
