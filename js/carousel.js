/*
--------------------------------------------------------------------------
---------------This file contains default scrips for the AlgaeCal Carousel
--------------------------------------------------------------------------
*/
// Script to create Thumbnail Slider
$(window).load(function(){
	var $item = $('li#thumbNav'), //DOM selector
	visible = 2 //Number of items that will be visible
	index = 0, //Starting index
	endIndex = ( $item.length / visible ) - 1; //End index

$('a#arrowR').click(function(){
	if(index < endIndex ){
	  index++;
	  $item.animate({'left':'-=100px'});
	}
});

$('a#arrowL').click(function(){
	if(index > 0){
	  index--;            
	  $item.animate({'left':'+=100px'});
	}
});
  
 
});