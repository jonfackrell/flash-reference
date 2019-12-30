@extends('layouts.web')

@section('content')

    <div class="ui main raised very padded text container segment">
        <h3 class="ui header">
            {{ __('Login') }}
        </h3>
        {!! Form::post()->route('admin.login') !!}
            {!! Form::text('email')
                    ->label(__('E-Mail Address'))
                    ->hint($errors->first('email'), $errors->has('email') ? 'ui pointing red basic label' : '');
            !!}
            {!! Form::password('password')
                    ->label(__('Password'))
                    ->hint($errors->first('password'), $errors->has('password') ? 'ui pointing red basic label' : '');
            !!}
            <div class="clearfix">&nbsp;</div>
            {!! Form::submit(__('Login')) !!}
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')

@endpush

