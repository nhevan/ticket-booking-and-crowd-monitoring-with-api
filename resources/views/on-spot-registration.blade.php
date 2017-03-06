@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
	                <form  id="register-form" method="POST" action="{{ route('generate-on-spot') }}">
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
					    <div class="form-group" style="padding-left: 10px;">
					    	<label style="padding-right: 10px;">Gender</label>
					    	<input type="radio" name="gender" value="m" style="margin-right: 5px" required> Male
					    	<input type="radio" name="gender" value="f" style="margin-left: 5px; margin-right: 5px;"> Female
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