<template>

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
                                            {{ current }} of {{ length }}
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
                            <div class="ui shape" style="width: 100%;" v-show="card.id">
                                <div class="sides">
                                    <div id="front" class="side active" v-on:click="flip">
                                        <div class="ui card" :style="{ backgroundImage: 'url(\'' + card.front_image_url + '\')' }">
                                            <!--<img :src="card.front_image_url" alt="" />-->
                                            <div class="content">
                                                <span class="header" v-html="card.front_text">

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="back" class="side" v-on:click="flip">
                                        <div class="ui card" :style="{ backgroundImage: 'url(\'' + card.back_image_url + '\')' }">
                                            <!--<img :src="card.back_image_url" alt="" />-->
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

</template>

<script>

    module.exports = {
        props: {
            preview: {
                type: Boolean,
                required: false,
                default: false
            },
            course: {
                required: false,
                default: ''
            },
            set: {
                required: false,
                default: ''
            },
            section: {
                required: false,
                default: ''
            },
            cards: Array,
        },
        data: function(){
            return {
                index: null,
                card: {
                    "id":null,
                    "front_image_url":'front',
                    "front_text":null,
                    "hint":null,
                    "back_image_url":'back',
                    "back_text":null,
                    "order":null,
                    "created_at":null,
                    "updated_at":null,
                    "created_by":null,
                    "updated_by":null,
                    "starred":false
                },
                auto: false,
                side: 'front',
                timer: null
            }
        },
        mounted: function(){
            this.index = 0;
            this.bindKeys();
        },
        computed: {

            progress: function(){
                return Math.round( ( this.current / this.length ) * 100 );
            },

            current: function () {
                return (this.index + 1);
            },

            length: function(){
                return this.cards.length;
            },

            isStarred: {
                get: function() {
                    if(this.length > 0){
                        return (this.card.starred.length > 0)?'true':'false';
                    }else{
                        return 'false';
                    }
                },
                set: function(newValue) {

                }
            }
        },
        methods: {
            show: function(){

                $('.shape').hide(function () {
                    /*this.card = {
                        "id":null,
                        "front_image_url":null,
                        "front_text":null,
                        "hint":null,
                        "back_image_url":null,
                        "back_text":null,
                        "order":null,
                        "created_at":null,
                        "updated_at":null,
                        "created_by":null,
                        "updated_by":null,
                        "starred":false
                    };*/




                    if (this.index < this.length) {
                        this.card = this.cards[this.index];

                        setTimeout(function(){
                            if(this.side == 'back'){
                                $('.shape').shape('flip back').shape('set next side', '#front');
                                this.side = 'front';
                            }
                            $('.shape').fadeIn();
                            $('#deck-progress').progress('set percent', this.progress);
                        }.bind(this), 200);
                    }
                }.bind(this));

                if(this.view == 'preview'){

                }
            },
            update: function(){

            },
            flip: function(event){
                if(this.side == 'front'){
                    $('.shape').shape('flip over');
                    this.side = 'back';
                }else{
                    $('.shape').shape('flip back');
                    this.side = 'front';
                }
            },
            next: function(event){
                if(this.index < (this.length - 1)){
                    this.index++;
                }
            },
            previous: function(){
                if(this.index > 0){
                    this.index--;
                }
            },
            play: function(){

            },
            stop: function(){

            },
            star: function(event){

            },
            setStarred: function(){

            },

            logView: function(){

            },

            shuffle: function(){

            },

            reset: function(){

            },
            bindKeys: function(){
                this.$mousetrap.bind('space', function(e){
                    e.preventDefault();
                    this.flip();
                }.bind(this));

                this.$mousetrap.bind('right', function(e){
                    e.preventDefault();
                    this.next();
                }.bind(this));

                this.$mousetrap.bind('left', function(e){
                    e.preventDefault();
                    this.previous();
                }.bind(this));
            }
        },
        watch: {

            index: function() {
                this.show();
            },

            cards: function(){
                if(this.index == 0){
                    this.index = 0;
                    this.show();
                }else{
                    this.index = 0;
                }
            },

            side: function(){
                //console.log('Side: ' + this.side);
            }

        },
    }

</script>

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
        background-size: cover;
        height: 650px;
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
