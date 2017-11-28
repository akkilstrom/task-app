@extends('layouts.master')

@section('content')
    <section class="login-content">
        <div class="login-container">
            <h1>Login</h1>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                <div class="form-group">
                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a><br>
                    <button class="login-btn" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div> <!-- /.login-container -->
    </section>
@endsection
