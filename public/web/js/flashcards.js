!function(e){var t={};function n(d){if(t[d])return t[d].exports;var r=t[d]={i:d,l:!1,exports:{}};return e[d].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,d){n.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:d})},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=9)}({10:function(e,t){window.deck=new Vue({el:"#app",data:{cards:[],starred:[],card:{id:null,front_image_url:null,front_audio_url:null,front_text:null,hint:null,back_image_url:null,back_audio_url:null,back_text:null,order:null,created_at:null,updated_at:null,created_by:null,updated_by:null,starred:!1},index:0,side:1,timer:null},mounted:function(){$("#deck-progress").progress("set percent",deck.progress)},computed:{progress:function(){return Math.round((this.index+1)/this.cards.length*100)},current:function(){return this.index+1},length:function(){return this.cards.length},isStarred:{get:function(){return deck.cards.length>0?deck.card.starred.length>0?"true":"false":""},set:function(e){}}},watch:{index:function(){deck.update()},cards:function(){0==deck.index?(deck.index=0,deck.update()):deck.index=0},side:function(){}},methods:{show:function(){this.card=this.cards[this.index],deck.logView(),null!=deck.card.front_image_url&&deck.card.front_image_url.length>0?flash.front.find(".content").removeClass("text"):flash.front.find(".content").addClass("text"),null!=deck.card.back_image_url&&deck.card.back_image_url.length>0?flash.back.find(".content").removeClass("text"):flash.back.find(".content").addClass("text"),null!=deck.card.front_text&&deck.card.front_text.length>0?flash.front.find(".content").show():flash.front.find(".content").hide(),null!=deck.card.back_text&&deck.card.back_text.length>0?flash.back.find(".content").show():flash.back.find(".content").hide()},update:function(){$(".shape").hide(function(){deck.card={id:null,front_image_url:null,front_audio_url:null,front_text:null,hint:null,back_image_url:null,back_audio_url:null,back_text:null,order:null,created_at:null,updated_at:null,created_by:null,updated_by:null,starred:!1},$("#deck-progress").progress("set percent",deck.progress),deck.index<deck.cards.length&&setTimeout(function(){2==deck.side&&($(".shape").shape("flip back").shape("set next side","#front"),deck.side=1),deck.show(),$(".shape").fadeIn()},200)})},over:function(e){$(".shape").shape("flip over"),1==deck.side?deck.side=2:deck.side=1},back:function(e){$(".shape").shape("flip back"),1==deck.side?deck.side=2:deck.side=1},next:function(e){this.index<this.cards.length-1&&this.index++},previous:function(){this.index>0&&this.index--},play:function(){flash.buttons.play.hide(),flash.buttons.pause.show(),1==deck.side&&setTimeout(function(){deck.over()},6e3),this.timer=setInterval(function(){deck.index<deck.cards.length-1?(deck.index++,setTimeout(function(){deck.over()},6e3)):clearInterval(deck.timer)},12e3)},stop:function(){flash.buttons.pause.hide(),flash.buttons.play.show(),clearInterval(deck.timer)},star:function(e){$(e.target);"true"==deck.card.starred||1==deck.card.starred?$.ajax({type:"GET",url:"/courses/"+flash.course+"/sets/"+flash.set+"/cards/"+deck.card.id+"/unstar",dataType:"json",success:function(e){deck.card=e,deck.starred.forget(e.id)},error:function(){}}):$.ajax({type:"GET",url:"/courses/"+flash.course+"/sets/"+flash.set+"/cards/"+deck.card.id+"/star",dataType:"json",success:function(e){deck.card=e,deck.starred.put(e.id,e)},error:function(){}})},setStarred:function(){deck.cards=deck.starred.toArray()},logView:function(){"private"!=flash.type&&"preview"!=flash.type&&$.ajax({type:"POST",url:"/lti/courses/"+flash.course+"/sets/"+flash.set+"/card/viewed",dataType:"json",data:{card:deck.card.id,section_id:flash.section},success:function(e){},error:function(){}})},shuffle:function(){deck.cards=collect(deck.cards).shuffle().toArray()},reset:function(){deck.cards=flash.cards,0==deck.index?deck.update():deck.index=0}}})},9:function(e,t,n){e.exports=n(10)}});