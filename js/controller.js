// EATME APP
// @package  : ine
// @location : /js
// @file     : controller.js
// @author  : Gobierno fácil <howdy@gobiernofacil.com>
// @url     : http://gobiernofacil.com

define(function(require){
  
  //
  // L O A D   T H E   A S S E T S   A N D   L I B R A R I E S
  // --------------------------------------------------------------------------------
  //
  var Backbone      = require('backbone'),
      countdown     = require('jquery.countdown'),
      Countdown     = require('text!templates/countdown.html');

  //
  // I N I T I A L I Z E   T H E   B A C K B O N E   " C O N T R O L L E R "
  // --------------------------------------------------------------------------------
  //
  var controller = Backbone.View.extend({
    
    // ------------------
    // DEFINE THE EVENTS
    // ------------------
    //
    events : {
 
    },

    // -----------------
    // SET THE CONTAINER
    // -----------------
    //
    el : 'body',

    // ------------------------
    // THE INITIALIZE FUNCTION
    // ------------------------
    //
    initialize : function(){
	  
      // enable the countdown
      this.enable_countdown();      
    
    },

    // --------------------------------------------------------
    // ENABLE THE COUNTDOWN OR RENDER THE DESIGN FOR THE JUN 7
    // --------------------------------------------------------
    //
    enable_countdown : function(){
      var today     	= timer_today;
      var election_day  = timer_ends;

      if(election_day.getTime() > today.getTime()){
        // timer_ends is defined outisde backbone (/templates/footer.php)
        $('#countdown').countdown(timer_ends, function(e){
          $(this).html(e.strftime(Countdown));
        });
      }
      else{
        // render something else
        $('#countdown').countdown(timer_ends, function(e){
          $(this).html("no da");
        });
      }
    }

   });

  return controller;
});