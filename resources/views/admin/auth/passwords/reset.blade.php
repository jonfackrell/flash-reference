@extends('layouts.app')

@section('content')

    <div class="ui main raised very padded text container segment">
        <h3 class="ui header">
            {{ __('Reset Password') }}
        </h3>
        {!! Form::post()->route('admin.password.update') !!}
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
            <div class="clearfix">&nbsp;</div>
            {!! Form::submit(__('Reset Password')) !!}
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')

@endpush
