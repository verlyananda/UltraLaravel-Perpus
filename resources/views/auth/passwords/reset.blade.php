@extends('layouts.app')

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

                    {!! Form::open(['url'=>'/password/reset', 'class'=>'form-horizontal'])!!}
<input type="hidden" name="token" value="{{ $token }}">
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
{!! Form::label('email', 'Alamat Email', ['class'=>'col-md-4 control-label'])!!}
<div class="col-md-6">
{!! Form::email('email', isset($email) ? $email : null, ['class'=>'form-control']) !!}
{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
{!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
<div class="col-md-6">
{!! Form::password('password', ['class'=>'form-control']) !!}
{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
{!! Form::label('password_confirmation', 'Konfirmasi Password', ['class'=>'col-md-4 contr\
ol-label']) !!}
<div class="col-md-6">
{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
{!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
<i class="fa fa-btn fa-refresh"></i> Reset Password
</button>
</div>
</div>
{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
