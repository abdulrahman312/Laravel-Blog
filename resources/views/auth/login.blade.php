@extends('main')

@section('title', '| Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Form::open() !!}
                {{ Form::label('email', 'Email : ') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}

                {{ Form::label('password', 'Password : ') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                <br>
                {{ Form::checkbox('remember') }}
                {{ Form::label('remember', 'Remember Me') }}
                <br>
                {{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}

                <p><a href="{{ url('password/reset') }}">Forget Password</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
