@extends('layouts.app')

@section('content')

<form  method="POST" action="{{ route('login') }}" class="login-form">
    @csrf
    <div class="panel panel-body">
        <div class="text-center">
            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
            <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
        </div>

        <div class="form-group has-feedback has-feedback-left {{ $errors->has('email') ? ' has-error' : '' }}">
            <input placeholder="{{ __('E-Mail Address') }}"  id="email" type="email" 
            class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback has-feedback-left {{  $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group ">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn bg-pink-400 btn-block">
                {{ __('Login') }}
                <i class="icon-circle-left2 position-right"></i>
            </button>
        </div>

        <div class="text-center">
            <a href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
    </div>
</form>
@endsection

