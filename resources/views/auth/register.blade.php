@extends('layouts.middle_master')

@section('title', 'Register User')


@section('content')
            <div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Register</h4>
                </div>
                <div class="p-20">
                    <form class="form-horizontal m-t-20" action="{{ route('register') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="full_name" class="form-control {{ $errors->has('full_name') ? ' is-invalid' : '' }}" type="text" required placeholder="Full Name" name="full_name" value="{{ old('full_name') }}" autofocus>
                                @if ($errors->has('full_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" required="" placeholder="Email" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" type="phone" required="" placeholder="Phone No." name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <select id="gender" name="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" type="text" required placeholder="Address" name="address" value="{{ old('address') }}" autofocus>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password_confirmation" name="password_confirmation" class="form-control" type="password" required placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
                                    Register Admin
                                </button>
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