@extends('layouts.app')

@section('content')

    <!-- Affordable Price -->
    <section id="pricing" class="overview-block-ptb grey-bg iq-price-table">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ui main raised very padded text container segment">
                        <h3 class="ui header">
                            {{ __('Trial Registration') }}
                        </h3>
                        <hr />
                        {!! Form::post()->route('admin.register') !!}
                            {!! Form::text('name')
                                    ->label(__('Name') . ' <span style="color: red;">*</span>')
                                    ->hint($errors->first('name'), $errors->has('name') ? 'ui pointing red basic label' : '');
                            !!}
                            {!! Form::text('email')
                                    ->label(__('E-Mail Address') . ' <span style="color: red;">*</span>')
                                    ->hint($errors->first('email'), $errors->has('email') ? 'ui pointing red basic label' : '');
                            !!}
                            {!! Form::password('password')
                                    ->label(__('Password') .' <span style="color: red;">*</span>')
                                    ->hint($errors->first('password'), $errors->has('password') ? 'ui pointing red basic label' : '');
                            !!}
                            {!! Form::password('password_confirmation')
                                    ->label(__('Confirm Password') . ' <span style="color: red;">*</span>')
                                    ->hint($errors->first('password_confirmation'), $errors->has('password_confirmation') ? 'ui pointing red basic label' : '');
                            !!}
                            <hr />
                            {!! Form::text('institution')
                                    ->label(__('Institution') . ' <span style="color: red;">*</span>')
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
                                    ->label(__('Choose Your LMS') . ' <span style="color: red;">*</span>')
                                    ->hint($errors->first('lms'), $errors->has('lms') ? 'ui pointing red basic label' : '');
                            !!}
                            {!! NoCaptcha::display() !!}
                            <div class="clearfix">&nbsp;</div>
                            {!! Form::submit(__('Register')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    {!! NoCaptcha::renderJs() !!}
@endpush
