@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->     
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">
                        <h2>Create a new account</h2>
                        <form name="registration_form" id="registration_form" method="POST" action="{{ route('register') }}" autocomplete="off">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="required-field">*</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>

                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label class="required-field">*</label>
                                <input type="number" class="form-control" name="phone" maxlength="16" placeholder="Phone number" aria-describedby="basic-addon3" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="required-field">*</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="required-field">*</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="col-sm-12 no-padding form-group adpost-details bottom-30">
                                <label class="col-sm-3 no-padding" style="text-align: left;">User Type</label>
                                <div class="col-sm-4 no-padding" style="text-align: left;">
                                    <input type="radio" id="usertype1" checked name="usertype" value="0"><label for="usertype1">person</label>
                                </div>
                                <div class="col-sm-4 no-padding" style="text-align: left;">
                                    <input type="radio" id="usertype2" name="usertype" value="1"><label for="usertype2">Dealer</label>
                                </div>
                            </div>

                            <div class="form-group checkbox">
                                <label class="pull-left signing-group" for="signing"><input type="checkbox" name="signing" id="signing" required> By signing up for an account you agree to the terms and conditions </label>
                            </div><!-- checkbox --> 
                            
                            <div id="clear"></div>
                            <div class="form-group">    
                                <button type="submit" class="btn">Register</button>
                            </div>
                        <!-- checkbox -->
                                        
                    </div>
                </div><!-- user-login -->   
                </form>     
            </div><!-- row -->  
        </div><!-- container -->
    </section><!-- signup-page -->
    
    <div id="useragreeModel" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content modl-c">
                <div class="modal-header">
                    <button type="button" class="close close-butn" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Attention</h4>
                </div>
                <div class="modal-body" id="group-content">
                    <h4 class="modal-title">I promise to pay the site commission 1% immediately after the sale</h4>
                </div>
                
                <div class="modal-footer mf">
                    <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
     </div>




@stop