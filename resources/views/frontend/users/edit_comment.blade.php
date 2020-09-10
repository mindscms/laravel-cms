@extends('layouts.app')
@section('content')

    <div class="col-lg-9 col-12">
        <h3>Edit Comment on: ({{ $comment->post->title }})</h3>
        {!! Form::model($comment, ['route' => ['users.comment.update', $comment->id], 'method' => 'put']) !!}
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name', $comment->name), ['class' => 'form-control']) !!}
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', old('email', $comment->email), ['class' => 'form-control']) !!}
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    {!! Form::label('url', 'Website') !!}
                    {!! Form::text('url', old('url', $comment->url), ['class' => 'form-control']) !!}
                    @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-3">
                {!! Form::label('status', 'status') !!}
                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], old('status', $comment->status), ['class' => 'form-control']) !!}
                @error('status')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                {!! Form::label('comment', 'comment') !!}
                {!! Form::textarea('comment', old('comment', $comment->comment), ['class' => 'form-control']) !!}
                @error('comment')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group pt-4">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('partial.frontend.users.sidebar')
                </div>

@endsection
