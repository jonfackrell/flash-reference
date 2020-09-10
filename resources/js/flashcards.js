window.flashcards = {
    init: function(config){
        console.log(config);
        window.deck = new Vue({
            el: '#app',
            data: {
                cards: [],
                starred: [],
                /*card: {"id":null,"front_image_url":null,"front_audio_url":null,"front_text":null,"hint":null,"back_image_url":null,"back_audio_url":null,"back_text":null,"order":null,"created_at":null,"updated_at":null,"created_by":null,"updated_by":null,"starred":false},*/
                card: config.card,
                index: 0,
                side: 1,
                timer: null,
                path: '',
                type: config.type,
                course: config.course,
                set: config.set,
                section: config.section,
                cards: config.cards,
                container: config.shape,
                frontSide: config.front,
                backSide: config.back,
                buttons: {
                    'play': config.buttons.play,
                    'pause': config.buttons.pause,
                    'starred': config.buttons.starred,
                    'shuffle': config.buttons.shuffle,
                    'reset': config.buttons.reset
                },
            },

            mounted: function(){
                $('#deck-progress').progress('set percent', this.progress);

                $('#deck #flashcard-container').height($( document ).height() - 200);
                $('#deck #flashcard-container .ui.card').height($( document ).height() - 330);
                this.show();
                $('.ui.dropdown')
                    .dropdown()
                ;
                this.container = $('.ui.shape');
                this.container.shape({
                    width: (this.container.width() - 28),
                    beforeChange: function(){

                    },
                    onChange: function(){

                    }
                });

                Mousetrap.bind('space', function(e){
                    e.preventDefault();
                    this.over();
                });

                Mousetrap.bind('right', function(e){
                    e.preventDefault();
                    this.next();
                });

                Mousetrap.bind('left', function(e){
                    e.preventDefault();
                    this.previous();
                });

                Mousetrap.bind('left', function(e){
                    e.preventDefault();
                    this.previous();
                });

                this.starred = collect(this.cards).where('starred', true).keyBy('id');

                setTimeout(function() {
                    // preload images
                    $.each(this.cards, function(i, val){
                        if((this.cards[i].front_image_url !== null) && this.cards[i].front_image_url.length > 0){
                            new Image().src = this.cards[i].front_image_url;
                        }
                        if((this.cards[i].back_image_url !== null) && this.cards[i].back_image_url.length > 0){
                            new Image().src = this.cards[i].back_image_url;
                        }
                    });
                }, 1000);
            },

            computed:{

                progress: function(){
                    /*if(this.index <= 0){
                        return 0;
                    }*/
                    return Math.round( ( (this.index + 1) / this.cards.length ) * 100 );
                },

                current: function () {
                    return (this.index + 1);
                },

                length: function(){
                    return this.cards.length;
                },

                isStarred: {

                    get: function() {
                        if(this.cards.length > 0){
                            return (this.card.starred.length > 0)?'true':'false';
                        }else{
                            return '';
                        }
                    },

                    set: function(newValue) {

                    }
                }

            },

            watch: {

                index: function() {
                    this.update();
                },

                cards: function(){
                    if(this.index == 0){
                        this.index = 0;
                        this.update();
                    }else{
                        this.index = 0;
                    }
                },

                side: function(){
                    //console.log('Side: ' + this.side);
                }

            },
            methods: {

                show: function(){

                    this.card = this.cards[this.index];

                    this.logView();

                    if(this.card.front_image_url != null && this.card.front_image_url.length > 0 ){
                        this.frontSide.find('.content').removeClass('text');
                    }else{
                        this.frontSide.find('.content').addClass('text');
                    }
                    if(this.card.back_image_url != null &&  this.card.back_image_url.length > 0 ){
                        this.backSide.find('.content').removeClass('text');
                    }else{
                        this.backSide.find('.content').addClass('text');
                    }

                    if(this.card.front_text!= null && this.card.front_text.length > 0 ){
                        this.frontSide.find('.content').show();
                    }else{
                        this.frontSide.find('.content').hide();
                    }
                    if(this.card.back_text!= null && this.card.back_text.length > 0 ){
                        this.backSide.find('.content').show();
                    }else{
                        this.backSide.find('.content').hide();
                    }

                },

                update: function(){
                    $('.shape').hide(function () {
                        /*deck.card = {"id":null,"front_image_url":null,"front_audio_url":null,"front_text":null,"hint":null,"back_image_url":null,"back_audio_url":null,"back_text":null,"order":null,"created_at":null,"updated_at":null,"created_by":null,"updated_by":null,"starred":false};*/

                        $('#deck-progress').progress('set percent', this.progress);
                        if (this.index < this.cards.length) {
                            setTimeout(function(){
                                if(this.side == 2){
                                    $('.shape').shape('flip back').shape('set next side', '#front');
                                    this.side = 1;
                                }
                                this.show();
                                $('.shape').fadeIn();
                            }, 200);
                        }

                        // if($('.shape').find('#back').hasClass('active')){
                        //     $('.shape').shape('flip back').shape('set next side', '#back');
                        // }
                    });
                },

                over: function(event){
                    $('.shape').shape('flip over');
                    if(this.side == 1){
                        this.side = 2;
                    }else{
                        this.side = 1;
                    }
                },

                back: function(event){
                    $('.shape').shape('flip back');
                    if(this.side == 1){
                        this.side = 2;
                    }else{
                        this.side = 1;
                    }
                },

                next: function(event){
                    if(this.index < (this.cards.length - 1)){
                        this.index++;
                    }
                },

                previous: function(){
                    if(this.index > 0){
                        this.index--;
                    }
                },

                play: function(){
                    this.buttons.play.hide();
                    this.buttons.pause.show();
                    if(this.side == 1){
                        setTimeout(function(){
                            this.over();
                        }, 6000);
                    }
                    this.timer = setInterval(function(){

                        if(this.index < (this.cards.length - 1)){
                            this.index++;
                            setTimeout(function(){
                                this.over();
                            }, 6000);
                        }else{
                            clearInterval(this.timer);
                        }

                    }, 12000);
                },

                stop: function(){
                    this.buttons.pause.hide();
                    this.buttons.play.show();
                    clearInterval(this.timer);
                },

                star: function(event){
                    // TODO: Add function to save starred card
                    var $target = $(event.target);
                    var action = true;
                    if(this.card.starred == 'true' || this.card.starred == true){
                        action = false;
                    }

                    $.ajax({
                        type: "POST",
                        url: this.path + '/cards/' + this.card.id + '/star',
                        data: {
                            'action': action
                        },
                        dataType: "json",
                        success: function (data) {
                            this.card = data;
                            if(action == true){
                                this.starred.put(data.id, data);
                            }else{
                                this.starred.forget(data.id);
                            }
                        },

                        error: function () {

                        }
                    });

                },

                setStarred: function(){
                    this.cards = this.starred.toArray();
                },

                logView: function(){

                    if(this.type != 'private' && this.type != 'preview'){
                        $.ajax({
                            type: "POST",
                            url: '/lti/courses/'+this.course+'/sets/'+this.set+'/card/viewed',
                            dataType: "json",
                            data:{
                                card: this.card.id,
                                section_id: this.section
                            },
                            success: function (data) {

                            },

                            error: function () {

                            }
                        });
                    }

                },

                shuffle: function(){
                    this.cards = collect(this.cards).shuffle().toArray();
                },

                reset: function(){
                    this.cards = this.cards;
                    if(this.index == 0){
                        this.update();
                    }else{
                        this.index = 0;
                    }
                }

            }
        });
    }
}




