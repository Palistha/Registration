@extends('layouts/template')

@section('content')
<h3>Homepage for user:{{\Auth::user()->name}}</h3>

@endsection