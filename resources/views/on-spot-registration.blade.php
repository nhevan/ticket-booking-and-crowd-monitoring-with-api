@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
	                <form  id="register-form" method="POST" action="/test">
					    {{ csrf_field() }}
					    <div class="form-group">
					    	<input type="text" class="form-control" name='name' placeholder="Enter visitor's name" value="{{ old('name') }}" required>
					    </div>
					    
					    <div class="form-group">
					    	<div class="input-group">
					    		<div class="input-group-addon">+88</div>
						    	<input type="number" class="form-control" name='phone' placeholder="Enter visitor's phone number" value="{{ old('phone') }}" required>
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