@extends('layouts.app')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">
            @include('partials.sidebar')
        </div>
        <div class="eight wide column">
            <h3 class="ui dividing header">
                <a href="{{ route('sets.index') }}" class="right floated">
                    {{ __('View all') }}
                </a>
                {{ __('Recent Sets') }}
            </h3>
            <div class="ui link cards">
                @each('partials.sets.home', $sets, 'set', 'partials.sets.getting-started')
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
