@extends('layouts.visitor')

@section('content')
	<div class="panel panel-default" style="margin-top: 100px;">
        <div class="panel-heading text-center"><h3>Server is Overloaded</h3></div>
        <div class="panel-body text-center">
            <p>Please try again after a few minutes.<a href="/questionnaire">registration page</a>.</p>
        </div>
    </div>
@endsection
