@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->     
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">
                        <h2>Reset Password</h2>
                        <form name="registration_form" id="registration_form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <label class="required-field">*</label>
                                <input type="email" class="form-control" name="email" placeholder="E-Mail Address" value="{{ $email or old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                                <label class="required-field">*</label>
                                <input type="password" class="form-control" name="password" placeholder="New Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            
                                <label class="required-field">*</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                            <div id="clear"></div>
                            <div class="form-group">    
                                <button type="submit" class="btn">Reset Password</button>
                            </div>
                        <!-- checkbox -->
                                        
                    </div>
                </div><!-- user-login -->   
                </form>     
            </div><!-- row -->  
        </div><!-- container -->
    </section><!-- signup-page -->
    

@stop