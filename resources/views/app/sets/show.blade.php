@extends('layouts.app')

@section('content')

    <div class="ui stackable one column centered grid">
        <div class="ten wide column">
            @each('app.sets.cards.show', $cards, 'card', 'app.sets.cards.getting-started')
        </div>
        {!! Form::post()->route('cards.store') !!}
            {!! Form::hidden('set_id', $set->id) !!}
            <button class="massive basic grey ui icon button" type="submit">
                <i class="plus circle icon"></i>
            </button>
        {!! Form::close() !!}
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="{{ asset('js/summernote-lite.min.js') }}"></script>
    <script>
        var changed = [];
        $('.summernote').summernote({
            airMode: true,
            popover: {
                air: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']]
                ]
            },
            placeholder: 'Start typing...',
            tabsize: 2,
            height: 100,
            callbacks: {
                onChange: function(contents, $editable){
                    var $card = $editable.parents('.card');
                    if(changed.indexOf($card.data('id')) < 0){
                        changed.push($card.data('id'));
                    }
                },
                onBlur: function() {
                    $.each(changed, function(i, val){
                        var $card = $('.card[data-id="'+changed.shift()+'"]');
                        $.ajax({
                            method: "PUT",
                            url: "{{ route('cards.index') }}/" + $card.data('id'),
                            data: {
                                front_text: $card.find('textarea[name="front_text"]').val(),
                                back_text: $card.find('textarea[name="back_text"]').val()
                            }
                        });
                    });
                }
            }
        });

        $(function(){
            $(document).on('change', 'input[type="file"]', function(){
                var $file = $(this);
                $file.closest('form').submit();
            });
            $(document).on('blur', 'input[name="front_text"], input[name="back_text"]', function(){
                var $input = $(this);
                var $card = $input.parents('.card');
                $.ajax({
                    method: "POST",
                    url: "{{ route('cards.index') }}/" + $card.data('id'),
                    data: {
                        front_text: $card.find('input[name="front_text"]').val(),
                        back_text: $card.find('input[name="back_text"]').val()
                    }
                })
            });
        });
    </script>
@endpush

@push('styles')
    <link href="{{ asset('css/summernote-lite.min.css') }}" rel="stylesheet">
    <style>
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .image-upload-form{
            display: inline-block;
        }
    </style>
@endpush
