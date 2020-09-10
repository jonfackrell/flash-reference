@extends('layouts.viewer')

@section('content')

<div id="app" class="ui container">
    <div id="deck" class="ui container">
        <div class="ui grid">
            <div class="sixteen wide column">
                <div class="ui raised segment">
                    <div class="ui top attached progress" id="deck-progress" v-bind:data-percent="progress">
                        <div class="bar"></div>
                    </div>
                    <div class="ui stackable grid" id="flashcards">
                        <div class="four wide column">
                            <div class="ui vertical menu">
                                <div class="item" style="height: 60px;">
                                    <div class="ui purple label" style="width: 100%;height: 36px; font-size: 20px;">
                                        <div>
                                            @{{ current }} of @{{ length }}
                                        </div>
                                    </div>
                                </div>
                                <div class="ui item mobile only">
                                    <div class="ui fluid icon buttons">
                                        <button class="ui button play-button" v-on:click="play"><i class="teal play icon"></i></button>
                                        <button class="ui button pause-button" v-on:click="stop" style="display: none;"><i class="blue pause icon"></i></button>
                                        <button class="ui button starred-button" v-on:click="setStarred"><i class="yellow star icon"></i></button>
                                        <button class="ui button shuffle-button" v-on:click="shuffle"><i class="black random icon"></i></button>
                                        <button class="ui button reset-button" v-on:click="reset"><i class="red undo icon"></i></button>
                                    </div>
                                </div>
                                <div class="ui item mobile hidden">
                                    <div class="ui fluid buttons play-button">
                                        <button class="ui left labeled icon button" v-on:click="play">
                                            <i class="teal play icon"></i>
                                            Play
                                        </button>
                                    </div>
                                    <div class="ui fluid buttons pause-button" style="display: none;">
                                        <button class="ui left labeled icon button" v-on:click="stop">
                                            <i class="blue pause icon"></i>
                                            Pause
                                        </button>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="ui fluid buttons starred-button">
                                        <button class="ui left labeled icon button" v-on:click="setStarred">
                                            <i class="yellow star icon"></i>
                                            Starred
                                        </button>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="ui fluid buttons shuffle-button">
                                        <button class="ui left labeled icon button" v-on:click="shuffle">
                                            <i class="black random icon"></i>
                                            Shuffle
                                        </button>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="ui fluid buttons reset-button">
                                        <button class="ui left labeled icon button" v-on:click="reset">
                                            <i class="red undo icon"></i>
                                            Reset
                                        </button>
                                    </div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div id="flashcard-container" class="twelve wide column">
                            <div class="ui grid">
                                <div class="fourteen wide column">

                                </div>
                                <div class="two wide column">

                                </div>
                            </div>
                            <div class="ui shape" style="display: none; width: 100%;">
                                <div class="sides">
                                    <div id="front" class="side active" v-on:click="over">
                                        <div class="ui card">
                                            <img :src="card.front_image_url" alt="" />
                                            <div class="content">
                                                <span class="header" v-html="card.front_text">

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="back" class="side" v-on:click="back">
                                        <div class="ui card">
                                            <img :src="card.back_image_url" alt="" />
                                            <div class="content">
                                                <span class="header" v-html="card.back_text">

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="four wide column">
                            <div class="ui icon bottom left pointing dropdown button">
                                <i class="question icon"></i>
                                <div class="menu">
                                    <div class="item">
                                        <div class="ui black horizontal label">
                                            <i class="caret square left outline icon" style="color: #ffffff;"></i>
                                        </div>
                                        Previous Card
                                    </div>
                                    <div class="item">
                                        <div class="ui black horizontal label" style="color: #ffffff;">
                                            <i class="caret square right outline icon"></i>
                                        </div>
                                        Next Card
                                    </div>
                                    <div class="item">
                                        <div class="ui black horizontal label">Space</div>
                                        Flip Card
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="twelve wide column">
                            <div class="ui fluid buttons">
                                <button class="ui left labeled teal icon button" v-on:click="previous">
                                    <i class="left arrow icon"></i>
                                    Previous
                                </button>
                                <button class="ui button" v-on:click="star" v-bind:data-starred="card.starred" >
                                    <i class="star icon"></i>
                                </button>
                                <button class="ui right labeled teal icon button" v-on:click="next">
                                    <i class="right arrow icon"></i>
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
    <style>
        #deck #flashcard-container{
            /*min-height: 680px;*/

        }
        .ui.vertical.menu{
            width: 100%;
        }
        .ui.shape, .sides, .side {
            width: 100%;
        }
        .ui.card {
            /*height: 650px;*/
            overflow-y: hidden;
            width: 100%;
        }
        .ui.card .content{
            position: absolute;
            bottom: 0px;
            width: 100%;
            background: rgba(0, 0, 0, .5);
        }
        .ui.card .content.text{
            display: table;
            height: 100%;
            width: 100%;
        }
        .ui.card .content.text .header{
            display: table-cell;
            font-size: 2.5em;
            text-align: center;
            vertical-align: middle;
        }
        .ui.card .content .header{
            color: #ffffff !important;
            text-align: center;
        }
        .ui.card>img{
            height: auto;
            margin: 0 auto;
            width: 100%;
        }
        button[data-starred="true"]{
            background-color: #fbbd08 !important;
        }
        [data-starred="true"] i.star{
            color: #000000;
        }
    </style>
@endpush


@push('scripts')
    <script src="{{ asset('js/flashcards.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.0.22/collect.js"></script>
    <script src="/js/mousetrap.min.js"></script>
    <script>

        window.flash = {

            type: 'preview',

            course: 1,

            section: 1,

            set: '{{ $set->id }}',

            cards: @json($set->cards),

            front: null,

            back: null,

            buttons: {
                'play': null,
                'pause': null,
                'starred': null,
                'shuffle': null,
                'reset': null
            },

            init: function(){

                flash.buttons.play = $('.play-button');
                flash.buttons.pause = $('.pause-button');
                flash.buttons.starred = $('.starred-button');
                flash.buttons.shuffle = $('.shuffle-button');
                flash.buttons.reset = $('.reset-button');
                flash.shape = $('.ui.shape');
                flash.front = $('#front');
                flash.back = $('#back');

                deck.cards = flash.cards;
                deck.starred = collect(deck.cards).where('starred', true).keyBy('id');
                deck.show();
                /*setTimeout(function(){
                    $('#deck-progress').progress({
                        percent: 0,
                        total: deck.cards.length
                    });
                }, 200);*/

                setTimeout(function() {
                    // preload images
                    $.each(deck.cards, function(i, val){
                        if((deck.cards[i].front_image_url !== null) && deck.cards[i].front_image_url.length > 0){
                            new Image().src = deck.cards[i].front_image_url;
                        }
                        if((deck.cards[i].back_image_url !== null) && deck.cards[i].back_image_url.length > 0){
                            new Image().src = deck.cards[i].back_image_url;
                        }
                    });
                }, 1000);

                $('.shape').shape({
                    width: (flash.shape.width() - 28),
                    beforeChange: function(){

                    },
                    onChange: function(){

                    }
                });

                // $.ajax({
                //     type: "GET",
                //     url: '/lti/courses/'+flash.course+'/sets/'+flash.set+'/cards',
                //     dataType: "json",
                //     success: function (data) {
                //         flash.cards = data;
                //         deck.cards = data;
                //         deck.starred = collect(data).where('starred', true).keyBy('id');
                //
                //         deck.show();
                //         setTimeout(function(){
                //             $('#deck-progress').progress({
                //                 percent: 0,
                //                 total: deck.cards.length
                //             });
                //         }, 200);
                //         $('.shape').shape({
                //             beforeChange: function(){
                //
                //             },
                //             onChange: function(){
                //
                //             }
                //         });
                //     },
                //
                //     error: function () {
                //
                //     }
                // });

                Mousetrap.bind('space', function(e){
                    e.preventDefault();
                    deck.over();
                });

                Mousetrap.bind('right', function(e){
                    e.preventDefault();
                    deck.next();
                });

                Mousetrap.bind('left', function(e){
                    e.preventDefault();
                    deck.previous();
                });

                Mousetrap.bind('left', function(e){
                    e.preventDefault();
                    deck.previous();
                });
            }

        }
        $(function(){
            $('#deck #flashcard-container').height($( document ).height() - 200);
            $('#deck #flashcard-container .ui.card').height($( document ).height() - 230);
            flash.init();
            $('.ui.dropdown')
                .dropdown()
            ;

        });
    </script>
@endpush
