@extends('layouts.app')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">
            @include('partials.sidebar')
        </div>
        <div class="eight wide column">
            @if($sets->count() > 0)
                <h3 class="ui dividing header">
                    {{ __('Sets') }}
                </h3>
                <div class="ui link cards">
                    @each('partials.sets.home', $sets, 'set')
                </div>
            @endif
            @if($courses->count() > 0)
                <h3 class="ui dividing header">
                    {{ __('Courses') }}
                </h3>
                <div class="ui link cards">
                    @each('partials.courses.home', $courses, 'course')
                </div>
            @endif
        </div>
    </div>

@endsection

@push('scripts')

@endpush
