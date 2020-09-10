@extends('layouts.app')

@section('content')

<div id="app" class="ui container">
    <flashcards :cards='@json($set->cards)'
                :preview="false" @if($course) .
                :course="{{ $course->id }}" @endif
                :set="{{ $set->id }}" @if($section)
                :section="{{ $section }}" @endif>
    </flashcards>
</div>

@endsection

@push('styles')
    <style>

    </style>
@endpush


@push('scripts')
    {{--<script src="{{ asset('js/flashcards.js') }}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.0.22/collect.js"></script>
    <script src="/js/mousetrap.min.js"></script>
    <script>

    </script>
@endpush
