@extends('main')

@section('title', '| Forgot my Password')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => 'password/email', 'method' => 'post']) !!}

                    {{ Form::label('email', 'Email Address : ') }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}

                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
