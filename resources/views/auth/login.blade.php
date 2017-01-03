@extends('layouts.app')

@section('content')

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

      <div id="login-page">
        <div class="container">
             {!! Form::open(['url'=>'login', 'class'=>'form-horizontal']) !!}
              <div class="form-login">
                <h2 class="form-login-heading">sign in now</h2>
                <div class="login-wrap">
                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

{!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

                    <br>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
{!! Form::password('password', ['class'=>'form-control','placeholder'=>'Password']) !!}
{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
                   
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                    <hr>
                    
                   
                    
        
                </div>
        
                
        {!! Form::close() !!}
              </div>        
        
        </div>
      </div>

    

@endsection
