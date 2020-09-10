@extends('layouts.app')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">
            @include('partials.sidebar')
        </div>
        <div class="eight wide column">
            <div class="ui segment">
                {!! Form::bind($set)->put()->route('sets.update', ['set' => $set]) !!}
                    {!! Form::text('name')
                        ->label(__('Name'))
                        ->hint($errors->first('name'), $errors->has('name') ? 'ui pointing red basic label' : '');
                    !!}
                    @if($user->courses->count() >= 1)
                        {!! Form::select('course_id', $user->courses->pluck('name', 'id'))->label('Course'); !!}
                    @endif
                {!! Form::hidden('institution_id', $set->institution_id) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
