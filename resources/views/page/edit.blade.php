@extends('layouts/template')

@section('content')
<h1>Edit Form</h1>

        {!! Html::ul($errors->all(), array('class'=>'errors')) !!}

        {!! Form::model($register,['method' => 'PUT','route'=>['register.update',$register->id]]) !!}
   
    
    <div class="form-group">
        {!! Form::label('name', 'Username') !!}<br>
        {!! Form::text('name', null, array('class' => 'form-control','placeholder' => 'Your name')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-Mail Address') !!}<br>
        {!! Form::text('email', null, array('class' => 'form-control','placeholder' => 'example@gmail.com')) !!}
    </div>
    
   
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    @endsection