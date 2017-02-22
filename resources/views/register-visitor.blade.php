@extends('layouts.visitor')

@section('content')
    <div class="panel panel-default">
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
			    <div class="form-inline">
			    	<div class="form-group" style="width: 50%;">
			    		<div style="width: 100%;" class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-autoclose="true">
				    		<div class="input-group-addon">
						        <span>DOB</span>
						    </div>
						    <input name="dob" class="form-control" placeholder="dd-mm-yyyy">
						</div>
				    	{{-- <input style="width: 100%;" type="text" class="form-control" name='dob' placeholder="Enter your date of birth" value="{{ old('dob') }}" required> --}}
				    </div>
				    <div class="form-group" style="padding-left: 10px;">
				    	<label style="padding-right: 10px;">Gender</label>
				    	<input type="radio" name="gender" value="m" style="margin-right: 5px" required> Male
				    	<input type="radio" name="gender" value="f" style="margin-left: 5px; margin-right: 5px;"> Female
				    </div>
			    </div>
			    <br>
			    <div class="form-group">
			    	<div class="input-group">
			    		<div class="input-group-addon">+88</div>
				    	<input type="number" class="form-control" name='phone' placeholder="Enter your phone number" value="{{ old('phone') }}" required>
			    	</div>
			    </div>
			    <div class="form-group">
			    	<input type="text" class="form-control" name='nid' placeholder="Enter your NID/Passport number" value="{{ old('nid') }}" required>
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
@endsection
