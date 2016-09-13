@extends('layouts/template')

@section('content')
<style>
.col-md-6{
border:1px solid #BEBEBE;
width:50%;
padding: 20px 12px 10px 20px;
margin:10pxauto;
}
</style>
<div class="row">
    <div class="col-md-6">
        <h2>Please Register</h2>
       
        {!! Html::ul($errors->all(), array('class'=>'errors')) !!}

        {!! Form::open(array('url' => 'register/insert','class'=>'form' )) !!}


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
        <p>Have an account?

        {!! HTML::link('login', 'LogIn', array('id' => 'linkid'), false) !!}
    </p>
        
    </div>
</div>
 @endsection