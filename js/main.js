// INE APP
// date     : 05/05/2015
// @package : ine
// @file    : main.js
// @version : 1.0.0
// @author  : Gobierno fácil <howdy@gobiernofacil.com>
// @url     : http://gobiernofacil.com

require.config({
  baseUrl : '/js',
  paths : {
    jquery        : 'bower_components/jquery/dist/jquery',
    backbone      : "bower_components/backbone/backbone",
    underscore    : "bower_components/underscore/underscore",
    text          : "bower_components/text/text",
    gsap	        : "bower_components/gsap/src/minified/TweenMax.min",
    'jquery.countdown' : "bower_components/jquery.countdown/dist/jquery.countdown"
  },
  shim : {
    backbone : {
      deps    : ["jquery", "underscore","gsap"],
      exports : "Backbone"
    },    
    'jquery.countdown' : ['jquery']
  }
});

 var app;

require(['controller'], function(controller){ 
  //var app;
  app = new controller();
});