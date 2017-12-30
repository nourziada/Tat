@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->         
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">
                        <h2>User login</h2>
                        <!-- form -->
                        <form name="login_form" id="login_form" method="POST" action="{{ route('login') }}">

                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn">log in</button>
                        </form><!-- form -->
                    
                        <!-- forgot-password -->
                        <div class="user-option">
                            <div class="checkbox pull-left">
                                <label for="logged"><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="logged"> Save login data</label>
                            </div>
                            <div class="pull-right forgot-password">
                                <a href="forgot_password.php">did you forget your password</a>
                            </div>
                        </div><!-- forgot-password -->
                        
                            </div>
                            
                        </div>
                    </div>
                    <a href="signup.php" class="btn-primary">Create a new account</a>
                </div><!-- user-login -->
            </div><!-- row -->  
        </div><!-- container -->
    </section>

@stop