@extends('layouts.app-auth')

@section('content')
    <section class="my_account_area pt--80 pb--55 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <div class="my__account__wrapper">
                        <h3 class="account__title">Reset Password</h3>
                        {!! Form::open(['route' => 'password.update', 'method' => 'post']) !!}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="account__form">
                            <div class="input__box">
                                {!! Form::label('email', 'Email *') !!}
                                {!! Form::email('email', old('email')) !!}
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="input__box">
                                {!! Form::label('password', 'Password *') !!}
                                {!! Form::password('password') !!}
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="input__box">
                                {!! Form::label('password_confirmation', 'Re-Password *') !!}
                                {!! Form::password('password_confirmation') !!}
                                @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form__btn">
                                {!! Form::button('Reset Password', ['type' => 'submit']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
