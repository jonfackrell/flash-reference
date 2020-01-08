@extends('layouts.app')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">
            @include('partials.sidebar')
        </div>
        <div class="eight wide column">
            <div class="ui segment">
                {!! Form::post()->route('courses.store') !!}
                    {!! Form::text('name')
                        ->label(__('Name'))
                        ->hint($errors->first('name'), $errors->has('name') ? 'ui pointing red basic label' : '');
                    !!}
                    {!! Form::select('institution_id', $user->institutions->first()->pluck('name', 'id'))->label('Institution'); !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
