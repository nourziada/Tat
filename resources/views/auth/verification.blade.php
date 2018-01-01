@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix user-page">
        <div class="container">
            <div class="row text-center">
                <!-- user-login -->     
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="user-account">
                        <h2>Verify  Your Account</h2>
                        <form name="registration_form" id="registration_form" method="POST" action="{{ route('verification.user') }}" autocomplete="off">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}">
                                <label class="required-field">*</label>
                                <input type="text" class="form-control" name="token" placeholder="Verification Code" required>

                                 @if ($errors->has('token'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>
                                @endif
                            </div>

                            
                            <div id="clear"></div>
                            <div class="form-group">    
                                <button type="submit" class="btn">verified</button>
                            </div>


                            
                            
                        <!-- checkbox -->
                          </form> 

                          <form method="post" action="{{route('verification.resend')}}">
                                {{csrf_field()}}
                                <button type="submit" style="border: none !important;background: #fff !important ;color: #114ba2 !important;">Resend Verification Token</button>
                            
                            </form>             
                    </div>
                </div><!-- user-login -->   
                

                            

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
                    <h4 class="modal-title">Please Check Your Email Account , and copy the verification Code and past it here to verifiy your Account</h4>
                </div>
                
                <div class="modal-footer mf">
                    <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
     </div>




@stop