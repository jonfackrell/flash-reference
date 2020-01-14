window.deck = new Vue({
    el: '#app',
    data: {
        cards: [],
        starred: [],
        card: {"id":null,"front_image_url":null,"front_audio_url":null,"front_text":null,"hint":null,"back_image_url":null,"back_audio_url":null,"back_text":null,"order":null,"created_at":null,"updated_at":null,"created_by":null,"updated_by":null,"starred":false},
        index: 0,
        side: 1,
        timer: null
    },

    mounted: function(){
        $('#deck-progress').progress('set percent', deck.progress);
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
                if(deck.cards.length > 0){
                    return (deck.card.starred.length > 0)?'true':'false';
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
            deck.update();
        },

        cards: function(){
            if(deck.index == 0){
                deck.index = 0;
                deck.update();
            }else{
                deck.index = 0;
            }
        },

        side: function(){
            //console.log('Side: ' + deck.side);
        }

    },
    methods: {

        show: function(){

            this.card = this.cards[this.index];

            deck.logView();

            if(deck.card.front_image_url != null && deck.card.front_image_url.length > 0 ){
                flash.front.find('.content').removeClass('text');
            }else{
                flash.front.find('.content').addClass('text');
            }
            if(deck.card.back_image_url != null &&  deck.card.back_image_url.length > 0 ){
                flash.back.find('.content').removeClass('text');
            }else{
                flash.back.find('.content').addClass('text');
            }

            if(deck.card.front_text!= null && deck.card.front_text.length > 0 ){
                flash.front.find('.content').show();
            }else{
                flash.front.find('.content').hide();
            }
            if(deck.card.back_text!= null && deck.card.back_text.length > 0 ){
                flash.back.find('.content').show();
            }else{
                flash.back.find('.content').hide();
            }

        },

        update: function(){
            $('.shape').hide(function () {
                deck.card = {"id":null,"front_image_url":null,"front_audio_url":null,"front_text":null,"hint":null,"back_image_url":null,"back_audio_url":null,"back_text":null,"order":null,"created_at":null,"updated_at":null,"created_by":null,"updated_by":null,"starred":false};

                $('#deck-progress').progress('set percent', deck.progress);
                if (deck.index < deck.cards.length) {
                    setTimeout(function(){
                        if(deck.side == 2){
                            $('.shape').shape('flip back').shape('set next side', '#front');
                            deck.side = 1;
                        }
                        deck.show();
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
            if(deck.side == 1){
                deck.side = 2;
            }else{
                deck.side = 1;
            }
        },

        back: function(event){
            $('.shape').shape('flip back');
            if(deck.side == 1){
                deck.side = 2;
            }else{
                deck.side = 1;
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
            flash.buttons.play.hide();
            flash.buttons.pause.show();
            if(deck.side == 1){
                setTimeout(function(){
                    deck.over();
                }, 6000);
            }
            this.timer = setInterval(function(){

                if(deck.index < (deck.cards.length - 1)){
                    deck.index++;
                    setTimeout(function(){
                        deck.over();
                    }, 6000);
                }else{
                    clearInterval(deck.timer);
                }

            }, 12000);
        },

        stop: function(){
            flash.buttons.pause.hide();
            flash.buttons.play.show();
            clearInterval(deck.timer);
        },

        star: function(event){
            // TODO: Add function to save starred card
            var $target = $(event.target);
            if(deck.card.starred == 'true' || deck.card.starred == true){
                $.ajax({
                    type: "GET",
                    url: '/courses/'+flash.course+'/sets/'+flash.set+'/cards/'+deck.card.id+'/unstar',
                    dataType: "json",
                    success: function (data) {
                        deck.card = data;
                        deck.starred.forget(data.id);
                    },

                    error: function () {

                    }
                });
            }else{
                $.ajax({
                    type: "GET",
                    url: '/courses/'+flash.course+'/sets/'+flash.set+'/cards/'+deck.card.id+'/star',
                    dataType: "json",
                    success: function (data) {
                        deck.card = data;
                        deck.starred.put(data.id, data);
                    },

                    error: function () {

                    }
                });
            }

        },

        setStarred: function(){
            deck.cards = deck.starred.toArray();
        },

        logView: function(){

            if(flash.type != 'private' && flash.type != 'preview'){
                $.ajax({
                    type: "POST",
                    url: '/lti/courses/'+flash.course+'/sets/'+flash.set+'/card/viewed',
                    dataType: "json",
                    data:{
                        card: deck.card.id,
                        section_id: flash.section
                    },
                    success: function (data) {

                    },

                    error: function () {

                    }
                });
            }

        },

        shuffle: function(){
            deck.cards = collect(deck.cards).shuffle().toArray();
        },

        reset: function(){
            deck.cards = flash.cards;
            if(deck.index == 0){
                deck.update();
            }else{
                deck.index = 0;
            }
        }

    }
});


