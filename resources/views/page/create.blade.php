@extends('layouts/template')

@section('content')
<h2>Please Register</h2>
       
        {!! Html::ul($errors->all(), array('class'=>'errors')) !!}

        {!! Form::open(array('url' => 'page/insert','class'=>'form' )) !!}


        <br>{!! Form::label('name', 'Username') !!}
        {!! Form::text('name', null, array('class' => 'form-control','placeholder' => 'Your name','required')) !!}
        <br>{!! Form::label('email', 'E-Mail Address') !!}
        {!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'example@gmail.com','required')) !!}
        <br>{!! Form::label('password', 'Password') !!}
        {!! Form::password('password', array('class' => 'form-control','required')) !!}
        <br>
        {!! Form::label('cpassword','Confirm Password',['class'=>'control-label']) !!}
        {!! Form::password('cpassword',['class'=>'form-control','required|same:password']) !!}
        <br>
        {!! Form::submit('Register' , array('class' => 'btn btn-small btn-success')) !!}<br>

        {!! Form::close() !!}
        <p>Already have an account?

        {!! HTML::link('login', 'SignIn', array('id' => 'linkid'), false) !!}
    </p>
@endsection