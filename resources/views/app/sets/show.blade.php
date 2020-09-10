@extends('layouts.app')

@section('content')

    <div class="ui stackable one column centered grid">
        <div class="ten wide column">
            <h3 class="ui dividing header">
                {{ $set->name }}
            </h3>
        </div>
    </div>

    <div class="ui stackable one column centered grid">
        <div class="six wide column">
            {{--{!! $setViews->container() !!}--}}
        </div>
        <div class="four wide column">
            <button class="ui basic grey massive fluid button add-new-card" type="submit">
                <i class="plus circle icon"></i>
                Add Card
            </button>
            <br />
            <a href="{{ route('sets.preview', ['set' => $set]) }}" class="ui basic geen massive fluid button" target="preview">
                <i class="play icon"></i>
                Preview
            </a>
            <br />
            <a href="{{ route('sets.edit', ['set' => $set]) }}" class="ui basic geen massive fluid button">
                <i class="edit icon"></i>
                Edit
            </a>
        </div>
    </div>
    <div class="ui stackable one column centered grid">
        <div id="cards" class="ten wide column">
            @each('app.sets.cards.show', $cards, 'card', 'app.sets.cards.getting-started')
        </div>
    </div>
    <div class="ui stackable one column centered grid">
        <div class="ten wide column">
            <button class="ui basic grey massive fluid button add-new-card" type="submit">
                <i class="plus circle icon"></i>
                Add Card
            </button>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="{{ asset('js/summernote-lite.min.js') }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>--}}
    <script src="https://malsup.github.com/jquery.form.js"></script>
    {{--{!! $setViews->script() !!}--}}
    <script>
        var changed = [];
        $(function(){
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

            $(document).on('change', 'input[type="file"]', function(){
                var $file = $(this);
                var $progress = $file.parents('.card').find('.progress');
                $file.closest('form').ajaxSubmit({
                    success: function(data){
                        $file.parents('.card').find('.'+data.image).attr('src', data.image_url).parent().show();
                    },
                    beforeSend: function() {
                        $progress.show();
                        $progress.progress('set percent', 0);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        $progress.progress('set percent', percentComplete);
                    },
                    complete: function(xhr) {
                        $progress.hide();
                    }
                });
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

            $(document).on('click', '.add-new-card', function(){
                $.ajax({
                    method: "GET",
                    url: "{{ route('cards.create') }}",
                    data: {
                        'set_id': '{{ $set->id }}'
                    },
                    success: function(data){
                        $('#cards').append(data);
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
                    }
                })
            });

            $('.delete-card').ajaxForm({
                beforeSubmit: function(arr, $form, options) {
                    $form.find('.delete').addClass('loading');
                },
                success: function(responseText, statusText, xhr, $form){
                    $form.parents('.card').remove();
                }
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
        textarea.summernote{
            border: none !important;
            height: 100px;
            outline: none !important;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush
