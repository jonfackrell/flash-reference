@extends('layouts.app')

@section('content')

    <div class="ui main raised very padded text container segment">
        <h3 class="ui header">
            {{ __('Reset Password') }}
        </h3>
        @if (session('status'))
            <div class="ui success message" role="alert">
                <p>{{ session('status') }}</p>
            </div>
        @endif
        {!! Form::post()->route('password.email') !!}
            {!! Form::text('email')
                    ->label(__('E-Mail Address'))
                    ->hint($errors->first('email'), $errors->has('email') ? 'ui pointing red basic label' : '');
            !!}
            <div class="clearfix">&nbsp;</div>
            {!! Form::submit(__('Send Password Reset Link')) !!}
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')

@endpush

