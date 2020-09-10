@extends('layouts.app')

@section('content')

    <div class="ui main raised very padded text container segment">
        <h3 class="ui header">
            {{ __('Confirm Password') }}
        </h3>
        {{ __('Please confirm your password before continuing.') }}
        {!! Form::post()->route('password.update') !!}
            {!! Form::password('password')
                    ->label(__('Password'))
                    ->hint($errors->first('password'), $errors->has('password') ? 'ui pointing red basic label' : '');
            !!}
            <div class="clearfix">&nbsp;</div>
            {!! Form::submit(__('Confirm Password')) !!}
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')

@endpush

