@extends('layouts.app')
@section('title')
    Register
@stop
@section('content')
    <div class="login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Person Registration System</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form class="text-left form-validate"  method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group-material">
                                        <input id="register-name" type="text"  required data-msg="Please enter your name" class="input-material {{ $errors->has('name') ? '  is-invalid' : '' }}"  name="name" value="{{ old('name') }}"  autofocus>
                                        <label for="register-username" class="label-material">Name</label>
                                    </div>
                                    <div class="form-group-material">
                                        <label for="register-type" class="label-material">Select User Type</label>
                                        <select id="register-type" required data-msg="Please select your type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type">
                                            <option value="">Select User Type</option>
                                            <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="normal" {{ old('type') == 'normal' ? 'selected' : '' }}>Normal Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group-material">
                                        <input id="register-email" type="email"  data-msg="Please enter a valid email address" required class="input-material {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                                        <label for="register-email" class="label-material">Email Address      </label>
                                    </div>
                                    <div class="form-group-material">
                                        <input id="register-password" type="password" name="password" required data-msg="Please enter your password" class="input-material {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                        <label for="register-password" class="label-material">Password        </label>
                                    </div>
                                    <div class="form-group-material">
                                        <input id="register-password" type="password" name="password_confirmation" required data-msg="Please confirm your password" class="input-material ">
                                        <label for="register-password" class="label-material">Confirm Password        </label>
                                    </div>
                                    <div class="form-group terms-conditions text-center">
                                        <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                                        <label for="register-agree">I agree with the <a href="http://generator.lorem-ipsum.info/terms-and-conditions" target="_blank">terms and policy</a></label>
                                    </div>
                                    <div class="form-group text-center">
                                        <input id="register" type="submit" value="Register" class="btn btn-primary">
                                    </div>
                                </form><small>Already have an account? </small><a href="{{route('login')}}" class="signup">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javaScripts')
    <script>
        @if ($errors->has('email'))
            Messenger.options=
            {
                extraClasses:"messenger-fixed messenger-on-top  messenger-on-right",
                theme:"flat",
                messageDefaults:{showCloseButton:!0}
            },
            Messenger().post({message:"{{ $errors->first('email') }}",
                type:"error"});
        @endif

        @if ($errors->has('firstname'))
            Messenger.options=
            {
                extraClasses:"messenger-fixed messenger-on-top  messenger-on-right",
                theme:"flat",
                messageDefaults:{showCloseButton:!0}
            },
            Messenger().post({message:"{{ $errors->first('firstname') }}",
                type:"error"});
        @endif

        @if ($errors->has('lastname'))
            Messenger.options=
            {
                extraClasses:"messenger-fixed messenger-on-top  messenger-on-right",
                theme:"flat",
                messageDefaults:{showCloseButton:!0}
            },
            Messenger().post({message:"{{ $errors->first('lastname') }}",
                type:"error"});
        @endif

        @if ($errors->has('password'))
            Messenger.options=
            {
                extraClasses:"messenger-fixed messenger-on-top  messenger-on-right",
                theme:"flat",
                messageDefaults:{showCloseButton:!0}
            },
            Messenger().post({message:"{{ $errors->first('password') }}",
                type:"error"});
        @endif

    </script>
@stop