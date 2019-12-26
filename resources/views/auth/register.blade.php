@extends('layouts.web')

@section('content')

<div class="ui main raised very padded text container segment">
    <h3 class="ui header">
        {{ __('Trial Registration') }}
    </h3>
    {!! Form::post()->route('register') !!}
        {!! Form::text('name')
                ->label(__('Name'))
                ->hint($errors->first('name'), $errors->has('name') ? 'ui pointing red basic label' : '');
        !!}
        {!! Form::text('email')
                ->label(__('E-Mail Address'))
                ->hint($errors->first('email'), $errors->has('email') ? 'ui pointing red basic label' : '');
        !!}
        {!! Form::password('password')
                ->label(__('Password'))
                ->hint($errors->first('password'), $errors->has('password') ? 'ui pointing red basic label' : '');
        !!}
        {!! Form::password('password_confirmation')
                ->label(__('Confirm Password'))
                ->hint($errors->first('password_confirmation'), $errors->has('password_confirmation') ? 'ui pointing red basic label' : '');
        !!}
        <hr />
        {!! Form::text('institution')
                ->label(__('Institution'))
                ->hint($errors->first('institution'), $errors->has('institution') ? 'ui pointing red basic label' : '');
        !!}
        {!! Form::select('lms', [
                    'Blackboard' => 'Blackboard',
                    'Brightspace' => 'Brightspace',
                    'Canvas' => 'Canvas',
                    'Moodle' => 'Moodle',
                    'Sakai' => 'Sakai',
                    'Schoology' => 'Schoology',
                    'Other' => 'Other',
                ])
                ->placeholder('-- Select --')
                ->label(__('Choose Your LMS'))
                ->hint($errors->first('lms'), $errors->has('lms') ? 'ui pointing red basic label' : '');
        !!}
        {!! NoCaptcha::display() !!}
        <div class="clearfix">&nbsp;</div>
        {!! Form::submit(__('Register')) !!}
    {!! Form::close() !!}
</div>
@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush
