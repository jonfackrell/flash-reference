@extends('layouts.lti')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">

        </div>
        <div class="eight wide column">
            <h3 class="ui dividing header">
                Instructor Index
            </h3>
            <div class="ui link list">
                @foreach($sets as $set)
                    <a class="item">{{ $set->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
