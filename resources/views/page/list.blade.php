@extends('layouts/template')

@section('content')
<html>
<head>
    <title>Detail Page</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
 {!! link_to_route('logout', 'Logout') !!}
<body>


<h1>List of Registers</h1>
<a href="{{URL::to('register/create')}}" class="btn btn-success">Create a New Registration</a><br>
<hr>

<table class="table table-striped table-bordered table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

    @foreach( $abc as $key=> $register)

        <tr>
             <td>{{ $register->id }}</td>
            <td>{{ $register->name }}</td>
            <td>{{ $register->email}}</td>
            <td>{{ $register->password }}</td>
            
                
            <td> 
                

                <a class="btn btn-small btn-primary" href="{{ URL::to('register/edit/'. $register->id) }}">Update </a>
                 {!! Form::open(array('url' => 'delete/' . $register->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete ', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

                
</td>
        </tr>
        @endforeach
        
     
    </table>

</div>
</body>
</html>
@endsection
