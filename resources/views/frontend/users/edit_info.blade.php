@extends('layouts.app')
@section('content')

    <div class="col-lg-9 col-12">
        <h3>Update Information</h3>
        {!! Form::open(['route' => 'users.update_info', 'name' => 'user_info', 'id' => 'user_info', 'method' => 'post', 'files' => true]) !!}
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name', auth()->user()->name), ['class' => 'form-control']) !!}
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', old('email', auth()->user()->email), ['class' => 'form-control']) !!}
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('mobile', 'Mobile') !!}
                    {!! Form::text('mobile', old('mobile', auth()->user()->mobile), ['class' => 'form-control']) !!}
                    @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('receive_email', 'Receive email') !!}
                    {!! Form::select('receive_email', ['1' => 'Yes', '0' => 'No'], old('receive_email', auth()->user()->receive_email), ['class' => 'form-control']) !!}
                    @error('receive_email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('bio', 'Bio') !!}
                    {!! Form::textarea('bio', old('bio', auth()->user()->bio), ['class' => 'form-control']) !!}
                    @error('bio')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="row">
            @if (auth()->user()->user_image != '')
                <div class="col-12">
                    <img src="{{ asset('assets/users/' . auth()->user()->user_image) }}" class="img-fluid" width="150" alt="{{ auth()->user()->name }}">
                </div>
            @endif
            <div class="col-12">
                <div class="form-group">
                    {!! Form::label('user_image', 'User image') !!}
                    {!! Form::file('user_image', ['class' => 'custom-file']) !!}
                    @error('user_image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {!! Form::submit('Update information', ['name' => 'update_information', 'class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

        <hr>

        <h3>Update Password</h3>
        {!! Form::open(['route' => 'users.update_password', 'name' => 'user_password', 'id' => 'user_password', 'method' => 'post']) !!}
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('current_password', 'Current password') !!}
                    {!! Form::password('current_password', ['class' => 'form-control']) !!}
                    @error('current_password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('password', 'New password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Re Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {!! Form::submit('Update Password', ['name' => 'update_password', 'class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>

    <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('partial.frontend.users.sidebar')
                </div>

@endsection
