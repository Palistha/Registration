
@extends('layouts/template')

@section('content')
<style>
.myform {
border:1px solid #BEBEBE;
width:50%;
padding: 20px 12px 10px 20px;
margin:10px auto;
}
</style>

		
<div class='myform'>
	
		<h2>Log in</h2>
		<p><b><i>Provide your information</i></b></p>
		<hr>
		
{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}

		{!! Form::open(array('route'=>'handleLogin','class'=>'form'))!!}

		<br>{!! Form::label('email', 'E-Mail Address') !!}
		{!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'example@gmail.com','required|email|exists:users')) !!}
		<br>{!! Form::label('password', 'Password') !!}
		{!! Form::password('password', array('class' => 'form-control','placeholder' => '*********','required')) !!}
		<br>
		{!! Form::submit('Sign In' , array('class' => 'btn btn-primary')) !!}
		
{!! Form::close() !!}
		
		<p>Don't have an account?
		{!! HTML::link('register', 'Register', array('id' => 'linkid'), false) !!}
		</p>
	</div>


		@endsection



	