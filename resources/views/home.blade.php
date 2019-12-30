@extends('layouts.app')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">
            <div class="ui vertical pointing menu">
                <a href="{{ route('home') }}" class="active item">
                    {{ __('Home') }}
                </a>
            </div>
        </div>
        <div class="eight wide column">
            <div class="ui cards">
                @each('partials.sets.home', $user->sets, 'set', 'partials.sets.getting-started')
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
