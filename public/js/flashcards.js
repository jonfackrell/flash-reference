/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/flashcards.js":
/*!************************************!*\
  !*** ./resources/js/flashcards.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

window.flashcards = {
  init: function init(config) {
    var _data;

    console.log(config);
    window.deck = new Vue({
      el: '#app',
      data: (_data = {
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
        section: config.section
      }, _defineProperty(_data, "cards", config.cards), _defineProperty(_data, "container", config.shape), _defineProperty(_data, "frontSide", config.front), _defineProperty(_data, "backSide", config.back), _defineProperty(_data, "buttons", {
        'play': config.buttons.play,
        'pause': config.buttons.pause,
        'starred': config.buttons.starred,
        'shuffle': config.buttons.shuffle,
        'reset': config.buttons.reset
      }), _data),
      mounted: function mounted() {
        $('#deck-progress').progress('set percent', this.progress);
        $('#deck #flashcard-container').height($(document).height() - 200);
        $('#deck #flashcard-container .ui.card').height($(document).height() - 330);
        this.show();
        $('.ui.dropdown').dropdown();
        this.container = $('.ui.shape');
        this.container.shape({
          width: this.container.width() - 28,
          beforeChange: function beforeChange() {},
          onChange: function onChange() {}
        });
        Mousetrap.bind('space', function (e) {
          e.preventDefault();
          this.over();
        });
        Mousetrap.bind('right', function (e) {
          e.preventDefault();
          this.next();
        });
        Mousetrap.bind('left', function (e) {
          e.preventDefault();
          this.previous();
        });
        Mousetrap.bind('left', function (e) {
          e.preventDefault();
          this.previous();
        });
        this.starred = collect(this.cards).where('starred', true).keyBy('id');
        setTimeout(function () {
          // preload images
          $.each(this.cards, function (i, val) {
            if (this.cards[i].front_image_url !== null && this.cards[i].front_image_url.length > 0) {
              new Image().src = this.cards[i].front_image_url;
            }

            if (this.cards[i].back_image_url !== null && this.cards[i].back_image_url.length > 0) {
              new Image().src = this.cards[i].back_image_url;
            }
          });
        }, 1000);
      },
      computed: {
        progress: function progress() {
          /*if(this.index <= 0){
              return 0;
          }*/
          return Math.round((this.index + 1) / this.cards.length * 100);
        },
        current: function current() {
          return this.index + 1;
        },
        length: function length() {
          return this.cards.length;
        },
        isStarred: {
          get: function get() {
            if (this.cards.length > 0) {
              return this.card.starred.length > 0 ? 'true' : 'false';
            } else {
              return '';
            }
          },
          set: function set(newValue) {}
        }
      },
      watch: {
        index: function index() {
          this.update();
        },
        cards: function cards() {
          if (this.index == 0) {
            this.index = 0;
            this.update();
          } else {
            this.index = 0;
          }
        },
        side: function side() {//console.log('Side: ' + this.side);
        }
      },
      methods: {
        show: function show() {
          this.card = this.cards[this.index];
          this.logView();

          if (this.card.front_image_url != null && this.card.front_image_url.length > 0) {
            this.frontSide.find('.content').removeClass('text');
          } else {
            this.frontSide.find('.content').addClass('text');
          }

          if (this.card.back_image_url != null && this.card.back_image_url.length > 0) {
            this.backSide.find('.content').removeClass('text');
          } else {
            this.backSide.find('.content').addClass('text');
          }

          if (this.card.front_text != null && this.card.front_text.length > 0) {
            this.frontSide.find('.content').show();
          } else {
            this.frontSide.find('.content').hide();
          }

          if (this.card.back_text != null && this.card.back_text.length > 0) {
            this.backSide.find('.content').show();
          } else {
            this.backSide.find('.content').hide();
          }
        },
        update: function update() {
          $('.shape').hide(function () {
            /*deck.card = {"id":null,"front_image_url":null,"front_audio_url":null,"front_text":null,"hint":null,"back_image_url":null,"back_audio_url":null,"back_text":null,"order":null,"created_at":null,"updated_at":null,"created_by":null,"updated_by":null,"starred":false};*/
            $('#deck-progress').progress('set percent', this.progress);

            if (this.index < this.cards.length) {
              setTimeout(function () {
                if (this.side == 2) {
                  $('.shape').shape('flip back').shape('set next side', '#front');
                  this.side = 1;
                }

                this.show();
                $('.shape').fadeIn();
              }, 200);
            } // if($('.shape').find('#back').hasClass('active')){
            //     $('.shape').shape('flip back').shape('set next side', '#back');
            // }

          });
        },
        over: function over(event) {
          $('.shape').shape('flip over');

          if (this.side == 1) {
            this.side = 2;
          } else {
            this.side = 1;
          }
        },
        back: function back(event) {
          $('.shape').shape('flip back');

          if (this.side == 1) {
            this.side = 2;
          } else {
            this.side = 1;
          }
        },
        next: function next(event) {
          if (this.index < this.cards.length - 1) {
            this.index++;
          }
        },
        previous: function previous() {
          if (this.index > 0) {
            this.index--;
          }
        },
        play: function play() {
          this.buttons.play.hide();
          this.buttons.pause.show();

          if (this.side == 1) {
            setTimeout(function () {
              this.over();
            }, 6000);
          }

          this.timer = setInterval(function () {
            if (this.index < this.cards.length - 1) {
              this.index++;
              setTimeout(function () {
                this.over();
              }, 6000);
            } else {
              clearInterval(this.timer);
            }
          }, 12000);
        },
        stop: function stop() {
          this.buttons.pause.hide();
          this.buttons.play.show();
          clearInterval(this.timer);
        },
        star: function star(event) {
          // TODO: Add function to save starred card
          var $target = $(event.target);
          var action = true;

          if (this.card.starred == 'true' || this.card.starred == true) {
            action = false;
          }

          $.ajax({
            type: "POST",
            url: this.path + '/cards/' + this.card.id + '/star',
            data: {
              'action': action
            },
            dataType: "json",
            success: function success(data) {
              this.card = data;

              if (action == true) {
                this.starred.put(data.id, data);
              } else {
                this.starred.forget(data.id);
              }
            },
            error: function error() {}
          });
        },
        setStarred: function setStarred() {
          this.cards = this.starred.toArray();
        },
        logView: function logView() {
          if (this.type != 'private' && this.type != 'preview') {
            $.ajax({
              type: "POST",
              url: '/lti/courses/' + this.course + '/sets/' + this.set + '/card/viewed',
              dataType: "json",
              data: {
                card: this.card.id,
                section_id: this.section
              },
              success: function success(data) {},
              error: function error() {}
            });
          }
        },
        shuffle: function shuffle() {
          this.cards = collect(this.cards).shuffle().toArray();
        },
        reset: function reset() {
          this.cards = this.cards;

          if (this.index == 0) {
            this.update();
          } else {
            this.index = 0;
          }
        }
      }
    });
  }
};

/***/ }),

/***/ 1:
/*!******************************************!*\
  !*** multi ./resources/js/flashcards.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Jon\code\flash-reference\resources\js\flashcards.js */"./resources/js/flashcards.js");


/***/ })

/******/ });