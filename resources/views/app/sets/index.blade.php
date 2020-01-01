@extends('layouts.app')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">
            @include('partials.sidebar')
        </div>
        <div class="eight wide column">
            <div class="ui cards">
                @each('partials.sets.home', $sets, 'set', 'partials.sets.getting-started')
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
