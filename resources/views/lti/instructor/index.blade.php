@extends('layouts.lti')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">

        </div>
        <div class="eight wide column">
            <h3 class="ui dividing header">
                Choose a Study Set
            </h3>
            <div class="ui relaxed divided link list">
                @foreach($sets as $set)
                    <a class="item"
                       data-id="{{ $set->id }}"
                       data-uuid="{{ $set->uuid }}"
                    >
                        <div class="right floated content">
                            <span>{{ $set->cards_count }} Flashcards</span>
                        </div>
                        {{ $set->name }}
                        <br />
                        <span>
                            &nbsp;&nbsp;&nbsp;&nbsp;Updated {{ $set->updated_at->diffForHumans() }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @include('lti.instructor.parts.content-item-form')

@endsection

@push('scripts')
    <script>
        $(function(){
            $(document).on('click', '.link.list .item', function(e){
                e.preventDefault();
                var $item = $(this);
                app.returnLtiLink($item.text().trim(), '{{ route('lti.sets.index', ['institution' => $institution->id])}}/' + $item.data('uuid'));
            });
        });
    </script>
@endpush
