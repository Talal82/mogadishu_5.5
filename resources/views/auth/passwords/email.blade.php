@extends('layouts.middle_master')

@section('title', 'Password Recovery ')

@section('content')

            
            <div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Reset Password</h4>

                    <p class="text-muted m-b-0 font-13 m-t-20">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
                </div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" action="{{ route('password.email') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" required="" placeholder="Enter email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20 m-b-0">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Send Email</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end card-box -->

            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Already have account?<a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
                </div>
            </div>

@endsection